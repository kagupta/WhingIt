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

 include 'sidebar.php';
?>


<script type="text/javascript">
function validateForm()
{

  //check event name entered
  var x=document.forms["createEventForm"]["eventName"].value;
  if (x==null || x=="")
  {
    alert("Event name must be filled out");
    return false;
  }

  //check tags selected
  var len=document.forms["createEventForm"]["tag[]"].length;
  var i=0;
  var select=false;
  for(i=0; i<len;i++)
  {
    if(document.forms["createEventForm"]["tag[]"][i].selected)
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
  var entered_time=document.forms["createEventForm"]["time"].value;
  if (entered_time==null || entered_time=="")
  {
    alert("Event time must be filled out");
    return false;
  }
  
  
  var entered_year = parseInt(document.forms["createEventForm"]["year"].value,10);
  var entered_month = parseInt(document.forms["createEventForm"]["month"].value,10);
  var entered_day = parseInt(document.forms["createEventForm"]["day"].value,10);
  var time_split = entered_time.split(":");
  var entered_hour = parseInt(time_split[0],10);
  var entered_min = parseInt(time_split[1],10);
  if(document.forms["createEventForm"]["ampm"].value == "pm"){
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
  var x=document.forms["createEventForm"]["location"].value;
  if (x==null || x=="")
  {
    alert("Location must be filled out");
    return false;
  }
  
  //check description entered
  var x=document.forms["createEventForm"]["description"].value;
  if (x==null || x=="")
  {
    alert("Description must be filled out");
    return false;
  }
  
}

function toggleStatus() {

	//if(document.forms["createEventForm"]["toggle"].checked){
	
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
		document.forms["createEventForm"]["month"].value= month.slice(-2);
		document.forms["createEventForm"]["day"].value=day.slice(-2);
		document.forms["createEventForm"]["year"].value= date.getFullYear();
		document.forms["createEventForm"]["time"].value=time;
		document.forms["createEventForm"]["ampm"].value=ampm;
		
}
</script>

<?php $result = mysql_query("SELECT * FROM tags"); ?>

<div class="content">
<!-- Calls createEvent.php to add event in form to database on submit -->
<form name = "createEventForm" action="createEvent.php" method="post" onsubmit="return validateForm()"  enctype="multipart/form-data"> 
<table width="400" border="0" cellspacing="2" cellpadding="0" align=center> 
<tr>
  <td height="15"></td>
</tr>
<!--  -->
<tr> 
<td width="29%" class="bodytext">Event name:
</td> 
<td colspan="5" width="71%"><input name="eventName" type="text" id="eventName" size="32">
</td> 
</tr> 

<tr> 
<td class="bodytext">Tags:
</td> 
<td colspan="5"><select name="tag[]" multiple="multiple" size = 10>
<?php 
while($row = mysql_fetch_array($result))
  {
  ?>
  <option value="<?php echo $row['id']; ?>"><?php echo $row['tag'];?></option>
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
<input type="button" class="submit btn primary-btn flex-table-btn js-submit" value="Now" onclick="toggleStatus()" />
</td>
</tr>

<tr>
<td>Date:
</td>
<td colspan="2"> 
<select name=month value=''>
<option value='00'>--</option>
<option value='01'>January</option>
<option value='02'>February</option>
<option value='03'>March</option>
<option value='04'>April</option>
<option value='05'>May</option>
<option value='06'>June</option>
<option value='07'>July</option>
<option value='08'>August</option>
<option value='09'>September</option>
<option value='10'>October</option>
<option value='11'>November</option>
<option value='12'>December</option>
</select>
</td>

<td width="40px">
<select name=day >
<option value='00'>--</option>
<option value='01'>01</option>
<option value='02'>02</option>
<option value='03'>03</option>
<option value='04'>04</option>
<option value='05'>05</option>
<option value='06'>06</option>
<option value='07'>07</option>
<option value='08'>08</option>
<option value='09'>09</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>
</select>
</td>

<td align="right" width="100px">Year(yyyy):</td>
<td>
<input type=text name=year size=2 value=2012>
</td>
</tr>

<tr>
<td class ="bodytext">Time(hh:mm):
</td>
<td width="30px"><input name = "time" type="text" id ="time" size = 4>
</td>
<td width="30px">
<select name = "ampm">
<option value = "am">AM</option>
<option value = "pm">PM</option>
</td>
</tr>

<tr> 
<td class="bodytext">Location:</td> 
<td colspan="5"><input name="location" type="text" id="location" size="32"></td> 
</tr>  

<tr> 
<td class="bodytext">Description:</td> 
<td colspan="5"><textarea name="description" cols="45" rows="6" id="description" class="bodytext"></textarea></td> 
</tr> 

	<tr>
			
			<td class="bodytext">Event Image</td>
			<td colspan="5">
			   <input name="userfile" type="file" id="userfile" >
			</td>
	</tr>

<tr> 
<td class="bodytext"> </td> 
<td align="left" valign="top" colspan="3">
<input type="submit" name="Submit" value="Create"></td> 


</tr> 
</table> 
</form>

</div>
<!--Footer begins-->
<?php include("footer.php");?>
<!--Footer ends-->