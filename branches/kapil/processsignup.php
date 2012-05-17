<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
#header("Location: register.php");
session_start();
?>

<?php

require("dbconnect.php");

#user name integrity
#*******************

      if((empty($_POST['email'])==0) || (is_string($_POST['email'])==false))
        {
                $query ="select user_id from customer";
                $result = mysql_query($query) or die(mysql_error());

                $num_results=mysql_num_rows($result);
				
           
                $flag=0;
				
                for($i=0 ; $i<$num_results ; $i++)
                { //echo mysql_result($result,$i,"user_id"),"  ",$_POST['login']; 
                        if(strcmp($_POST['email'],mysql_result($result,$i,"user_email"))==0)
                        {//echo "name is not unique";
                                $flag=1;
								$_SESSION['fail_reg']=1;
								//echo "User email already taken up";
								break;
								
                        }
						header("Location: register.php");
                } 
                if($flag==0)
                {
				     
                      $name=addslashes($_POST['name']);
					$age=date("Y")-addslashes($_POST['DOB_Year']);
					$location=addslashes($_POST['country']);
					$email=addslashes($_POST['email']);
					$balance=addslashes($_POST['balance']);
					$user_id=addslashes($_POST['login']);
					$user_password=addslashes($_POST['passwd']);
					$city=addslashes($_POST['city']);
					$address=addslashes($_POST['streetAddress']);
					$gender=addslashes($_POST['gender']);

					#integrity test of the information entered ends here

					#Entering the information in the table to sign up
				  $query ="INSERT INTO customer ( user_name , age , user_location , email , user_id , user_password, city, address, gender ) 
				  VALUES ("."'$name' ,"."$age ,"." '$location' ,"." '$email' ,"." '$user_id' ,"." '$user_password', "." '$city' ,"." '$address' ,"." '$gender' "." )";
					echo $query;		
					$result=mysql_query($query) or die("query failed:".mysql_error());
			
					
					if($result)
					{
						   $_SESSION['REGISTER']=1;
						  
							header("Location: login.php");
					}
                    else
					{
					   echo "some error occured";
					}
                }

        }



header("Location: login.php");
require("closedb.php");

?>