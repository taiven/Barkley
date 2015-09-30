<!DOCTYPE html>
<?php 
@session_start();
$userid = $_SESSION['userid'];
$cemail = $_SESSION['cemail'];
$username = $_SESSION['username'];
include('../bk-config.php');
if(!$cemail && !$userid){
	header("Location: ../index.php");
 }

?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Barkley</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="$description">
        <meta name="author" content="Wubcrate">

        <!-- Le styles -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">-->
        <link rel="icon" href="img/barkley-symbol.png" sizes="16x16" type="image/png">
        <link href="css/styles.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" media="all" href="css/project.css" /> <!-- Get Project CSS -->
        <!--<link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
        <link type="text/css" rel="stylesheet" media="all" href="css/screen.css" />-->
        <link type="text/css" rel="stylesheet" media="all" href="../bk-includes/css/normalize.css" />
        <!--[if lte IE 7]>
        <link type="text/css" rel="stylesheet" media="all" href="site/css/screen_ie.css" />
        <link type="text/css" rel="stylesheet" media="all" href="site/css/ie_styles.css" />
        <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <!--<script>
        if(typeof(w)=="undefined")
        {
        w=new Worker("js/chat.js");
        }</script>-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>
    
    <body>
	
    <header id="header">
        <div id="title">Barkley</div>
        <nav id="primary">
            <ul>
                <li><a href="index.php">Dashboard</a>
                <!--<li><a href="activity.php">Activity</a></li>-->
                <li><a href="projects.php?tab=myprojects">Projects</a></li>
                <!--<li><a href="database.php?tab=overview"> Database</a></li>-->
                <!--<li><a href="community.php"> Community</a></li>-->
                <li><a href="javascript:void(0)" onclick="javascript:chatWith(<?php echo $username;?>)"><?php echo $username;?></a></li>
            </ul>
        </nav>
    </header>
    
    <div id="bk-main">
        <!--<div id="bk-menu-wrap">include("modules/bk-menu/bk-menu.php");</div>-->