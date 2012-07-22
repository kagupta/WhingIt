<?php if(!isset($_SESSION)) { 
        session_start(); 
      }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Whingit</title>
  <link rel="icon" type="image/ico" href="/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="/src/css/style.css" />
  <link rel="stylesheet" type="text/css" href="/src/css/eventbox.css" />

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
  <script type="text/javascript" src="/src/javascript/animatedcollapse.js"></script>
  <script type="text/javascript" src="/src/javascript/paneladjust.js"></script>
  <script type="text/javascript" src="/src/javascript/Timer.js"></script>
  <script type="text/javascript" src="/src/javascript/loadscroll.js"></script>
  <script type="text/javascript" src="/src/javascript/check.js"></script>
  <script type="text/javascript" src="/src/javascript/feed_updates.js"></script>
  <link href="/src/css/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="/src/javascript/facebox.js" type="text/javascript"></script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox() 
    })
</script>
  <script type="text/javascript">
    animatedcollapse.addDiv('countdown_outer', 'fade=1,speed=300')
    animatedcollapse.addDiv('feed_outer', 'fade=1,speed=300')
    animatedcollapse.addDiv('countdown_notify', 'fade=1,speed=300,hide=1')
    animatedcollapse.addDiv('feed_notify', 'fade=1,speed=300,hide=1')
    animatedcollapse.init()
  </script>
  <script language="javascript" type="text/javascript">

function popitup(url) {
	newwindow=window.open(url,'name','height=300,width=450');
	if (window.focus) {newwindow.focus()}
	return false;
}

</script>
</head>

<body>
<div class="header"></div><!-- end .header -->

<div class="container1">
  <div class="top_bar">

  <div class="logo">
    <a href="/"><img src="/res/images/logo.gif" height="30px"/></a>
  </div>

  <div class="menu_bar" >
<?php if(isset($_SESSION['LOGGEDIN']) && $_SESSION['LOGGEDIN']==1)
		
		 {
?>
    <div class="logout_box rounded-topcorners">
      <a href="/src/php/logout.php" title="Logout">Log Out</a>
    </div>
<?php
		}
?>
  </div>
  <?php if(isset($_SESSION['LOGGEDIN']) && $_SESSION['LOGGEDIN']==1)
		
		 {
?>
  <div id="searchBoxOne" style="padding-left:300px;">
<form action="/src/php/search.php" method="post" class="searchform">
	<input class="searchfield" type="text" name="term" id="term" value="Search for hashtags or keywords" onfocus="if (this.value == 'Search for hashtags or keywords') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search for hashtags or keywords';}">
	<input type="submit" class="searchbutton" type="button" value="Go">
</form>
</div>
<?php
		}
?>

  <br>
  </div>

  <div class="container">
  <style type="text/css">.info, .success, .warning, .error, .validation {
border: 1px solid;
margin: 10px 0px;
padding:15px 10px 15px 50px;
background-repeat: no-repeat;
background-position: 10px center;
}
.info {
color: #00529B;
background-color: #BDE5F8;
background-image: url('/images/trinity/icons/info.png');
}
</style>
	 
				
  <?php if(isset($_SESSION['msg']) && $_SESSION['msg'] <> "")
	       {
		   ?>
					<div style="text-align: center" id="msg_bar" class="info">
						<font color="#FF0000" style="font-size: 2em;padding-right:50px"><?php echo $_SESSION['msg'] ?></font>
					</div>
				<?php
				$_SESSION['msg'] = "";
				unset($_SESSION['msg']);
			}
	?>