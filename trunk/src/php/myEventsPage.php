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

include 'sidebar.php';
?>

<div class="content">
<form action="deleteEvent.php" name="myEvents" method="post"> 
<table width="450" border="0" cellspacing="0" cellpadding="0"> 

<?php 
//should either redirect to updateEventForm.php or deleteEvent.php on submit
$link = mysql_connect('localhost','root',''); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 

$user = $_SESSION['id'];
//MUST CHANGE USER ID TO GET CURRENT USERID INSTEAD
//$user = 1;
mysql_select_db("whingit", $link);

$result = mysql_query("SELECT * FROM events WHERE creator = '$user' AND sean<>1");
$num_rows = mysql_num_rows($result);

if($num_rows==0){
	echo 'No events created. Try adding some!';
}
else {
while($row = mysql_fetch_array($result))
  {
  ?>
  <tr><?php $date = date("l F j, Y @ h:i A", strtotime($row['time']));
  ?>
  <td>
	<img  src="/src/php/image.php?eid=<?php echo $row['id'];?>" width="70" height="70" style="margin: 5px 10px 10px 0px; float:left;vertical-align: bottom;">
	</td>
	<td>
  <?php echo $row['name'] . "<br />" . $date . "<br />" . $row['location'] . "<br />";?>
	</td>
	<td>
	<input type="submit" name="update<?php echo $row['id'];?>" value="Update" onclick="document.myEvents.action='updateEventForm.php'">
	<input type="submit" name="delete<?php echo $row['id'];?>" value="Delete" onclick="return confirm('Are you sure you want to delete this event?')">
	</td>
	</tr>
	<?php
  }
}
  
mysql_close($link);
?>
</table>

</form>
<br/>
<button onclick="window.location.href='createEventForm.php'">Create an Event</button>

</div>
<!--Footer begins-->
<?php include("footer.php"); ?>
<!--Footer ends-->