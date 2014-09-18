<html>
	<head>
		<title>Updating Milestone</title>
		<script type="text/javascript" src="../site/js/developer.js"></script>
	</head>
<body><?php 
error_reporting();
// First Form
$project = $_GET['project'];
$milestone_title = $_POST['milestone_title'];
$date = $_POST['milestone_date'];
$milestone_details = $_POST['milestone_details'];
$milestone = $_GET['milestone'];

	if($milestone){
	$connect = require("connect.php");
	// Form1
	mysql_query("UPDATE  `milestones` SET  `milestone_title` =  '$milestone_title', `milestone_details` =  '$milestone_details', `date` =  '$date' WHERE  `milestone_id` = '$milestone' AND  project_id = '$project'");
	//header("Location: ../edit.php?project=$project&error=success&error_text=Successfully+added+$milestone_title+to+milestones.");
	// Add who edited a milestone to the log.
	echo "<META http-equiv='refresh' content='0;URL=../edit.php?tab=milestones&project=$project&error=success&error_text=Successfully+updated+$milestone_title.'>";
	}elseif(!$milestone){
	echo "<META http-equiv='refresh' content='0;URL=../edit.php?tab=milestones&project=$project&error=danger&error_text=Could+not+update+milestone.'>";
	}
?></body>
