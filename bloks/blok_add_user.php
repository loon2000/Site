<form name="form1" method="post" action="">
  <h2><?php echo t('Create new account');?></h2>
<p><?php echo t('Login');?><br><input name="login" type="text" size="20">
    <span class="tooltip"><input type="button" class="submit" value="i"><em><?php print t('You can use letters, numbers and periods. Letters cyrillics and special symbols are inadmissible');?></em></span><br>
    <?php echo t('Password');?><br><input name="pass" type="password" size="20">
    <span class="tooltip"><input type="button" class="submit" value="i"><em><?php print t('Minimal password length is 6 symbols and maximum is 16 symbols. Password depends on register. Letters cyrillics and special symbols are inadmissible');?></em></span><br>
    <?php echo t('Re-enter password');?><br><input name="r_pass" type="password" size="20"><br>
    <?php echo t('e-mail');?><br><input name="email" type="text" size="20">
    <span class="tooltip"><input type="button" class="submit" value="i"><em><?php print t('Enter your e-mail (example, somebody@domain.com)');?></em></span><br>
</p>
<p><input name="ok" type="submit" value="<?php echo t('Save');?>" class="submit"></p>
</form>