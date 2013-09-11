<?php
$root = '/var/www/site';
include_once($root.'/lib/lang.php');?>
<link rel="stylesheet" href="/site/stl/style.css" type="text/css" media="screen, projection" />
<td width="10%" align="right">
        <form name="formlang" method="post" action="">
            <input type="submit" class="uasubmit" name="sendua"/>
            <input type="submit" class="rusubmit" name="sendru"/>
            <input type="submit" class="ensubmit" name="senden"/>
        </form>
<!-- старий код
<a href="?lang=ua"><img src="/site/img/ua.png" width="25"></a>
<a href="?lang=ru"><img src="/site/img/ru.png" width="25"></a>
<a href="?lang=en"><img src="/site/img/en.png" width="25"></a>
--></td>

