<?php
  include './src/php/event_functions.php';
  $con = mysql_connect("localhost", "root", "");    //connect to the database

  if(!$con){
    echo "Could not connect";
    die('Could not connect: ' . mysql_error());
  }

  mysql_select_db("whingit", $con);
  
  date_default_timezone_set('America/Los_Angeles');  
  //$eventTab = mysql_query("SELECT * FROM events WHERE time - NOW() > 0 AND DATE_SUB(time,INTERVAL 3 HOUR) < NOW() ORDER BY UNIX_TIMESTAMP(time)");
  $eventTab = mysql_query("SELECT * FROM events");
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
          <?php
            echo $row['name'];
            echo "<div id=\"".$currentCounter."\"></div>";
            echo "<br />";
            echo "<br />";
            getAttendees($row['id']);
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
        $eventTab = mysql_query("SELECT * FROM events");
        $currentCounter = 0;
        while($row = mysql_fetch_array($eventTab)) { 
          
          $temp2  = strtotime($row['time']);
          if((($temp2 - $absTime) < 10830) && (($temp2 - $absTime) > 0)) {

      ?>
            GetCount(<?php echo "new Date(".date("Y",$temp2).","
                                          .date("m",$temp2).","
                                          .date("d",$temp2).","
                                          .date("h",$temp2).","
                                          .date("i",$temp2).","
                                          .date("s",$temp2)."),'$currentCounter'"; ?>);
      <?php    
            $currentCounter = $currentCounter + 1;
          }
        }
      ?>
      }
    </script>
  </div><!-- end .content -->
</div>