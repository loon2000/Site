<?php
if (!isset($_REQUEST['lang']) and empty($_REQUEST['lang'])) 
	$_REQUEST['lang'] = "en";
$lang =$_REQUEST['lang'];
$ini = parse_ini_file($root.'/'.$lang.'.ini'); 
?>
