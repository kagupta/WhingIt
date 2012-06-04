<?php if(!isset($_SESSION)) { 
        session_start(); 
      }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Whingit</title>

  <link rel="stylesheet" type="text/css" href="/src/css/style.css" />
  <link rel="stylesheet" type="text/css" href="/src/css/eventbox.css" />

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
  <script type="text/javascript" src="/src/javascript/animatedcollapse.js"></script>
  <script type="text/javascript" src="/src/javascript/paneladjust.js"></script>
  <script type="text/javascript" src="/src/javascript/Timer.js"></script>
  <script type="text/javascript" src="/src/javascript/loadscroll.js"></script>
  <script type="text/javascript">
    animatedcollapse.addDiv('countdown_outer', 'fade=1,speed=300')
    animatedcollapse.addDiv('feed_outer', 'fade=1,speed=300')
    animatedcollapse.addDiv('countdown_notify', 'fade=1,speed=300,hide=0')
    animatedcollapse.addDiv('feed_notify', 'fade=1,speed=300,hide=0')
    animatedcollapse.init()
  </script>
  
</head>

<body>
<div class="header"></div><!-- end .header -->

<div class="container1">
  <div class="top_bar">

  <div class="logo">
    <a href="/index.php"><img src="/res/images/logo.gif" height="30px"/></a>
  </div>

  <div class="menu_bar">
    <p class="menu_bar">
<?php if(isset($_SESSION['LOGGEDIN']) && $_SESSION['LOGGEDIN']==1)
		
		 {
		 echo '<a href="/src/php/logout.php" title="Logout"><font style="font-weight:bold;"  color="#000000">Log Out</font></a>'; 
			
		}
?>
    
    </p>
  </div>

<?php if(isset($_SESSION['LOGGEDIN']) && $_SESSION['LOGGEDIN']==1)
			{
				?>
				<b><br><font color="#000000">Welcome </font> <i>
				<font size="3" color="#000000"><?php echo $_SESSION['username']?></font></i></b>
				
	         <?php 
		    }
			if(isset($_SESSION['REGISTER']) && $_SESSION['REGISTER']==1)
			{
				$_SESSION['REGISTER']=0;
				?>
				<b><br><font color="#000000">Successful Registration.</font></b><p><br>
			<?php 
		    }
			if(isset($_SESSION['updated']) && $_SESSION['updated']==1 && isset($_SESSION['LOGGEDIN']) && $_SESSION['LOGGEDIN']==1)
			{
				$_SESSION['updated']=0;
				?>
				<font color="#000000">Profile Successfully Updated.</font><br>
			<?php 
		    }
			?>

  <br>
</div>

<div class="container">
  <?php //include './src/php/event_functions.php'; ?>