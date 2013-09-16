<?php
if (isset($_SESSION['user_id']))
{
include_once($root.'/lib/new_com.php');
?>
<form name="form2" method="post" action="">
<h2><?php print t('Your comment');?></h2>
<p><?php print t('Title comment');?><br><input name="title_com" type="text" size="74"></p>
<p><?php print t('Text comment');?><br><textarea name="text_com" cols="100" rows="10"></textarea></p>
<input name="page_id" type="hidden" value="<?php print $_REQUEST['id'];?>">
<p><input name="pub" type="submit" value="<?php echo t('Save');?>"></p>
</form>
<?php
}
else
{
 print t('Login or register to post comments');
}
?>