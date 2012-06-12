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
        <img src="/src/php/image.php?uid=<?php echo $id;?>" width="90" height = "90">
      </td>
      <td width="10px">
      </td>
      <td style="vertical-align:top">
        <font size="5em"><?php echo $_SESSION['username']?> </font> <br />
        University of California, San Diego
      </td>
    </tr>
    <tr height="5px">
    </tr>
      <td colspan="3">
        <a href="/src/php/updateProfile.php"> Update profile </a>
        <br /> 
        <a href="/src/php/createEventForm.php"> Create New Event </a> <br />
        <a href="/src/php/myEventsPage.php"> View My Events </a>
      </td>
    </tr>
    </table>
  </div>
</div>

<div class="categories">
  <h2>Categories</h2>
  
  <a href="/?tag='free food'">Free Food</a><br />
  <a href="/?tag='sports'">Sports</a><br />
  <a href="/?tag='bars'">Bars</a><br />
  <a href="/?tag='entertainment'">Entertainment</a><br />
  <a href="/?tag='student org'">Student Org</a><br />
  <a href="/?tag='academic'">Academic</a><br />
  <a href="/?tag='professional'">Professional</a><br />
  <a href="/?tag='tech talk'">Tech Talk</a><br />
  <a href="/?tag='other'">Other</a>

</div>

</div><!-- end .sidebar1 -->