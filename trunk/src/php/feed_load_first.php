<div class="rounded-corners" id="feed_outer">
  <div class="panel_header" onclick="animatedcollapse.toggle('countdown_outer')"><!--onclick="panel_growshrink('feed','countdown')">-->
    <h1>What's Happening!?</h1>
  </div>
  <div class="feed" id="feed"> 
    <div id="feed_notify">
      <?php 
        $_GET['parent_id'] = 'feed_notify';
        include '/src/php/async_bar.php';
      ?>
    </div>
<?php
  require("dbconnect.php");
  $eventTab = mysql_query("SELECT * FROM events WHERE TIMEDIFF(NOW(),time) > 0 ORDER BY id DESC LIMIT 10");

  while($row = mysql_fetch_array($eventTab)) {
    $_GET['event_info'] = $row;
    include("eventBox_feed.php");
  }
?>

  </div>
</div>