<?php
error_reporting(E_ALL & ~E_NOTICE);
$tags = $_GET['tag'];
$last_msg_id=$_GET['last_msg_id'];
$action=$_GET['action'];

$_GET['tag'] = $tags;
if($action <> "get") {
  include '/src/php/categories_load_first.php';  
?>

  <div id="categories_last_msg_loader"></div>
<?php
} else {
  include 'categories_load_second.php';
}
?>
