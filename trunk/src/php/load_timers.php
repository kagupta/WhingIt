<?php
  include 'countdown_query.php';
  $eventTab = $_GET['eventTab'];
  
  while($row = mysql_fetch_array($eventTab)) { 
    $temp2  = strtotime($row['time']);
    if((($temp2 - $absTime) < 10830) && (($temp2 - $absTime) > 0)) {
    
      // INCLUDE EVENT BOX
      $_GET['time'] = $temp2;
      $_GET['id'] = $row['id'];
      include("timer_setup.php");
    }
  }
?>