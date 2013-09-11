<?php
$root = '/var/www/site';
include_once($root.'/lib/lang.php');
include_once($root.'/lib/function_global.php');
if(isset($_POST['ok']))
{
    if( isset($_POST['login'], $_POST['email'] ))
    {
        $login = stripslashes(trim(mysql_real_escape_string($_POST['login'])));
		$email = stripslashes(trim(mysql_real_escape_string($_POST['email'])));
        if(empty($login) || empty($email))
            print t('You did not fill the field');
        else
        {  
        include_once($root.'/lib/bd.php');
	    $result = mysql_query("SELECT * 
				    FROM user 
				    WHERE login='$login' 
				    AND e_mail = '$email'") or die(mysql_error()); 
            if ($result)
			{
				$data = mysql_fetch_array($result);
				$id = $data['id'];
				$pass = generatePassword();
				sendmail($email,$pass);
				$pass1 = password($pass);
				updateBdpass($pass1,$id);
				$pass_email = t('Your new password has been sent to the');
				header ('Location: /site/index.php?masege='.$pass_email.' '.$email);
				die();		    
			}
	    else 
		print t('Error. Maybe you are not registered with us?');
	}	
    }
else      
    {
				$error1 = t('You did not fill the field');
				$new_pass = t('Request password');
				die ($error1.' <a href="/site/new_pass.php">'.$new_pass.'</a>');
		}
}
?>
