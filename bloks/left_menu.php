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
	<a href="/site/main_page.php" class="style1"><?php echo t('Main page'); ?></a><br>
	<a href="/site/users.php" class="style1"><?php echo t('Users'); ?></a><br>
  <?php	}
  if (isset($_SESSION['status']))
  {
				if ($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'editor')
				{ ?>
							<a href="/site/add_page.php" class="style1"><?php echo t('Create content'); ?></a><br>
				<?php
				}
				if ($_SESSION['status'] == 'admin')
				{ ?>
							<a href="/site/websitetranslation.php" class="style1"><?php echo t('Website translation'); ?></a><br>
				<?php
				}
  }
  ?>
</td>