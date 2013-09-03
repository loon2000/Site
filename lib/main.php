<?php 
include($root.'/lib/bd.php');
include($root.'/lib/lang.php');
if (isset($_REQUEST['masege']))
	print '<p>'.$_REQUEST['masege'].'</p>';

$result = mysql_query("SELECT *  FROM page
			WHERE lang='$lang'
			ORDER BY id DESC") or die(mysql_error());
if ($result)
{
	while ($data = mysql_fetch_array($result)) 
	{
		print '<h1>'.$data['title_page'].'</h1>';
		if (isset($_SESSION['user_id']))
		{
				$result2 = mysql_query("SELECT *  FROM user
							WHERE id='$data[autor]'") or die(mysql_error());
				if ($result2)
				{
					$data2 = mysql_fetch_array($result2);
					print '<p>'.$ini['Autor'].': <a href="/site/profile.php?id='.$data2['id'].'&lang='.$lang.'">'.$data2['login'].'</a></p>';
				}
		}
		if (isset($_SESSION['status'],$_SESSION['user_id']))
		{
			if ($_SESSION['status'] == 'admin' || $_SESSION['user_id'] == $data['autor'])
			{ 
			print '[<a href="/site/edit_page.php?id='.$data['id'].'&lang='.$lang.'">'.$ini['Edit'].'</a>]
			[<a href="/site/lib/del_page.php?id='.$data['id'].'&lang='.$lang.'">'.$ini['Del'].'</a>]<br>';
			}
		}
		if (strlen($data['text_page'])>150)
		{
			echo substr($data['text_page'],0,150)."...<br>";
			echo '<a href="/site/readmore.php?id='.$data['id'].'&lang='.$lang.'">['.$ini['Read_More'].'</a>]<br>';
		}
		else 
		{
			echo $data['text_page'];
		}		

	}
}
?>
