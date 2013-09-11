<?php
$root = '/var/www/site';
include_once($root.'/lib/lang.php');
include_once($root.'/lib/function_global.php');
if (isset($_SESSION['user_id'])) 
{
	if(isset($_POST['update']))
	{
		if( isset($_POST['pass'], $_POST['r_pass'], $_POST['email'], $_POST['id']))
		{
			$id = $_POST['id'];
			include_once($root.'/lib/bd.php');
			$correct = pass_r_pass();
			if ($correct)
			{
				if (empty($_POST['r_pass']) && empty($_POST['pass']))
				{	
					$pass = Dataintroduced($_POST['pass'],'pass',$id);
					$r_pass =$pass;
				}
				else
				{
					$pass = Dataintroduced($_POST['pass'],'pass',$id);
					$r_pass = Dataintroduced($_POST['r_pass'],'r_pass',$id);
					$pass = password($pass);
					$r_pass = password($r_pass);
				}
				$email = Dataintroduced($_POST['email'],'e_mail',$id);
				$name = Dataintroduced($_POST['name'],'name',$id);
				$surname = Dataintroduced($_POST['surname'],'surname',$id);
				$correct = edituserCorrect($email,$pass,$r_pass,$id);
				if ($correct)
				{
						if (!empty($_FILES["file"]["name"]))
						{
							$file_type = array('image/gif','image/jpeg','image/pjpeg');	
							if ((in_array($_FILES["file"]["type"],$file_type))
							&& ($_FILES["file"]["size"] < 20000))
							{
								if ($_FILES["file"]["error"] > 0)
								{
									echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
								}
								else
								{
									$upload = $root.'/upload/'.$id.$_FILES["file"]["name"];
									unlink($upload);
									$root_img = '/site/upload/'.$id.$_FILES["file"]["name"];
									move_uploaded_file($_FILES["file"]["tmp_name"],$upload);
								}
							}
							else
							{
							  echo "Invalid file";
							}
	
						}
						else	$root_img = Dataimg($id);
						$status = Dataintroduced($_POST['status'],'status',$id);
						$result = mysql_query ("UPDATE user 
													SET pass='$pass', e_mail='$email',
													name='$name', surname='$surname',
													status='$status', avatar='$root_img'
													WHERE id='$id'") or die(mysql_error());
							if ($result)
							{
								$update = t('Update');
								header ('Location: /site/profile.php?id='.$id.'&masege='.$update);
								die();
							}
							else 
								print t('Error, try again later');
				}
				else
				{
					print t('You did not fill the field');
				}
			}
			else
				print t('Passwords mismatch');		
		}
		else 
				print t('You did not fill the field');
	}
}
else
{
		$nologin = t('You are not authorized to access this page');
		$start_page = t('Start Page');
    die($nologin.' <a href="/site/index.php">'.$start_page.'</a>');
}
?>
