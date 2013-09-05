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
				if ($_SESSION['status'] == 'admin')
				{ ?>
							<a href="/site/websitetranslation.php?lang=<?php echo $_REQUEST['lang']; ?>" class="style1"><?php echo $ini['Translate']; ?></a><br>
				<?php
				}
  }
  ?>
</td>