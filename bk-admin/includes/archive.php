<html>
	<head>
		<title>Archiving...</title>
		<script type="text/javascript" src="../site/js/developer.js"></script>
	</head>
<body><?php
error_reporting(0);
$project = $_GET['project'];
$archive = $_GET['archived'];

if(!$project == null && !$archive == null){
	if($archive == 1){
		require_once("connect.php");
		$query= "UPDATE `projects` SET `archived` = 1 WHERE project_id = $project";
		mysql_query($query);
		$project_title = "SELECT `project_name` FROM `projects` WHERE project_id= $project";
		$project_title = mysql_query($project_title);
		$project_title = mysql_result($project_title, 0);
		//header("Location: ../projects.php?error=success&error_text=$project_title+has+been+successfully+archived");
		echo "<META http-equiv='refresh' content='0;URL=../database.php?tab=archive&error=success&error_text=$project_title+has+been+successfully+archived'>";
		// Add who archived a project to the log.
		// Create the email form that notifies users that the project they are assigned to has been archived.
	}
}else
//header("Location: ../projects.php?error=danger&error_text=An+error+has+occured+could+not+archive.");
echo "<META http-equiv='refresh' content='0;URL=../projects.php?error=danger&error_text=An+error+has+occured+could+not+archive.'>";

?></body>
