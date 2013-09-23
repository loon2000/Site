<?php
include_once('part1.php');
print t('Website translation -SH');
include_once('part11.php');
?><script type="text/javascript" src="scr/webtrans.js"></script>
<?php
include_once('part2.php');
loginuser();
include_once('part3.php');
  print '<h2>'.t('Website translation').'</h2>';
  webtransl();
include_once('part4.php');
?>
