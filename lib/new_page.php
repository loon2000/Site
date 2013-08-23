<?php
$root = '/var/www/site';
include($root.'/lib/lang.php');
if (isset($_SESSION['user_id']))
{ 
	if(isset($_POST['pub']))
	{
		if( isset($_POST['title_page'], $_POST['text_page']))
		{
			$title_page = $_POST['title_page'];
			$text_page = $_POST['text_page'];
			$select_lang = $_POST['select_lang'];
			if(empty($title_page) || empty($text_page) || empty($select_lang))
				print $ini['Error1'];
			else
			{  
				 include($root.'/lib/bd.php');
				 $result = mysql_query ("INSERT 
							INTO page (lang, title_page, text_page) 
							VALUES('$select_lang','".mysql_escape_string($title_page)."','".mysql_escape_string($text_page)."')") or die(mysql_error());
				 if ($result)
				{
					header('Location: /site/main_page.php?lang='.$lang.'&masege='.$ini['Update']);
					die();
				}
				 else
					print $ini['No_update'];
			}	
		}
		else 
			print $ini['Error1'];
	}
}
else 
    print $ini['Nologin'];
?>
