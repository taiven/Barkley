<?php
session_start();
include('bk-config.php');
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
	
	<div class="header">
		<div id="title">Barkley</div>
	</div>
	
    <div class="container">
      <?php
	
	$error = null;
	$error_text = null;
	
	if (isset($cemail) && isset($userid)){
		//echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>You have been logged in as <b>$cemail</b>. <a href='panel'>Click here</a> to go to the member page.</div>";
		header ("Location: bk-admin");
	}	
	else {

		$form = "
		<form class='form-signin' action='index.php' method='post' id='Signup'>
			<div>
			<center class='form-signin-logo'><img src='http://placehold.it/300x150&text=Barkley' /></center>
			<!--<div  class='alert alert-$error'><button type='button' class='close' data-dismiss='alert'>&times;</button>$error_text</div>-->
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
	if (isset($_POST['loginbtn'])){
	
		$Email = $_POST['cemail'];
		$Password = $_POST['password'];
		
		$User = new User($Email, $Password);
		$UserInfo = $User->Login();
		
		if(isset($UserInfo)){
			if(isset($UserInfo[0])){$_SESSION['userid'] = $UserInfo[0];}
			if(isset($UserInfo[1])){$_SESSION['cemail'] = $UserInfo[1];}
			if(isset($UserInfo[2])){if(isset($UserInfo[3])){$_SESSION['username'] = "$UserInfo[2]_$UserInfo[3]";}}
			echo "<meta http-equiv='refresh' content='0;URL=bk-admin'>";
		}else{
			echo "An error occured while trying to log you in.";
		}
	}	
	else
	    echo $form;
}

	?>
	
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bk-includes/js/jquery.js"></script>
    <script src="bk-includes/js/bootstrap.min.js"></script>

	<div class="footer">
		<div id="copyright">Made with &hearts; In Baltimore</div>
		<div id="version">Barkley 0.1</div>
	</div>
	
  </body>
</html>
