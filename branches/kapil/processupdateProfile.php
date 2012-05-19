<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
session_start();
?>

<?php

require("dbconnect.php");

			$name=addslashes($_POST['name']);
			$age=date("Y")-addslashes($_POST['DOB_Year']);
			$location=addslashes($_POST['country']);
			$email=addslashes($_POST['email']);
			$gender=addslashes($_POST['gender']);
			$user_password=addslashes($_POST['passwd']);

			//echo $name," ",$age," cnrty=== ",$location," ",$interests," ",$email," ",$balance," ",$customer_login," ",$customer_password;
			#integrity test of the information entered ends here

			#Entering the information in the table to sign up
			$sql="UPDATE `user` SET `age` = '$age', `user_location` = '$location', `user_password` = '$user_password', `gender` = '$gender' WHERE `user_email` = '$email' ";
			   

					$result=mysql_query($sql) or die("query failed:".mysql_error());


					if($result)
					{
						   $_SESSION['updated']=1;
						  
							header("Location: /whingit/trunk/index.php");
					} 
			header("Location: /whingit/trunk/index.php");

require("closedb.php");

?>