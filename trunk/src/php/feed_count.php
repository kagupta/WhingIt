<?php
  require('dbconnect.php');
  
  $mode = $_GET['mode'];
  $compare = "<";
  
  if ($mode == 'feed')
    $compare = ">";
  else
    $compare = "<";
  
  $sql = mysql_query("SELECT * FROM events WHERE TIMEDIFF(NOW(),time) ".$compare." 0");
  $num_rows = mysql_num_rows($sql);
  echo $num_rows; 
?>