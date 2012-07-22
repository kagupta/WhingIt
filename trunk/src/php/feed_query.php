<?php
$mode=$_GET['mode']; 
$last_msg_id = $_GET['last_msg_id']; 

switch($mode) {
  case 'first':
    $str = "group by eventID ORDER BY maxfeedID DESC LIMIT 4";
    break;
  case 'second':
	if($last_msg_id == 0)
	  $last_msg_id = 9999; //hack
    $str = "WHERE feedID < 999999 group by eventID ORDER BY maxfeedID DESC LIMIT 15";
    break;
  case 'new':
    if($last_msg_id == "")
	  $last_msg_id = 0; //hack
    $str = "WHERE feedID > 0 group by eventID ORDER BY maxfeedID DESC";
    break;
}

$sql = mysql_query("SELECT  max(feedID) as maxfeedID, eventID, attendID FROM eventsfeed ".$str);

$_GET['sql'] = $sql;
?>