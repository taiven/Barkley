<html>
	<head>
		<title>Restoring...</title>
		<script type="text/javascript" src="../site/js/developer.js"></script>
	</head>
<body><?php
error_reporting();
$project = $_GET['project'];
$archive = $_GET['archived'];

	if($archive == 0){
		require_once("connect.php");
		$query = "UPDATE `projects` SET `archived` = 0 WHERE project_id = $project";
		mysql_query($query) or die(mysql_error());
		$project_title = "SELECT `project_name` FROM `projects` WHERE project_id= $project";
		$project_title = mysql_query($project_title) or die(mysql_error());
		$project_title = mysql_result($project_title, 0);
		//header("Location: ../projects.php?error=success&error_text=$project_title+has+been+successfully+restored");
		echo "<META http-equiv='refresh' content='0;URL=../projects.php?error=success&error_text=$project_title+has+been+successfully+restored'>";
		// Add who restored a project to the log.
		// Create the email form that notifies users that are assigned to the project that their project has been restored from archive.
	}else
//header("Location: ../projects.php?error=danger&error_text=An+error+has+occured+could+not+restore.");
echo "<META http-equiv='refresh' content='0;URL=../database.php?tab=archive&error=danger&error_text=An+error+has+occured+could+not+restore+project.'>";

?></body>
