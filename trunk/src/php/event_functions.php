<?php
  //function to display people attending events and description
  function getDescription($eventId) {
    $desc = mysql_query("SELECT about FROM description WHERE eventID=$eventId");
    echo mysql_result($desc,0,'about');
  }

  //function to display people attending events
  function getAttendees($eventId) {
	$status = 1;
    $users = mysql_query("SELECT first_name, user.id FROM user, attend WHERE user.id=attend.attendee AND attend.id=$eventId AND attend.status=$status");
    $total = mysql_num_rows($users);
    
    switch($total) {
      case 0: // No one is going
        echo "No one";
        break;
      case 1: // One person going
	    echo '<a href="/src/php/displayUserInfo.php?id='.mysql_result($users,0,'id').'" rel="facebox" >';
        echo mysql_result($users,0,'first_name');
		echo '</a>';
        break;
      case 2: // Two people going
        $count = 0;
        while($row = mysql_fetch_array($users)) {
		 echo '<a href="/src/php/displayUserInfo.php?id='. $row['id'].'" rel="facebox" >';
          echo $row['first_name'];
		  echo '</a>';
          if($count == 0)
            echo " and ";
          
          $count = $count + 1;
        }
        break;
      default: // Three or more going
        $count = 0;
        while($row = mysql_fetch_array($users)) {
          if($count > 1) break;
           echo '<a href="/src/php/displayUserInfo.php?id='.$row['id'].'" rel="facebox" >';
        
          echo $row['first_name'] ;
		  echo '</a>'. ', ';
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