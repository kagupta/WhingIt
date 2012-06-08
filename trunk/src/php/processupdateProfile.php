<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
session_start();
?>

<?php

require("dbconnect.php");

$user_password=addslashes($_POST['passwd']);
$email=addslashes($_POST['email']);

$result = MYSQL_QUERY("SELECT * from user WHERE user_email='$email' and user_password='$user_password' ");

$worked = mysql_fetch_row($result);

if($worked)
{
			$name=addslashes($_POST['name']);
			$lname=addslashes($_POST['lname']);
			$age=date("Y")-addslashes($_POST['DOB_Year']);
			$location=addslashes($_POST['country']);
			$email=addslashes($_POST['email']);
			$gender=addslashes($_POST['gender']);
			$user_password=addslashes($_POST['passwd']);
  
      $_SESSION['username'] = $name;
			//echo $name," ",$age," cnrty=== ",$location," ",$interests," ",$email," ",$balance," ",$customer_login," ",$customer_password;
			#integrity test of the information entered ends here

			#Entering the information in the table to sign up
			$sql="UPDATE `user` SET `first_name` = '$name',`last_name` = '$lname', `age` = '$age', `user_location` = '$location', `user_password` = '$user_password', `gender` = '$gender' WHERE `user_email` = '$email' ";
			   

					$result=mysql_query($sql) or die("query failed:".mysql_error());

					$result = MYSQL_QUERY("SELECT id from user WHERE user_email='$email' ");
					$id = mysql_result($result,0,'id');
					
					if($result && $_FILES['userfile']['size'] > 0)
					{	
						$tmpName  = $_FILES['userfile']['tmp_name'];
						$fp      = fopen($tmpName, 'r');
						$content = fread($fp, filesize($tmpName));
						$content = addslashes($content);
						fclose($fp);
						$result = MYSQL_QUERY("SELECT * from uimage WHERE id='$id' ");
						if(mysql_num_rows($result) > 0)
							$query = "UPDATE uimage SET content='$content' WHERE id='$id'";
						else
							$query =  "INSERT INTO uimage (id, content ) VALUES ( '$id', '$content')";
						
						$result=mysql_query($query) or die('Inserting image failed');
						echo $result;
					} 



					if($result)
					{
						   $_SESSION['updated']=1;
						  
						header("Location: ../../index.php");
					} 
			header("Location: ../../index.php");
}
else
{
	$_SESSION['msg']  = "Incorrect Password";
	header("Location: updateProfile.php");

}
require("closedb.php");

?>