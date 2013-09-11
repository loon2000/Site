<?php 
session_start();
$root = '/var/www/site';
error_reporting(E_ALL | E_STRICT | E_NOTICE);
include_once($root.'/lib/lang.php');
include_once($root.'/lib/login.php');
include_once($root.'/lib/function_global.php');
if (isset($_SESSION['user_id'])) 
{
	?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo t('Main page - SH');?></title>
	</head>

	<body>
     <table width="100%" border="0">
	  <tr>
		<?php include ($root.'/bloks/blok_user.php');?>
		<?php include ($root.'/bloks/blok_lenguage.php');?>
	  </tr>
	</table>

	<table width="100%" border="0">
	  <tr>
		<?php include ($root.'/bloks/header.php');?>
	  </tr>
	  <tr>
		<td><table width="100%" border="0">
		  <tr>
			<td width="14%" align="left" valign="top" bgcolor="#2B98FF"><table width="100%" border="0">
			  <tr>
				 <?php include ($root.'/bloks/left_menu.php');?>
			  </tr>
			</table></td>
			<td width="86%" align="left" valign="top">
			<?php include($root.'/lib/main.php');?>
			</td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<?php include ($root.'/bloks/footer.php');?>
	  </tr>
	</table>
	</body>
	</html>
	<?php 
}
else {
	$nologin = t('You are not authorized to access this page');
	$start_page = t('Start Page');
    die($nologin.' <a href="/site/index.php">'.$start_page.'</a>');
}
?>
