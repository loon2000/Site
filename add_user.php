<?php
error_reporting(0);
$root = '/var/www/site';
include($root.'/lib/lang.php');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $ini[Title_new_acc];?></title>
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
          </tr>
        </table></td>
        <td width="86%" align="left" valign="top">
          <?php include($root.'/lib/new_login.php');?>
              <form name="form1" method="post" action="">
                  <h2><?php echo $ini[New_account];?></h2>
                  <p><?php echo $ini[Login];?><br><input name="login" type="text" size="30"><br>
                     <?php echo $ini[Pass];?><br><input name="pass" type="password" size="30"><br>
                     <?php echo $ini[R_pass];?><br><input name="r_pass" type="password" size="30"><br>
                     <?php echo $ini[E_mail];?><br><input name="email" type="text" size="30">
             </p>
             <p><input name="ok" type="submit" value="<?php echo $ini[Ok_cont]?>"></p>
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