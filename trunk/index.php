<?php include './src/php/header.php'; ?>

<?php if(!isset($_SESSION['LOGGEDIN']) || $_SESSION['LOGGEDIN']==0)
			{
				include './src/php/login.php'; 
			}

	else if(isset($_SESSION['LOGGEDIN']) && $_SESSION['LOGGEDIN']==1)
			{

				include './src/php/sidebar.php'; 
?>

			  <div class="content">
					<?php include './src/php/countdown.php'; ?>
               
					<?php include './src/php/feed.php'; ?>
			  </div>

<?php 
			}
			include './src/php/footer.php'; 
?>