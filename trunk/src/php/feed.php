<?php
  require("dbconnect.php");

  //$eventTab  = mysql_query("SELECT * FROM events WHERE TIMEDIFF(time,NOW()) < 0 ORDER BY UNIX_TIMESTAMP(time)");
  $eventTab = mysql_query("SELECT * FROM events WHERE TIMEDIFF(time,NOW()) > 0");
?>

<div class="rounded-corners" id="feed_outer">
  <div class="panel_header" onclick="panel_growshrink('feed','countdown')">
    <h1>What's Happening!?</h1>
  </div>
  
  <div class="feed" id="feed"> 
<?php
    while($row = mysql_fetch_array($eventTab)) {	
?>

      <div class="eventbox">
      <?php
        echo $row['name']; //. " " . $row['LastName'];
        echo "<br />";
        echo $row['location']; 
        echo "<br />";
        echo $row['time'];
        // code to check the logged in user so that the correct attend options are displayed.
        //$user_id=$session->data['user_id'];
        //$checkuser = mysql_query("SELECT * FROM attend where attendee=$user_id")
        echo "<br />";
        echo "<br />";
        getAttendees($row['id']);
      ?>
      </div>	

<?php
    }
?>
</div>
