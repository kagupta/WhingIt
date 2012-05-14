<?php
session_start();

if(!isset($_SESSION['SESSION'])) require("session_init.php");

include("dbconnect.php");
$loggedin =0 ; 
$username = $_POST["username"];
$password = $_POST["password"];
  


$result = MYSQL_QUERY("SELECT * from customer WHERE customer_login='$username' and customer_password='$password' ")
   or die ("Name and password not found or not matched");

$worked = mysql_fetch_row($result);


if($worked)
   {
   $_SESSION['LOGGEDIN']=1;
   $_SESSION['customer']=true;
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