<?php
$root = '/var/www/site';
include($root.'/lib/lang.php');
if(isset($_POST['ok']))
{
    if( isset($_POST['login'], $_POST['pass'], $_POST['r_pass'], $_POST['email'] ))
    {
        $login = stripslashes(trim(mysql_real_escape_string($_POST['login'])));
        $pass = stripslashes(trim(mysql_real_escape_string($_POST['pass'])));
	$r_pass = stripslashes(trim(mysql_real_escape_string($_POST['r_pass'])));
	$email = stripslashes(trim(mysql_real_escape_string($_POST['email'])));
	preg_match( "#^[0-9a-z_\-\.]+@[0-9a-z\-\.]+\.[a-z]{2,6}$#", $email ,$matches);
        if(empty($login) || empty($pass) || empty($r_pass)  || empty($email) || $email<>$matches[0])
            print ($ini['Error1']);
        else
        {  
		   if ($pass == $r_pass)
		    {
			$bd = mysql_connect('localhost','site','site');
			mysql_select_db('sitebd',$bd);
			$result = mysql_query("SELECT id
					      FROM user
					      WHERE login='$login' or e_mail='$email'") or die (mysql_error());
			if ($result)
			    $data = mysql_fetch_array($result);
			    if(!empty($data['id']))
			        print ($ini['Error_log']);
			    else
			    {
				$result = mysql_query ("INSERT INTO user (login,pass,e_mail) VALUES('$login','$pass','$email')");
				if ($result) 
				{
				    header ('Location: /site/index.php?lang='.$lang.'&masege='.$ini[Update_new_acc]);
				    die();				    
				}
				else 
				    echo $ini['No_update'];
			    }
		    }
		    else 
			print ($ini['Error2']);
	}	
    }
    else 
       print ($ini['Error1']);
}
?>
