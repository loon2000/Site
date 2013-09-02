<?php 
session_start();
$root = '/var/www/site';
include($root.'/lib/lang.php');
if (isset($_SESSION['user_id']))
{
  if ($_SESSION['status']=='admin' or $_SESSION['status']=='editor')
  {
 
  ?>
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
  <html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title><?php echo $ini['Title_cr_cont'];?></title>
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
	  <?php include($root.'/lib/new_page.php') ?>
	  <form name="form2" method="post" action="">
	       <h2><?php echo $ini['Create_content'];?></h2>
			   <?php echo $ini['Language']; ?>
			   <Select name="select_lang">
			   <option></option>
			   <option VALUE="ua">ua</option>
			   <option VALUE="ru">ru</option>
			   <option VALUE="en">en</option>
			   </SELECT>
	       <p><?php echo $ini['Title_cont'];?><br><input name="title_page" type="text" size="100"></p>
	       <p><?php echo $ini['Text_cont'];?><br><textarea name="text_page" cols="100" rows="40"></textarea></p>
	       <p><input name="pub" type="submit" value="<?php echo $ini['Ok_cont'];?>"></p>
	   </form>
  
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
}
else {
    die($ini['Nologin'].' <a href="/site/index.php?lang='.$lang.'">'.$ini['Start_page'].'</a>');
}?>
