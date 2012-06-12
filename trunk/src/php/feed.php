<?php
error_reporting(E_ALL & ~E_NOTICE);
$last_msg_id=$_GET['last_msg_id'];
$action=$_GET['action'];
?>

  <div id="feed_first_msg_loader"></div>

<?php
$_GET['last_msg_id'] = $last_msg_id;
if($action == "push") {
  include 'feed_load_new.php';
} elseif ($action <> "get") {
  include '/src/php/feed_load_first.php';
?>

  <div id="feed_last_msg_loader"></div>
<?php
} else {
  include 'feed_load_second.php';
}
?>
