<?php
if (isset($_POST['ok']))
{
 include_once($root.'/lib/bd.php');
 $trans = array(
  $_POST['search'],
  $_POST['traslate']
  );
 formCorrect($trans,$ini['Error1']);
 $trans = formEkran($trans);
 $result = langSelectBd($lang,$trans[0]);
  if (mysql_num_rows($result) != 0) 
  {
   $data = mysql_fetch_array($result);
   $result = langSelectBd($lang,$trans[1]);
   if (mysql_num_rows($result) != 0) 
   {
    print 'Такий текст перекладу уже існує';
   }
   else
   {
    $id = $data['id'];
    $result = mysql_query ("UPDATE lang
                            SET  $lang = '$trans[1]'
                            WHERE id = '$id'") or die(mysql_error());
    if ($result)
    {
     print 'Успішно оновлено';
    }
    else
    {
     print 'Не оновленно';
    }
   }
  }
  else
  {
   print 'Текст не знайдено<br>';
   print $lang.'<br>';
   print $trans['0'].'<br>';
   print $trans['1'].'<br>';
   
  }
}
else print 'Ой!';
?>
