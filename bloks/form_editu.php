<form name="form" method="post" enctype="multipart/form-data" action="">
    <h2><?php echo t('Login').' '.$data['login']; ?></h2>
    <?php
    if ($_SESSION['status']=='admin')
    { ?>
        Status<br>
        <Select name="status">
            <option VALUE="<?php print $data['status'];?>"><?php print $data['status'];?></option>
            <option VALUE="user">user</option>
            <option VALUE="editor">editor</option>
            <option VALUE="block">block</option>
            <option VALUE="admin">admin</option>
        </SELECT>
        <br>
    <?php
    } ?>

    <label for="file">avatar</label><br><input name="file" type="file"><br>
    <input type="hidden" name="MAX_FILE_SIZE" value="3000">

    <?php print t('Name'); ?>   <br><input name="name" type="text" value="<?php echo $data['name'] ?>"  size="30" ><br>
    <?php print t('Surname'); ?><br><input name="surname" type="text" value="<?php echo $data['surname'] ?>"  size="30"><br>
    <?php echo t('Password'); ?>    <br><input name="pass" type="password" size="30" onkeyup="checkp(this.value)">
    <span class="tooltip"><input type="button" class="submit" value="i"><em><?php print t('Minimal password length is 6 symbols and maximum is 16 symbols. Password depends on register. Letters cyrillics and special symbols are inadmissible');?></em></span><br>
    <span id="e_pass" style="display: none; color: #c00;"><?php print t('The password is entered incorrectly')?><br></span>
    <?php echo t('Re-enter password'); ?>  <br><input name="r_pass" type="password" size="30" onkeyup="checkrp()"><br>
    <span id="e_r_pass" style="display: none; color: #c00;"><?php print t('Passwords do not match')?><br></span>
    <?php echo t('e-mail'); ?>  <br><input name="email" type="text" value="<?php echo $data['e_mail'] ?>" size="30" onkeyup="checke(this.value)">
    <span class="tooltip"><input type="button" class="submit" value="i"><em><?php print t('Enter your e-mail (example, somebody@domain.com)');?></em></span><br>
    <span id="e_email" style="display: none; color: #c00;"><?php print t('Not properly introductions e-mail')?><br></span>
    <input name="id" type="hidden" value="<?php print $id;?>">
    <input name="update" type="submit" class="submit" value="<?php echo t('Save'); ?>">
</form>
