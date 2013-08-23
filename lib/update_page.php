<?php
$root = '/var/www/site';
if (isset($_SESSION['user_id'])) 
{
	include($root.'/lib/lang.php');
	if(isset($_POST['pub']))
	{
		if( isset($_POST['title_page'], $_POST['text_page'], $_POST['id'] ))
		{
			$title_page = $_POST['title_page'];
			$text_page = $_POST['text_page'];
			$id = $_POST['id'];
			if( empty($title_page) || empty($text_page) )
				print $ini['Error1'];
			else
			{  
				include($root.'/lib/bd.php');
				$result = mysql_query ("UPDATE page 
							SET  title_page = '".mysql_escape_string($title_page)."', 
							     text_page = '".mysql_escape_string($text_page)."'
							WHERE id='$id'") or die(mysql_error());
				if ($result)
				{
					header ('Location: /site/main_page.php?lang='.$lang.'&masege='.$ini['Update']);
					die();
				}
				else
				{
					print $ini['No_update'];
				}
			}	
		}
		else 
			print $ini['Error1'];
	}
}
else 
    die($ini['Nologin'].' <a href="/site/index.php?lang='.$lang.'">'.$ini['Start_page'].'</a>');
?>
