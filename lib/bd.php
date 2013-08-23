<?php 
if (isset($_SESSION['user_id'])) 
{
	$bd = mysql_connect('localhost','site','site');
	mysql_query("SET NAMES utf8");
	mysql_select_db('sitebd',$bd);
}
else 
    die($ini['Nologin'].' <a href="/site/index.php?lang='.$lang.'">'.$ini['Start_page'].'</a>');
?>
