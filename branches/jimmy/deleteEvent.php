<?php 
$link = mysql_connect('localhost','root',''); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 
echo 'Connection OK<br />'; 

mysql_select_db("whingit", $link);

	//test: printing out current events table
	echo "Current Events Table";
	  echo "<br />";
	  
	$result = mysql_query("SELECT * FROM events");

	while($row = mysql_fetch_array($result))
	  {
	  echo $row['id'] . " " . $row['name'] . " " . $row['time'] . " " . $row['location'] . " " . $row['creator'];
	  echo "<br />";
	  }
 
$i = 1;
while(1){
	if(isset($_POST['delete' . $i])){
		mysql_query("DELETE FROM events WHERE id =$i");
		break;
	}
	$i++;
}


	//test: printing things out to see what is in events table
	echo "Current Events Table";
	  echo "<br />";
	$result = mysql_query("SELECT * FROM events");

	while($row = mysql_fetch_array($result))
	  {
	  echo $row['id'] . " " . $row['name'] . " " . $row['time'] . " " . $row['location'] . " " . $row['creator'];
	  echo "<br />";
	  }

  
mysql_close($link);
?> 

<button onclick="window.location.href='myEventsPage.php'">Back to Events Page</button>