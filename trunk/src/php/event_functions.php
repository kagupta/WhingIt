<?php
  //function to display people attending events
  function getAttendees($eventId) {
    $users = mysql_query("SELECT user_name FROM user, attend WHERE user.id=attend.attendee AND attend.id=$eventId");
    $total = mysql_num_rows($users);
    
    switch($total) {
      case 0: // No one is going
        echo "No one";
        break;
      case 1: // One person going
        echo mysql_result($users,0,'user_name');
        break;
      case 2: // Two people going
        $count = 0;
        while($row = mysql_fetch_array($users)) {
          echo $row['user_name'];
          if($count == 0)
            echo " and ";
          
          $count = $count + 1;
        }
        break;
      default: // Three or more going
        $count = 0;
        while($row = mysql_fetch_array($users)) {
          if($count > 1) break;
          
          echo $row['user_name'] . ", ";
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
  
  //not used
  //function getAttendees($eventId) {
  //  $result2 = mysql_query("SELECT DISTINCT user_name FROM user INNER JOIN attend ON user.id=attend.attendee AND attend.id=$eventId");
  //  while($row2 = mysql_fetch_array($result2)) {
  //    echo $row2['user_name'];
  //    echo "<br />";
  //  }
  //}

  /*
  //only 1 people is going
  function get1Attendees($eventId) {
    $result2 = mysql_query("SELECT DISTINCT user_name FROM user INNER JOIN attend ON user.id=attend.attendee AND attend.id=$eventId");
    while($row2 = mysql_fetch_array($result2)) {
      echo $row2['user_name'];
    }
  }

  //for only 2 people
  function get2Attendees($eventId) {
    $result2 = mysql_query("SELECT DISTINCT user_name FROM user INNER JOIN attend ON user.id=attend.attendee AND attend.id=$eventId");
    $count=0;
    while(($row2 = mysql_fetch_array($result2))&& $count<=2) {
      echo $row2['user_name'];
      $count=$count+1;
      if($count==1)
        echo " and ";
    }
  }

  //for 2+ people going
  function get2plusAttendees($eventId) {
    $result2 = mysql_query("SELECT DISTINCT user_name FROM user INNER JOIN attend ON user.id=attend.attendee AND attend.id=$eventId");
    $count=0;
    while(($row2 = mysql_fetch_array($result2))&& $count<=2) {
      echo $row2['user_name'];
      $count=$count+1;
      if($count!=3)
        echo ", ";
    }
  }*/
?>