<?php
function formCorrect($mass,$error){
		foreach ($mass as $value) {
				$value = trim($value);
				if (empty($value))
				{
								die($error);
				}
		}
		unset($value);
}
function formEkran($mass){
				foreach ($mass as $key => $value) {
						$mass[$key] = mysql_escape_string($value);
				}
				unset ($value);
				return $mass;
}
function selectUserId($id){
	$result = mysql_query("SELECT *  FROM user
							WHERE id='$id'") or die(mysql_error());
	if ($result)
				{
					return mysql_fetch_array($result);
				}
}
function titleTextLanguage($lang){
		return 'title_' . $lang;
}
function textLanguage($lang){ 
		return 'text_'.$lang;
	
}

function registrationCorrect(){
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
	$result = mysql_query("SELECT *
							FROM user
							WHERE login='$login' or e_mail='$email'") or die (mysql_error());
    if (mysql_num_rows($result) != 0) return false;
	
    return true;
}
function edituserCorrect($email, $pass, $r_pass, $id){
    if (!preg_match("#^[0-9a-z_\-\.]+@[0-9a-z\-\.]+\.[a-z]{2,6}$#", $email)) return false;
	if (strlen($pass) < 3) return false;
 	if ($pass != $r_pass) return false;
    
	$result = mysql_query("SELECT id
							FROM user
							WHERE id!='$id' and e_mail='$email'") or die (mysql_error());
    if (mysql_num_rows($result) != 0) return false;
	
    return true;
}
function langSelectBd($column,$text_s)
{
 $result = mysql_query("SELECT *
						 FROM lang
						 WHERE $column = '$text_s'") or die (mysql_error());
 return $result;
}

function pass_r_pass_empty($pass,$r_pass,$c,$id){
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
function pass_r_pass(){
    if (empty($_POST['r_pass']) && empty($_POST['pass'])) return true;
    if (!empty($_POST['r_pass']) && !empty($_POST['pass'])) return true;
    if (empty($_POST['r_pass']) && !empty($_POST['pass'])) return false;
    if (!empty($_POST['r_pass']) && empty($_POST['pass'])) return false;
}


function password($a){
    $a = md5(crypt($a,'sitehome'));
    return $a;
}

function Dataintroduced($b,$c,$id){
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
function Dataimg($id){
        sitebdConect();
        $result=mysql_query("SELECT * 
                            FROM user 
                            WHERE id='$id'") or die(mysql_error());
        $data = mysql_fetch_array($result);
        return $data['avatar'];
}
function back($textlink){
  if (isset($_SERVER['HTTP_REFERER']))
  {
    print '<a href="'.$_SERVER['HTTP_REFERER'].'">'.$textlink.'</a>';
  }
	else
	{
		print '<a href="">'.$textlink.'</a>';
	}
}
function updatePage($link,$ini_update){
    print '<a href="'.$link.'">'.$ini_update.'</a>';
}
function generatePassword(){
  $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
  $numChars = strlen($chars);
  $string = '';
  for ($i = 0; $i < 8; $i++) {
    $string .= substr($chars, rand(1, $numChars) - 1, 1);
  }
  return $string;
}
function updateBdpass($pass,$id){
		sitebdConect();
		$result_update = mysql_query ("UPDATE user 
									SET  pass='$pass'
									WHERE id='$id'") or die(mysql_error());
}
function updateBdLang($lang,$user_id){
		sitebdConect();
		$result_update = mysql_query ("UPDATE user 
									SET  lang='$lang'
									WHERE id='$user_id'") or die(mysql_error());
}
function t($translate){
		sitebdConect();
		if(isset($_SESSION['user_id']) and !isset($_SESSION['user_lang'])){
				
				$user_id = $_SESSION['user_id'];
				$resultuser=mysql_query("SELECT * 
																FROM user 
																WHERE id='$user_id'") or die(mysql_error());
				$datauser = mysql_fetch_array($resultuser);
				$user_lang = $datauser['lang'];
		}
		else
		{
				$user_lang = $_SESSION['user_lang'];
		}
		$resultlang=mysql_query("SELECT * 
														FROM lang 
														WHERE en='$translate'") or die(mysql_error());
		if (mysql_num_rows($resultlang) != 0)
		{
				$datalang = mysql_fetch_array($resultlang);
				return $datalang[$user_lang];
		}
		else
		{
				$resultadd = mysql_query ("INSERT INTO lang (en)
									   VALUES('$translate')");
				if($resultadd) return $translate;
		}
}
function sitebdConect(){
		$bd = mysql_connect('localhost','site','site');
		mysql_query("SET NAMES utf8");
		mysql_select_db('sitebd',$bd);
}
function sendmail($email,$pass){
	mail(
		$email,
		"Site home - password recovery",
		"You password: ".$pass,
		join("\r\n", array(
		"From:admin@sitehome",
		"Reply-To:admin@sitehome")));
}

?>