<?php
$root = '/var/www/site';
include_once($root.'/lib/lang.php');
include_once($root.'/lib/function_global.php');
if (isset($_SESSION['user_id']))
{
	//if ($_SESSION['status']=='admin' or $_SESSION['status']=='editor')
	//{
		if(isset($_POST['pub']))
		{
				$post_com = array (
					$_POST['title_com'],
					$_POST['text_com'],
					$_POST['page_id'],
				);
				$error1 = t('You did not fill the field');
				formCorrect($post_com,$error1);
				$post_com = formEkran($post_com);
				include_once($root.'/lib/bd.php');
				$result = mysql_query ("INSERT
															 INTO comment (title_com, text_com,
															 page, autor, date)
															 VALUES('$post_com[0]','$post_com[1]',
															 $data[id], $_SESSION[user_id], NOW())") or die(mysql_error());
				
				if ($result)
			 {
				 header('Location: /site/readmore.php?id='.$data['id'].'.php');
				 die();
			 }
				else
				 print t('Error, try again later');
		}
 //}
}
else 
    print t('You are not authorized to access this page');
?>
