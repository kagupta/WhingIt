<?php
  error_reporting(E_ALL & ~E_NOTICE);
  $parent_id = $_GET['parent_id'];
?>

<div class="notification">
  <?php
    //each one has a different query
    switch($parent_id) {
      case 'countdown_notify':
        break;
      case 'feed_notify':
        break;
    }
  ?>
  <div class="notify_num" id="<?php echo $parent_id ?>_num"></div>
  
</div>