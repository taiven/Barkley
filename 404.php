<?php
session_start();
require('bk-config.php');
  if (!defined('DB_NAME')) {
   header('Location: bk-admin/install.php');
   exit;
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Plant a Tree</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
     <link rel="icon" href="bk-admin/img/barkley-symbol.png" sizes="16x16" type="image/png">
    <link href="/development/Barkley/bk-includes/css/normalize.css" rel="stylesheet">
    <link href="/development/Barkley/bk-includes/css/styles.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>
	
	<header id="header">
		<div id="title"><a href="/development/Barkley/index.php">Barkley</a></div>
        <nav>
            <ul>
                <li><a href="#About">About</a></li>
                <li><a href="#Features">Features</a></li>
                <li><a href="#Pricing">Pricing</a></li>
    <?php
	
	$error = null;
	$error_text = null;
	
	if (isset($cemail) && isset($userid)){
		//echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>You have been logged in as <b>$cemail</b>. <a href='panel'>Click here</a> to go to the member page.</div>";
		header ("Location: bk-admin");
	}	
	else {

		$form = "
		<li><form action='index.php' method='post'>
			<input type='text' class='form-control' placeholder='Email Address' name='cemail' />
			<input type='password' class='form-control' placeholder='Password' name='password' />
			<button type='submit' class='btn btn-lg btn-primary btn-block' name='loginbtn' value='Login'>Login</button>
        </form></li>";
	//Change loginbtn is for the actual button on the form... change both to something more suitable
	if (!isset($_POST['loginbtn'])){
        echo $form;
    }
}

	?>
        </ul>
    </nav>
    </header>
    <?php
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
    ?>
    
    <div id="C2A" class="NotFound">
        <h2 class="title">Your Tree couldn't be found.</h2>
        <span class="subtitle">Try planting a seed and growing more trees.</span>
    </div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

	<footer id="footer">
		<div id="copyright">Made with &hearts; In Baltimore</div>
		<div id="version">Development 0.1</div>
	</footer>
	
  </body>
</html>
