<!DOCTYPE html>
<?php 
session_start();
$userid = $_SESSION['userid'];
$cemail = $_SESSION['cemail'];
$username = $_SESSION['username'];

if(!$cemail && !$userid){
 header("Location: ../../index.php");
 }

require "functions/connect.php";
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Wubcrate &middot; Developers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="$description">
    <meta name="author" content="Wubcrate">

    <!-- Le styles -->
    <link href="site/css/bootstrap.min.css" rel="stylesheet">
    <link href="site/css/styles.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" media="all" href="site/css/chat.css" />
	<link type="text/css" rel="stylesheet" media="all" href="site/css/screen.css" />

	<!--[if lte IE 7]>
	<link type="text/css" rel="stylesheet" media="all" href="site/css/screen_ie.css" />
	<link type="text/css" rel="stylesheet" media="all" href="site/css/ie_styles.css" />
	<![endif]-->
	

    <style type="text/css">
      body {
        padding-top: 50px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
	<script>
	if(typeof(w)=="undefined")
	{
	w=new Worker("site/js/chat.js");
	}</script>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

  <body><div id="main_container">
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Developers</a>
		  </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php"><span class="glyphicon glyphicon-dashboard icon"></span> Dashboard</a>
              <li><a href="activity.php"><span class="glyphicon glyphicon-flash icon"></span> Activity</a></li>
              <li><a href="projects.php?tab=projects"><span class="glyphicon glyphicon-folder-close icon"></span> Projects</a></li>
              <li><a href="database.php?tab=overview"><span class="glyphicon glyphicon-save icon"></span> Database</a></li>
              <li><a href="http://community.wubcrate.com"><span class="glyphicon glyphicon-globe icon"></span> Community</a></li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-question-sign icon"></i> Help<b class="caret"></b></a>
              <ul class="dropdown-menu">
              <li><a href="http://support.wubcrate.com">Support</a></li>
              <li><a>FAQ</a></li>
			  <li><a>About</a></a></li>
			  <li><a>Feedback</a></a></li>
    		   		</ul>
  			 	</li>
            </ul>
          </div><!--/.nav-collapse -->
      </div>
    </div>
	<a id="hideSideBar" class="sidebar_button btn btn-info" style="display:none;" href="javascript:void(0)" onclick="hideSideBar()"><i class="glyphicon glyphicon-th-large"></i></a>
	<a id="showSideBar" class="sidebar_button btn btn-info" href="javascript:void(0)"><i class="glyphicon glyphicon-th-large"></i></a>
	<div id="sidebar" class="pull-right sidebar-wrap" style="z-index:1001;">
		<ul class="nav nav-tabs">
		<li><a href="#activity" data-toggle="tab">Activity</a></li>
		<li><a href="#account" data-toggle="tab">My Account</a></li>
		</ul>
			<div class="tab-content">
				<div class="tab-pane sidebar active" id="activity">
					<h3 class="sidebar_title">Recent Activities</h3>
						<ul class="list-group activity">
						  <li class="list-group-item">
							<ol class="breadcrumb">
								<li><a href="#">User</a></li>
								<li class="active">Action</li>
								<li><a href="#">Project</a></li>
							</ol>
						  </li>
						</ul>
						<div class="panel panel-default">
						 <ul class="list-group">
						 <div class="panel-heading">
							<h3 class="panel-title" style="text-align:center;font-weight:bold;">Chat</h3>
						</div>
						<li class="list-group-item">
							<div class="media">
							<a class="pull-left" href="#">
							<img class="media-object" src="http://placehold.it/20x20" alt="...">
							</a>
							<div class="media-body">
							<a href="#" onclick="javascript:chatWith('Taiven_Rumph')"><h4 class="media-heading">Taiven Rumph</h4></a>
							<p>Chief Executive Officer</p>
							</div>
							</div>
						</li>
						<li class="list-group-item">
						<div class="media">
						<a class="pull-left" href="#">
							<img class="media-object" src="http://placehold.it/20x20" alt="...">
							</a>
							<div class="media-body">
							<a href="#" onclick="javascript:chatWith('Jeff_Lewis')"><h4 class="media-heading">Jeff Lewis</h4></a>
							<p>President of Design</p>
							</div>
						</div>
						</li>
						</ul>
						</div>
				</div>
				<?php 
							require("functions/connect.php");
							$query = "SELECT * FROM client_accounts WHERE account_id='$userid'";
							$query = mysql_query($query);
							$numrows = mysql_num_rows($query);
							if ($numrows > 0){
								
								while ($row = mysql_fetch_assoc($query)){
									$my_account_id = $row ['account_id'];
									$my_account_first_name = $row ['first_name'];
									$my_account_last_name = $row ['last_name'];
									$my_account_email = $row ['email'];
									$my_account_gender = $row ['gender'];
									$my_account_phone = $row ['phone'];
								}
							}
							else
								echo "<META http-equiv='refresh' content='0;URL=../projects.php?error=danger&error_text=Please+contact+customer+support+FATAL+error.'>";

						  ?>
				<div class="tab-pane" id="account">
					<h3 class="sidebar_title">My Account</h3>
					<div class="container">
						<form method="post" action="functions/account.php" role="form">
							<div class="form-group">
								<label for="first_name">First Name</label>
								<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" value="<?php echo $my_account_first_name;?>"/>
								<label for="last_name">Last Name</label>
								<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name" value="<?php echo $my_account_last_name;?>"/>
								<label for="email_address">Email Address</label>
								<input type="text" class="form-control" id="email_address" name="email_address" placeholder="Email address" value="<?php echo $my_account_email;?>"/>
								<label>Gender</label>
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-primary <?php if($my_account_gender == 0) echo "active";?>">
										<input type="radio" name="gender" id="male" value="0"> Male
									</label>
									<label class="btn btn-primary <?php if($my_account_gender == 1) echo "active";?>">
										<input type="radio" name="gender" id="female" value="1"> Female
									</label>
								</div>
								<label for="phone_number">Phone</label>
								<input type="text" class="form-control"  id="phone_number" name="phone_number" placeholder="Phone" value="<?php echo $my_account_phone;?>" />
								<input type="hidden" name="account_id" value="<?php echo $userid ?>"/>
								<button class="btn btn-success account_button" type="submit">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
	</div>
	