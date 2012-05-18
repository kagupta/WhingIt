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

echo $eventName;echo "<br />";
echo $datetime;echo "<br />";
echo $location;echo "<br />";
echo $description;echo "<br />";

//adds the event to the event table
mysql_query("INSERT INTO events (name, time, location, creator, description)
VALUES ('$eventName', '$datetime', '$location', 1, '$description')");
echo $lastinsert = mysql_insert_id();
echo "<br />";

//update the events/tags table
foreach ($tags as &$tag){
	mysql_query("INSERT INTO tagLookup (eventID, tagID) VALUES ('$lastinsert' ,'$tag')");
}


//looking at output of events table to see if event was added
echo "Current Events Table";
  echo "<br />";
$result = mysql_query("SELECT * FROM events");

while($row = mysql_fetch_array($result))
  {
  echo $row['id'] . " " . $row['name'] . " " . $row['time'] . " " . $row['location'] . " " . $row['creator'] . " " . $row['description'];
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

mysql_close($link);

echo "Event added!";

?> 