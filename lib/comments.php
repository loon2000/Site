<?php 
include_once($root.'/lib/lang.php');
include_once($root.'/lib/function_global.php');

sitebdConect();
$result = mysql_query("SELECT *  FROM comment
											ORDER BY date DESC") or die(mysql_error()); 
if ($result)
{
	while ($data = mysql_fetch_array($result)) 
	{
		if (isset($_SESSION['user_id']))
		{
				$data2 = selectUserId($data['autor']);
				if ($data2)
					print '<img src="'.$data2['avatar'].'" width="70" align="left">'; 	
					print '<br><small><strong> <a href="/site/profile.php?id='.$data2['id'].'">'.$data2['login'].'</a></strong></small><br>';
					print '<font color="gray"><small>'.$data['date'].'</small></font><br><br>';
					print '<font color="#282828"><h3>'.$data['title_com'].'</h3></font>';
					print '<p><font color="#383838">'.$data['text_com'].'</font></p>';
				
		
		}
		if (isset($_SESSION['status'],$_SESSION['user_id']))
		{
			if ($_SESSION['status'] == 'admin' || $_SESSION['user_id'] == $data['autor'])
			{ 
			print '[<a href="/site/edit_page.php?id='.$data['id'].'">'.t('Edit').'</a>]
			[<a href="/site/lib/del_page.php?id='.$data['id'].'">'.t('Delete').'</a>]';
			}
		}
		
//    if (strlen($data['text_com'])>150)
//		{
//			echo substr($data['text_com'],0,150)."...<br>";
//			echo '<a href="/site/readmore.php?id='.$data['id'].'">['.t('Read More').'</a>]<br>';
//		}
//		else 
//		{
//			echo $data['text_com'];
//		}		

	}
}
?>
		
		
