<?php
if (!isset($_SESSION['user_id']))
{
    print t('Enter your login and password');
    ?>
    <form action="" method="post">
        <h2><?php print t('Login'); ?></h2>
        <input name="login" type="text"class="formtext">
        <h2><?php print t('Password'); ?></h2>
        <input name="pass" type="password"class="formtext">
        <input name="Enter" type="submit" value="<?php print t('Log in'); ?>" class="submit">
        <p><a href="add_user.php"><?php echo t('Create new account'); ?></a></p>
        <p><a href="new_pass.php"><?php echo t('Request password'); ?></a></p>
    </form>
    <?php
}
?>
