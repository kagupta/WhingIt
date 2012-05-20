<form action="deleteEvent.php" method="post"> 
<table width="400" border="0" cellspacing="0" cellpadding="0"> 

<?php 
$link = mysql_connect('localhost','root',''); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 

//$user = $_SESSION['id'];
$user = 1;
mysql_select_db("whingit", $link);
$result = mysql_query("SELECT * FROM events WHERE creator = '$user'");

$deleteNum = 0;
while($row = mysql_fetch_array($result))
  {
  echo $row['id'] . " " . $row['name'] . "<br />" . $row['time'] . "<br />" . $row['location'] . "<br />";
	?><input type="submit" name="delete<?php echo $row['id'];?>" value="Delete"></td><?php
	echo "<br />";
  }
  
mysql_close($link);
?>

