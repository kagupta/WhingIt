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
<div class="eventbox eventbox_feed">
<table width="300" border="0" cellspacing="2" cellpadding="0" align=center> 
<input type="hidden" name="eventNumber" value="<?php echo $event?>"/>
<tr> 
<td height="15"></td>
</tr>
<tr>
<td width="29%" class="bodytext">Event name:
</td> 
<td colspan="5" width="71%"><p><?php echo $data['name']?></p>
</td> 
</tr> 

<tr> 
<td class="bodytext">Tags:
</td> 
<td colspan="5">
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
<td>Date:</td>
<td > 
<?php echo "$month, $day, $year" ?>
</td>

</tr>

<tr>
<td class ="bodytext">Time:
</td>
<td width="30px"><?php echo $mysqldate = date( 'h:i', $phpdate ); echo " $ampm" ?>
</td>

</tr>

<tr> 
<td class="bodytext">Location:</td> 
<td colspan="5"><?php echo $data['location']?>
</tr>  

<tr> 
<td class="bodytext">Description:</td> 
<td><?php echo $data2['about']?></td> 
</tr> 


<tr> 
<td class="bodytext"> </td> 
<td align="left" valign="top" colspan="3"></td> 


</tr> 
</table> 
</form>
<br/>
<td></td>

</div>

<p><a href="javascript:window.close()">Close</a></p>
