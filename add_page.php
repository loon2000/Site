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
			  <?php include($root.'/lib/new_page.php') ?>
			  <form name="form2" method="post" action="">
				<h2><img src="/site/img/en.png" width="20"> Create content</h2>
				<h2><img src="/site/img/ua.png" width="20"> Створити запис</h2>
				<h2><img src="/site/img/ru.png" width="20"> Создать публикацию</h2>
				<p>Title in English<br><input name="title_en" type="text" size="74"></p>
				<p>Тема українською<br><input name="title_ua" type="text" size="74"></p>
				<p>Тема на русском<br><input name="title_ru" type="text" size="74"></p>
				<p>Text in English<br><textarea name="text_en" cols="100" rows="40"></textarea></p>
				<p>Текст українською<br><textarea name="text_ua" cols="100" rows="40"></textarea></p>
				<p>Текст на русском<br><textarea name="text_ru" cols="100" rows="40"></textarea></p>
				<p><input name="pub" type="submit" value="<?php echo $ini['Ok_cont'];?>"></p>
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
