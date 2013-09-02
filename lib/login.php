<?php
$root = '/var/www/site';
if(isset($_POST['Enter']))
{
	if (isset($_POST['login'],$_POST['pass']))
	{
		$login = stripslashes(trim(mysql_real_escape_string($_POST['login'])));
		$pass = stripslashes(trim(mysql_real_escape_string($_POST['pass'])));
		if( empty($login) || empty($pass) )
			die ($ini['Error1'].' <a href="/site/index.php?lang='.$lang.'">'.$ini['Start_page'].'</a>');
		else
		{  
			$bd = mysql_connect('localhost','site','site');
			mysql_select_db('sitebd',$bd);
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
				$result = mysql_query ("UPDATE user 
							SET date_log = NOW()  
							WHERE id='$_SESSION[user_id]'") or die(mysql_error());
			}
			else
			{
				die($ini['Block']);
			}
		}
		else 
			die($ini['Error_pass'].' <a href="/site/index.php?lang='.$lang.'">'.$ini['Start_page'].'</a>');
		}	
	}
}
?>
