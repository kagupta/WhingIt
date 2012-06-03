<div class="rounded-corners" id="feed_outer">
  <div class="panel_header" onclick="panel_growshrink('feed','countdown')">
    <h1>What's Happening!?</h1>
  </div>
  <div class="feed" id="feed"> 

<?php
  require("dbconnect.php");
  $eventTab = mysql_query("SELECT * FROM events WHERE TIMEDIFF(NOW(),time) > 0 ORDER BY id DESC LIMIT 10");

  while($row = mysql_fetch_array($eventTab)) {	
    $_GET['event_info']=$row;
    include("eventBox_feed.php");
  }
?>

  </div>
</div>