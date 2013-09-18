<link rel="stylesheet" href="/site/stl/rating.css" type="text/css" media="screen, projection" />
<p><font><small>
<form name="form" method="post" action="">
        <?php print t('Your rating');?>: 
        <input type="radio" name="rang" value="1" id="labeled_1" /><label for="labeled_1">Poor</label>
        <input type="radio" name="rang" value="2" id="labeled_2" /><label for="labeled_2">Okay</label>
        <input type="radio" name="rang" value="3" id="labeled_3" /><label for="labeled_3">Good</label>
        <input type="radio" name="rang" value="4" id="labeled_4" /><label for="labeled_4">Great</label>
        <input type="radio" name="rang" value="5" id="labeled_5" /><label for="labeled_5">Awesome</label>
        <input name="add" type="submit" value="<?php echo t('Save rating');?>"></p>
</form>
</small></font></p>
