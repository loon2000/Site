<?php 
session_start();
$root = '/var/www/site';
include_once($root.'/lib/lang.php');
include_once($root.'/lib/function_global.php');
if (isset($_SESSION['user_id']))
{
  if ($_SESSION['status']=='admin')
  {
 
  ?>
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
  <html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title><?php echo $ini['Title_translate'];?></title>
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
    </tr>
    <tr>
      <?php include ($root.'/bloks/header.php');?>
    </tr>
    <tr>
      <td>
		<table width="100%" border="0">
		  <tr>
		    <td width="14%" align="left" valign="top" bgcolor="#2B98FF">
			  <table width="100%" border="0">
			    <tr>
			    </tr>
				<tr>
				  <?php include ($root.'/bloks/left_menu.php');?>
				</tr>
			  </table>
			</td>
			<td width="86%" align="left" valign="top">
			  <?php include($root.'/lib/update_lang.php'); 
              print '<h2>'.$ini['Translate'].'</h2>';?>
        <form name="form" method="post" action="">
         <p>Введіть рядок тексту для пошуку<br>
         <input name="search" type="text" size="50"><br>
         Переклад<br>
         <input name="traslate" type="text" size="50"</p>
         <p><input name="ok" type="submit" value="OK"></p>
        </form>

			</td>
		  </tr>
		</table>
	  </td>
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



