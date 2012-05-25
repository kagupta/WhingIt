<html>
<?php
//connect to the database
$con = mysql_connect("localhost", "root", "");

if(!$con)
{
	echo "Could not connect";
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("whingit", $con);
$eventTab = mysql_query("SELECT * FROM events");
$attendTab = mysql_query("SELECT * FROM attend");
$userTab = mysql_query("SELECT * FROM user");
date_default_timezone_set('America/Los_Angeles');
$time = date('h:i:s a', time());
$time = date("H:i:s", strtotime($time));
//echo $currentDate;
$absTime = strtotime("now");
$currentYear=array();
$currentMonth=array();
$currentDay=array();
$currentHour=array();
$currentMin=array();
$currentSec=array();
$currentCounter = 0;


//function to calculate the time difference
function time_diff($s){ 
    $m=0;$hr=0;$d=0;$td="now"; 
    if($s>59) { 
        $m = (int)($s/60); 
        $s = $s-($m*60); // sec left over 
        $td = "$m min"; 
    } 
    if($m>59){ 
        $hr = (int)($m/60); 
        $m = $m-($hr*60); // min left over nd
        $td = "$hr hr"; if($hr>1) $td .= "s"; 
        if($m>0) $td .= ", $m min"; 
    } 
    if($hr>23){ 
        $d = (int)($hr/24); 
        $hr = $hr-($d*24); // hr left over 
        $td = "$d day"; if($d>1) $td .= "s"; 
        if($d<3){ 
            if($hr>0) $td .= ", $hr hr"; if($hr>1) $td .= "s"; 
        } 
    } 
	$td .= " $s sec";
    return $td; 
}

//function to display people attending events
function getAttendees($eventId) {
	$result2 = mysql_query("SELECT user_name FROM user, attend WHERE user.id=attend.attendee AND attend.id=$eventId");
	$count = 0;
	while($row2 = mysql_fetch_array($result2)) {
		if($count < 3) {
			echo $row2['firstName'] . " " . $row2['lastName'];
			echo "<br />";
		}
		$count = $count + 1;
	}

	if(($count - 2) > 0) {
		$count = $count - 2;
		echo "and " . $count . " others are going";
		echo "<br />";
	}
}

while($row = mysql_fetch_array($eventTab)) {
	//include("final_countdown.php");
	$temp2  = strtotime($row['time']);
	if((($temp2 - $absTime) < 10830) && (($temp2 - $absTime) > 0)) {
		$currentMonth[$currentCounter] = date("m", $temp2);
		$currentYear[$currentCounter] = date("Y", $temp2);
		$currentDay[$currentCounter] = date("d", $temp2);
		$currentHour[$currentCounter] = date("h", $temp2);
		$currentMin[$currentCounter] = date("i", $temp2);
		$currentSec[$currentCounter] = date("s", $temp2);
		
		echo "<br />";
		$currentCounter = $currentCounter + 1;
		echo $row['name'];
		echo "<br />";
		echo time_diff($temp2-$absTime);
		echo "<br />";
		getAttendees($row['id']);
	} 
}
echo "<br />";
//display only those events that are within the threshold of 1 hr
mysql_close($con);
?>

<script type="text/javascript">
   function GetCount(ddate,iid){
      out = "";
      
      dateNow = new Date();
      amount = ddate.getTime() - dateNow.getTime();
      delete dateNow;

      if(amount < 0){
         document.getElementById(iid).innerHTML="Now!";
      }
      else{
         amount = Math.floor(amount/1000) % 86400;
         
         //hours
         hours=Math.floor(amount/3600);
         amount=amount%3600;
         
         //minutes
         mins=Math.floor(amount/60);
         amount=amount%60;
         
         //seconds
         secs=Math.floor(amount);
         
         out += (hours<10) ? "0"+hours : hours;
         out += ":";
         out += (mins<10)  ? "0"+mins  : mins;
         out += ":";
         out += (secs<10)  ? "0"+secs  : secs;
           
         document.getElementById(iid).innerHTML=out;

         setTimeout(function(){GetCount(ddate,iid)}, 1000);
      }
   }
</script>

<script type="text/javascript">
	var year = new Array(<?php echo implode(',',$currentYear); ?>);
	var month = new Array(<?php echo implode(',',$currentMonth); ?>);
	var day = new Array(<?php echo implode(',',$currentDay); ?>);
	var hour = new Array(<?php echo implode(',',$currentHour); ?>);
	var min = new Array(<?php echo implode(',',$currentMin); ?>);
	var sec = new Array(<?php echo implode(',',$currentSec); ?>);
	var countVar = '<?php echo $currentCounter; ?>';
	var i = 0;
	
	window.onload= function(){
	
		//if only 1 event display 1 timer
		if (countVar == 1) {
			GetCount(new Date(year[0],month[0],day[0],hour[0],min[0],sec[0]), 'timer1');

		}
		
		//if 2 events then display 2 timers
		else if(countVar == 2) {
			GetCount(new Date(year[0],month[0],day[0],hour[0],min[0],sec[0]), 'timer1');
			GetCount(new Date(year[1],month[1],day[1],hour[1],min[1],sec[1]), 'timer2');

		}
		
		//if 3+ events then display 3 timers max at a time
		else {
			GetCount(new Date(year[0],month[0],day[0],hour[0],min[0],sec[0]), 'timer1');
			GetCount(new Date(year[1],month[1],day[1],hour[1],min[1],sec[1]), 'timer2');
			GetCount(new Date(year[2],month[2],day[2],hour[2],min[2],sec[2]), 'timer3');

		}

	}
	
</script>
 
<div id="timer1"></div>
<div id="timer2"></div>
<div id="timer3"></div>