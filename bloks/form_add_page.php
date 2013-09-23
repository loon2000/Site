<form name="form" method="post" action="" onsubmit="return validate()">
    <h2><img src="/site/img/en.png" width="20"> Create content</h2>
    <h2><img src="/site/img/ua.png" width="20"> Створити запис</h2>
    <h2><img src="/site/img/ru.png" width="20"> Создать публикацию</h2>
    <p>Title in English<br><input name="title_en" type="text" size="50"></p>
    <span style='display: none; color: #c00;' id='name0'><?php print t('*This field is required')?><br><br></span>
    <p>Тема українською<br><input name="title_ua" type="text" size="50"></p>
    <span style='display: none; color: #c00;' id='name1'><?php print t('*This field is required')?><br><br></span>
    <p>Тема на русском<br><input name="title_ru" type="text" size="50"></p>
    <span style='display: none; color: #c00;' id='name2'><?php print t('*This field is required')?><br><br></span>
    <p>Text in English<br><textarea name="text_en" cols="69" rows="30"></textarea></p>
    <span style='display: none; color: #c00;' id='name3'><?php print t('*This field is required')?><br><br></span>
    <p>Текст українською<br><textarea name="text_ua" cols="69" rows="30"></textarea></p>
    <span style='display: none; color: #c00;' id='name4'><?php print t('*This field is required')?><br><br></span>
    <p>Текст на русском<br><textarea name="text_ru" cols="69" rows="30"></textarea></p>
    <span style='display: none; color: #c00;' id='name5'><?php print t('*This field is required')?><br><br></span>
    <p><input name="pub" type="submit" value="<?php echo t('Save');?>" class="submit"></p>
</form>