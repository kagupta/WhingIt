<?php

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

session_start();

$id = $_GET['eventId'];
?>


	
<?php 
//should redirect to updateEvent.php on submit
$link = mysql_connect('localhost','root',''); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 
mysql_select_db("whingit", $link);


$event = $id;
 $query1 = mysql_query("SELECT * FROM events WHERE id = '$event'");
 $data = mysql_fetch_array($query1);
 
 $query2 = mysql_query("SELECT * FROM description WHERE eventID = '$event'");
 $data2 = mysql_fetch_array($query2);
 
 //getting the tags selected
 $tagsTable = mysql_query("SELECT * FROM tags");
 $eventTagsQuery = mysql_query("SELECT tagID FROM taglookup WHERE eventID = '$event'");
 $eventTagsArray = array();
 while($row = mysql_fetch_array($eventTagsQuery)){
    $eventTagsArray[] = $row['tagID'];
 }

//date parsing variables 
 $phpdate = strtotime($data['time']);
 $ampm = date( 'A', $phpdate );
 $month = date( 'F',$phpdate);
 $day = date('d',$phpdate);
 $year = date('Y', $phpdate);
?>
<title><?php echo $data['name'];?></title>
<div >

<table width="300" border="0" cellspacing="2" cellpadding="0" align=center> 
<input type="hidden" name="eventNumber" value="<?php echo $event?>"/>
<tr> 
<td height="15"></td>
</tr>
<tr>
<td width="29%" class="bodytext"><b>Event name:</p>
</td> 
<td  width="71%"><b><?php echo $data['name']?></p>
</td> 
</tr> 

<tr> 
<td class="bodytext"><b>Tags:</p>
</td> 
<td >
<?php 
while($row = mysql_fetch_array($tagsTable))
  {
	if(in_array($row['id'],$eventTagsArray))
	  {
		echo $row['tag'];
		echo ",";
	  }
 
  }
?>

</td>
</tr>
<tr>
<img  src="/src/php/image.php?eid=<?php echo $id;?>" width="100" height="100" style="margin: 5px 10px 10px 0px; float:left;vertical-align: bottom;">

</tr>

<tr>
<td><b>Date:</p></td>
<td > 
<?php echo "$month, $day, $year" ?>
</td>

</tr>

<tr>
<td class ="bodytext"><b>Time:</p>
</td>
<td width="30px"><?php echo $mysqldate = date( 'h:i', $phpdate ); echo " $ampm" ?>
</td>

</tr>

<tr> 
<td class="bodytext"><b>Location:</p></td> 
<td ><?php echo $data['location']?>
</tr>  

<tr> 
<td class="bodytext"><b>Description:</p></td> 
<td><?php echo $data2['about']?></td> 
</tr> 


<tr> 
<td class="bodytext"> </td> 
<td align="left" valign="top" ></td> 


</tr> 
</table> 

<br/>
