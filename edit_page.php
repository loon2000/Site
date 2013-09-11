<?php 
session_start();
$root = '/var/www/site';
include_once($root.'/lib/lang.php');
if (isset($_SESSION['user_id'])) 
{
  if ($_SESSION['status']=='admin' or $_SESSION['status']=='editor')
  {
 
    include_once($root.'/lib/bd.php');
    ?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html>
    <head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo t('Edit content');?></title>
    </head>
   
    <body>
      <table width="100%" border="0">
		<tr>
		  <?php include_once ($root.'/bloks/blok_user.php');?>
		  <?php include_once ($root.'/bloks/blok_lenguage.php');?>
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
		 <?php include_once ($root.'/bloks/left_menu.php');?>
	      </tr>
	    </table></td>
	    <td width="86%" align="left" valign="top">
				 <?php
				 include_once($root.'/lib/update_page.php'); 
	     	 $result = mysql_query("SELECT * FROM page WHERE id='$_REQUEST[id]'") or die(mysql_error());
			   $data = mysql_fetch_array($result);
			   if ($_SESSION['user_id'] == $data['autor'] or $_SESSION['status']=='admin')
			   {
					$title_page = 'title_'.$_SESSION['user_lang'];
					$text_page = 'text_'.$_SESSION['user_lang'];
					?>
		 <form name="form1" method="post" action="">
		 <h2><?php echo t('Edit content');?></h2>
		 <p><?php echo t('Title');?>:<br>
		 <input value="<?php echo $data[$title_page] ?>" name="title_page" type="text" size="74"></p>
		 <p><?php echo t('Text');?>:<br>
		 <textarea name="text_page" cols="100" rows="40"><?php echo $data[$text_page] ?></textarea></p>
		 <input name="id" type="hidden" value="<?php echo $data['id'] ?>">
		 <p><input name="pub" type="submit" value="<?php echo t('Save');?>"></p>
	     </form>
		 
		 

		 
		 
		 <?php
			   }
			   else
			   {
					print t('Error');
			   }
		  ?>
	    </td>
	  </tr>
	</table></td>
      </tr>
      <tr>
	<?php include_once ($root.'/bloks/footer.php');?>
      </tr>
    </table>
    </body>
    </html>
 <?php
  }
	else
	{
		$nologin = t('You are not authorized to access this page');
		$start_page = t('Start Page');
			die($nologin.' <a href="/site/index.php">'.$start_page.'</a>');
	}
}
?>

