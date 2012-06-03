<div class="sidebar1">

<div class="rounded-corners">
  <div class="user_panel">

  <img src="/src/php/image.php?uid=<?php 
  
  if(isset($_SESSION['id']))
  {
	$id = $_SESSION['id'];
  }
  else 
  {
	$id = 0;
  }
  echo $id;
  ?>" width=120 height = 120>
    <br />
    <font style="font-weight:bold;" color="#000000">&nbsp;&nbsp;&nbsp;<a href="/src/php/updateProfile.php" color="#ffff00"> Update profile </a></font><br />
	<font style="font-weight:bold;" color="#000000">&nbsp;&nbsp;&nbsp;<a href="/src/php/createEventForm.php" color="#ffff00"> Create Event </a></font><br />
 	<font style="font-weight:bold;" color="#000000">&nbsp;&nbsp;&nbsp;<a href="/src/php/myEventsPage.php" color="#ffff00"> View My Event </a></font><br />
				

  </div>
</div>

<div class="categories">
  <h2>Categories</h2>

  <a href="#">Free</a><br />
  <a href="#">Bars</a><br />
  <a href="#">Comedy</a><br />
  <a href="#">Food</a><br />
  <a href="#">Music</a><br />
  <a href="#">Clubs</a><br />
  <a href="#">Fundraisers</a><br />
  <a href="#">Organization Events</a><br />
  <a href="#">Volunteer Events</a><br />
  <a href="#">Sports</a><br />
  <a href="#">Professional</a><br />
  <a href="#">Hobbies</a>

</div>

</div><!-- end .sidebar1 -->