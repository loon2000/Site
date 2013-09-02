<?php 
session_start();
$root = '/var/www/site';
include($root.'/lib/lang.php');
if (isset($_SESSION['user_id'])) 
{ 
  include($root.'/lib/bd.php');
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
    <title><?php echo $ini['Title_acc']; ?></title>
    </head>
    
    <body>
    <table width="100%" border="0">
      <tr>
	    <?php include ($root.'/bloks/left_user.php');?>
      </tr>
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
		 <h2><?php echo $ini['Login'].' '.$data['login']; ?></h2>
		 <img src="
			<?php
			if (file_exists('/var/www'.$data['avatar']))
		    print $data['avatar'];
		    ?>
				  " width="150" height="150"/><br>
		  <?php
		  print $ini['E_mail'].' '.$data['e_mail'].'<br>';
		  print $ini['Name'].' '.$data['name'].'<br>';
		  print $ini['Surname'].' '.$data['surname'].'<br>';
		  print $ini['Date_created'].' '.$data['date_cr'].'<br>';
		  print $ini['Date_last_seen'].' '.$_SESSION['date_log'].'<br>';
		  if ($_SESSION['status']=='admin' || $_SESSION['user_id']==$_GET['id'])
		  {
		    ?>
		    <a href="edit_user.php?id=<?php print $data['id'];?>&lang=<?php print $lang;?>"><?php print $ini['Edit'];?></a>  
		    <a href="lib/del_user.php?id=<?php print $data['id'];?>&lang=<?php print $lang;?>"><?php print $ini['Del'];?> </a>
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
  else
    die($ini['Error'].' <a href="/site/index.php?lang='.$lang.'">'.$ini['Start_page'].'</a>');
}
else 
    die($ini['Nologin'].' <a href="/site/index.php?lang='.$lang.'">'.$ini['Start_page'].'</a>');
?>
