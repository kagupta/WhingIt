<?php
$mode=$_GET['mode']; 
$last_msg_id = $_GET['last_msg_id']; 

switch($mode) {
  case 'first':
    $str = "ORDER BY feedID DESC LIMIT 6";
    break;
  case 'second':
    $str = "WHERE feedID < '$last_msg_id' ORDER BY feedID DESC LIMIT 5";
    break;
  case 'new':
    $str = "WHERE feedID > '$last_msg_id' ORDER BY feedID DESC";
    break;
}

$sql = mysql_query("SELECT * FROM eventsfeed ".$str);
$_GET['sql'] = $sql;
?>