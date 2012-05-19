<?php if(!isset($_SESSION)) 
{ 
session_start(); 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Whingit</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<link rel="stylesheet" type="text/css" href="/whingit/trunk/src/css/style.css" />
</head>

<body>
<div class="header">
</div><!-- end .header -->

<div class="container1">
<div class="top_bar">

<div class="logo">
  <a href="/whingit/trunk/index.php"><img src="/whingit/trunk/res/images/logo.gif" height="30px"/></a>
</div>

<div class="menu_bar">
  <p class="menu_bar">
<?php   if(isset($_SESSION['LOGGEDIN']) && $_SESSION['LOGGEDIN']==1)
		
		 {
		 echo '<a href="/whingit/branches/kapil/logout.php" title="Logout"><font style="font-weight:bold;"  color="#000000">Log Out</font></a>'; 
			
		}
?>
    
  </p>
</div>

<?php if(isset($_SESSION['LOGGEDIN']) && $_SESSION['LOGGEDIN']==1)
			{
				?>
				<b><br><font color="#000000">Welcome </font> <i>
				<font size="3" color="#000000"><?php echo $_SESSION['username']?></font></i></b><br>
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
				<b><font color="#000000">Profile Successfully Updated.</font></b><p><br>
			<?php 
		    }
			?>


</div>

<div class="container">