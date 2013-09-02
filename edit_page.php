<?php 
session_start();
$root = '/var/www/site';
include($root.'/lib/lang.php');
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
    <title><?php echo $ini['Edit_cont'];?></title>
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
	     <?php include($root.'/lib/update_page.php'); ?>
	     <form name="form1" method="post" action="">
		 <h2><?php
		     $result = mysql_query("SELECT * FROM page WHERE id='$_REQUEST[id]'") or die(mysql_error());
		     $data = mysql_fetch_array($result);
		 echo $ini['Edit_cont'];?></h2>
		 <p><?php echo $ini['Title_cont'];?><br><input value="<?php echo $data['title_page'] ?>" name="title_page" type="text" size="30"></p>
		 <p><?php echo $ini['Text_cont'];?><br><textarea name="text_page" cols="100" rows="40"><?php echo $data['text_page'] ?></textarea></p>
		 <input name="id" type="hidden" value="<?php echo $data['id'] ?>">
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
