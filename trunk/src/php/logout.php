<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

if(!isset($_SESSION['LOGGEDIN']))
{

}
session_unset();
if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time()-42000, '/');
    }
$loggedin =0 ; 
unset($_SESSION['LOGGEDIN']);
$_SESSION=array();
session_destroy();
unset($_COOKIE[session_name()]); 

@header("Location: ../../index.php");
?>
 