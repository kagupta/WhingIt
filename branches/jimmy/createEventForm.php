<?php 
$link = mysql_connect('localhost','root',''); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 
mysql_select_db("whingit", $link);

$result = mysql_query("SELECT * FROM tags");

?>

<!-- Calls createEvent.php to add event in form to database on submit -->
<form action="createEvent.php" method="post"> 
<table width="400" border="0" cellspacing="0" cellpadding="0"> 

<!--  -->
<tr> 
<td width="29%" class="bodytext">Event name:
</td> 
<td width="71%"><input name="eventName" type="text" id="eventName" size="32">
</td> 
</tr> 

<tr> 
<td class="bodytext">Tags:
</td> 
<td><select name="tag[]" multiple="multiple" size = 10>
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
<select name=month value=''>Select Month</option>
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

<td>
<select name=day >
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

<td>Year(yyyy)</td>
<td>
<input type=text name=year size=2 value=2012>
</td>
</tr>

<tr>
<td class ="bodytext">Time(hh:mm):
</td>
<td><input name = "time" type="text" id ="time" size = 4>
</td>
<td>
<select name = "ampm">
<option value = "am">AM</option>
<option value = "pm">PM</option>
</td>
</tr>

<tr> 
<td class="bodytext">Location:</td> 
<td><input name="location" type="text" id="location" size="32"></td> 
</tr>  

<tr> 
<td class="bodytext">Description:</td> 
<td><textarea name="description" cols="45" rows="6" id="description" class="bodytext"></textarea></td> 
</tr> 
<tr> 
<td class="bodytext"> </td> 
<td align="left" valign="top">
<input type="submit" name="Submit" value="Create"></td> 


</tr> 
</table> 
</form>
