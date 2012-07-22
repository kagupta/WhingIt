<?php

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

session_start();

$id = $_GET['id'];
?>


	
<?php 
//should redirect to updateEvent.php on submit
$link = mysql_connect('localhost','root',''); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 
mysql_select_db("whingit", $link);

 $query1 = mysql_query("SELECT * FROM user WHERE id = '$id'");
 $data = mysql_fetch_array($query1);
 
 ?>
<title><?php echo "User Profile" ; ?></title>
<div >

<table width="300" border="0" cellspacing="2" cellpadding="0" align=center> 
<tr> 
<td height="15"></td>
</tr>
<tr>
<img  src="/src/php/image.php?uid=<?php echo $id;?>" width="100" height="100" style="margin: 5px 10px 10px 0px; float:left;vertical-align: bottom;">

</tr>
<tr>
<td width="29%" class="bodytext"><b>Name:</p>
</td> 
<td  width="71%"><b><?php echo $data['first_name']; echo $data['last_name'];?></p>
</td> 
</tr> 

<tr>
<td width="29%" class="bodytext"><b>City:</p>
</td> 
<td  width="71%"><b><?php echo $data['city'];?></p>
</td> 
</tr> 

<tr>
<td width="29%" class="bodytext"><b>Email:</p>
</td> 
<td  width="71%"><b><?php echo $data['user_email']; ?></p>
</td> 
</tr> 

<tr>
<td width="29%" class="bodytext"><b>Gender:</p>
</td> 
<td  width="71%"><b><?php if(strcmp($data['gender'], "m")==0) echo "Male" ; else echo "Female" ; ?></p>
</td> 
</tr> 
</table> 

<br/>
