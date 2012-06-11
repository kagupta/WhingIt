<?php
error_reporting(E_ALL & ~E_NOTICE);
$last_msg_id=$_GET['last_msg_id'];
$action=$_GET['action'];
?>

<div id="countdown_first_msg_loader"></div>

<?php
if($action <> "push") {
  include '/src/php/countdown_load_first.php';
} else {
  include 'countdown_load_new.php';
}
?>
