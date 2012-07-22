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

 include 'sidebar.php'
?>

<div class="content">
<!--TOP BAR BEGINS-->
<?php 
$link = mysql_connect('localhost','root',''); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 
echo 'Connection OK<br />'; 

$worked = mysql_select_db("whingit", $link);

 
if($worked){
$i = 1;
while(1){
	if(isset($_POST['delete' . $i])){
	//	mysql_query("DELETE FROM events WHERE id =$i");
		mysql_query("UPDATE events SET sean=1 WHERE id=$i");
    $result1 = mysql_query("SELECT * FROM events WHERE id='$i'");	
    $row1 = mysql_fetch_array($result1);
    $chen = $row1['time'];
    mysql_query("INSERT INTO eventsfeed (eventID,time)
    VALUES ('$i','$chen')");
	
		break;
	}
	$i++;
}

$_SESSION['msg']="Event Deleted!";
header("Location: myEventsPage.php");

  
mysql_close($link);
}

else {
	$_SESSION['msg'] = "Error. Try Again.";
	header("Location: myEventsPage.php");
}
?> 

<button onclick="window.location.href='myEventsPage.php'">Back to Events Page</button>
</div>
<!--Footer begins-->

				<?php include("footer.php");?>

<!--Footer ends-->