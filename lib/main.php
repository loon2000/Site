<?php 
include_once($root.'/lib/bd.php');
include_once($root.'/lib/lang.php');
include_once($root.'/lib/function_global.php');
if (isset($_REQUEST['masege']))
	print '<p>'.$_REQUEST['masege'].'</p>';

$result = mysql_query("SELECT *  FROM page
											ORDER BY id DESC") or die(mysql_error());

if ($result)
{
	while ($data = mysql_fetch_array($result)) 
	{
		$title_page = titleTextLanguage($_SESSION['user_lang']);
		$text_page = textLanguage($_SESSION['user_lang']);
		print '<h1>'.$data[$title_page].'</h1>';
		rating ($data['id']);
		if (isset($_SESSION['user_id']))
		{
				$data2 = selectUserId($data['autor']);
				if ($data2)
					print '<p>'.t('Author').': <a href="/site/profile.php?id='.$data2['id'].'">'.$data2['login'].'</a></p>';
				
		}
		if (isset($_SESSION['status'],$_SESSION['user_id']))
		{
			if ($_SESSION['status'] == 'admin' || $_SESSION['user_id'] == $data['autor'])
			{ 
			print '[<a href="/site/edit_page.php?id='.$data['id'].'">'.t('Edit').'</a>]
			[<a href="/site/lib/del_page.php?id='.$data['id'].'">'.t('Delete').'</a>]<br>';
			}
		}
		if (strlen($data[$text_page])>150)
		{
			echo substr($data[$text_page],0,150)."...<br>";
		}
		else 
		{
			echo $data[$text_page];
		}
		echo '<a href="/site/readmore.php?id='.$data['id'].'">['.t('Read More').'</a>]<br>';
	}
}
?>
