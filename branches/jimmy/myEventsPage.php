<form action="" name="myEvents" method="post"> 
<table width="450" border="0" cellspacing="0" cellpadding="0"> 

<?php 
//should either redirect to updateEventForm.php or deleteEvent.php on submit
$link = mysql_connect('localhost','root',''); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 

//$user = $_SESSION['id'];
//MUST CHANGE USER ID TO GET CURRENT USERID INSTEAD
$user = 1;
mysql_select_db("whingit", $link);
$result = mysql_query("SELECT * FROM events WHERE creator = '$user'");

$deleteNum = 0;

while($row = mysql_fetch_array($result))
  {

  echo $row['id'] . " " . $row['name'] . "<br />" . $row['time'] . "<br />" . $row['location'] . "<br />";
	?>
	
	<input type="submit" name="update<?php echo $row['id'];?>" value="Update" onclick="document.myEvents.action='updateEventForm.php'">
	<input type="submit" name="delete<?php echo $row['id'];?>" value="Delete" onclick="document.myEvents.action='deleteEvent.php'">
	</td><?php
	echo "<br />";
  }
  
mysql_close($link);
?>
</table>
</form>
<button onclick="window.location.href='createEventForm.php'">Create an Event</button>