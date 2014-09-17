<html>
	<head>
		<title>Updating...</title>
		<script type="text/javascript" src="../site/js/developer.js"></script>
	</head>
<body><?php
error_reporting();
$project = $_GET['project'];
$task_title = $_POST['task_title'];
$task_details = $_POST['task_details'];
$date = $_POST['task_date'];
$task = $_GET['task'];
	if(!empty($task)){
		require_once("connect.php");
		$query = "UPDATE `tasks` SET `task_title` = '$task_title', `task_details` = '$task_details', `deadline` = '$date' WHERE task_id = '$task' AND project_id = '$project'";
		mysql_query($query) or die(mysql_error());
		$task_title = "SELECT `task_title` FROM `tasks` WHERE task_id= '$task'";
		$task_title = mysql_query($task_title) or die(mysql_error());
		$task_title = mysql_result($task_title, 0);
		//header("Location: ../projects.php?error=success&error_text=$project_title+has+been+successfully+restored");
		// Add who edited the tasks to the log.
		echo "<META http-equiv='refresh' content='0;URL=../edit.php?tab=tasks&project=$project&error=success&error_text=Successfully+updated+$task_title.'>";
	}else
//header("Location: ../projects.php?error=danger&error_text=An+error+has+occured+could+not+restore.");
echo "<META http-equiv='refresh' content='0;URL=../edit.php?tab=tasks&project=$project&error=danger&error_text=Could+not+update+task.'>";

?></body>
