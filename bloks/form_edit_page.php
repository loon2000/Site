<form name="form" method="post" action="" onsubmit="return validate()">
    <h2><?php echo t('Edit content');?></h2>
    <p><?php echo t('Title');?>:<br>
        <input value="<?php echo $data[$title_page] ?>" name="title_page" type="text" size="70"></p>
    <span style='display: none; color: #c00;' id='name0'><?php print t('*This field is required')?><br><br></span>
    <p><?php echo t('Text');?>:<br>
        <textarea name="text_page" cols="95" rows="38"><?php echo $data[$text_page] ?></textarea></p>
    <span style='display: none; color: #c00;' id='name1'><?php print t('*This field is required')?><br><br></span>
    <input name="id" type="hidden" value="<?php echo $data['id'] ?>">
    <p><input name="pub" type="submit" value="<?php echo t('Save');?>" class="submit"></p>
</form>