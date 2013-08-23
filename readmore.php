<?php 
session_start();
$root = '/var/www/site';
include($root.'/lib/lang.php');
if (isset($_SESSION['user_id'])) 
{ 
 include($root.'/lib/bd.php');
 $result = mysql_query("SELECT * FROM page WHERE id='$_REQUEST[id]'") or die(mysql_error());
 $data = mysql_fetch_array($result);
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
              <h2><?php echo $data['title_page'];?></h2>
              <?php echo $data['text_page'];?>
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
 <?php }
else {
    die($ini['Nologin'].' <a href="/site/index.php?lang='.$lang.'">'.$ini['Start_page'].'</a>');
}?>
