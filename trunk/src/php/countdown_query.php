<?php
  require('dbconnect.php');
  $userid = $_SESSION['id'];
  
  //$eventTab = mysql_query("SELECT * FROM events WHERE time - NOW() > 0 AND DATE_SUB(time,INTERVAL 3 HOUR) < NOW() ORDER BY UNIX_TIMESTAMP(time)");
  $eventTab = mysql_query("SELECT * FROM events, attend WHERE sean<>1 AND events.id = attend.id AND attend.attendee = $userid AND attend.status=1 ORDER BY time");
  $_GET['eventTab'] = $eventTab;
?>