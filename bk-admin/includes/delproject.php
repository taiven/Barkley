<html>
	<head>
		<title>Deleting...</title>
		<script type="text/javascript" src="../site/js/developer.js"></script>
	</head>
<body><?php
error_reporting(0);
$project = $_GET['project'];
		$archive = mysql_query("SELECT archive FROM projects WHERE project_id = '$project'");
		$archive = mysql_result($archive,0);
		
if(!$project == null){
	if($archive == 1){
		require_once("connect.php");
		$project_name = "SELECT `project_name` FROM `projects` WHERE project_id= '$project'";
		$project_name = mysql_query($project_name);
		$project_name = mysql_result($project_name, 0);
		
		$query= "DELETE FROM `projects` WHERE project_id = $project";
		mysql_query($query);
		mysql_query("DELETE FROM `project_mapping` WHERE p_id = '$project'");
		mysql_query("DELETE FROM `tasks` WHERE project_id = '$project'");
		//header("Location: ../edit.php?project=$project&error=success&error_text=$task_title+has+been+successfully+deleted");
		// Add who delete a tasks to the log.
		echo "<META http-equiv='refresh' content='0;URL=../database.php?tab=archive&error=success&error_text=$task_title+has+been+successfully+deleted'>";
	}
}else
//header("Location: ../edit.php?project=$project&error=danger&error_text=An+error+has+occured+could+not+delete+task.");
echo "<META http-equiv='refresh' content='0;URL=../database.php?tab=archive&error=danger&error_text=An+error+has+occured+could+not+delete+project.'>";


?></body>
