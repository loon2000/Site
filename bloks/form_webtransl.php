<form name="form" method="post" action="" onsubmit="return validate()">
    <p><img src="/site/img/en.png" width="20"><?php print ' '.t('Enter the text string to search');?><br>
        <input name="search" type="text" size="50"><br>
        <span style='display: none; color: #c00;' id='name0'><?php print t('*This field is required')?><br><br></span>
        <img src="/site/img/ua.png" width="20"> Переклад<br>
        <input name="traslate_ua" type="text" size="50"><br>
        <span style='display: none; color: #c00;' id='name1'><?php print t('*This field is required')?><br><br></span>
        <img src="/site/img/ru.png" width="20"> Перевод<br>
        <input name="traslate_ru" type="text" size="50"</p>
        <span style='display: none; color: #c00;' id='name2'><?php print t('*This field is required')?><br><br></span>
    <p><input name="ok" type="submit" value="OK" class="submit"></p>
</form>
