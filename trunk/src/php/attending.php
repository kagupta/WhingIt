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
	switch($totalRows)
	{
		case 0:
			mysql_query("INSERT INTO attend (id, attendee, status) VALUES ('$eventID','$userID','$attStatus')");
			break;
		default:
			$temp = mysql_result($currentStatus, 0, 'status');
			if($temp != $attStatus) {
				mysql_query("DELETE FROM attend WHERE attend.id=$eventID AND attend.attendee=$userID");
				mysql_query("INSERT INTO attend (id, attendee, status) VALUES ('$eventID','$userID','$attStatus')");
			}
	}
	}
	else
	{
		$status = "FAILURE";
		echo $status;
	}
	

	
?>