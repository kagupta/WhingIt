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

$worked = mysql_select_db("whingit", $link);

if($worked){
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
	
	//adds the event to the event table
	mysql_query("UPDATE events SET name='$eventName', time='$datetime', location='$location'
	WHERE id='$eventID'");
    
	//add update to eventsfeed
	mysql_query("INSERT INTO eventsfeed (eventID, time) VALUES ('$eventID', '$datetime')");
	
	//add about to description table
	mysql_query("UPDATE description SET about='$description'
	WHERE eventID='$eventID'");
	echo "<br />";

	
	//update the events/tags table
	mysql_query("DELETE FROM taglookup WHERE eventID =$eventID");
	foreach ($tags as &$tag){
		mysql_query("INSERT INTO tagLookup (eventID, tagID) VALUES ('$eventID' ,'$tag')");
	}
	




   // updating image
   // $id = event id that we are currently updating
   if($_FILES['userfile']['size'] > 0)
			{	
				$tmpName  = $_FILES['userfile']['tmp_name'];
				$fp      = fopen($tmpName, 'r');
				$content = fread($fp, filesize($tmpName));
				$content = addslashes($content);
				fclose($fp);
				$result = MYSQL_QUERY("SELECT * from eimage WHERE id='$eventID' ");
				if(mysql_num_rows($result) > 0)
					$query = "UPDATE eimage SET content='$content' WHERE id='$eventID'";
				else
					$query =  "INSERT INTO eimage (id, content ) VALUES ( '$eventID', '$content')";
				
				$result=mysql_query($query) or die('Updating event image failed');
				echo $result;
			} 

	$_SESSION['updateEvent']=1;
	header("Location: myEventsPage.php");


mysql_close($link);
}

else {
	$_SESSION['msg'] = "Error. Try Again.";
	header("Location: updateEventForm.php");
}
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