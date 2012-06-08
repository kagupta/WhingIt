<?php
  $row = $_GET['event_info'];
  if(isset($row['id'])) {
    $id = $row['id'];
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
		}
	}
	
	xmlhttp.open("GET","/src/php/attending.php?eventID="+eventID+"&status="+status,true);
	xmlhttp.send();
}

</script>

<div class="eventbox" id="<?php echo $row['id']; ?>">
<img  src="/src/php/image.php?eid=<?php echo $id;?>" width="70" height="70" style="margin: 5px 10px 10px 0px; float:left;vertical-align: bottom;">
<?php
  echo "<h1 class=\"eventbox_text\">" . $row['name'] . "</h1>";
  echo "<h2 class=\"eventbox_text\">" . $row['location'] . "</h2>"; 

  getAttendees($row['id']);
?>
</br>

<a href="#" action="attending.php" onclick="attending(<?php echo $row['id']; ?>, <?php echo $attending; ?>)"> Attending </a>
<a href="#" action="attending.php" onclick="attending(<?php echo $row['id']; ?>, <?php echo $notAttending; ?>)"> Not Attending </a>
<a href="#" action="attending.php" onclick="attending(<?php echo $row['id']; ?>, <?php echo $maybe; ?>)"> Maybe </a>
<!--<button onclick="attending()"> Attending </button>
<button onclick="notAttending()"> Not Attending </button>
<button onclick="maybe()"> Maybe </button>
-->
</div>

