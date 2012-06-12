<div class="rounded-corners">
  <div class="panel_header rounded-topcorners">
    <h1>Categories: <?php echo $_GET['tag'];?> </h1>
  </div>
  <div class="category_panel" id="feed"> 
<?php
  require("dbconnect.php");
  include 'event_functions.php';
  $tags = $_GET['tag'];
  
  $_GET['mode'] = "first";
  include('categories_query.php');
  $eventTab = $_GET['sql'];
  
  while($row = mysql_fetch_array($eventTab)) {
    $_GET['event_info'] = $row;
    include("eventBox_categories.php");
  }
?>

  </div>
</div>