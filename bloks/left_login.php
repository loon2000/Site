<form action="main_page.php" method="post">
    <td align="center">
    <p><?php print t('Login'); ?><br>
    <input name="login" type="text" size="20"><br>
    <?php print t('Password'); ?><br>
    <input name="pass" type="password" size="20"></p>
    <input name="Enter" type="submit" value="<?php print t('Log in'); ?>">
    <p><a href="add_user.php"><?php echo t('Create new account'); ?></a><br>
       <a href="new_pass.php"><?php echo t('Request password'); ?></a></p>

  </td>
</form>
