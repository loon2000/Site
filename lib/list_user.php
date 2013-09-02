<?php 
	include($root.'/lib/bd.php');
	include($root.'/lib/lang.php');
	if (isset($_REQUEST['masege']))
		print '<p>'.$_REQUEST['masege'].'</p>';

	$result = mysql_query("SELECT *  FROM user
				ORDER BY login") or die(mysql_error());
	if ($result)
	{
		while ($data = mysql_fetch_array($result)) 
		{
			if (file_exists('/var/www'.$data['avatar']))
			{
				print '<img src="'.$data['avatar'].'" width="150" height="150"/><br>';
		    }
		    print '<p>'.$ini['Login'].' '.$data['login'];
			print '<br>'.$ini['Name'].' '.$data['name'];
			print '<br>'.$ini['Surname'].' '.$data['surname'];
			
			if (isset($_SESSION['user_id']))
			{
				print '<br>'.$ini['E_mail'].' '.$data['e_mail'];
				if (isset($_SESSION['status']))
				{
					if ($_SESSION['status']=='admin')
					{
						print '<p><a href="edit_user.php?id='.$data['id'].'&lang='.$lang.'">'.$ini['Edit'].'</a>';  
						print '<br><a href="lib/del_user.php?id='.$data['id'].'&lang='.$lang.'">'.$ini['Del'].'</a>';
						print '</p>';
					}
				}

			}
			print '</p>';

		}
	}
?>
