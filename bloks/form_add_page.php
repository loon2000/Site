<form name="form2" method="post" action="">
    <h2><img src="/site/img/en.png" width="20"> Create content</h2>
    <h2><img src="/site/img/ua.png" width="20"> Створити запис</h2>
    <h2><img src="/site/img/ru.png" width="20"> Создать публикацию</h2>
    <p>Title in English<br><input name="title_en" type="text" size="74"></p>
    <p>Тема українською<br><input name="title_ua" type="text" size="74"></p>
    <p>Тема на русском<br><input name="title_ru" type="text" size="74"></p>
    <p>Text in English<br><textarea name="text_en" cols="100" rows="40"></textarea></p>
    <p>Текст українською<br><textarea name="text_ua" cols="100" rows="40"></textarea></p>
    <p>Текст на русском<br><textarea name="text_ru" cols="100" rows="40"></textarea></p>
    <p><input name="pub" type="submit" value="<?php echo t('Save');?>" class="submit"></p>
</form>