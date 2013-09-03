<?php
session_start();
$root = '/var/www/site';
include($root.'/lib/lang.php');
include_once($root.'/lib/function_global.php');
if(isset($_POST['ok']))
{
	$bd = mysql_connect('localhost','site','site');
	mysql_select_db('sitebd',$bd);
	$correct = registrationCorrect();
	if ($correct)
	{
		$login = stripslashes(trim(mysql_real_escape_string($_POST['login'])));
        $pass = stripslashes(trim(mysql_real_escape_string($_POST['pass'])));
		$r_pass = stripslashes(trim(mysql_real_escape_string($_POST['r_pass'])));
		$email = stripslashes(trim(mysql_real_escape_string($_POST['email'])));
			
					$pass = password($pass);
					$result = mysql_query ("INSERT INTO user (login,pass,e_mail,date_cr,status,avatar)
									   VALUES('$login','$pass','$email',NOW(),'user','/site/img/user.jpeg')");
					if ($result) 
					{
						$result = mysql_query("SELECT *
							  FROM user
							  WHERE login='$login'") or die (mysql_error());
						$data = mysql_fetch_array($result);
						$_SESSION['user_id'] = $data['id'];
						$_SESSION['date_log'] = $data['date_log'];
						$_SESSION['status'] = $data['status'];

						header ('Location: /site/main_page.php?lang='.$lang.'&masege='.$ini[Update_new_acc]);
						die();
					}
					else 
					    echo $ini['No_update'];
	}	
    
    else 
       print ($ini['Error1']);
}
?>
