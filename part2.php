
<link rel="stylesheet" href="stl/style.css" type="text/css" />
</head>

<body >
<div class="content">
    <div class="preheader">
        <div class="padding"> <?php include_once ($root.'/bloks/blok_user.php');?> &nbsp;  </div>
    </div>
    <div class="header">
        <div class="title"><?php print t('Ukraine');?></div>
        <div class="slogan">Nullus locus tibi dulcior esse debet patria tua (lat.)</div>
        <div class="lang"><?php include_once ($root.'/bloks/blok_lenguage.php');?></div>

    </div>
    <div id="nav">
        <ul>
            <li><a href="/site/index.php"><?php print t('Home'); ?></a></li>
            <li><a href="/site/users.php"><?php print t('Users'); ?></a></li>
            <?php include_once ($root.'/bloks/left_menu.php');?>
        </ul>
    </div>
    <div class="main_content">
        <div class="sd_right">
            <div class="text_padding">