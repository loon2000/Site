<?php 
session_start();
$root = '/var/www/site';
include_once($root.'/lib/lang.php');
include_once($root.'/lib/bd.php');
include_once($root.'/lib/function_global.php');
$result = mysql_query("SELECT * FROM page WHERE id='$_REQUEST[id]'") or die(mysql_error());
$data = mysql_fetch_array($result);
$title_page = 'title_'.$_SESSION['user_lang'];
$text_page = 'text_'.$_SESSION['user_lang'];
?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
 <html>
 <head>  
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <title><?php echo $data[$title_page];?></title>
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
     <?php include ($root.'/bloks/header_i.php');?>
   </tr>
   <tr>
     <td><table width="100%" border="0">
       <tr>
         <td width="14%" align="left" valign="top" bgcolor="#2B98FF"><table width="100%" border="0">
           <tr>
            
           </tr>
           <tr>
              <?php include ($root.'/bloks/left_menu.php');?>
           </tr>
         </table></td>
         <td width="86%" align="left" valign="top">
              <?php
              back('<img src="/site/img/back_button.png" width="40" >');
              print '<hr>';
              print '<h2>';
              print $data[$title_page].'</h2>';
              print '<p>'.$data[$text_page].'</p>';
              print '<hr>';
              print '<h2>'.t('Comments').'</h2>';
              include_once ($root.'/lib/comments.php');
              print '<hr>';
              include_once ($root.'/lib/add_com.php');
              ?>
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