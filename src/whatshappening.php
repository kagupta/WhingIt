<?php

//connect to the database
$con = mysql_connect("localhost", "root", "root");

if(!$con)
{
	echo "Could not connect";
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("whingit", $con);

$eventTab = mysql_query("SELECT * FROM events");
$attendTab = mysql_query("SELECT * FROM attend");
$userTab = mysql_query("SELECT * FROM user");

//not used
function getAttendees($eventId) {
	$result2 = mysql_query("SELECT DISTINCT user.firstName, user.lastName FROM user INNER JOIN attend ON user.id=attend.attendee AND attend.id=$eventId");
	while($row2 = mysql_fetch_array($result2)) {
		echo $row2['firstName'] . " " . $row2['lastName'];
		echo "<br />";
	}
}

//only 1 people is going
function get1Attendees($eventId) {
	$result2 = mysql_query("SELECT DISTINCT user.firstName, user.lastName FROM user INNER JOIN attend ON user.id=attend.attendee AND attend.id=$eventId");
	while($row2 = mysql_fetch_array($result2)) {
		echo $row2['firstName'] . " " . $row2['lastName']." ";
	}
}

//for only 2 people
function get2Attendees($eventId) {
	$result2 = mysql_query("SELECT DISTINCT user.firstName, user.lastName FROM user INNER JOIN attend ON user.id=attend.attendee AND attend.id=$eventId");
	$count=0;
	while(($row2 = mysql_fetch_array($result2))&& $count<=2) {
		echo $row2['firstName'] . " " . $row2['lastName'];
		$count=$count+1;
		if($count==1)
			echo " and ";
	}
}

//for 2+ people going
function get2plusAttendees($eventId) {
	$result2 = mysql_query("SELECT DISTINCT user.firstName, user.lastName FROM user INNER JOIN attend ON user.id=attend.attendee AND attend.id=$eventId");
	$count=0;
	while(($row2 = mysql_fetch_array($result2))&& $count<=2) {
		echo $row2['firstName'] . " " . $row2['lastName'];
		$count=$count+1;
		if($count!=3)
			echo ", ";
	}
}


while($row = mysql_fetch_array($eventTab))
{	
   echo $row['name']; //. " " . $row['LastName'];
   echo "<br />";
   echo $row['location']; 
   // code to check the logged in user so that the correct attend options are displayed.
   //$user_id=$session->data['user_id'];
   //$checkuser = mysql_query("SELECT * FROM attend where attendee=$user_id")
   $current_eventid=$row['id'];
   echo "<br />";
   $count_Resource= mysql_query("SELECT COUNT(attendee) FROM attend WHERE id=$current_eventid");
   $countAttendee = mysql_result($count_Resource,0);
   if($countAttendee==0)
		echo "No one from the crowds is attending so far. Be the first one!";
   else if($countAttendee==1){ 
		get1Attendees($row['id']);
		echo " will be there.";
   }
   else if($countAttendee==2){ 
		get2Attendees($row['id']);
		echo " will be there.";
   }
   else{
		get2plusAttendees($row['id'],$countAttendee);
		echo " and ".($countAttendee-3)." "." more from the crowds will be there.";
	}
   echo "<br />";
   echo "<br />";
}

mysql_close($con);


?>