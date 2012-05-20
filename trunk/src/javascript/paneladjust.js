function panel_growshrink(divId1, divId2) {
   // toggle divId1
   // if divId1 shrink -> divId2 grow 
   // if divId1 grow   -> divId2 shrink 
   
   if (document.getElementById(divId2+"_outer").style.height != "1px") {
      var $temp = divId1
      divId1 = divId2
      divId2 = $temp
   }
   
   var $height = "0"
   var $divId1_outer = divId1 + "_outer"
   
   // toggle divId1
   animatedcollapse.toggle($divId1_outer)
   
   // figure out if regular height or extended
   if (divId2 == "countdown")
      $height = "305"
   else
      $height = "100%"
   
   if (document.getElementById($divId1_outer).style.height != "1px")
      $height = "600"

   $( "#"+divId2 ).animate({
      height: $height},300)
}