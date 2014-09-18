<html>
	<head>
		<title>Deleting...</title>
		<script type="text/javascript" src="../site/js/developer.js"></script>
	</head>
<body><?php
error_reporting(0);
$project = $_GET['project'];
$task = $_GET['task'];

if(!$project == null && !$task == null){
	if($task == $task){
		require_once("connect.php");
		$task_title = "SELECT `task_title` FROM `tasks` WHERE task_id= $task";
		$task_title = mysql_query($task_title);
		$task_title = mysql_result($task_title, 0);
		
		$query= "DELETE FROM `tasks` WHERE task_id = $task";
		mysql_query($query);
		//header("Location: ../edit.php?project=$project&error=success&error_text=$task_title+has+been+successfully+deleted");
		// Add who delete a tasks to the log.
		echo "<META http-equiv='refresh' content='0;URL=../edit.php?tab=tasks&project=$project&error=success&error_text=$task_title+has+been+successfully+deleted'>";
	}
}else
//header("Location: ../edit.php?project=$project&error=danger&error_text=An+error+has+occured+could+not+delete+task.");
echo "<META http-equiv='refresh' content='0;URL=../edit.php?tab=tasks&project=$project&error=danger&error_text=An+error+has+occured+could+not+delete+task.'>";


?></body>
