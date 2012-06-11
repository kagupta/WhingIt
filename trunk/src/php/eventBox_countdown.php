<?php
  $row = $_GET['event_info'];
  if(isset($row['id'])) {
    $id = $row['id'];
  } else {
    $id = 0;
  }
?>

<div class="eventbox eventbox_countdown" id="count_<?php echo $row['id']; ?>">
<img  src="/src/php/image.php?eid=<?php echo $row['id'];?>" width="70" height="70" style="margin: 5px 10px 10px 0px; float:left;vertical-align: bottom;">
            
<h2 class="eventbox_text"> <?php echo $row['name']; ?> </h2>
<div class="timer" id="timer_<?php echo $row['id']; ?>"></div>
<?php 
  getAttendees($row['id']);
  echo "<br />";
  getDescription($row['id']); 
?>

</div>