<?php
session_start();

if(!isset($_SESSION['SESSION'])) require("session_init.php");

include("dbconnect.php");
$loggedin =0 ; 
$user_email = $_POST["email"];
$password = $_POST["password"];
  


$result = MYSQL_QUERY("SELECT * from user WHERE user_email='$user_email' and user_password='$password' ")
   or die ("Name and password not found or not matched");

$worked = mysql_fetch_row($result);



if($worked)
   {
   $_SESSION['LOGGEDIN']=1;
   $sql="Select id from user where user_email='$user_email' and user_password='$password'  ";
   $result=mysql_query($sql) or die("query failed:".mysql_error());
   
   $_SESSION['id'] = mysql_result($result,0,'id');
   $_SESSION['username']=$_POST["username"];
  
   $loggedin =1 ; 
   
	header("Location: index.php");

	exit;
   }
else
   {
	header("Location: login.php?flg=1");
	exit;
  }

?>