<?php 
session_start();
$root = '/var/www/site';
include_once($root.'/lib/lang.php');
include_once($root.'/lib/function_global.php');
if (isset($_SESSION['user_id'])) 
{ 
  include_once($root.'/lib/bd.php');
  $result = mysql_query("SELECT * 
			 FROM user 
			 WHERE id='$_GET[id]'") or die(mysql_error()); 
  if ($result)
  {
    $data = mysql_fetch_array($result);?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo t('My account - SH'); ?></title>
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
	<?php include ('bloks/header.php');?>
      </tr>
      <tr>
	<td><table width="100%" border="0">
	  <tr>
	    <td width="14%" align="left" valign="top" bgcolor="#2B98FF"><table width="100%" border="0">
	      <tr>
		  &nbsp;
	      </tr>
	      <tr>
		 <?php include ($root.'/bloks/left_menu.php');?>
	      </tr>
	    </table></td>
	    <td width="86%" align="left" valign="top">
		  <?php if (isset($_REQUEST['masege']))
					print '<p>'.$_REQUEST['masege'].'</p>';?>
		 <h2><?php echo t('Login').' '.$data['login']; ?></h2>
		 <img src="
			<?php
			if (file_exists('/var/www'.$data['avatar']))
		    print $data['avatar'];
		    ?>
				  " width="150" height="150"/><br>
		  <?php
		  print t('e-mail').' '.$data['e_mail'].'<br>';
		  print t('Name').' '.$data['name'].'<br>';
		  print t('Surname').' '.$data['surname'].'<br>';
		  print t('Date created').' '.$data['date_cr'].'<br>';
		  print t('Date last seen').' '.$_SESSION['date_log'].'<br>';
		  if ($_SESSION['status']=='admin' || $_SESSION['user_id']==$_GET['id'])
		  {
		    ?>
		    <a href="edit_user.php?id=<?php print $data['id'];?>"><?php print t('Edit');?></a>  
		    <a href="lib/del_user.php?id=<?php print $data['id'];?>"><?php print t('Delete');?> </a>
		    <?php
		  } ?>
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
		$error = t('Error');
		$start_page = t('Start Page');
    die($error.' <a href="/site/index.php">'.$start_page.'</a>');
	}
}
else {
	$nologin = t('You are not authorized to access this page');
	$start_page = t('Start Page');
    die($nologin.' <a href="/site/index.php">'.$start_page.'</a>');
}
?>