<?php 
	include_once($root.'/lib/bd.php');
	include_once($root.'/lib/lang.php');
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
		    print '<p>'.t('Login').' '.$data['login'];
			print '<br>'.t('Name').' '.$data['name'];
			print '<br>'.t('Surname').' '.$data['surname'];
			
			if (isset($_SESSION['user_id']))
			{
				print '<br>'.t('e-mail').' '.$data['e_mail'];
				if (isset($_SESSION['status']))
				{
					if ($_SESSION['status']=='admin')
					{
						print '<p><a href="edit_user.php?id='.$data['id'].'">'.t('Edit').'</a>';  
						print '<br><a href="lib/del_user.php?id='.$data['id'].'">'.t('Delete').'</a>';
						print '</p>';
					}
				}

			}
			print '</p>';

		}
	}
?>
