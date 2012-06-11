<?php
  require('dbconnect.php');
  
  //$eventTab = mysql_query("SELECT * FROM events WHERE time - NOW() > 0 AND DATE_SUB(time,INTERVAL 3 HOUR) < NOW() ORDER BY UNIX_TIMESTAMP(time)");
  $eventTab = mysql_query("SELECT * FROM events ORDER BY time");
  $_GET['eventTab'] = $eventTab;
?>