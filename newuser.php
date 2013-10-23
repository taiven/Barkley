<?php
session_start();
$userid = $_SESSION['userid'];
$cemail = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>New Account &middot; APanel</title>
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
	
	if ( $_POST['registerbtn']){
		$getemail = $_POST['email'];
		//$getfn = $_POST['first_name'];
		//$getln = $_POST['last_name'];
		//$getsex = $_POST['gender'];
		//$getphone = $_POST['phone'];
		//$getpass = $_POST['pass'];
		//$getretypepass = $_POST['retypepass'];

	  if ($getemail) {
	     if ($getpass) {
				if ($getretypepass) {
					if ( $getpass === $getretypepass){
						if ( (strlen($getemail) >= 7) && (strstr($getemail, "@") ) && (strstr($getemail, ".") ) ){
							require("panel/functions/connect.php");
	
							$query = mysql_query("SELECT * FROM client_accounts WHERE email='$getemail'");
							$numrows = mysql_num_rows($query);
								if ($numrows == 0){
				
									$password = md5("Wub".$getpass."Crate!");
									$password = substr($password, 0, 15);
									$password = md5($password);				
									$date = date("F d, Y");
									$code = md5(rand());

									$query = mysql_query("INSERT INTO client_accounts VALUES ('', '$getemail', '$password', '0', '0', '0', '$getfn', '$getln', '$getsex', '$getphone', '$code', '$date')");

									$query = mysql_query("SELECT * FROM client_accounts WHERE email='$getemail'");	
									$numrows = mysql_num_rows($query);			
										if ($numrows == 1){
				   
											$site = "http://www.wubcrate.com/";
											$webmaster = "Wubcrate <noreply@domain.com>";
											$headers = "From: $webmaster";
											$subject = "Activate Your Account";
											$message = "Thanks for registering. Click the link below to activate your account.\n ";
											$message .= "$site/activate.php?user=$getemail&code=$code\n";
											$message .= "You must activate your account to login.";
											if ( mail($getemail, $subject, $message, $headers) ){
												$errormsg = "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>You have been registered. You must activate your account from the activation link sent to <b>$getemail</b></div>";
												//$getuser = "";
												$getemail = "";
											} 
											else
											   $errormsg = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>An error has occured. Your activation email was not sent.</div>";
										} 
										else
										   $errormsg = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>An error has occured. Your account was not created.</div>";
			
								}
								else
								   $errormsg = "<div class='alert alert-warning'><button type='button' class='close' data-dismiss='alert'>&times;</button>Their is already a user with that email.</div>";
								   mysql_close();
			
						}
						else
						   $errormsg = "<div class='alert alert-warning'><button type='button' class='close' data-dismiss='alert'>&times;</button>You must enter a valid email address to register.</div>";
					}
					else
					   $errormsg = "<div class='alert alert-warning'><button type='button' class='close' data-dismiss='alert'>&times;</button>Your passwords did not match.</div>"; 
			
				}
				else
				   $errormsg = "<div class='alert alert-warning'><button type='button' class='close' data-dismiss='alert'>&times;</button>You must retype your password to register.</div>";
			
			}
			else
			   $errormsg = "<div class='alert alert-warning'><button type='button' class='close' data-dismiss='alert'>&times;</button>You must enter your password to register.</div>";
		}
		else
			$errormsg = "<div class='alert alert-warning'><button type='button' class='close' data-dismiss='alert'>&times;</button>You must enter your email to register.</div>";
	}
	

	$form = "<form class='form-signin' action='newuser.php' method='post'>
	<div>
		<div><font-color='blue'>$errormsg</font></div>
		<!--<div><input type='text' name='user' placeholder='Username' value='$getuser'/></div>-->
		<div><input type='text' name='email' placeholder='Email' value='$getemail'/></div>
		<div><input type='text' name='age' placeholder='First Name' value='$getfn'/></div>
		<div><input type='text' name='city' placeholder='Last Name' value='$getln'/></div>
		<div><input type='text' name='state' placeholder='Gender' value='$getsex'/></div>
		<div><input type='text' name='zipcode' placeholder='Phone Number' value='$getphone'/></div>
		<div><input type='password' name='pass' placeholder='Password' value=''/></div>
		<div><input type='password' name='retypepass' placeholder='Confirm Password' value=''/></div>
		<div><input type='submit' class='btn btn-success' name='registerbtn' value='Register'/></div>
	</div>	
	</form>";

	echo $form;
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