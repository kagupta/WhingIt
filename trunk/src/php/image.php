<?php

$dbServer='localhost';
$dbUser='root';
$dbPass='';
$dbName='whingit';

$link = mysql_connect("$dbServer", "$dbUser", "$dbPass") or die("Could not connect");
mysql_select_db("$dbName") or die("Could not select database");
$id = 0;
 if(isset($_GET["uid"]))
 {
	 $table = "uimage";
	$id = $_GET["uid"];
 }
else if(isset($_GET["eid"]))
{
	$table = "eimage";
	$id = $_GET["eid"];
}

$result = MYSQL_QUERY("SELECT * from ".$table." WHERE id = ".$id);

if(mysql_num_rows($result) == 0)
{  
	$result = MYSQL_QUERY("SELECT * from ".$table." WHERE id = 0");
}
 
if(mysql_num_rows($result) > 0)
{  
	$row = mysql_fetch_array($result);

	header("Content-type: image/jpg");
	echo $row['content'];

}
?>