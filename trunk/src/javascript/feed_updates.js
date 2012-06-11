var $oldRowCount = [0,0];
var $newRowCount = [0,0];
var modes = ['feed','countdown'];
var divIDs = ['feed_notify','countdown_notify'];

$.get( '/src/php/feed_count.php?mode=feed', function(data) {
    $oldRowCount[0] = data,
    animatedcollapse.hide('feed_notify');
});
$.get( '/src/php/feed_count.php?mode=countdown', function(data) {
  $oldRowCount[1] = data,
  animatedcollapse.hide('countdown_notify');
});

jQuery(function($){  
  setInterval(function(){    
    $.get( '/src/php/feed_count.php?mode=feed', function(data) {
      $newRowCount[0] = data;
      $newEvents = $newRowCount[0] - $oldRowCount[0];

      $is_are = ($newEvents == 1) ? 'is' : 'are';
      $updates = ($newEvents == 1) ? 'update' : 'updates';

      document.getElementById(divIDs[0]+'_num').innerHTML = 'There '+$is_are+' <a href="'+
      "javascript:animatedcollapse.toggle('"+divIDs[0]+"'); updateRowCount('"+divIDs[0]+"');\">"+
      $newEvents+'</a> new '+$updates+'.';
      
      if ($newEvents != 0) {
        animatedcollapse.show(divIDs[0]);
      } else {
        animatedcollapse.hide(divIDs[0]);
      }
    });
    
    $.get( '/src/php/feed_count.php?mode=countdown', function(data) {
      $newRowCount[1] = data;
      $newEvents = $newRowCount[1] - $oldRowCount[1];

      $is_are = ($newEvents == 1) ? 'is' : 'are';
      $updates = ($newEvents == 1) ? 'update' : 'updates';

      document.getElementById(divIDs[1]+'_num').innerHTML = 'There '+$is_are+' <a href="'+
      "javascript:animatedcollapse.toggle('"+divIDs[1]+"'); updateRowCount('"+divIDs[1]+"');\">"+
      $newEvents+'</a> new '+$updates+'.';
      
      if ($newEvents > 0) {
        animatedcollapse.show(divIDs[1]);
      } else {
        animatedcollapse.hide(divIDs[1]);
      }
    });
  },1000); // 5000ms == 5 seconds
});

function updateRowCount(divID) {
  i = (divID == 'feed_notify') ? 0 : 1;
  $oldRowCount[i] = $newRowCount[i];
  
  if (i == 0) {
    var ID=$(".eventbox_feed:last").attr("id");
    $.post("/src/php/feed.php?action=push&last_msg_id"+ID,

    function(data){
      if (data != "")
        $(".eventbox_feed:first").before(data); 

      $('div#feed_first_msg_loader').empty();
    });
  } else {
    var $ID = '';
    $("div[id^='count_']").each(function() {
      alert($(this).attr("id"));
      if ($ID < $(this).attr("id"))
        $ID = $(this).attr("id");
    });

    $.post("/src/php/countdown.php?action=push&last_msg_id"+ID,

    function(data){
      if (data != "")
        $(".eventbox_countdown:first").before(data); 

      $('div#countdown_first_msg_loader').empty();
    });
  }
};
