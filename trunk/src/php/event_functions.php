<?php
  //function to display people attending events and description
  function getDescription($eventId) {
    $desc = mysql_query("SELECT about FROM description WHERE eventID=$eventId");
    echo mysql_result($desc,0,'about');
  }

  //function to display people attending events
  function getAttendees($eventId) {
	$status = 1;
    $users = mysql_query("SELECT first_name FROM user, attend WHERE user.id=attend.attendee AND attend.id=$eventId AND attend.status=$status");
    $total = mysql_num_rows($users);
    
    switch($total) {
      case 0: // No one is going
        echo "No one";
        break;
      case 1: // One person going
        echo mysql_result($users,0,'first_name');
        break;
      case 2: // Two people going
        $count = 0;
        while($row = mysql_fetch_array($users)) {
          echo $row['first_name'];
          if($count == 0)
            echo " and ";
          
          $count = $count + 1;
        }
        break;
      default: // Three or more going
        $count = 0;
        while($row = mysql_fetch_array($users)) {
          if($count > 1) break;
          
          echo $row['first_name'] . ", ";
          $count = $count + 1;
        }
        $rem = $total - 2;
        $others = $rem == 1 ? "other" : "others";
        
        echo "and " . $rem . " " . $others;
        break;
    }
    
    $is_are = $total < 2 ? "is" : "are";
    echo " " . $is_are . " going.";
  }
?>