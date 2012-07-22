<?php
if(!isset($_SESSION)) 
{ 
session_start(); 
}

						   $flg=0;
						   if(isset($_GET['flg'])){ $flg=$_GET['flg']; }
						  
					
							if($flg==1)
							 {
								 echo '<table cellpadding="1" cellspacing="0" align="center" border="0" > 
                              <tr> <td colspan="2" align="center">  <b>  
								<font size="4" color="#993333" >  "Error in Login. Try Again" </font></b></td> </tr></table>';
							 }
							 
?>
	<br>
<link rel="stylesheet" href="./src/css/crap1.css" type="text/css" media="screen">
<link rel="stylesheet" href="./src/css/crap2.css" type="text/css" media="screen">
<script LANGUAGE=JavaScript TYPE=text/javascript src="/src/javascript/check.js"></script>
<script LANGUAGE=JavaScript TYPE=text/javascript src="/src/javascript/swfobject.js"></script>
<script type="text/javascript">
      var flashvars = {};
      flashvars.cssSource = "/src/css/piecemaker.css";
      flashvars.xmlSource = "/res/piecemaker.xml";
                
      var params = {};
      params.play = "true";
      params.menu = "false";
      params.scale = "showall";
      params.wmode = "transparent";
      params.allowfullscreen = "true";
      params.allowscriptaccess = "always";
      params.allownetworking = "all";
          
      swfobject.embedSWF('/res/piecemaker.swf', 'piecemaker', '660', '500', '10', null, flashvars,    
      params, null);
    
</script>

	<div id="page-outer">
        <div class="front-container " id="front-container">
            <div class="front-card">
                <div class="front-welcome">
                    
						<div id="piecemaker">
								<p>Your browser does not support Flash content.</p>
						</div>
                    
                </div>
			
				<div class="front-signin js-front-signin">
                <form action="./src/php/getin.php" method="post" name="login_user" >
                  <div class="placeholding-input username">
                    <input type="text" value="Your edu email" class="text-input email-input" name="email" id="Email" title="Username or email" autocomplete="on" onclick="javascript:if(document.login_user.Email.value == 'Your edu email')document.login_user.Email.value='';" >
                  </div>
          
                  <table class="flex-table password-signin">
                    <tbody>
                      <tr>
                        <td class="flex-table-primary">
                          <div class="placeholding-input password flex-table-form">
                            <input type="password" class="text-input flex-table-input" name="password" id="Passwd" title="Password" onclick="javascript:if(document.login_user.password.value=='Password')document.login_user.password.value='';">
                          
						  </div>
                        </td>
                        <td class="flex-table-secondary">
                          <button type="submit" class="submit btn primary-btn flex-table-btn js-submit" tabindex="0" onclick="return validateLogin('login_user');">Sign in</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
          
                  <div class="remember-forgot">
                    <label class="remember">
                      <input type="checkbox" value="1" name="remember_me">
                      <span>Remember me</span>
					  </label>
                    <span class="separator">.</span>
					<a class="forgot" href="#">Forgot password?</a>
                  </div>
                </form>
            </div>
			 
				<div class="front-signup js-front-signup">
                <h2><strong>New to WhingIt?</strong>             
                   				
					<button type="submit" class="btn signup-btn" onclick='window.location="./src/php/register.php"'>
                    Signup for WhingIt
                  </button>
				</h2>
				<div>
				<div style="text-align:left;">
					<h2><strong>Or choose facebook to login</strong></h2>
				</div>
					<div style="text-align:right;padding-right:18px;">
						<?php include("/src/php/facebook_button.php") ?>
					</div>
				</div>
				
				
            </div>
			</div>
		</div>
    </div>
	</div>