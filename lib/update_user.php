<?php
$root = '/var/www/site';
include($root.'/lib/lang.php');
if (isset($_SESSION['user_id'])) 
{
	if(isset($_POST['update']))
	{
		if( isset($_POST['pass'], $_POST['r_pass'], $_POST['email'], $_POST['id']))
		{
			$pass = stripslashes(trim(mysql_real_escape_string($_POST['pass'])));
			$r_pass = stripslashes(trim(mysql_real_escape_string($_POST['r_pass'])));
			$email = stripslashes(trim(mysql_real_escape_string($_POST['email'])));
			$name = stripslashes(trim(mysql_real_escape_string($_POST['name'])));
			$surname = stripslashes(trim(mysql_real_escape_string($_POST['surname'])));
			$id = $_POST['id'];
			if (isset($_POST['status']))
			{
				$status = $_POST['status'];
			}
			if (empty($pass) || empty($r_pass)  || empty($email))
				print $ini['Error1'];
			else
			{
				if ($pass == $r_pass)
				{
					if ((($_FILES["file"]["type"] == "image/gif")
					|| ($_FILES["file"]["type"] == "image/jpeg")
					|| ($_FILES["file"]["type"] == "image/pjpeg"))
					&& ($_FILES["file"]["size"] < 20000))
					{
						if ($_FILES["file"]["error"] > 0)
						{
							echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
						}
						else
						{
							//echo "Upload: " . $_FILES["file"]["name"] . "<br />";
							//echo "Type: " . $_FILES["file"]["type"] . "<br />";
							//echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
							//echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
							//echo "ID: " . $id. "<br />";
						     
							/*if (file_exists($root.'/upload/'.$id . $_FILES["file"]["name"]))
							  {
								echo $id.$_FILES["file"]["name"] . " already exists. ";
							  }
							else
							  {*/
								
								$upload = $root.'/upload/'.$id.$_FILES["file"]["name"];
								unlink($upload);
								$root_img = '/site/upload/'.$id.$_FILES["file"]["name"];
								move_uploaded_file($_FILES["file"]["tmp_name"],$upload);
								include($root.'/lib/bd.php');
								if (isset($status))
								{
									$result = mysql_query ("UPDATE user 
												SET pass='$pass', e_mail='$email',
												name='$name', surname='$surname',
												status='$status', avatar='$root_img'
												WHERE id='$id'") or die(mysql_error());
									if ($result)
									{
										header ('Location: /site/main_page.php?lang='.$lang.'&masege='.$ini[Update]);
										die();
									}
									else 
										print $ini['No_update'];
						
								}
								else
								{
									$result = mysql_query ("UPDATE user 
												SET pass='$pass', e_mail='$email', name='$name',
												surname='$surname', avatar='$root_img' 
												WHERE id='$id'") or die(mysql_error());
									if ($result) 
									{	
										header ('Location: /site/main_page.php?lang='.$lang.'&masege='.$ini[Update]);
										die();
									}
									else 
										print $ini['No_update'];
								}
							  //}
						}
					}
					else
					{
					      echo "Invalid file";
					}
					
					
				}
				else 
					print $ini['Error2'];
			}	
		}
		else 
			print $ini['Error1'];
	}
}
else 
    die($ini['Nologin'].' <a href="/site/index.php?lang='.$lang.'">'.$ini['Start_page'].'</a>');
?>
