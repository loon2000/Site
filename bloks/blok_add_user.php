<form name="form" method="post" action="" onsubmit="return validate()">
  <h2><?php echo t('Create new account');?></h2>
    <!--Login-->
<p><?php echo t('Login');?><br><input name="login" type="text" size="20" onkeyup="checkl(this.value)">
    <span class="tooltip"><input type="button" class="submit" value="i"><em><?php print t('You can use letters, numbers (min. 3). Letters cyrillics and special symbols are inadmissible');?></em></span><br>
    <span id="e_login" style="display: none; color: #c00;"><?php print t('Login incorrectly')?><br></span>
    <span style='display: none; color: #c00;' id='name0'><?php print t('*This field is required')?><br><br></span>
    <!--Password-->
    <?php echo t('Password');?><br><input name="pass" type="password" size="20" onkeyup="checkp(this.value)">
    <span class="tooltip"><input type="button" class="submit" value="i"><em><?php print t('Minimal password length is 6 symbols and maximum is 16 symbols. Password depends on register. Letters cyrillics and special symbols are inadmissible');?></em></span><br>
    <span id="e_pass" style="display: none; color: #c00;"><?php print t('The password is entered incorrectly')?><br></span>
    <span style='display: none; color: #c00;' id='name1'><?php print t('*This field is required')?><br><br></span>
    <!--Re-enter password-->
    <?php echo t('Re-enter password');?><br><input name="r_pass" type="password" size="20" onkeyup="checkrp()"><br>
    <span id="e_r_pass" style="display: none; color: #c00;"><?php print t('Passwords do not match')?><br></span>
    <span style='display: none; color: #c00;' id='name2'><?php print t('*This field is required')?><br><br></span>
    <!--E-mail-->
    <?php echo t('e-mail');?><br><input name="email" type="text" size="20" onkeyup="checke(this.value)">
    <span class="tooltip"><input type="button" class="submit" value="i"><em><?php print t('Enter your e-mail (example, somebody@domain.com)');?></em></span><br>
    <span id="e_email" style="display: none; color: #c00;"><?php print t('Not properly introductions e-mail')?><br></span>
    <span style='display: none; color: #c00;' id='name3'><?php print t('*This field is required')?><br><br></span>
</p>
    <!--Button-->
<p><input name="ok" type="submit" value="<?php echo t('Save');?>" class="submit"></p>
</form>
