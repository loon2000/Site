<?php
$root = '/var/www/site';
include($root.'/lib/lang.php');
if (isset($_SESSION['user_id'])) 
{
	if(isset($_POST['update']))
	{
		if( isset($_POST['pass'], $_POST['r_pass'], $_POST['email'] ))
		{
			$pass = stripslashes(trim(mysql_real_escape_string($_POST['pass'])));
			$r_pass = stripslashes(trim(mysql_real_escape_string($_POST['r_pass'])));
			$email = stripslashes(trim(mysql_real_escape_string($_POST['email'])));
			if(empty($pass) || empty($r_pass)  || empty($email))
				print $ini['Error1'];
			else
			{
				if ($pass == $r_pass)
				{
					include($root.'/lib/bd.php');
					$result = mysql_query ("UPDATE user 
								SET pass='$pass', e_mail='$email' 
								WHERE id='$_SESSION[user_id]'") or die(mysql_error());
					if ($result) 
						echo $ini['Update'];
					else 
						print $ini['No_update'];
				}
				else 
					print $ini['Error2'];
			}	
		}
		else 
			print $ini['Error1'];
	}
}
else 
    die($ini['Nologin'].' <a href="/site/index.php?lang='.$lang.'">'.$ini['Start_page'].'</a>');
?>
