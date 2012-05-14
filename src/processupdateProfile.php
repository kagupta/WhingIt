<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Location: updateProfile.php");
session_start();
?>

<?php

require("dbconnect.php");

			$name=addslashes($_POST['name']);
			$age=date("Y")-addslashes($_POST['DOB_Year']);
			$location=addslashes($_POST['country']);
			$interests=addslashes($_POST['interests']);
			$email=addslashes($_POST['email']);
			$customer_login=addslashes($_POST['login']);
			$customer_password=addslashes($_POST['passwd']);

			//echo $name," ",$age," cnrty=== ",$location," ",$interests," ",$email," ",$balance," ",$customer_login," ",$customer_password;
			#integrity test of the information entered ends here

			#Entering the information in the table to sign up
			$sql="UPDATE `customer` SET `age` = '$age', `location` = '$location', `email` = '$email', `customer_password` = '$customer_password' WHERE `customer_login` = '$customer_login' ";
			   

					$result=mysql_query($sql) or die("query failed:".mysql_error());


					if($result)
					{
						   $_SESSION['updated']=1;
						  
							header("Location: index.php");
					} 
			header("Location: index.php");

require("closedb.php");

?>