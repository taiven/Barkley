<?php
session_start();
$userid = $_SESSION['userid'];
$cemail = $_SESSION['lemail'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign in &middot; APanel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="site/css/frame.css" rel="stylesheet">
    <link href="site/css/page.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #FFF;
      }
      </style>
    <link href="site/css/frame-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="site/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="site/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="site/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="site/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="site/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="container">
	<center class="form-signin-logo"><img src="site/img/logo.png" /></center>
<?php
	if(!$lemail && !$userid){
		if ($_POST['resetbtn']){
			// get the form data
			$user = $_POST['user'];
			$cemail = $_POST['cemail'];
			
			// make sure info provided
			if ($user) {
				if ($email){
					if ( (strlen($email) > 7) && (strstr($email, "@" )) && (strstr($email, ".") ) ){
						//connect
						require("panel/functions/connect.php");
						
						$query = mysql_query("SELECT * FROM client_accounts WHERE email='$lemail'");
						$numrows = mysql_num_rows($query);
						if ($numrows == 1){
							// get info about account
							$row = mysql_fetch_assoc($query);
							$dbemail = $row['email'];
							
							// make sure the email is correct
							if ($email == $dbemail) {
								// generate password
								$pass = rand();
								$pass = md5($pass);
								$pass = substr($pass, 0, 15);
								$password = md5($pass);
								// update db with new pass
								mysql_query("UPDATE client_accounts SET password='$password' WHERE email='$cemail'");
								
								// make sure the password was changed
								$query = mysql_query("SELECT * FROM client_accounts email='$cemail' AND password='$password'");
								$numrows = mysql_num_rows($query);
								if ($numrows == 1){
								
									//create email vars
									$webmaster = "noreply@domain.com";
									$headers = "From: Autoshop<$webmaster>";
									$subject = "Your new Password";
									$message = "Hello. Your password has been reset. Your new password is below.\n";
									$message .= "Password: $pass\n";
									
									if ( mail($email, $subject, $message, $headers)){
									echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>Your password has been reset. An email has been sent with your new password.</div>";
									}
									else
										echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>An error has occured and your email was not sent containing your new password.</div>";
								}
								else
									echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>Your password was not reset. Contact customer support.</div>";
							}
							else
								echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>You have entered the wrong email address.</div>";
						}
						else
							echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>The username was not found.</div>";
						mysql_close();
					}
					else
						echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>Please enter a valid email address.</div>";
				}
				else
					echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>Please enter your email.</div>";
			}
			else
				echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>Please enter your username.</div>";
		
		}
		else
			echo "<form action='forgotpass.php' method='post' class='form-signin'>
			<div><intput type='text' name='user' placeholder='Username' /></div>
			<div><intput type='text' name='email' placeholder='Email' /></div>
			<div><button type='submit' name='resetbtn' value='reset password'/></button>
			</form>";
	}
	else
		echo "div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>Please logout to view this page.</div>";
?>
  </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="site/js/jquery.js"></script>
    <script src="site/js/bootstrap-transition.js"></script>
    <script src="site/js/bootstrap-alert.js"></script>
    <script src="site/js/bootstrap-modal.js"></script>
    <script src="site/js/bootstrap-dropdown.js"></script>
    <script src="site/js/bootstrap-scrollspy.js"></script>
    <script src="site/js/bootstrap-tab.js"></script>
    <script src="site/js/bootstrap-tooltip.js"></script>
    <script src="site/js/bootstrap-popover.js"></script>
    <script src="site/js/bootstrap-button.js"></script>
    <script src="site/js/bootstrap-collapse.js"></script>
    <script src="site/js/bootstrap-carousel.js"></script>
    <script src="site/js/bootstrap-typeahead.js"></script>

  </body>
</html>
