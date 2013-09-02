<style type="text/css">
<!--
.style1 {
	color: #000000
}
-->
</style>
<td align="left" valign="top">
<?php
if (isset($_SESSION['user_id']))
	{ ?>
	<a href="/site/main_page.php?lang=<?php echo $_REQUEST['lang']; ?>" class="style1"><?php echo $ini['Main_page']; ?></a><br>
	<a href="/site/users.php?lang=<?php echo $_REQUEST['lang']; ?>" class="style1"><?php echo $ini['Users']; ?></a><br>
  <?php	}
  if (isset($_SESSION['status']))
  {
	if ($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'editor')
	{ ?>
	      <a href="/site/add_page.php?lang=<?php echo $_REQUEST['lang']; ?>" class="style1"><?php echo $ini['Create_content']; ?></a><br>
	<?php
	}
  }
  ?>
  <a href="/site/index.php?lang=<?php echo $_REQUEST['lang']; ?>" class="style1"><?php echo $ini['Log_out']; ?></a><br></td>
