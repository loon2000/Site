<?php 
session_start();
$root = '/var/www/site';
include_once($root.'/lib/lang.php');
if (isset($_SESSION['user_id'])) 
{
  if ($_SESSION['status']=='admin' or $_SESSION['status']=='editor')
  {
	 include_once($root.'/lib/bd.php');
	 $result = mysql_query("SELECT id
			       FROM page
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
					    FROM page
					    WHERE id='$_REQUEST[id]'") or die(mysql_error());
			   if ($data)
			   {
				    $delete = t('Post deleted');
				    header ('Location: /site/main_page.php?masege='.$delete);
				    die();
			   }
			    else
			    {
						$error = t('Error');	
				    header ('Location: /site/main_page.php?masege='.$error);
				    die();
			    }
		  }
	 }
  }
}
?>