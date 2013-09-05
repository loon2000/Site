<?php
$root = '/var/www/site';
include_once($root.'/lib/lang.php');
include_once($root.'/lib/function_global.php');
if (isset($_SESSION['user_id']))
{
	if ($_SESSION['status']=='admin' or $_SESSION['status']=='editor')
	{
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
				formCorrect($post_page,$ini['Error1']);
				$post_page = formEkran($post_page);
				include($root.'/lib/bd.php');
				$result = mysql_query ("INSERT
															 INTO page (title_ua, title_ru, title_en,
																		 text_ua, text_ru, text_en,
																		 autor)
															 VALUES('$post_page[0]','$post_page[1]','$post_page[2]',
																		 '$post_page[3]','$post_page[4]','$post_page[5]',
																		 $_SESSION[user_id])") or die(mysql_error());
				if ($result)
			 {
				 header('Location: /site/main_page.php?lang='.$lang.'&masege='.$ini['Update']);
				 die();
			 }
				else
				 print $ini['No_update'];
		}
	}
}
else 
    print $ini['Nologin'];
?>
