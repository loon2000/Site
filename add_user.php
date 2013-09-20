<?php
session_start();
$root = '/var/www/site';
include_once($root.'/lib/lang.php');
include_once($root.'/lib/function_global.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo t('Create new account - SH');?></title>
    <link rel="stylesheet" href="images/style.css" type="text/css" />
</head>

<body>
<div class="content">
    <div class="preheader">
        <div class="padding"> <?php include_once ($root.'/bloks/blok_user.php');?> &nbsp;  </div>
    </div>
    <div class="header">
        <div class="title">Ukraine</div>
        <div class="slogan">Site of the country</div>
        <div class="lang"><?php include_once ($root.'/bloks/blok_lenguage.php');?></div>

    </div>
    <div id="nav">
        <ul>
            <li><a href="/site/index.php">Home</a></li>
            <li><a href="/site/users.php"><?php echo t('Users'); ?></a></li>
            <?php include_once ($root.'/bloks/left_menu.php');?>
        </ul>
    </div>
    <div class="main_content">
        <div class="sd_right">
            <div class="text_padding">

            </div>
        </div>
        <div class="sd_left">
            <div class="text_padding">
                <?php adduser();?>
            </div>
        </div>
        <div class="footer">
            <div class="padding"> Powered by Andriy Tkachuk  </div>
        </div>
    </div>
</div>
</body>
</html>
