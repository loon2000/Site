<?php 
session_start();
$root = '/var/www/site';
include_once($root.'/lib/lang.php');
include_once($root.'/lib/function_global.php');
if (isset($_SESSION['user_id'])) 
{
  include_once($root.'/lib/bd.php');
  $id = $_REQUEST['id'];
  if ($_SESSION['status']=='admin')
    {
	  $result=mysql_query("SELECT * 
					    FROM user 
					    WHERE id='$id'") or die(mysql_error());
    }
  if ($_SESSION['user_id'] == $id)
	{	  
	  $result=mysql_query("SELECT * 
					    FROM user 
					    WHERE id='$id'") or die(mysql_error());
	}
  if ($result)
  {
    $data = mysql_fetch_array($result);
?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo t('Edit account - SH'); ?></title>
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
	<?php include_once ('bloks/header.php');?>
      </tr>
      <tr>
	<td><table width="100%" border="0">
	  <tr>
	    <td width="14%" align="left" valign="top" bgcolor="#2B98FF"><table width="100%" border="0">
	      <tr>
		  &nbsp;
	      </tr>
	      <tr>
		 <?php include_once ($root.'/bloks/left_menu.php');?>
	      </tr>
	    </table></td>
	    <td width="86%" align="left" valign="top">
	      <?php include_once ($root.'/lib/update_user.php')?>
	     <form name="form1" method="post" enctype="multipart/form-data" action="">
		 <h2><?php echo t('Login').' '.$data['login']; ?></h2>
		 <?php
		      if ($_SESSION['status']=='admin')
		      { ?>
		    Status<br>
		    <Select name="status">
			   <option VALUE="<?php print $data['status'];?>"><?php print $data['status'];?></option>
			   <option VALUE="user">user</option>
			   <option VALUE="editor">editor</option>
			   <option VALUE="block">block</option>
			   <option VALUE="admin">admin</option>
			   </SELECT>
		    <br>
		      <?php
		      } ?>
		      
		    <label for="file">avatar</label><br><input name="file" type="file"><br>
		    <input type="hidden" name="MAX_FILE_SIZE" value="3000">
		      
		    <?php print t('Name'); ?>   <br><input name="name" type="text" value="<?php echo $data['name'] ?>"  size="30"><br>
		    <?php print t('Surname'); ?><br><input name="surname" type="text" value="<?php echo $data['surname'] ?>"  size="30"><br>
		    <?php echo t('Password'); ?>    <br><input name="pass" type="password" size="30"><br>
		    <?php echo t('Re-enter password'); ?>  <br><input name="r_pass" type="password" size="30"><br>
		    <?php echo t('e-mail'); ?>  <br><input name="email" type="text" value="<?php echo $data['e_mail'] ?>" size="30"><br>
											   <input name="id" type="hidden" value="<?php print $id;?>">
											   <input name="update" type="submit" value="<?php echo t('Save'); ?>">
	     </form>
	     
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