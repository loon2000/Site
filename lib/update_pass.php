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
            print $ini['Error1'];
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
				header ('Location: /site/index.php?lang='.$lang.'&masege='.$ini['Pass_email'].' '.$email);
				die();		    
			}
	    else 
		print $ini['Error_acc'];
	}	
    }
else      
    die ($ini['Error1'].' <a href="/site/new_pass.php?lang='.$lang.'">'.$ini['New_pass'].'</a>');
}
?>
