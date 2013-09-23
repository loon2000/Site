<?php
include_once('part1.php');
ob_start();
print t('Welcome - SH');
include_once('part11.php');
?><script type="text/javascript" src="scr/adduser.js"></script>
<?php
include_once('part2.php');
loginuser();
include_once('part3.php');
adduser();
include_once('part4.php');
?>