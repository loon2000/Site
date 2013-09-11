<?php
$root = '/var/www/site';
include_once($root.'/lib/lang.php');
include_once($root.'/lib/function_global.php');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo t('Request password')?></title>
</head>

<body>
  <table width="100%" border="0">
	<tr>
	  <?php include ($root.'/bloks/blok_lenguage.php');?>
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
		  </tr>
        </table></td>
        <td width="86%" align="left" valign="top">
			<?php include($root.'/lib/update_pass.php');
			back('<img src="/site/img/back_button.png" width="40" >');
			?>
         <form name="form1" method="post" action="">
             <h2><?php echo t('Request password');?></h2>
             <p><?php echo t('Login');?><br><input name="login" type="text" size="30"><br>
                <?php echo t('e-mail');?><br><input name="email" type="text" size="30">
             </p>
             <p><input name="ok" type="submit" value="OK"></p>
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
