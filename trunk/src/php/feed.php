<?php
error_reporting(E_ALL & ~E_NOTICE);
$last_msg_id=$_GET['last_msg_id'];
$action=$_GET['action'];

if($action <> "get") {
  include '/src/php/feed_load_first.php';
?>

  <div id="last_msg_loader"></div>
  
<?php
} else {
  include 'feed_load_second.php';
}
?>
