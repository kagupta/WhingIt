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

</div>
<!--Footer begins-->
<?php include("footer.php"); ?>
<!--Footer ends-->