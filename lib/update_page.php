<?php
if (isset($_SESSION['user_id'])) 
{
  if ($_SESSION['status']=='admin' or $_SESSION['status']=='editor')
  {
	include_once($root.'/lib/lang.php');
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
				include_once($root.'/lib/bd.php');
				$title = 'title_'.$_SESSION['user_lang'];
				$text = 'text_'.$_SESSION['user_lang'];
				$result = mysql_query ("UPDATE page 
							SET  $title = '".mysql_escape_string($title_page)."', 
							     $text = '".mysql_escape_string($text_page)."'
							WHERE id='$id'") or die(mysql_error());
				if ($result)
				{
					$update = t('Update');
					header ('Location: /site/main_page.php?masege='.$update);
					die();
				}
				else
				{
					print t('Error, try again later');
				}
			}	
		}
		else 
			print t('You did not fill the field');
	}
  }
}
else
{
    $nologin = t('You are not authorized to access this page');
		$start_page = t('Start Page');
		die($nologin.' <a href="/site/index.php">'.$start_page.'</a>');
}
?>
