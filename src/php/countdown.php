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
$currentDate = date("Y-m-d", strtotime($time));
$absTime = strtotime("now");

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
        $m = $m-($hr*60); // min left over 
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
    return $td; 
}

//function to display people attending events
function getAttendees($eventId) {
	$result2 = mysql_query("SELECT DISTINCT user.firstName, user.lastName FROM user INNER JOIN attend ON user.id=attend.attendee AND attend.id=$eventId");
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
	}
}

while($row = mysql_fetch_array($eventTab))
{	
	$temp2  = strtotime($row['time']);
	if((($temp2 - $absTime) < 43200) && (($temp2 - $absTime) > 0)) {
		echo "<br />";
		echo $row['name'];
		echo "<br />";
		echo time_diff($temp2-$absTime);
		echo "<br />";
		getAttendees($row['id']);
	} 
}
//display only those events that are within the threshold of 1 hr
mysql_close($con);
?>