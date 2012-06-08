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
	mysql_query("INSERT INTO attend (id, attendee, status) VALUES ('$eventID','$userID','$attStatus')");
	}
	
	else
	{
		$status = "FAILURE";
		echo $success;
	}
	

	
?>