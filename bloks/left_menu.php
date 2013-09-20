<?php
  if (isset($_SESSION['status']))
  {
	if ($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'editor')
	{ ?>
    <li><a href="/site/add_page.php"><?php echo t('Create content'); ?></a></li>
	    <?php
	}
	if ($_SESSION['status'] == 'admin')
	{ ?>
    <li><a href="/site/websitetranslation.php"><?php echo t('Website translation'); ?></a></li>
		<?php
	}
  }
  ?>
