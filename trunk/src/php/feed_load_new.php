<?php
  include 'event_functions.php';
  require('dbconnect.php');
  
  $last_msg_id=$_GET['last_msg_id']; 
  $_GET['mode'] = "new";
  include('feed_query.php');
  $sql = $_GET['sql'];
  
  while($row = mysql_fetch_array($sql)) {	
    $_GET['event_info'] = $row;
	$eventID = $row['eventID'];
    include("eventBox_feed.php");
	
  }
  
?>