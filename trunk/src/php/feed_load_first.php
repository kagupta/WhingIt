<div class="rounded-corners" id="feed_outer">
  <a href="#">
  <div class="panel_header rounded-topcorners" onclick="animatedcollapse.toggle('countdown_outer')">
    <h1>What's Happening!?</h1>
  </div>
  </a>
  <div class="feed" id="feed"> 
    <div id="feed_notify">
      <?php 
        $_GET['parent_id'] = 'feed_notify';
        include '/src/php/async_bar.php';
      ?>
    </div>
<?php
  require("dbconnect.php");
  $_GET['mode'] = "first";
  include('feed_query.php');
  $eventTab = $_GET['sql'];
  $eventsSeenSofar = array();
  while($row = mysql_fetch_array($eventTab)) {
    $_GET['event_info'] = $row;

    include("eventBox_feed.php");
	
  }
?>

  </div>
</div>