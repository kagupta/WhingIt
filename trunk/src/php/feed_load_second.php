<?php
  include 'event_functions.php';
  require('dbconnect.php');

  $last_msg_id = $_GET['last_msg_id']; 
  $_GET['mode'] = "second";
  $_GET['last_msg_id'] = $last_msg_id; 
  include('feed_query.php');
  $sql = $_GET['sql'];

  while($row = mysql_fetch_array($sql)) {	
    $_GET['event_info'] = $row;
    include("eventBox_feed.php");
	
  }
?>