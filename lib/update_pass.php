<?php
$root = '/var/www/site';
include($root.'/lib/lang.php');
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
            $bd = mysql_connect('localhost','site','site');
	    mysql_select_db('sitebd',$bd);
	    $result = mysql_query("SELECT pass 
				    FROM user 
				    WHERE login='$login' 
				    AND e_mail = '$email'") or die(mysql_error()); 
            if ($result)
	    {
		$data = mysql_fetch_array($result);
		if (!empty($data['pass']))
		{
		    mail(
		    $email,
		    "Site home - password recovery",
		    "You password: ".$data['pass'],
		    join("\r\n", array(
		    "From:admin@sitehome",
		    "Reply-To:admin@sitehome")));
		    header ('Location: /site/index.php?lang='.$lang.'&masege='.$ini['Pass_email'].' '.$email);
		    die();		    
		}
		else 
		    print $ini['Error_pass'];
	    }
	    else 
		print $ini['Error_acc'];
	}	
    }
else      
    die ($ini['Error1'].' <a href="/site/new_pass.php?lang='.$lang.'">'.$ini['New_pass'].'</a>');
}
?>
