<?php
session_start();
?>

<?php 
$link = mysql_connect('localhost','root',''); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 

mysql_select_db("whingit", $link);
	//MUST SET USERID TO THE CURRENT USER
	if(isset($_SESSION) && isset($_SESSION['id']))
	{
	$userID = $_SESSION['id'];
	$eventID = $_GET['eventID'];
	$attStatus = $_GET['status'];
	$currentStatus = mysql_query("SELECT status FROM attend WHERE attend.id=$eventID AND attend.attendee=$userID");
	$totalRows = mysql_num_rows($currentStatus);
	//get the time of the event to be updated in eventsfeed.
	$result1 = mysql_query("SELECT * FROM events where id = $eventID");	
	$row1 = mysql_fetch_row($result1);
  $timeRow=$row1['time'];
	//mysql_query("INSERT INTO eventsfeed (eventID,time) VALUES ('$i','$row1['time']')");
	switch($totalRows)
	{
 		case 0://in attend table there is no status for the current user
      mysql_query("INSERT INTO attend (id, attendee, status) VALUES ('$eventID','$userID','$attStatus')");
			mysql_query("INSERT INTO eventsfeed (eventID, attendID ,time) VALUES ('$eventID', '$userID','$timeRow')");//update eventsfeed.
			break;
		default:
			$temp = mysql_result($currentStatus, 0, 'status');
			if($temp != $attStatus) {
				mysql_query("DELETE FROM attend WHERE attend.id=$eventID AND attend.attendee=$userID");
				mysql_query("INSERT INTO attend (id, attendee, status) VALUES ('$eventID','$userID','$attStatus')");
				if($attStatus==1)
					mysql_query("INSERT INTO eventsfeed (eventID, attendID,time) VALUES ('$eventID', '$userID','$timeRow')");//update eventsfeed. It means user is now attending the event.
			}
	}
	}
	else
	{
		$status = "FAILURE";
		echo $status;
	}
	

	
?>