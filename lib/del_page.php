<?php 
session_start();
$root = '/var/www/site';
include($root.'/lib/lang.php');
if (isset($_SESSION['user_id'])) 
{
  if ($_SESSION['status']=='admin' or $_SESSION['status']=='editor')
  {
	 include($root.'/lib/bd.php');
	 $result = mysql_query("SELECT id
			       FROM page
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
					    FROM page
					    WHERE id='$_REQUEST[id]'") or die(mysql_error());
			   if ($data)
			   {
				    header ('Location: /site/main_page.php?lang='.$lang.'&masege='.$ini['Delete']);
				    die();
			   }
			    else
			    {
				    header ('Location: /site/main_page.php?lang='.$lang.'&masege='.$ini['Error']);
				    die();
			    }
		  }
	 }
  }
}
?>