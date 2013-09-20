<?php
if (isset($_SESSION['user_id']))
{
?>
<form name="form2" method="post" action="">
<h2><?php print t('Your comment');?></h2>
<p><?php print t('Title comment');?></p>
    <p><input name="title_com" type="text" size="47"></p>
    <br>
<p><?php print t('Text comment');?></p>
    <p><textarea name="text_com" cols="65" rows="10"></textarea></p>
<input name="page_id" type="hidden" value="<?php print $_REQUEST['id'];?>">
<p><input name="pub" type="submit" value="<?php echo t('Save');?>" class="submit"></p>
</form>
<?php
}
else
{
 print t('Login or register to post comments');
}
?>