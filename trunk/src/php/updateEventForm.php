<?php

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

session_start();

include("header.php");
include("dbconnect.php");

if(isset($_SESSION['email']))
{
	$email=$_SESSION['email'];
	$sql="select * from user where user_email= '$email'";
}
else
{
	header("Location: ../../index.php");
}
$result=mysql_query($sql) or die ("<BR>Error in retrieving data");
$rows=mysql_num_rows($result);

include 'sidebar.php';

?>
<script type="text/javascript">
function validateForm()
{
  //check event name entered
  var x=document.forms["updateEventForm"]["eventName"].value;
  if (x==null || x=="")
  {
    alert("Event name must be filled out");
    return false;
  }
  
  //check tags selected
  var len=document.forms["updateEventForm"]["tag[]"].length;
  var i=0;
  var select=false;
  for(i=0; i<len;i++)
  {
    if(document.forms["updateEventForm"]["tag[]"][i].selected)
	{
	  select = true;
	}
  }
  if (!select)
  {
    alert("Must select tags for event.");
    return false;
  }
  
  //check valid date/time entered
  var entered_time=document.forms["updateEventForm"]["time"].value;
  if (entered_time==null || entered_time=="")
  {
    alert("Event time must be filled out");
    return false;
  }
  
  
  var entered_year = parseInt(document.forms["updateEventForm"]["year"].value,10);
  var entered_month = parseInt(document.forms["updateEventForm"]["month"].value,10);
  var entered_day = parseInt(document.forms["updateEventForm"]["day"].value,10);
  var time_split = entered_time.split(":");
  var entered_hour = parseInt(time_split[0],10);
  var entered_min = parseInt(time_split[1],10);
  if(document.forms["updateEventForm"]["ampm"].value == "pm"){
	 entered_hour = entered_hour + 12;
  }
  var entered = new Date(entered_year, entered_month-1, entered_day, entered_hour, entered_min, 0 , 0);
  var now = new Date();
  entered.setMinutes(entered.getMinutes()+30);
  if (entered<now)
  {
    alert("time is invalid: event in past");
    return false;
  }
  
  //check location entered
  var x=document.forms["updateEventForm"]["location"].value;
  if (x==null || x=="")
  {
    alert("Location must be filled out");
    return false;
  }
  
  //check description entered
  var x=document.forms["updateEventForm"]["description"].value;
  if (x==null || x=="")
  {
    alert("Description must be filled out");
    return false;
  }
  
}

function toggleStatus() {

		var date = new Date();
		var month = '0'+(date.getMonth() + 1);
		var day = '0' +  date.getDate();
		var hour = date.getHours();
		var mins = '0' + date.getMinutes();
		var ampm = 'am';
		if(hour>12){
			ampm='pm';
			hour = hour - 12;
		}
		else if(hour == 12) {
			ampm='pm';
		}
		else if(hour<1){
			hour=12;
		}
		var time = hour + ':' + mins.slice(-2);
		document.forms["updateEventForm"]["month"].value= month.slice(-2);
		document.forms["updateEventForm"]["day"].value=day.slice(-2);
		document.forms["updateEventForm"]["year"].value= date.getFullYear();
		document.forms["updateEventForm"]["time"].value=time;
		document.forms["updateEventForm"]["ampm"].value=ampm;

}
</script>
	
<?php 
//should redirect to updateEvent.php on submit
$link = mysql_connect('localhost','root',''); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 
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

<div class="content">

<form name = "updateEventForm" action="updateEvent.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data"> 
<table width="400" border="0" cellspacing="2" cellpadding="0" align=center> 
<input type="hidden" name="eventNumber" value="<?php echo $event?>"/>
<tr> 
<td height="15"></td>
</tr>
<tr>
<td width="29%" class="bodytext">Event name:
</td> 
<td colspan="5" width="71%"><input name="eventName" value = "<?php echo $data['name']?>" type="text" id="eventName" size="32">
</td> 
</tr> 

<tr> 
<td class="bodytext">Tags:
</td> 
<td colspan="5"><select name="tag[]" multiple="multiple" size = 10>
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
Use Current Time/Date:
</td>
<td>
<!-- <input id="toggleElement" type="button" name="toggle" value="Now" onclick="toggleStatus()" /> -->
<input type="button" value="Now" onclick="toggleStatus()" />
</td>
</tr>

<tr>
<td>Date:</td>
<td colspan="2"> 
<select name=month value=''>
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

<td width="40px">
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

<td align="right" width="100px">Year(yyyy)</td>
<td>
<input type=text name=year size=2 value = "<?php echo $year?>">
</td>
</tr>

<tr>
<td class ="bodytext">Time(hh:mm):
</td>
<td width="30px"><input name = "time" value = "<?php echo $mysqldate = date( 'h:i', $phpdate );?>"type="text" id ="time" size = 4>
</td>
<td width="30px">
<select name = "ampm">
<option value = "am" <?php if ($ampm =="AM") echo "selected = 'selected'"; ?>>AM</option>
<option value = "pm" <?php if ($ampm =="PM") echo "selected = 'selected'"; ?>>PM</option>
</td>
</tr>

<tr> 
<td class="bodytext">Location:</td> 
<td colspan="5"><input name="location" value = "<?php echo $data['location']?>" type="text" id="location" size="32"></td> 
</tr>  

<tr> 
<td class="bodytext">Description:</td> 
<td><textarea name="description" type="text "cols="45" rows="6" id="description" class="bodytext"><?php echo $data2['about']?></textarea></td> 
</tr> 

	<tr>
			
			<td class="bodytext">Event Image</td>
			<td colspan="5">
			   <input name="userfile" type="file" id="userfile" >
			</td>
	</tr>

<tr> 
<td class="bodytext"> </td> 
<td align="left" valign="top" colspan="3"><input type="submit" name="update" value="Update"></td> 


</tr> 
</table> 
</form>
<br/>
<td></td>
<button onclick="window.location.href='myEventsPage.php'">Back to My Events</button>

</div>

<!--Footer begins-->
<?php include("footer.php");?>
<!--Footer ends-->
