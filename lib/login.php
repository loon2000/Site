<?php
$root = '/var/www/site';
include_once($root.'/lib/function_global.php');
if(isset($_POST['Enter']))
{
	  if (isset($_POST['login'],$_POST['pass']))
	  {
				$login = stripslashes(trim(mysql_real_escape_string($_POST['login'])));
				$pass = stripslashes(trim(mysql_real_escape_string($_POST['pass'])));
				if( empty($login) || empty($pass) )
				{
					$error1 = t('You did not fill the field');
					$start_page = t('Start Page');
					die ($error1.' <a href="/site/index.php">'.$start_page.'</a>');
				}
				else
				{  
					$bd = mysql_connect('localhost','site','site');
					mysql_select_db('sitebd',$bd);
					$pass = password($pass);
					$result=mysql_query("SELECT * 
								FROM user 
								WHERE login = '$login' 
								AND pass = '$pass'") or die(mysql_error()); 
				  if (mysql_num_rows($result) == 1) 
				  {
					  $myrow = mysql_fetch_array($result); 
					  if ($myrow['status'] !== 'block')
					  {
						  $_SESSION['user_id'] = $myrow['id'];
						  $_SESSION['date_log'] = $myrow['date_log'];
						  $_SESSION['status'] = $myrow['status'];
							$_SESSION['user_lang'] = $myrow['lang'];
						  $result = mysql_query ("UPDATE user
																		 SET date_log = NOW()
																		 WHERE id='$_SESSION[user_id]'") or die(mysql_error());
					  }
					  else
					  {
						  $block = t('Your login is blocked');
						  die($block);
					  }
				  }
				  else
				  {
					  $error_pass = t('Check your spelling login and password');
					  $start_page = t('Start Page');
					  die($error_pass.' <a href="/site/index.php">'.$start_page.'</a>');
				  }
				}	
		}
}
?>
