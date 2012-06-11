<?php
  include '/src/php/event_functions.php';
  include '/src/php/dbconnect.php';
  
  date_default_timezone_set('America/Los_Angeles');  
  //$eventTab = mysql_query("SELECT * FROM events WHERE time - NOW() > 0 AND DATE_SUB(time,INTERVAL 3 HOUR) < NOW() ORDER BY UNIX_TIMESTAMP(time)");
  include '/src/php/countdown_query.php';
  $eventTab = $_GET['eventTab'];
  $absTime = strtotime("now");
?>

<div class="rounded-corners" id="countdown_outer">
  <a href="#">
  <div class="panel_header rounded-topcorners" onclick="animatedcollapse.toggle('feed_outer')">
    <h1>Countdown</h1>
  </div>
  </a>
  <div class="countdown" id="countdown">
    <div id="countdown_notify">
      <?php 
        $_GET['parent_id'] = 'countdown_notify';
        include '/src/php/async_bar.php';
      ?>
    </div>
    <?php
      $currentCounter = 0;
      while($row = mysql_fetch_array($eventTab)) {
        $temp2  = strtotime($row['time']);      // Check if time is within 3 hours
        if((($temp2 - $absTime) < 10830) && (($temp2 - $absTime) > 0)) {

          // INCLUDE EVENT BOX
          $_GET['event_info'] = $row;
          include("/src/php/eventBox_countdown.php");

          $currentCounter = $currentCounter + 1;
        } 
      }
      
      if ($currentCounter == 0) {
    ?>
      <div class="noevents">
        <h2>No events right now! Try adding some!</h2>
      </div>  
    <?php
      }
    ?>
  </div>
</div>
    
    <!-- Setup for timers -->
    <script type="text/javascript">
      window.onload = function() {
      <?php
        include '/src/php/countdown_query.php';
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
      }
    </script>
