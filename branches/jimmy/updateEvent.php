<?php

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

session_start();

include("header.php");
include("dbconnect.php");

if(isset($_SESSION['email']))
{
	$email=$_SESSION['email'];
	$sql="select * from user where user_email= '$email'";
}
else
{
	header("Location: ../../index.php");
}
$result=mysql_query($sql) or die ("<BR>Error in retrieving data");
$rows=mysql_num_rows($result);


?>
<HTML>
<HEAD>
<META Http-Equiv="Cache-Control" Content="no-cache" /> 
<META Http-Equiv="Pragma" Content="no-cache" /> 
<META Http-Equiv="Expires" Content="0" /> 
<TITLE>Register </TITLE>
	<script LANGUAGE=JavaScript TYPE=text/javascript src="../javascript/check.js"></script>
	
	
</HEAD>

<BODY leftmargin=0 marginwidth=0 marginheight=0 topmargin=0 rightmargin=0 bottommargin=0>

<!--TOP BAR BEGINS-->
<?php 
$link = mysql_connect('localhost','root',''); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 
echo 'Connection OK<br />'; 

mysql_select_db("whingit", $link);

	$eventName = $_POST['eventName'];
	$tags = $_POST['tag'];
	print_r($tags);

	$year = $_POST['year'];
	$month = $_POST['month'];
	$day = $_POST['day'];
	$date = $year . "-" . $month . "-" . $day;

	$ampm = $_POST['ampm'];
	$time2 = $_POST['time'] . " " . $ampm;
	$time = date("H:i:s", strtotime($time2));
	$datetime = $date . " " . $time;

	$location = $_POST['location'];
	$description = $_POST['description'];
	
	$eventID = $_POST['eventNumber'];
	echo $eventID;echo "<br />";
	echo $eventName;echo "<br />";
	echo $datetime;echo "<br />";
	echo $location;echo "<br />";
	echo $description;echo "<br />";
	
	//looking at output of events table to see if event was added
	echo "Current Events Table";
	  echo "<br />";
	$result = mysql_query("SELECT * FROM events");

	while($row = mysql_fetch_array($result))
	  {
	  echo $row['id'] . " " . $row['name'] . " " . $row['time'] . " " . $row['location'] . " " . $row['creator'];
	  echo "<br />";
	  }

	//adds the event to the event table
	mysql_query("UPDATE events SET name='$eventName', time='$datetime', location='$location'
	WHERE id='$eventID'");

	//add about to description table
	mysql_query("UPDATE description SET about='$description'
	WHERE eventID='$eventID'");
	echo "<br />";

	
	//update the events/tags table
	mysql_query("DELETE FROM taglookup WHERE eventID =$eventID");
	foreach ($tags as &$tag){
		mysql_query("INSERT INTO tagLookup (eventID, tagID) VALUES ('$eventID' ,'$tag')");
	}
	

	//looking at output of events table to see if event was added
	echo "Current Events Table";
	  echo "<br />";
	$result = mysql_query("SELECT * FROM events");

	while($row = mysql_fetch_array($result))
	  {
	  echo $row['id'] . " " . $row['name'] . " " . $row['time'] . " " . $row['location'] . " " . $row['creator'];
	  echo "<br />";
	  }
	//testing to see output of taglookup table
	echo "Current tagLookup Table";
	  echo "<br />";
	$result2 = mysql_query("SELECT * FROM tagLookup");
	while($row = mysql_fetch_array($result2))
	  {
	  echo $row['eventID'] . " " . $row['tagID'];
	  echo "<br />";
	  }
	
	echo "Event updated!";

mysql_close($link);
?> 

<button onclick="window.location.href='myEventsPage.php'">Back to Events Page</button>
<!--Footer begins-->
		<table cellspacing=0 cellpadding=0 border=0 align=center width=731>
			<tr>
				<?php include("footer.php");
				?>
			</tr>
		</table>
<!--Footer ends-->