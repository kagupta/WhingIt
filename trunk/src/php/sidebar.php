<?php 
  if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
  } else {
    $id = 0;
  }
?>

<div class="sidebar1">
<div class="rounded-corners">
  <div class="user_panel">
    <table cellspacing="0" cellpadding="0" border="0">
    <tr>
      <td>
        <img src="/src/php/image.php?uid=<?php echo $id;?>" width="100" height = "100">
      </td>
      <td width="10px">
      </td>
      <td style="vertical-align:top">
        <font size="5em"><?php echo $_SESSION['username']?> </font> <br />
        <a href="/src/php/updateProfile.php"> Update profile </a><br /> 
      </td>
    </tr>
    <tr height="10px">
    </tr>
      <td colspan="2">
        <a href="/src/php/createEventForm.php"> Create New Event </a> <br />
        <a href="/src/php/myEventsPage.php"> View My Events </a>
      </td>
    </tr>
    </table>
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