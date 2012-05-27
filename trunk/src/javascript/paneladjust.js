function panel_growshrink(divId1, divId2) {
   // If divId1 is not expanded (or divId2 is not hidden)
   // then hide divId2 and expand divId1
   // else shrink divId1 and show divId2
   var $DEFAULT_COUNTDOWN_HEIGHT = "305";
   var $DEFAULT_LIVEFEED_HEIGHT  = "515";
   var $height = "0"
   
   // toggle divId2
   var $divId2_outer = divId2 + "_outer"
   animatedcollapse.toggle($divId2_outer)
   
   // Regular max-height depending on panel
   if (divId1 == "countdown")
      $height = $DEFAULT_COUNTDOWN_HEIGHT + "px";
   else
      $height = $DEFAULT_LIVEFEED_HEIGHT + "px";
   
   // if divId2 becoming hidden (height!="1px") then expand divId1
   // else make divId1 normal size
   if (document.getElementById($divId2_outer).style.height != "1px") {
      document.getElementById(divId1).style.maxHeight = "none";
      //$("#"+divId1).animate({height: '100%'}, 300);
   } else {
      document.getElementById(divId1).style.maxHeight = $height;
      //$("#"+divId1).animate({height: 'auto'}, 300);
   }
   $("#"+divId1).animate({height: 'auto'}, 300);
}