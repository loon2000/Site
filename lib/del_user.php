<?php 
session_start();
$root = '/var/www/site';
include($root.'/lib/lang.php');
if (isset($_SESSION['user_id'])) 
{ 
	 include($root.'/lib/bd.php');
	 $result = mysql_query("SELECT id
			       FROM user
			       WHERE id='$_REQUEST[id]'") or die (mysql_error());
	 if ($result)
	 {
		  $data = mysql_fetch_array($result);
		  if(empty($data['id']))
		  {
		     $error = t('Error');
				 die($error);
		  }
		  else
		  {	
			   $data = mysql_query("DELETE
					    FROM user
					    WHERE id='$_REQUEST[id]'") or die(mysql_error());
			   if ($data)
			   {
					if ($_SERVER['HTTP_REFERER']=='http://localhost/site/users.php')
				  {
									header('Location: '.$_SERVER['HTTP_REFERER']);     
				  }
				    else
				    {
							$delete = t('Post deleted');
							header ('Location: /site/index.php?masege='.$delete);    
				    }
				    die();
			   }
			    else
			    {
				    $error = t('Error');
						header ('Location: /site/profile.php?masege='.$error);
				    die();
			    }
		  }
	 }
}
?>