<?php
  $parent_id = $_GET['parent_id'];
?>

<div class="notification">
  <?php
    $numNotify = 0;
    
    //each one has a different query
    switch($parent_id) {
      case 'countdown_notify':
        break;
      case 'feed_notify':
        break;
    }
  ?>
  
  There are <a href="javascript:animatedcollapse.toggle('<?php echo $parent_id; ?>')">
  <?php echo $numNotify; ?></a> new updates.
</div>