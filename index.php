<?php
session_start();
if(isset($_SESSION['userid'])){$userid = $_SESSION['userid'];}
if(isset($_SESSION['cemail'])){$cemail = $_SESSION['cemail'];}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Barkley - Signin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bk-includes/css/bootstrap.min.css" rel="stylesheet">
    <link href="bk-includes/css/styles.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #FFF;
      }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
	<center class="form-signin-logo"><img src="site/img/logo-large.png" /></center>
      <?php
	
	$error = null;
	$error_text = null;
	
	if ($cemail && $userid){
		//echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>You have been logged in as <b>$cemail</b>. <a href='panel'>Click here</a> to go to the member page.</div>";
		header ("Location: bk-admin");
	}	
	else {

		$form = "
		<form class='form-signin' action='index.php' method='post' id='Signup'>
			<div>
			<div  class='alert alert-$error'><button type='button' class='close' data-dismiss='alert'>&times;</button>$error_text</div>
			<input type='text' class='form-control' placeholder='Email Address' name='cemail' />
			<input type='password' class='form-control' placeholder='Password' name='password' />
				<button type='submit' class='btn btn-lg btn-primary btn-block' name='loginbtn' value='Login'>Login</button>
				<!--<p><a href='newuser.php'>Register</a></p>-->
				<p></p>
				<p><a href='forgotpass.php'>Forgot your password?</a></p>
				<p><a href='http://wubcrate.com'>Back to Wubcrate</a></p>
			</div>
				</div>
</form>";
	//Change loginbtn is for the actual button on the form... change both to something more suitable
			if ($_POST['loginbtn']){
	//Change these to something more suitable loginbtn, user, password
	   $cemail = $_POST['cemail'];
   	   $password = $_POST['password'];

				if($cemail){
					if($password){
			
						require("panel/functions/connect.php");
			
						$password = md5("Wub".$password."Crate!");
						$password = substr($password, 0, 15);
						$password = md5($password);
						
						// make sure login info correct
						$query = mysql_query("SELECT * FROM `client_accounts` WHERE email='$cemail'");
						$numrows = mysql_num_rows($query);
						if ($numrows == 1){
							$row = mysql_fetch_assoc($query);
							$dbid = $row['account_id'];
							$dbemail = $row['email'];
							$dbpass = $row['password'];
							$account_type = $row['account_type'];
							$dbactive = $row['active'];
							$first_name = $row['first_name'];
							$last_name = $row['last_name'];
							
						if($account_type > 1){
							if ($password == $dbpass){
								if ($dbactive == 1){
									// set session info
									$_SESSION['userid'] = $dbid;
									$_SESSION['cemail'] = $dbemail;	
									$_SESSION['username'] = $first_name .="_". $last_name;	
									
									//echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>You have been logged in as <b>$dbemail</b>. <a href='panel'>Click here</a> to go to the member page.</div>";
									header ("Location: bk-admin");
								} else
									echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>You must activate your account to login.</div> $form";
							} else
								echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>You did not enter the correct password.</div> $form";
						}else
							echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>You do not have permission to access this website.</div>";
			}
			else
			   echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>The email you entered was not found.</div> $form";


			mysql_close();		
			}
			else
				echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>You mus enter your password.</div> $form";
				}
		else
		    echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>You must enter your username.</div> $form";
	}	
	else
	    echo $form;
}

	?>
	
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="site/js/jquery.js"></script>
    <script src="site/js/bootstrap.min.js"></script>

  </body>
</html>
