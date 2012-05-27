<?php 
//should redirect to updateEvent.php on submit
$link = mysql_connect('localhost','root',''); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 
echo 'Connection OK<br />'; 

mysql_select_db("whingit", $link);

//MUST CHANGE EVENT variable!!!
$i = 0;
while(1){
	if(isset($_POST['update' . $i])){
		break;
	}
	$i++;
}
$event = $i;
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



<form action="updateEvent.php" method="post"> 
<table width="400" border="0" cellspacing="0" cellpadding="0"> 
<input type="hidden" name="eventNumber" value="<?php echo $event?>"/>
<tr> 
<td width="29%" class="bodytext">Event name:
</td> 
<td width="71%"><input name="eventName" value = "<?php echo $data['name']?>" type="text" id="eventName" size="32">
</td> 
</tr> 

<tr> 
<td class="bodytext">Tags:
</td> 
<td><select name="tag[]" multiple="multiple" size = 5>
<?php 
while($row = mysql_fetch_array($tagsTable))
  {
  ?>
  <option value="<?php echo $row['id'];?>" 
	<?php if(in_array($row['id'],$eventTagsArray)) echo "selected = 'selected'";?>
	>
	<?php echo $row['tag'];?>
  </option>
  <?php
  }
?>
</select> 
</td>
</tr>


<tr>
<td> 
<select name=month value='
<?php 
//$row['time']
?>'>
Select Month</option>
<option value='01'<?php if ($month =="January") echo "selected = 'selected'"; ?>>January</option>
<option value='02'<?php if ($month =="February") echo "selected = 'selected'"; ?>>February</option>
<option value='03'<?php if ($month =="March") echo "selected = 'selected'"; ?>>March</option>
<option value='04'<?php if ($month =="April") echo "selected = 'selected'"; ?>>April</option>
<option value='05'<?php if ($month =="May") echo "selected = 'selected'"; ?>>May</option>
<option value='06'<?php if ($month =="June") echo "selected = 'selected'"; ?>>June</option>
<option value='07'<?php if ($month =="July") echo "selected = 'selected'"; ?>>July</option>
<option value='08'<?php if ($month =="August") echo "selected = 'selected'"; ?>>August</option>
<option value='09'<?php if ($month =="September") echo "selected = 'selected'"; ?>>September</option>
<option value='10'<?php if ($month =="October") echo "selected = 'selected'"; ?>>October</option>
<option value='11'<?php if ($month =="November") echo "selected = 'selected'"; ?>>November</option>
<option value='12'<?php if ($month =="December") echo "selected = 'selected'"; ?>>December</option>
</select>
</td>

<td>
<select name=day >
<option value='01'<?php if ($day =="01") echo "selected = 'selected'"; ?>>01</option>
<option value='02'<?php if ($day =="02") echo "selected = 'selected'"; ?>>02</option>
<option value='03'<?php if ($day =="03") echo "selected = 'selected'"; ?>>03</option>
<option value='04'<?php if ($day =="04") echo "selected = 'selected'"; ?>>04</option>
<option value='05'<?php if ($day =="05") echo "selected = 'selected'"; ?>>05</option>
<option value='06'<?php if ($day =="06") echo "selected = 'selected'"; ?>>06</option>
<option value='07'<?php if ($day =="07") echo "selected = 'selected'"; ?>>07</option>
<option value='08'<?php if ($day =="08") echo "selected = 'selected'"; ?>>08</option>
<option value='09'<?php if ($day =="09") echo "selected = 'selected'"; ?>>09</option>
<option value='10'<?php if ($day =="10") echo "selected = 'selected'"; ?>>10</option>
<option value='11'<?php if ($day =="11") echo "selected = 'selected'"; ?>>11</option>
<option value='12'<?php if ($day =="12") echo "selected = 'selected'"; ?>>12</option>
<option value='13'<?php if ($day =="13") echo "selected = 'selected'"; ?>>13</option>
<option value='14'<?php if ($day =="14") echo "selected = 'selected'"; ?>>14</option>
<option value='15'<?php if ($day =="15") echo "selected = 'selected'"; ?>>15</option>
<option value='16'<?php if ($day =="16") echo "selected = 'selected'"; ?>>16</option>
<option value='17'<?php if ($day =="17") echo "selected = 'selected'"; ?>>17</option>
<option value='18'<?php if ($day =="18") echo "selected = 'selected'"; ?>>18</option>
<option value='19'<?php if ($day =="19") echo "selected = 'selected'"; ?>>19</option>
<option value='20'<?php if ($day =="20") echo "selected = 'selected'"; ?>>20</option>
<option value='21'<?php if ($day =="21") echo "selected = 'selected'"; ?>>21</option>
<option value='22'<?php if ($day =="22") echo "selected = 'selected'"; ?>>22</option>
<option value='23'<?php if ($day =="23") echo "selected = 'selected'"; ?>>23</option>
<option value='24'<?php if ($day =="24") echo "selected = 'selected'"; ?>>24</option>
<option value='25'<?php if ($day =="25") echo "selected = 'selected'"; ?>>25</option>
<option value='26'<?php if ($day =="26") echo "selected = 'selected'"; ?>>26</option>
<option value='27'<?php if ($day =="27") echo "selected = 'selected'"; ?>>27</option>
<option value='28'<?php if ($day =="28") echo "selected = 'selected'"; ?>>28</option>
<option value='29'<?php if ($day =="29") echo "selected = 'selected'"; ?>>29</option>
<option value='30'<?php if ($day =="30") echo "selected = 'selected'"; ?>>30</option>
<option value='31'<?php if ($day =="31") echo "selected = 'selected'"; ?>>31</option>
</select>
</td>

<td>Year(yyyy)</td>
<td>
<input type=text name=year size=2 value = "<?php echo $year?>">
</td>
</tr>

<tr>
<td class ="bodytext">Time(hh:mm):
</td>
<td><input name = "time" value = "<?php echo $mysqldate = date( 'h:i', $phpdate );?>"type="text" id ="time" size = 4>
</td>
<td>
<select name = "ampm">
<option value = "am" <?php if ($ampm =="AM") echo "selected = 'selected'"; ?>>AM</option>
<option value = "pm" <?php if ($ampm =="PM") echo "selected = 'selected'"; ?>>PM</option>
</td>
</tr>

<tr> 
<td class="bodytext">Location:</td> 
<td><input name="location" value = "<?php echo $data['location']?>" type="text" id="location" size="32"></td> 
</tr>  

<tr> 
<td class="bodytext">Description:</td> 
<td><textarea name="description" type="text "cols="45" rows="6" id="description" class="bodytext"><?php echo $data2['about']?></textarea></td> 
</tr> 
<tr> 
<td class="bodytext"> </td> 
<td align="left" valign="top"><input type="submit" name="update" value="Update"></td> 


</tr> 
</table> 
</form>

<button onclick="window.location.href='myEventsPage.php'">Back to My Events</button>