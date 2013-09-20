<h2><?php echo t('Login').' '.$data['login']; ?></h2>
<img src="
			<?php
if (file_exists('/var/www'.$data['avatar']))
    print $data['avatar'];
?>
				  " width="150" height="150" align="left"><br>
<?php
print t('Name').' '.$data['name'].'<br>';
print t('Surname').' '.$data['surname'].'<br>';
print t('Date created').' '.$data['date_cr'].'<br>';
if (isset($_SESSION['user_id']))
{
    print t('Date last seen').' '.$_SESSION['date_log'].'<br>';
    print t('e-mail').' '.$data['e_mail'].'<br>';
    if ($_SESSION['status']=='admin' || $_SESSION['user_id']==$_GET['id'])
    {
        ?>
        <a href="edit_user.php?id=<?php print $data['id'];?>"><?php print t('Edit');?></a>
        <a href="lib/del_user.php?id=<?php print $data['id'];?>"><?php print t('Delete');?> </a>
    <?php
    }
}
?>