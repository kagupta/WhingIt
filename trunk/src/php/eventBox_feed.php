<?php
  $row = $_GET['event_info'];
?>

<div class="eventbox" id="<?php echo $row['id']; ?>">
<img src="/res/images/photo.jpg" width="70" height="70" style="margin: 5px 10px 10px 0px; float:left;vertical-align: bottom;">
<?php
  echo "<h1 class=\"eventbox_text\">" . $row['name'] . "</h1>";
  echo "<h2 class=\"eventbox_text\">" . $row['location'] . "</h2>"; 

  getAttendees($row['id']);
?>
</div>