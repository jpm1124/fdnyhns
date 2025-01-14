<?php
/*
Plugin Name: GreyMatter Importer
Plugin URI: http://wordpress.org/extend/plugins/greymatter-importer/
Description: Import posts, pages, comments, custom fields, categories, and tags from a WordPress export file.
Author: wordpressdotorg
Author URI: http://wordpress.org/
Version: 0.2
Stable tag: 0.2
License: GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

if ( !defined('WP_LOAD_IMPORTERS') )
	return;

// Load Importer API
require_once ABSPATH . 'wp-admin/includes/import.php';

if ( !class_exists( 'WP_Importer' ) ) {
	$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
	if ( file_exists( $class_wp_importer ) )
		require_once $class_wp_importer;
}

/**
 * GreyMatter Importer
 *
 * @package WordPress
 * @subpackage Importer
 */
if ( class_exists( 'WP_Importer' ) ) {
class GM_Import extends WP_Importer {

	var $gmnames = array ();

	function header() {
		echo '<div class="wrap">';
		screen_icon();
		echo '<h2>'.__('Import GreyMatter', 'greymatter-importer').'</h2>';
	}

	function footer() {
		echo '</div>';
	}

	function greet() {
		$this->header();
?>
<p><?php _e('This is a basic GreyMatter to WordPress import script.', 'greymatter-importer') ?></p>
<p><?php _e('What it does:', 'greymatter-importer') ?></p>
<ul>
<li><?php _e('Parses gm-authors.cgi to import (new) authors. Everyone is imported at level 1.', 'greymatter-importer') ?></li>
<li><?php _e('Parses the entries cgi files to import posts, comments, and karma on posts (although karma is not used on WordPress yet).<br />If authors are found not to be in gm-authors.cgi, imports them at level 0.', 'greymatter-importer') ?></li>
<li><?php _e("Detects duplicate entries or comments. If you don't import everything the first time, or this import should fail in the middle, duplicate entries will not be made when you try again.", 'greymatter-importer') ?></li>
</ul>
<p><?php _e('What it does not:', 'greymatter-importer') ?></p>
<ul>
<li><?php _e('Parse gm-counter.cgi, gm-banlist.cgi, gm-cplog.cgi (you can make a CP log hack if you really feel like it, but I question the need of a CP log).', 'greymatter-importer') ?></li>
<li><?php _e('Import gm-templates.', 'greymatter-importer') ?></li>
<li><?php _e("Doesn&#8217;t keep entries on top.", 'greymatter-importer')?></li>
</ul>
<p>&nbsp;</p>

<form name="stepOne" method="get" action="">
<input type="hidden" name="import" value="greymatter" />
<input type="hidden" name="step" value="1" />
<?php wp_nonce_field('import-greymatter'); ?>
<h3><?php _e('Second step: GreyMatter details:', 'greymatter-importer') ?></h3>
<table class="form-table">
<tr>
<td><label for="gmpath"><?php _e('Path to GM files:', 'greymatter-importer') ?></label></td>
<td><input type="text" style="width:300px" name="gmpath" id="gmpath" value="/home/my/site/cgi-bin/greymatter/" /></td>
</tr>
<tr>
<td><label for="archivespath"><?php _e('Path to GM entries:', 'greymatter-importer') ?></label></td>
<td><input type="text" style="width:300px" name="archivespath" id="archivespath" value="/home/my/site/cgi-bin/greymatter/archives/" /></td>
</tr>
<tr>
<td><label for="lastentry"><?php _e('Last entry&#8217;s number:', 'greymatter-importer') ?></label></td>
<td><input type="text" name="lastentry" id="lastentry" value="00000001" /><br />
	<?php _e('This importer will search for files 00000001.cgi to 000-whatever.cgi,<br />so you need to enter the number of the last GM post here.<br />(if you don&#8217;t know that number, just log in to your FTP and look it out<br />in the entries&#8217; folder)', 'greymatter-importer') ?></td>
</tr>
</table>
<p class="submit"><input type="submit" name="submit" class="button" value="<?php esc_attr_e('Start Importing', 'greymatter-importer') ?>" /></p>
</form>
<?php
		$this->footer();
	}



	function gm2autobr($string) { // transforms GM's |*| into b2's <br />\n
		$string = str_replace("|*|","<br />\n",$string);
		return($string);
	}

	function import() {
		global $wpdb;

		$wpvarstoreset = array('gmpath', 'archivespath', 'lastentry');
		for ($i=0; $i<count($wpvarstoreset); $i += 1) {
			$wpvar = $wpvarstoreset[$i];
			if (!isset($$wpvar)) {
				if (empty($_POST[$wpvar])) {
					if (empty($_GET[$wpvar])) {
						$$wpvar = '';
					} else {
						$$wpvar = $_GET[$wpvar];
					}
				} else {
					$$wpvar = $_POST[$wpvar];
				}
			}
		}

		if (!chdir($archivespath))
			wp_die(__("Wrong path, the path to the GM entries does not exist on the server", 'greymatter-importer'));

		if (!chdir($gmpath))
			wp_die(__("Wrong path, the path to the GM files does not exist on the server", 'greymatter-importer'));

		$lastentry = (int) $lastentry;

		$this->header();
?>
<p><?php _e('The importer is running...', 'greymatter-importer') ?></p>
<ul>
<li><?php _e('importing users...', 'greymatter-importer') ?><ul><?php

	chdir($gmpath);
	$userbase = file("gm-authors.cgi");

	foreach($userbase as $user) {
		$userdata=explode("|", $user);

		$user_ip="127.0.0.1";
		$user_domain="localhost";
		$user_browser="server";

		$s=$userdata[4];
		$user_joindate=substr($s,6,4)."-".substr($s,0,2)."-".substr($s,3,2)." 00:00:00";

		$user_login=$wpdb->escape($userdata[0]);
		$pass1=$wpdb->escape($userdata[1]);
		$user_nickname=$wpdb->escape($userdata[0]);
		$user_email=$wpdb->escape($userdata[2]);
		$user_url=$wpdb->escape($userdata[3]);
		$user_joindate=$wpdb->escape($user_joindate);

		$user_id = username_exists($user_login);
		if ($user_id) {
			printf('<li>'.__('user %s', 'greymatter-importer').'<strong>'.__('Already exists', 'greymatter-importer').'</strong></li>', "<em>$user_login</em>");
			$this->gmnames[$userdata[0]] = $user_id;
			continue;
		}

		$user_info = array("user_login"=>$user_login, "user_pass"=>$pass1, "user_nickname"=>$user_nickname, "user_email"=>$user_email, "user_url"=>$user_url, "user_ip"=>$user_ip, "user_domain"=>$user_domain, "user_browser"=>$user_browser, "dateYMDhour"=>$user_joindate, "user_level"=>"1", "user_idmode"=>"nickname");
		$user_id = wp_insert_user($user_info);
		$this->gmnames[$userdata[0]] = $user_id;

		printf('<li>'.__('user %s...', 'greymatter-importer').' <strong>'.__('Done', 'greymatter-importer').'</strong></li>', "<em>$user_login</em>");
	}

?></ul><strong><?php _e('Done', 'greymatter-importer') ?></strong></li>
<li><?php _e('importing posts, comments, and karma...', 'greymatter-importer') ?><br /><ul><?php

	chdir($archivespath);

	for($i = 0; $i <= $lastentry; $i = $i + 1) {

		$entryfile = "";

		if ($i<10000000) {
			$entryfile .= "0";
			if ($i<1000000) {
				$entryfile .= "0";
				if ($i<100000) {
					$entryfile .= "0";
					if ($i<10000) {
						$entryfile .= "0";
						if ($i<1000) {
							$entryfile .= "0";
							if ($i<100) {
								$entryfile .= "0";
								if ($i<10) {
									$entryfile .= "0";
		}}}}}}}

		$entryfile .= $i;

		if (is_file($entryfile.".cgi")) {

			$entry=file($entryfile.".cgi");
			$postinfo=explode("|",$entry[0]);
			$postmaincontent=$this->gm2autobr($entry[2]);
			$postmorecontent=$this->gm2autobr($entry[3]);

			$post_author=trim($wpdb->escape($postinfo[1]));

			$post_title=$this->gm2autobr($postinfo[2]);
			printf('<li>'.__('entry # %s : %s : by %s', 'greymatter-importer'), $entryfile, $post_title, $postinfo[1]);
			$post_title=$wpdb->escape($post_title);

			$postyear=$postinfo[6];
			$postmonth=zeroise($postinfo[4],2);
			$postday=zeroise($postinfo[5],2);
			$posthour=zeroise($postinfo[7],2);
			$postminute=zeroise($postinfo[8],2);
			$postsecond=zeroise($postinfo[9],2);

			if (($postinfo[10]=="PM") && ($posthour!="12"))
				$posthour=$posthour+12;

			$post_date="$postyear-$postmonth-$postday $posthour:$postminute:$postsecond";

			$post_content=$postmaincontent;
			if (strlen($postmorecontent)>3)
				$post_content .= "<!--more--><br /><br />".$postmorecontent;
			$post_content=$wpdb->escape($post_content);

			$post_karma=$postinfo[12];

			$post_status = 'publish'; //in greymatter, there are no drafts
			$comment_status = 'open';
			$ping_status = 'closed';

			if ($post_ID = post_exists($post_title, '', $post_date)) {
				echo ' ';
				_e('(already exists)', 'greymatter-importer');
			} else {
				//just so that if a post already exists, new users are not created by checkauthor
				// we'll check the author is registered, or if it's a deleted author
				$user_id = username_exists($post_author);
				if (!$user_id) {	// if deleted from GM, we register the author as a level 0 user
					$user_ip="127.0.0.1";
					$user_domain="localhost";
					$user_browser="server";
					$user_joindate="1979-06-06 00:41:00";
					$user_login=$wpdb->escape($post_author);
					$pass1=$wpdb->escape("password");
					$user_nickname=$wpdb->escape($post_author);
					$user_email=$wpdb->escape("user@deleted.com");
					$user_url=$wpdb->escape("");
					$user_joindate=$wpdb->escape($user_joindate);

					$user_info = array("user_login"=>$user_login, "user_pass"=>$pass1, "user_nickname"=>$user_nickname, "user_email"=>$user_email, "user_url"=>$user_url, "user_ip"=>$user_ip, "user_domain"=>$user_domain, "user_browser"=>$user_browser, "dateYMDhour"=>$user_joindate, "user_level"=>0, "user_idmode"=>"nickname");
					$user_id = wp_insert_user($user_info);
					$this->gmnames[$postinfo[1]] = $user_id;

					echo ': ';
					printf(__('registered deleted user %s at level 0 ', 'greymatter-importer'), "<em>$user_login</em>");
				}

				if (array_key_exists($postinfo[1], $this->gmnames)) {
					$post_author = $this->gmnames[$postinfo[1]];
				} else {
					$post_author = $user_id;
				}

				$postdata = compact('post_author', 'post_date', 'post_date_gmt', 'post_content', 'post_title', 'post_excerpt', 'post_status', 'comment_status', 'ping_status', 'post_modified', 'post_modified_gmt');
				$post_ID = wp_insert_post($postdata);
				if ( is_wp_error( $post_ID ) )
					return $post_ID;
			}

			$c=count($entry);
			if ($c>4) {
				$numAddedComments = 0;
				$numComments = 0;
				for ($j=4;$j<$c;$j++) {
					$entry[$j]=$this->gm2autobr($entry[$j]);
					$commentinfo=explode("|",$entry[$j]);
					$comment_post_ID=$post_ID;
					$comment_author=$wpdb->escape($commentinfo[0]);
					$comment_author_email=$wpdb->escape($commentinfo[2]);
					$comment_author_url=$wpdb->escape($commentinfo[3]);
					$comment_author_IP=$wpdb->escape($commentinfo[1]);

					$commentyear=$commentinfo[7];
					$commentmonth=zeroise($commentinfo[5],2);
					$commentday=zeroise($commentinfo[6],2);
					$commenthour=zeroise($commentinfo[8],2);
					$commentminute=zeroise($commentinfo[9],2);
					$commentsecond=zeroise($commentinfo[10],2);
					if (($commentinfo[11]=="PM") && ($commenthour!="12"))
						$commenthour=$commenthour+12;
					$comment_date="$commentyear-$commentmonth-$commentday $commenthour:$commentminute:$commentsecond";

					$comment_content=$wpdb->escape($commentinfo[12]);

					if (!comment_exists($comment_author, $comment_date)) {
						$commentdata = compact('comment_post_ID', 'comment_author', 'comment_author_url', 'comment_author_email', 'comment_author_IP', 'comment_date', 'comment_content', 'comment_approved');
						$commentdata = wp_filter_comment($commentdata);
						wp_insert_comment($commentdata);
						$numAddedComments++;
					}
					$numComments++;
				}
				if ($numAddedComments > 0) {
					echo ': ';
				printf( _n('imported %s comment', 'imported %s comments', $numAddedComments, 'greymatter-importer') , $numAddedComments);
				}
				$preExisting = $numComments - numAddedComments;
				if ($preExisting > 0) {
					echo ' ';
					printf( _n( 'ignored %s pre-existing comment', 'ignored %s pre-existing comments', $preExisting , 'greymatter-importer') , $preExisting);
				}
			}
			echo '... <strong>'.__('Done', 'greymatter-importer').'</strong></li>';
		}
	}
	do_action('import_done', 'greymatter');
	?>
</ul><strong><?php _e('Done', 'greymatter-importer') ?></strong></li></ul>
<p>&nbsp;</p>
<p><?php _e('Completed GreyMatter import!', 'greymatter-importer') ?></p>
<?php
	$this->footer();
	return;
	}

	function dispatch() {
		if (empty ($_GET['step']))
			$step = 0;
		else
			$step = (int) $_GET['step'];

		switch ($step) {
			case 0 :
				$this->greet();
				break;
			case 1:
				check_admin_referer('import-greymatter');
				$result = $this->import();
				if ( is_wp_error( $result ) )
					echo $result->get_error_message();
				break;
		}
	}

	function GM_Import() {
		// Nothing.
	}
}

$gm_import = new GM_Import();

register_importer('greymatter', __('GreyMatter', 'greymatter-importer'), __('Import users, posts, and comments from a Greymatter blog.', 'greymatter-importer'), array ($gm_import, 'dispatch'));

} // class_exists( 'WP_Importer' )

function greymatter_importer_init() {
    load_plugin_textdomain( 'greymatter-importer', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'greymatter_importer_init' );
