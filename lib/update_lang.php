<?php
if (isset($_POST['ok']))
{
 include_once($root.'/lib/bd.php');
 $trans = array(
  $_POST['search'],
  $_POST['traslate_ua'],
  $_POST['traslate_ru']
  );
 $error1 = t('You did not fill the field');
 formCorrect($trans,$error1);
 $trans = formEkran($trans);
 $result = langSelectBd('en',$trans[0]);
  if (mysql_num_rows($result) != 0) 
  {
   $data = mysql_fetch_array($result);
   $id = $data['id'];
   $result = mysql_query ("UPDATE lang
                           SET  ua = '$trans[1]', ru = '$trans[2]' 
                           WHERE id = '$id'") or die(mysql_error());
   if ($result)
   {
    header ('Location: /site/websitetranslation.php?m=1');
   }
   else
   {
    print t('Error, try again later');
   }
  }
  else
  {
   print t('Text not found').'<br>';
  }
}
?>
