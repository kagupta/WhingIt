<?php

$dbServer='localhost';
$dbUser='root';
$dbPass='';
$dbName='whingit';

$link = mysql_connect("$dbServer", "$dbUser", "$dbPass") or die("Could not connect");
mysql_select_db("$dbName") or die("Could not select database");

 if(isset($_GET["uid"]))
 {
	 $database = "uimage";
	$id = $_GET["uid"];
 }
else if(isset($_GET["eid"]))
{
	$database = "eimage";
	$id = $_GET["eid"];
}
else
{
	echo "Called image.php with invalid arguments";
}
$result = MYSQL_QUERY("SELECT * from ".$database." WHERE id = ".$id)
   or die(mysql_error());

$row = mysql_fetch_array($result);

header("Content-type: image/jpg");
echo $row['content'];


?>