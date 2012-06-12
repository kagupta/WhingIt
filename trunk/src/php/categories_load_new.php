<?php
  include 'event_functions.php';
  require('dbconnect.php');
  
  $last_msg_id=$_GET['last_msg_id']; 
  $_GET['mode'] = "new";
  include('categories_query.php');
  $sql = $_GET['sql'];
  $last_msg_id="";

  while($row = mysql_fetch_array($sql)) {	
    $_GET['event_info'] = $row;
    include("eventBox_feed.php");
  }
?>