<?php
  include 'event_functions.php';
  require('dbconnect.php');
  $last_msg_id=$_GET['last_msg_id'];
  
  date_default_timezone_set('America/Los_Angeles');  
  include 'countdown_query.php';
  $eventTab = $_GET['eventTab'];
  $absTime = strtotime("now");
  
  $currentCounter = 0;
  while($row = mysql_fetch_array($eventTab)) {
    $temp2  = strtotime($row['time']);      // Check if time is within 3 hours
    if((($temp2 - $absTime) < 10830) && (($temp2 - $absTime) > 0) && ($row['id'] > $last_msg_id)) {
    
      // INCLUDE EVENT BOX
      $_GET['event_info'] = $row;
      include("eventBox_countdown.php");

      $currentCounter = $currentCounter + 1;
    } 
  }
?>
    
    
<!-- Setup for timers -->
<script type="text/javascript">
  window.onload = function() {
  <?php
    include 'countdown_query.php';
    $eventTab = $_GET['eventTab'];
    
    while($row = mysql_fetch_array($eventTab)) { 
      $temp2  = strtotime($row['time']);
      if((($temp2 - $absTime) < 10830) && (($temp2 - $absTime) > 0) && ($row['id'] > $last_msg_id)) {
      
        /// INCLUDE EVENT BOX
        $_GET['time'] = $temp2;
        $_GET['id'] = $row['id'];
        include("timer_setup.php");
      }
    }
  ?>
  }
</script>
