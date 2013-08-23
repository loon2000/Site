<?php 
session_start();
$root = '/var/www/site';
include($root.'/lib/lang.php');
if (isset($_SESSION['user_id'])) 
{ 
  include($root.'/lib/bd.php');
  $result = mysql_query("SELECT * 
			 FROM user 
			 WHERE id='$_SESSION[user_id]'") or die(mysql_error()); 
  if ($result)
  {
    $data = mysql_fetch_array($result);?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $ini['Title_acc']; ?></title>
    </head>
    
    <body>
    <table width="100%" border="0">
      <tr>
	<?php include ('bloks/header.php');?>
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
	      <?php include ($root.'/lib/update_user.php')?>
	     <form name="form1" method="post" action="">
		 <h2><?php echo $ini['Login'].' '.$data['login']; ?></h2>
		    <?php echo $ini['Pass']; ?><br><input name="pass" type="password" size="30"><br>
		    <?php echo $ini['R_pass']; ?><br><input name="r_pass" type="password" size="30"><br>
		    <?php echo $ini['E_mail']; ?><br><input value="<?php echo $data['e_mail'] ?>" name="email" type="text" size="30">
		 </p>
		 <p><input name="update" type="submit" value="<?php echo $ini['Ok_cont']; ?>"></p>
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
  else
    die($ini['Error'].' <a href="/site/index.php?lang='.$lang.'">'.$ini['Start_page'].'</a>');
}
else 
    die($ini['Nologin'].' <a href="/site/index.php?lang='.$lang.'">'.$ini['Start_page'].'</a>');
?>
