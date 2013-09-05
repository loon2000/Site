<?php 
include_once($root.'/lib/bd.php');
include_once($root.'/lib/lang.php');
include_once($root.'/lib/function_global.php');
if (isset($_REQUEST['masege']))
	print '<p>'.$_REQUEST['masege'].'</p>';

$result = mysql_query("SELECT *  FROM page
			
			ORDER BY id DESC") or die(mysql_error()); //WHERE lang='$lang'
if ($result)
{
	while ($data = mysql_fetch_array($result)) 
	{
		$title_page = titleTextLanguage($lang);
		$text_page = textLanguage($lang);
		print '<h1>'.$data[$title_page].'</h1>';
		if (isset($_SESSION['user_id']))
		{
				$data2 = selectUserId($data['autor']);
				if ($data2)
					print '<p>'.$ini['Autor'].': <a href="/site/profile.php?id='.$data2['id'].'&lang='.$lang.'">'.$data2['login'].'</a></p>';
				
		}
		if (isset($_SESSION['status'],$_SESSION['user_id']))
		{
			if ($_SESSION['status'] == 'admin' || $_SESSION['user_id'] == $data['autor'])
			{ 
			print '[<a href="/site/edit_page.php?id='.$data['id'].'&lang='.$lang.'">'.$ini['Edit'].'</a>]
			[<a href="/site/lib/del_page.php?id='.$data['id'].'&lang='.$lang.'">'.$ini['Del'].'</a>]<br>';
			}
		}
		if (strlen($data[$text_page])>150)
		{
			echo substr($data[$text_page],0,150)."...<br>";
			echo '<a href="/site/readmore.php?id='.$data['id'].'&lang='.$lang.'">['.$ini['Read_More'].'</a>]<br>';
		}
		else 
		{
			echo $data[$text_page];
		}		

	}
}
?>
