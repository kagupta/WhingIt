<?php
  include 'event_functions.php';
  require('dbconnect.php');

  $last_msg_id=$_GET['last_msg_id']; 
  $sql = mysql_query("SELECT * FROM events WHERE TIMEDIFF(NOW(),time) > 0 AND id < '$last_msg_id' ORDER BY id DESC LIMIT 5");
  $last_msg_id="";

  while($row = mysql_fetch_array($sql)) {	
    $_GET['event_info']=$row;
    include("eventBox_feed.php");
  }
?>