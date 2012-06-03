<?php
  include '/src/php/event_functions.php';
  include '/src/php/dbconnect.php';
  
  date_default_timezone_set('America/Los_Angeles');  
  //$eventTab = mysql_query("SELECT * FROM events WHERE time - NOW() > 0 AND DATE_SUB(time,INTERVAL 3 HOUR) < NOW() ORDER BY UNIX_TIMESTAMP(time)");
  $eventTab = mysql_query("SELECT * FROM events ORDER BY time");
  $absTime = strtotime("now");
?>

<div class="rounded-corners" id="countdown_outer">
  <div class="panel_header" onclick="panel_growshrink('countdown','feed')">
    <h1>Countdown</h1>
  </div>
  
  <div class="countdown" id="countdown">
  
    <?php
      if (mysql_num_rows($eventTab) == 0) {
        echo "<div class=\"eventbox\">";
        echo "No events right now! Try adding some!";
        echo "</div>";
      }

      $currentCounter = 0;
      while($row = mysql_fetch_array($eventTab)) {
        $temp2  = strtotime($row['time']);
        if((($temp2 - $absTime) < 10830) && (($temp2 - $absTime) > 0)) {
    ?>
          <div class="eventbox">
            <img src="photo.jpg" width="70" height="70" style="margin: 5px 10px 10px 0px; float:left;vertical-align: bottom;">
          <?php
            echo "<h2 class=\"eventbox_text\">" . $row['name'] . "</h2>";
            echo "<div class=\"timer\" id=\"".$currentCounter."\"></div>";
            getAttendees($row['id']);
            echo "<br />";
            getDescription($row['id']); 
          ?>
          </div>
    <?php
            $currentCounter = $currentCounter + 1;
        } 
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
                                          .date("s",$temp2).",0),'$currentCounter'"; ?>);
      <?php    
            $currentCounter = $currentCounter + 1;
          }
        }
      ?>
      }
    </script>
  </div><!-- end .content -->
</div>