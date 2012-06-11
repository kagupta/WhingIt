$(document).ready(function() {
	function last_msg_funtion(){ 
		var ID=$(".eventbox:last").attr("id");		
		$('div#last_msg_loader').html('<center><img src="/res/images/loading.gif"></center>');
		$.post("/src/php/feed.php?action=get&last_msg_id="+ID,

		function(data){
			if (data != "") {
				$(".eventbox:last").after(data); 
			}
			$('div#last_msg_loader').empty();
		});
	}; 

	$(window).scroll(function(){
		if  ($(window).scrollTop() >= $(document).height() - $(window).height() -1){
		   last_msg_funtion();
		}
	});
});