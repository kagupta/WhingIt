<script type="text/javascript" src="/src/javascript/Timer.js"></script>

<?php
   //connect to the database
   $con = mysql_connect("localhost", "root", "");

   if(!$con)
   {
      echo "Could not connect";
      die('Could not connect: ' . mysql_error());
   }

   mysql_select_db("whingit", $con);
   $eventTab = mysql_query("SELECT * FROM events");
   $attendTab = mysql_query("SELECT * FROM attend");
   //$userTab = mysql_query("SELECT * FROM user");
   date_default_timezone_set('America/Los_Angeles');
   $time = date('h:i:s a', time());
   $time = date("H:i:s", strtotime($time));
   $absTime = strtotime("now");
   $currentYear  = array();
   $currentMonth = array();
   $currentDay   = array();
   $currentHour  = array();
   $currentMin   = array();
   $currentSec   = array();

   //function to display people attending events
   function getAttendees($eventId) {
      $result2 = mysql_query("SELECT user_name FROM user, attend WHERE user.id=attend.attendee AND attend.id=$eventId");
      $count = 0;
      while($row2 = mysql_fetch_array($result2)) {
         if($count < 2) {
            echo $row2['user_name'].", ";
         }
         $count = $count + 1;
      }

      if(($count - 1) > 0) {
         $count = $count - 1;
         echo "and " . $count . " others are going";
      }
   }
?>

   <!--------------------------------
    Loop through each event
    --------------------------------->
<?php
   $currentCounter = 0;
   while($row = mysql_fetch_array($eventTab)) {
      //include("final_countdown.php");
      $temp2  = strtotime($row['time']);
      if((($temp2 - $absTime) < 10830) && (($temp2 - $absTime) > 0)) {
         $event_id = $row['id'];
         
         echo $row['name'];
?>
         <div id="<?php echo $currentCounter ?>"></div>
<?php
         getAttendees($row['id']);
         echo "<br />";
         
         $count_res = mysql_query("SELECT COUNT(attendee) FROM attend WHERE attend.id=$event_id");
         $total = mysql_result($count_res,0);
         $is_are = $total == 1 ? "is" : "are";
         echo $is_are.$total;
         echo "<br />";
         echo "<br />";
         $currentCounter = $currentCounter + 1;
      } 
   }
?>

<script type="text/javascript">
   window.onload = function() {
   <?php
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
   
<?php mysql_close($con); ?>

