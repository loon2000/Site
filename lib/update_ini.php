<?php
if (isset($_POST['ok']))
{
 $massname = $ini;
 foreach($massname  as $key => $value ){
  $massname[$key] = $_POST['text'.$key]; 
 }
  formCorrect($massname,$ini['Error1']);
 $input = "";
  foreach($massname  as $key => $value )
   {  $input .= $key . " = " . $value . "\n";  }
 $f = fopen( $root.'/'.$lang.'.ini' , 'w+' );
 fwrite( $f , $input , strlen( $input ) );
 fclose( $f );
 include_once($root.'/lib/lang.php');
 print '<p>'.$ini['Changes_saved'].'</p>';
 updatePage('',$ini['Update_page']);
}
?>
