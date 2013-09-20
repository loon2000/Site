<?php
function root(){
    return $root = '/var/www/site';
}
function sitebdConect(){
    $bd = mysql_connect('localhost','site','site');
    mysql_query("SET NAMES utf8");
    mysql_select_db('sitebd',$bd);
}
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
function formpassekran($mass){
    foreach ($mass as $key => $value) {
        $mass[$key] = stripslashes(trim(mysql_real_escape_string($value)));
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
function langSelectBd($column,$text_s){
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
function sendmail($email,$pass){
	mail(
		$email,
		"Site home - password recovery",
		"You password: ".$pass,
		join("\r\n", array(
		"From:admin@sitehome",
		"Reply-To:admin@sitehome")));
}
function pagelist($page,$total){
    $npage = array(
                'perv' => '',
                'next' => '',
                'left1' => '',
                'left2' => '',
                'right1' => '',
                'right2' => ''
    );
    if (isset($_SERVER['QUERY_STRING']))
    {
        $pos = strpos($_SERVER['QUERY_STRING'],'page');
        if ($pos)
        {
            $pos--;
            $s = '?'.substr($_SERVER['QUERY_STRING'],0,$pos).'&';
        }
        else
        {
            $s = '?'.$_SERVER['QUERY_STRING'].'&';
        }
    }
    else
    {
        $s = '?';
    }
    if ($page != 1) $npage['perv'] = '<a href= '.$_SERVER['SCRIPT_NAME'].$s.'page=1>« '.t('first').'</a>
                                      <a href= '.$_SERVER['SCRIPT_NAME'].$s.'page='. ($page - 1) .'>‹ '.t('previous').'</a> ';
    if ($page != $total) $npage['next'] = ' <a href= '.$_SERVER['SCRIPT_NAME'].$s.'page='. ($page + 1) .'>'.t('next').' ›</a>
                                            <a href= '.$_SERVER['SCRIPT_NAME'].$s.'page=' .$total. '>'.t('last').' »</a>';

    if($page - 2 > 0) $npage['left2'] = ' <a href= '.$_SERVER['SCRIPT_NAME'].$s.'page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
    if($page - 1 > 0) $npage['left1'] = '<a href= '.$_SERVER['SCRIPT_NAME'].$s.'page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';
    if($page + 2 <= $total) $npage['right2'] = ' | <a href= '.$_SERVER['SCRIPT_NAME'].$s.'page='. ($page + 2) .'>'. ($page + 2) .'</a>';
    if($page + 1 <= $total) $npage['right1'] = ' | <a href= '.$_SERVER['SCRIPT_NAME'].$s.'page='. ($page + 1) .'>'. ($page + 1) .'</a>';

    print '<center><small>'.$npage['perv'].$npage['left2'].$npage['left1'].'<b>'.$page.'</b>'.$npage['right1'].$npage['right2'].$npage['next'].'</small></center>';
}
function rating($page){
    sitebdConect();
    $result_rating = mysql_query("SELECT *
                                 FROM rating
                                 WHERE (page = '$page')
                                 AND (lang = '$_SESSION[user_lang]')") or die(mysql_error());
    if ($result_rating)
    {
        $sum = 0;
        $k = 0;
        $max = 0;
        $min = 5;
        while ($data_rating = mysql_fetch_array($result_rating))
        {
            $sum = $sum+$data_rating['last'];
            $k++;
            if ($max <  $data_rating['last']) $max = $data_rating['last'];
            if ($min >  $data_rating['last']) $min = $data_rating['last'];
        }
        print '<p><font color="gray"><small>';
        if ($k != 0)
        {
            print t('Average Rating').': '.($sum)/($k).
            ' ('.$k.' '.t('votes').', '.t('Max. rating').' '.$max.', '.t('Min. rating').' '.$min.')';
            if (isset($_SESSION['status']))
            {
                    if ($_SESSION['status']=='admin') delrating($page);
            }

        }
        else
        {
            print t('Nobody has voted');
        }
        print '</small></font></p>';
    }
}
function userrating($page){
		
    $root = root();
    sitebdConect();
    $result_rating = mysql_query("SELECT *
                                FROM rating
                                WHERE (page = '$page')
                                AND (lang = '$_SESSION[user_lang]')
                                AND (user = '$_SESSION[user_id]')") or die(mysql_error());
    print '<p><font color="gray"><small>';
    if (mysql_num_rows($result_rating) == 0)
    {
        print t('You may not vote for this publication');
        include_once($root.'/bloks/form_rating.php');
        addvote($page);
    }
    else
    {
        $data_rating = mysql_fetch_array($result_rating);
        print t('Your rating').': '.$data_rating['last'];
        include_once($root.'/bloks/form_del_vote.php');
        delvote($data_rating['id']);
    }
    print '</small></font></p>';
}
function delvote($rating_id){
    if(isset($_POST['del']))
    {
        sitebdConect();
        $result_rating = mysql_query("DELETE
                                     FROM rating
                                     WHERE id='$rating_id'")or die(mysql_error());
        if ($result_rating)
        {
            return header('Location:'.$_SERVER['HTTP_REFERER']);
        }
        else
        {
            print '<p><font><small>';
            print t('Error, try again later');
            print '</small></font></p>';
            return;
        }
    }
}
function addvote($page){
    if(isset($_POST['add']))
    {
        sitebdConect();
        if (isset($_POST['rang']))
        {
            $new_rating = $_POST['rang'];
            $result_rating = mysql_query("INSERT
                                         INTO rating (page, lang,
                                         last, user)
                                         VALUES ('$page', '$_SESSION[user_lang]',
                                         '$new_rating', $_SESSION[user_id])")or die(mysql_error());
            if ($result_rating)
            {
                return header('Location:'.$_SERVER['HTTP_REFERER']);
            }
            else
            {
                print '<p><font><small>';
                print t('Error, try again later');
                print '</small></font></p>';
                return ;
            }
        }
    }
}
function delrating($page){
    $root = root();
    include_once($root.'/bloks/form_del_rating.php');
    if(isset($_POST['delr']))
    {
        sitebdConect();
        $result_rating = mysql_query("DELETE
                                     FROM rating
                                     WHERE page='$page'")or die(mysql_error());
        if ($result_rating)
        {
            return header('Location:'.$_SERVER['HTTP_REFERER']);
        }
        else
        {
            print '<p><font><small>';
            print t('Error, try again later');
            print '</small></font></p>';
            return;
        }
    }
}
function listuser(){
    sitebdConect();
    $result = mysql_query("SELECT *  FROM user
				ORDER BY login") or die(mysql_error());
    if ($result)
    {
        while ($data = mysql_fetch_array($result))
        {
            if (file_exists('/var/www'.$data['avatar']))
            {
                print '<img src="'.$data['avatar'].'" width="50" height="50" align="left">';
            }
            print t('Login').' '.$data['login'];
            print '<br>'.t('Name').' '.$data['name'];
            print '<br>'.t('Surname').' '.$data['surname'];

            if (isset($_SESSION['user_id']))
            {
                print '<br>'.t('e-mail').' '.$data['e_mail'];
                if (isset($_SESSION['status']))
                {
                    if ($_SESSION['status']=='admin')
                    {
                        print '<p><a href="edit_user.php?id='.$data['id'].'">'.t('Edit').'</a>&nbsp;';
                        print '<a href="lib/del_user.php?id='.$data['id'].'">'.t('Delete').'</a>';
                        print '</p>';
                    }
                }

            }
            print '<hr>';

        }
    }
}
function addcom(){
    $root = root();
    include_once ($root.'/bloks/add_com.php');
    if (isset($_SESSION['user_id']))
    {
        if(isset($_POST['pub']))
        {
            $post_com = array (
                $_POST['title_com'],
                $_POST['text_com'],
                $_POST['page_id'],
            );
            if (!empty($_POST['text_com']))
            {
                $post_com = formEkran($post_com);
                $result2 = mysql_query ("INSERT
                                          INTO comment (title_com, text_com,
                                         page, autor, lang, date)
                                         VALUES('$post_com[0]','$post_com[1]',
                                         '$post_com[2]', '$_SESSION[user_id]', '$_SESSION[user_lang]', NOW())") or die(mysql_error());
                if ($result2)
                {
                    header('Location: '.$_SERVER['HTTP_REFERER'].'?id='.$post_com['2']);
                    die();
                }
                else
                    print t('Error, try again later');
            }
            else
            {
                print t('Write Your comment');
            }


        }
    }
}
function userprofile(){
    $root = root();
    sitebdConect();
    $result = mysql_query("SELECT *
                             FROM user
                             WHERE id='$_GET[id]'") or die(mysql_error());
    if ($result)
    {
        $data = mysql_fetch_array($result);
        include_once($root.'/bloks/userprofile.php');
    }
    else
    {
        print (t('Error').' <a href="/site/index.php">'.t('Start Page').'</a>');
    }
}
function adduser(){
    $root = root();
    include_once($root.'/bloks/blok_add_user.php');
    if(isset($_POST['ok']))
    {
        sitebdConect();
        $correct = registrationCorrect();
        if ($correct)
        {
            $post_log = array (
                $_POST['login'],
                $_POST['pass'],
                $_POST['r_pass'],
                $_POST['email']
            );
            formpassekran($post_log);
            $post_log[1]= password($post_log[1]);
            $result = mysql_query ("INSERT INTO user (login,pass,e_mail,date_cr,status,lang,avatar)
                                    VALUES('$post_log[0]','$post_log[1]','$post_log[3]',NOW(),'user','en','/site/img/user.jpeg')");
            if ($result)
            {
                $result = mysql_query("SELECT *
                                      FROM user
                                      WHERE login='$post_log[0]'") or die (mysql_error());
                $data = mysql_fetch_array($result);
                $_SESSION['user_id'] = $data['id'];
                $_SESSION['date_log'] = $data['date_log'];
                $_SESSION['status'] = $data['status'];
                header ('Location: /site/index.php?masege='.t('Registration complete'));
                die();
            }
            else
                echo t('Error, try again later');
        }

        else
            print t('You did not fill the field');
    }
}
function newpass(){
    $root = root();
    include_once($root.'/bloks/form_new_pass.php');
    if(isset($_POST['ok']))
    {
        if( isset($_POST['login'], $_POST['email'] ))
        {
            $post_pass = array (
                $_POST['login'],
                $_POST['email']
            );
            formpassekran($post_pass);
            if(empty($post_pass[0]) || empty($post_pass[1]))
                print t('You did not fill the field');
            else
            {
                sitebdConect();
                $result = mysql_query("SELECT *
				    FROM user
				    WHERE login='$post_pass[0]'
				    AND e_mail = '$post_pass[1]'") or die(mysql_error());
                if ($result)
                {
                    $data = mysql_fetch_array($result);
                    $id = $data['id'];
                    $pass = generatePassword();
                    sendmail($post_pass[1],$pass);
                    $pass1 = password($pass);
                    updateBdpass($pass1,$id);
                    header ('Location: /site/index.php?masege='.t('Your new password has been sent to the').' '.$post_pass[1]);
                    die();
                }
                else
                    print t('Error. Maybe you are not registered with us?');
            }
        }
        else
        {
            die (t('You did not fill the field').' <a href="/site/new_pass.php">'.t('Request password').'</a>');
        }
    }
}
function logout(){
    $root = root();
    include_once($root.'/bloks/form_logout.php');
    if(isset($_POST['logout']))
    {
        unset($_SESSION['user_id'],$_SESSION['status']);
        header ('Location: /site/index.php');
    }
}
function addpage(){
    $root = root();
    if (isset($_SESSION['user_id']))
    {
        if ($_SESSION['status']=='admin' or $_SESSION['status']=='editor')
        {
            include($root.'/bloks/form_add_page.php');
            if(isset($_POST['pub']))
            {
                $post_page = array (
                    $_POST['title_ua'],
                    $_POST['title_ru'],
                    $_POST['title_en'],
                    $_POST['text_ua'],
                    $_POST['text_ru'],
                    $_POST['text_en']
                );
                $error1 = t('You did not fill the field');
                formCorrect($post_page,$error1);
                $post_page = formEkran($post_page);
                sitebdConect();
                $result = mysql_query ("INSERT
                                        INTO page (title_ua, title_ru, title_en,
                                                 text_ua, text_ru, text_en,
                                                 autor)
                                        VALUES('$post_page[0]','$post_page[1]','$post_page[2]',
                                                 '$post_page[3]','$post_page[4]','$post_page[5]',
                                                      $_SESSION[user_id])") or die(mysql_error());
                if ($result)
                {
                    header('Location: /site/index.php?masege='.t('Update'));
                    die();
                }
                else
                    print t('Error, try again later');
            }
        }
    }
    else
        print t('You are not authorized to access this page');
}
function webtransl(){
    if (isset($_SESSION['user_id']))
    {
        if ($_SESSION['status']=='admin')
        {

            $root = root();
            include_once($root.'/bloks/form_webtransl.php');
            if (isset($_POST['ok']))
            {
                sitebdConect();
                $trans = array(
                    $_POST['search'],
                    $_POST['traslate_ua'],
                    $_POST['traslate_ru']
                );
                $error1 = t('You did not fill the field');
                formCorrect($trans,$error1);
                $trans = formEkran($trans);
                $result = langSelectBd('en',$trans[0]);
                if (mysql_num_rows($result) != 0)
                {
                    $data = mysql_fetch_array($result);
                    $id = $data['id'];
                    $result = mysql_query ("UPDATE lang
                                           SET  ua = '$trans[1]', ru = '$trans[2]'
                                           WHERE id = '$id'") or die(mysql_error());
                    if ($result)
                    {
                        header ('Location: /site/websitetranslation.php?m=1');
                    }
                    else
                    {
                        print t('Error, try again later');
                    }
                }
                else
                {
                    print t('Text not found').'<br>';
                }
            }
        }
    }
    else
    {
        print t('You are not authorized to access this page.');
    }
}
function loginuser(){
    $root = root();
    include_once($root.'/bloks/left_login.php');
    if(isset($_POST['Enter']))
    {
        if (isset($_POST['login'],$_POST['pass']))
        {
            $post_log = array (
                $_POST['login'],
                $_POST['pass']
            );
            formpassekran($post_log);
            if( empty($post_log[0]) || empty($post_log[1]) )
            {
                print t('You did not fill the field');
            }
            else
            {
                sitebdConect();
                $post_log[1] = password($post_log[1]);
                $result=mysql_query("SELECT *
                                    FROM user
                                    WHERE login = '$post_log[0]'
                                    AND pass = '$post_log[1]'") or die(mysql_error());
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
                        header ('Location: /site/index.php');
                    }
                    else
                    {
                        print  t('Your login is blocked');
                    }
                }
                else
                {
                    print t('Check your spelling login and password');
                }
            }
        }
    }
}
function readmore(){
    $root = root();
    sitebdConect();
    $result = mysql_query("SELECT * FROM page WHERE id='$_REQUEST[id]'") or die(mysql_error());
    if ($result)
    {
        $data = mysql_fetch_array($result);
        $title_page = 'title_'.$_SESSION['user_lang'];
        $text_page = 'text_'.$_SESSION['user_lang'];
        print '<hr>';
        print '<h2>';
        print $data[$title_page].'</h2>';
        rating ($data['id']);
        if (isset($_SESSION['user_id'])) userrating($data['id']);
        print '<br>';
        print '<p>'.$data[$text_page].'</p>';
        print '<hr>';
        addcom();
        print '<h2>'.t('Comments').'</h2>';
        comments();
        print '<hr>';

    }
}
function comments(){
    sitebdConect();
    $num = 10;
    if (isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }
    $com_page = $_GET['id'];
    $com_lang = $_SESSION['user_lang'];
    $result_com = mysql_query("SELECT COUNT(*)
                            FROM comment
                            WHERE (page = '$com_page')
                            AND (lang = '$com_lang')");
    $posts = mysql_result($result_com, 0);
    if ($posts != 0)
    {
        $posts = mysql_result($result_com, 0);
        $total = intval(($posts - 1) / $num) + 1;
        $page = intval($page);
        if(empty($page) or $page < 0) $page = 1;
        if($page > $total) $page = $total;
        $start = $page * $num - $num;
        $result_com = mysql_query("SELECT * FROM comment ORDER BY date DESC
                                LIMIT $start, $num") or die(mysql_error());
        if ($result_com)
        {
            if ($total > 1)
            {
                pagelist($page,$total);
                print '<hr>';
            }
            while ($data = mysql_fetch_array($result_com))
            {
                if ($data['lang'] == $_SESSION['user_lang'] )
                {
                    $data2 = selectUserId($data['autor']);
                    if ($data2)
                    {
                        print '<img src="'.$data2['avatar'].'" width="70" align="left">';
                        print '<br><small><strong> <a href="/site/profile.php?id='.$data2['id'].'">'.$data2['login'].'</a></strong></small><br>';
                        print '<font color="gray"><small>'.$data['date'].'</small></font><br><br>';
                        if (empty($data['title_com']))
                        {
                            print '<font color="#282828"><h3>'.substr($data['text_com'],0,15).'</h3></font>';
                        }
                        else
                        {
                            print '<font color="#282828"><h3>'.$data['title_com'].'</h3></font>';
                        }
                        print '<p><font color="#383838">'.$data['text_com'].'</font></p>';
                        if (isset($_SESSION['status'],$_SESSION['user_id']))
                        {
                            if ($_SESSION['status'] == 'admin')
                            {
                                print '<p>[<a href="/site/lib/del_com.php?id='.$data['id'].'">'.t('Delete').'</a>]</p>';
                            }
                        }
                        print '<hr>';
                    }
                }

            }
        }
        if ($total > 1)
        {
            pagelist($page,$total);
        }
    }
    else
    {
        print t('Nobody has commented on this post');
    }
}
function editpage(){
    if (isset($_SESSION['user_id']))
    {
        if ($_SESSION['status']=='admin' or $_SESSION['status']=='editor')
        {
            sitebdConect();
            updatepage();
            $result = mysql_query("SELECT * FROM page WHERE id='$_REQUEST[id]'") or die(mysql_error());
            $data = mysql_fetch_array($result);
            if ($_SESSION['user_id'] == $data['autor'] or $_SESSION['status']=='admin')
            {
                $title_page = 'title_'.$_SESSION['user_lang'];
                $text_page = 'text_'.$_SESSION['user_lang'];
            }
            else
            {
                print t('Error');
            }
        }
        else
        {
            $nologin = t('You are not authorized to access this page');
            $start_page = t('Start Page');
            die($nologin.' <a href="/site/index.php">'.$start_page.'</a>');
        }
    }

}
function updatepage(){
    $root = root();
    include_once($root.'/bloks/form_edit_page.php');
    if(isset($_POST['pub']))
    {
        if( isset($_POST['title_page'], $_POST['text_page'], $_POST['id'] ))
        {
            $title_page = $_POST['title_page'];
            $text_page = $_POST['text_page'];
            $id = $_POST['id'];
            if( empty($title_page) || empty($text_page) )
                print t('You did not fill the field');
            else
            {
                sitebdConect();
                $title = 'title_'.$_SESSION['user_lang'];
                $text = 'text_'.$_SESSION['user_lang'];
                $result = mysql_query ("UPDATE page
                                        SET  $title = '".mysql_escape_string($title_page)."',
                                             $text = '".mysql_escape_string($text_page)."'
                                        WHERE id='$id'") or die(mysql_error());
                if ($result)
                {
                    $update = t('Update');
                    header ('Location: /site/index.php?masege='.$update);
                    die();
                }
                else
                {
                    print t('Error, try again later');
                }
            }
        }
        else
        {
            print t('You did not fill the field');
        }
    }
}
?>