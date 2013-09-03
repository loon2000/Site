<?php
function registrationCorrect()
{
	if (empty($_POST['login'])) return false; 
	if (empty($_POST['pass'])) return false; 
	if (empty($_POST['r_pass'])) return false;
	if (empty($_POST['email'])) return false;
    if (!preg_match("#^[0-9a-z_\-\.]+@[0-9a-z\-\.]+\.[a-z]{2,6}$#", $_POST['email'])) return false;
	if (!preg_match("#^[0-9a-z]#", $_POST['login'])) return false;
	if (strlen($_POST['pass']) < 3) return false;
 	if ($_POST['pass'] != $_POST['r_pass']) return false;
    
	$login = stripslashes(trim(mysql_real_escape_string($_POST['login'])));
    $email = stripslashes(trim(mysql_real_escape_string($_POST['email'])));
	$result = mysql_query("SELECT id
							FROM user
							WHERE login='$login' or e_mail='$email'") or die (mysql_error());
    if (mysql_num_rows($result) != 0) return false;
	
    return true;
}
function edituserCorrect($email, $pass, $r_pass, $id)
{
    if (!preg_match("#^[0-9a-z_\-\.]+@[0-9a-z\-\.]+\.[a-z]{2,6}$#", $email)) return false;
	if (strlen($pass) < 3) return false;
 	if ($pass != $r_pass) return false;
    
	$result = mysql_query("SELECT id
							FROM user
							WHERE id!='$id' and e_mail='$email'") or die (mysql_error());
    if (mysql_num_rows($result) != 0) return false;
	
    return true;
}
function pass_r_pass_empty($pass,$r_pass,$c,$id)
{
    if (empty($_POST['r_pass']) && empty($_POST['pass']))
    {	
        include_once('bd.php');
        $result=mysql_query("SELECT * 
                            FROM user 
                            WHERE id='$id'") or die(mysql_error());
        $data = mysql_fetch_array($result);
        $pass = $data["$c"];
        $r_pass =$pass;
    }
    if (!empty($_POST['r_pass']) && !empty($_POST['pass']))
    {
        $pass = stripslashes(trim(mysql_real_escape_string($pass)));
        $r_pass = stripslashes(trim(mysql_real_escape_string($r_pass)));
    }
    if (empty($_POST['r_pass']) && !empty($_POST['pass'])) return false;
    if (!empty($_POST['r_pass']) && empty($_POST['pass'])) return false;
}
function pass_r_pass()
{
    if (empty($_POST['r_pass']) && empty($_POST['pass'])) return true;
    if (!empty($_POST['r_pass']) && !empty($_POST['pass'])) return true;
    if (empty($_POST['r_pass']) && !empty($_POST['pass'])) return false;
    if (!empty($_POST['r_pass']) && empty($_POST['pass'])) return false;
}


function password($a)
{
    $a = md5(crypt($a,'sitehome'));
    return $a;
}

function Dataintroduced($b,$c,$id)
{
    if (empty($b))
    {
        include_once('bd.php');
        $result=mysql_query("SELECT * 
                            FROM user 
                            WHERE id='$id'") or die(mysql_error());
        $data = mysql_fetch_array($result);
        $d = $data["$c"];
    }
    else
    {
        $d = stripslashes(trim(mysql_real_escape_string($b)));
    }

    return $d; 

}
function Dataimg($id)
{
        include_once('bd.php');
        $result=mysql_query("SELECT * 
                            FROM user 
                            WHERE id='$id'") or die(mysql_error());
        $data = mysql_fetch_array($result);
        return $data['avatar'];
}


    ?>