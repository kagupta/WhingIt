<?php
  include '/src/php/event_functions.php';
  include '/src/php/dbconnect.php';
  
  date_default_timezone_set('America/Los_Angeles');  
  //$eventTab = mysql_query("SELECT * FROM events WHERE time - NOW() > 0 AND DATE_SUB(time,INTERVAL 3 HOUR) < NOW() ORDER BY UNIX_TIMESTAMP(time)");
  $eventTab = mysql_query("SELECT * FROM events ORDER BY time");
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
        $temp2  = strtotime($row['time']);
        if((($temp2 - $absTime) < 10830) && (($temp2 - $absTime) > 0)) {
    ?>
          <div class="eventbox">
            <img src="/res/images/photo.jpg" width="70" height="70" style="margin: 5px 10px 10px 0px; float:left;vertical-align: bottom;">
            
            <h2 class="eventbox_text"> <?php echo $row['name']; ?> </h2>
            <div class="timer" id="timer<?php echo $currentCounter; ?>"></div>
            <?php 
              getAttendees($row['id']);
              echo "<br />";
              getDescription($row['id']); 
            ?>
          </div>
    <?php
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
    
    
    <!-- Setup for timers -->
    <script type="text/javascript">
      window.onload = function() {
      <?php
        //$eventTab = mysql_query("SELECT * FROM events WHERE time - NOW() > 0 AND DATE_SUB(time,INTERVAL 3 HOUR) < NOW() ORDER BY UNIX_TIMESTAMP(time)");
        $eventTab = mysql_query("SELECT * FROM events ORDER BY time");
        $currentCounter = 0;
        while($row = mysql_fetch_array($eventTab)) { 
          $temp2  = strtotime($row['time']);
          if((($temp2 - $absTime) < 10830) && (($temp2 - $absTime) > 0)) {

      ?>
            GetCount(<?php echo "new Date(".date("Y",$temp2).","
                                          .date("m",$temp2).","
                                          .date("d",$temp2).","
                                          .date("H",$temp2).","
                                          .date("i",$temp2).","
                                          .date("s",$temp2).",0),'timer$currentCounter'"; ?>);
      <?php    
            $currentCounter = $currentCounter + 1;
          }
        }
      ?>
      }
    </script>
  </div><!-- end .content -->
</div>