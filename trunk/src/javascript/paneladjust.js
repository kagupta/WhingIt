animatedcollapse.ontoggle = function($, divobj, state){
   var $DEFAULT_COUNTDOWN_HEIGHT = "345";
   var $DEFAULT_LIVEFEED_HEIGHT  = "540";
   var $height = "0"
   var $divId1 = "countdown";
   
   // Regular max-height depending on panel
   if (divobj != "countdown") {
      $height = $DEFAULT_LIVEFEED_HEIGHT + "px";
      $divId1 = "feed";
   } else {
      $height = $DEFAULT_COUNTDOWN_HEIGHT + "px";
   }
   
   // if divId2 becoming hidden (height!="1px") then expand divId1
   // else make divId1 normal size
   if (state == "block") {
      document.getElementById($divId1).style.maxHeight = $height;
   } else {
      document.getElementById($divId1).style.maxHeight = "none";
   }

   $("#"+$divId1).animate({height: 'auto'}, 400);
}