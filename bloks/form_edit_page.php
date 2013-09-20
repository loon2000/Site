<form name="form1" method="post" action="">
    <h2><?php echo t('Edit content');?></h2>
    <p><?php echo t('Title');?>:<br>
        <input value="<?php echo $data[$title_page] ?>" name="title_page" type="text" size="74"></p>
    <p><?php echo t('Text');?>:<br>
        <textarea name="text_page" cols="100" rows="40"><?php echo $data[$text_page] ?></textarea></p>
    <input name="id" type="hidden" value="<?php echo $data['id'] ?>">
    <p><input name="pub" type="submit" value="<?php echo t('Save');?>"></p>
</form>