<?php                                                           
$dbServer='localhost';
$dbUser='root';
$dbPass='';
$dbName='whingit';

$link = mysql_connect("$dbServer", "$dbUser", "$dbPass") or die("Could not connect");
mysql_select_db("$dbName") or die("Could not select database");

?>
 