<?php
ob_start();
$root = '/var/www/site';
include_once($root.'/lib/lang.php');
include_once($root.'/lib/function_global.php');
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
								 header('Location: /site/readmore.php?id='.$data['id']);
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
else 
    print t('You are not authorized to access this page');
?>
