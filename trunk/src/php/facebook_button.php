
    <div id="fb-root" ></div>
    <script>
      // Load the SDK Asynchronously
      (function(d){
         var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement('script'); js.id = id; js.async = true;
         js.src = "//connect.facebook.net/en_US/all.js";
         ref.parentNode.insertBefore(js, ref);
       }(document));

      // Init the SDK upon load
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '322287121196297', // App ID
          channelUrl : '//'+window.location.hostname+'/channel', // Path to your Channel File
          status     : false, // check login status
          cookie     : true, // enable cookies to allow the server to access the session
          xfbml      : true  // parse XFBML

        });

        // listen for and handle auth.statusChange events
        FB.Event.subscribe('auth.statusChange', function(response) {
          if (response.authResponse) {
            // user has auth'd your app and is logged into Facebook
            FB.api('/me', function(me){
              if (me.name) {
                document.getElementById('auth-firstname').innerHTML = me.first_name;
				document.getElementById('auth-lastname').innerHTML = me.last_name;
				document.getElementById('auth-email').innerHTML = me.email;
				document.getElementById('auth-birthday').innerHTML = me.birthday;
				document.getElementById('auth-location').innerHTML = me.location;
				document.getElementById('auth-gender').innerHTML = me.gender;
				document.getElementById('auth-location').innerHTML = me.location;
				var image = document.getElementById('auth-image');
                image.src = 'http://graph.facebook.com/' + me.id + '/picture';
				
				document.forms["facebookForm"]["fname"].value = me.first_name;
				document.forms["facebookForm"]["lname"].value = me.last_name;
				document.forms["facebookForm"]["email"].value = me.email;
				document.forms["facebookForm"]["birthday"].value = me.birthday;
				document.forms["facebookForm"]["location"].value = me.location;
				document.forms["facebookForm"]["gender"].value = me.gender;
				document.forms["facebookForm"]["userfile"].value = image;
				
				document.forms["facebookForm"].submit();
				
              }
            });
	
            document.getElementById('auth-loggedout').style.display = 'none';
            document.getElementById('auth-loggedin').style.display = 'block';
          } else {
            // user has not auth'd your app, or is not logged into Facebook
            document.getElementById('auth-loggedout').style.display = 'block';
            document.getElementById('auth-loggedin').style.display = 'none';
          }
        });

        // respond to clicks on the login and logout links
		
        document.getElementById('auth-loginlink').addEventListener('click', function(){
          FB.login();
        });

      } 
    </script>

      <div id="auth-status">
        <div id="auth-loggedout">
          <fb:login-button scope="email,user_birthday,user_location" size="large"></fb:login-button>

        </div>
        <div id="auth-loggedin" style="display:none">
			<form name = "facebookForm" action="./src/php/facebook_login.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="fname">
			<input type="hidden" name="lname">
			<input type="hidden" name="email">
			<input type="hidden" name="birthday">
			<input type="hidden" name="gender">
			<input type="hidden" name="location">
			<input type="hidden" name="userfile" id="userfile">
			
			<span id="auth-firstname"></span>
			<span id="auth-lastname"></span>  
			<span id="auth-email"></span>  
			<span id="auth-birthday"></span>  
			<span id="auth-location"></span>  
			<span id="auth-gender"></span> 
			<span id="auth-location"></span> 
			<img id="auth-image"/>

      </div>
    </div>