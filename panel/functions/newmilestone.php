<html>
	<head>
		<title>Creating Milestone</title>
		<script type="text/javascript" src="../site/js/developer.js"></script>
	</head>
<body><?php 

// First Form
$project = $_GET['project'];
$milestone_title = $_POST['milestone_title'];
$date = $_POST['milestone_date'];
$milestone_details = $_POST['milestone_details'];

if($project){
require("connect.php");

mysql_query("INSERT INTO milestones VALUES ('', '$project','$milestone_title', '$milestone_details', '', '$date') ") or die(mysql_error());
// Add who created a new milestone to the log.
//header("Location: ../edit.php?project=$project&error=success&error_text=Successfully+added+$milestone_title+to+milestones.");
echo "<META http-equiv='refresh' content='0;URL=../edit.php?tab=milestones&project=$project&error=success&error_text=Successfully+added+$milestone_title+to+milestones.'>";
}elseif(!$project){
echo "<META http-equiv='refresh' content='0;URL=../edit.php?tab=milestones&project=$project&error=danger&error_text=Please+complete+the+form+and+try+again.'>";
}
?></body>
