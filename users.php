<?php 
session_start();
$root = '/var/www/site';
include($root.'/lib/lang.php');
?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $ini['Title_main'];?></title>
	</head>

	<body>
	<table width="100%" border="0">
	  <tr>
		<?php include ($root.'/bloks/left_user.php');?>
	  </tr>
	  <tr>
		<?php include ($root.'/bloks/header.php');?>
	  </tr>
	  <tr>
		<td><table width="100%" border="0">
		  <tr>
			<td width="14%" align="left" valign="top" bgcolor="#2B98FF"><table width="100%" border="0">
			  <tr>
				<?php include ($root.'/bloks/left_lenguage.php');?>
			  </tr>
			  <tr>
				 <?php include ($root.'/bloks/left_menu.php');?>
			  </tr>
			</table></td>
			<td width="86%" align="left" valign="top">
			<?php include($root.'/lib/list_user.php');?>
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