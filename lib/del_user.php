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
		      die($ini['Error']);
		  }
		  else
		  {	
			   $data = mysql_query("DELETE
					    FROM user
					    WHERE id='$_REQUEST[id]'") or die(mysql_error());
			   if ($data)
			   {
				    $old_page = 'http://localhost/site/users.php?lang=%s';
					if ($_SERVER['HTTP_REFERER']== sprintf($old_page,'ua')
						|| $_SERVER['HTTP_REFERER']== sprintf($old_page,'ru')
						|| $_SERVER['HTTP_REFERER']== sprintf($old_page,'en'))
				    {
					header('Location: '.$_SERVER['HTTP_REFERER']);     
				    }
				    else
				    {
					 header ('Location: /site/index.php?lang='.$lang.'&masege='.$ini['Delete']);    
				    }
				    die();
			   }
			    else
			    {
				    header ('Location: /site/profile.php?lang='.$lang.'&masege='.$ini['Error']);
				    die();
			    }
		  }
	 }
}
?>