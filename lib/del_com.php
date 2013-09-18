<?php 
session_start();
$root = '/var/www/site';
include_once($root.'/lib/lang.php');
if (isset($_SESSION['user_id'])) 
{
  if ($_SESSION['status']=='admin')
  {
	 include_once($root.'/lib/bd.php');
	 $result = mysql_query("SELECT id
			       FROM comment
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
					    FROM comment
					    WHERE id='$_REQUEST[id]'") or die(mysql_error());
			   if ($data)
			   {
				    
						header('Location:'.$_SERVER['HTTP_REFERER'] );
						die();
			   }
			    else
			    {
						print t('Error');	
			    }
		  }
	 }
  }
	else die(t('Error'));
}
?>