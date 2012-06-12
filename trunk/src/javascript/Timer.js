function GetCount(ddate,iid){
   out = "";
   
   dateNow = new Date();
   amount = ddate.getTime() - dateNow.getTime();
   delete dateNow;
   amount = Math.floor(amount/1000) % 86400;

   if(amount <= 0){
      document.getElementById(iid).innerHTML="Now!";
   } else{  
      //hours
      hours=Math.floor(amount/3600);
      if (hours >= 12) { hours = hours - 12;}
      amount=amount%3600;
      
      //minutes
      mins=Math.floor(amount/60);
      amount=amount%60;
      
      //seconds
      secs=Math.floor(amount);
	  out += (hours<10) ? "0"+hours : hours;
	  out += ":";
	  out += (mins<10)  ? "0"+mins  : mins;
	  out += ":";
	  out += (secs<10)  ? "0"+secs  : secs;

	  document.getElementById(iid).innerHTML=out;

	  setTimeout(function(){GetCount(ddate,iid)}, 1000);
   }
}