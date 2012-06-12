<?php
  require('dbconnect.php');
  
  $mode = $_GET['mode'];
  $compare = "<";
  
  if ($mode == 'feed'){
    $compare = "<";
	//$sql = mysql_query("SELECT * FROM eventsfeed WHERE TIMEDIFF(NOW(),time) ".$compare." 0"); 
	$sql = mysql_query("SELECT * FROM eventsfeed ORDER BY feedID DESC"); 
  }
  else {
	$sql = mysql_query("SELECT * FROM eventsfeed WHERE TIMEDIFF(NOW(),time) > 0 AND DATE_SUB(time,INTERVAL 3 HOUR) < NOW() ORDER BY UNIX_TIMESTAMP(time)");
    $compare = "<";
  } 
  //$sql = mysql_query("SELECT * FROM eventsfeed WHERE TIMEDIFF(NOW(),time) ".$compare." 0");
  $num_rows = mysql_num_rows($sql);
  echo $num_rows; 
?>