<?php
include_once($root.'/lib/function_global.php');
if (!isset($_SESSION['user_lang']))
{
    $_SESSION['user_lang'] = 'en';
}
function lt($send,$l){
    if (isset($_POST[$send]))
    {
        if (isset($_SESSION['user_id']))
            //|| ($_SESSION['user_id']!==''))
        {
            updateBdLang($l,$_SESSION['user_id']);
        }
        $_SESSION['user_lang'] = $l;
    }
}
lt('sendua','ua');
lt('sendru','ru');
lt('senden','en');
// потім викинути
//if (!isset($_REQUEST['lang']) and empty($_REQUEST['lang'])) 
//	$_REQUEST['lang'] = "en";
//$lang =$_REQUEST['lang'];
//$ini = parse_ini_file($root.'/'.$lang.'.ini');
// до сюда

?>
