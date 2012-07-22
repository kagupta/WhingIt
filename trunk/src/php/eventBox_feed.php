<?php
  require("dbconnect.php");
  
  $eventfeed_row = $_GET['event_info'];
  
  $eID = $eventfeed_row['eventID'];
  $eventRow = mysql_query("SELECT * FROM events WHERE id = $eID");
  $event_row = mysql_fetch_array($eventRow);
  
  if(isset($event_row['id'])) {
    $id = $event_row['id'];
  } else {
    $id = 0;
  }
  
  $userID = $_SESSION['id'];
  $attending = 1;
  $notAttending = 2;
  $maybe = 3;

?>
<script type ="text/javascript">


function attending(eventID, status)
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			if(xmlhttp.responseText == "FAILURE")
				alert(xmlhttp.responseText);
			else 
		   {
			var elem = document.getElementById('attend'+eventID);
			var parent = elem.parentNode;
			var newNode = document.createElement("div");
			
			if(status == 1) {
			  var aTag = "<a href=\"#\" action=\"attending.php\" onclick=\"attending("+eventID+", 2);return false;\" > Not Attending </a>";
			  newNode.innerHTML = "<div id =\"attend"+eventID+"\"	> <span><b> Attending </b></span> | " + aTag + "</div>";
			}
			else {
			  var aTag = "<a href=\"#\" action=\"attending.php\" onclick=\"attending("+eventID+", 1);return false;\" > Attending </a>";
			  newNode.innerHTML = "<div id =\"attend"+eventID+"\"	>"+aTag+ " | <span><b> Not Attending </b></span></div>";
			}

			parent.replaceChild(newNode,elem);
		   
		  }
	  }

	}
	xmlhttp.open("GET","/src/php/attending.php?eventID="+eventID+"&status="+status,true);
	xmlhttp.timeout = 100000;
	xmlhttp.send();
}

</script>

<div class="eventbox eventbox_feed" id="<?php echo $eventfeed_row['maxfeedID']; ?>" >
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr><td>
<a href="/src/php/displayEvent.php?eventId=<?php echo $id?>" rel="facebox" class="lbOn" title="Click for details!" >
<img  src="/src/php/image.php?eid=<?php echo $id;?>" width="70" height="70" style="margin: 5px 10px 10px 0px; float:left;vertical-align: bottom;"></a>
<a href="/src/php/displayEvent.php?eventId=<?php echo $id?>" rel="facebox" class="lbOn" title="Click for details!" >
<?php
      echo "<h1 class=\"eventbox_text\">" . $event_row['name'] . "</h1></a>";
      echo "<h2 class=\"eventbox_text\">" . $event_row['location'] . "</h2>"; 

  //check update type >> attend update or event update?
  
  if($eventfeed_row['attendID'] == 0){
    //event update
    if($event_row['sean'] == 1){ //event has been deleted
      echo "<h2 class=\"eventbox_text\">" . "Oops! This event has been deleted.</h2>"; 		
    } else { //regular event display
      getAttendees($eID);
      echo "<br /><h3>This event has been added or modified</h3>";
    }
  } else {
    //attendee update.
    $aID = $eventfeed_row['attendID'];
    $user = mysql_query("SELECT first_name, last_name, id FROM user WHERE user.id = $aID");
    $user_row = mysql_fetch_array($user);

    echo  '<a href="/src/php/displayUserInfo.php?id='.$user_row['id'].'" rel="facebox" >'.' '.$user_row['first_name'].' '.$user_row['last_name']."</a> has joined. " ;
    echo  getAttendees($eID); 
  }
?>
</td><td align="right" width="30%">
<?php
  if ($event_row['sean'] != 1) {
?>
    <div id = "attend<?php echo $event_row['id'] ?>" >
    
<?php
     $currentStatus = mysql_query("SELECT status FROM attend WHERE attend.id=$id AND attend.attendee=$userID");
	 $totalRows = 0;
	 if(isset($currentStatus) &&!empty($currentStatus))
		$totalRows = mysql_num_rows($currentStatus);
		
	if($totalRows != 0)
		{

	       $attStatus = mysql_result($currentStatus, 0, 'status');
		   if($attStatus == 1)
			{
				?>
			    Attending </a> | 
				   <a href="#" action="attending.php" onclick="attending(<?php echo $id; ?>, <?php echo $notAttending; ?>);return false;"> Not Attending </a>
				<?php
		    }
		   else
			{
			   ?>
				<a href="#" action="attending.php" onclick="attending(<?php echo $id; ?>, <?php echo $attending; ?>);return false;"> Attending </a> 
			    | Not Attending 
				<?php
			}

		}
    else

       { 

?>
<a href="#" action="attending.php" onclick="attending(<?php echo $id; ?>, <?php echo $attending; ?>);return false;"> Attending </a> | 
<a href="#" action="attending.php" onclick="attending(<?php echo $id; ?>, <?php echo $notAttending; ?>);return false;"> Not Attending </a>
<?php
	   }
?>

     </div>


<?php
  }
?>
</td></tr>
</table>
</div>

