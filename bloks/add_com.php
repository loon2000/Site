<?php
if (isset($_SESSION['user_id']))
{
?>
<form name="form1" method="post" action="" onsubmit="return validate()">
<h2><?php print t('Your comment');?></h2>
<p><?php print t('Title comment');?></p>
    <p><input name="title_com" type="text" size="47"></p>
    <br>
<p><?php print t('Text comment');?></p>
    <p><textarea name="text_com" cols="65" rows="10"></textarea></p>
    <span style='display: none; color: #c00;' id='name0'><?php print t('*This field is required')?><br><br></span>
<input name="page_id" type="hidden" value="<?php print $_REQUEST['id'];?>">
<p><input name="pub" type="submit" value="<?php echo t('Save');?>" class="submit"></p>
</form>
<?php
}
else {
 print t('Login or register to post comments');
}
?>