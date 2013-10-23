<html>
	<head>
		<title>Updating...</title>
		<script type="text/javascript" src="../site/js/developer.js"></script>
	</head>
<body><?php
error_reporting();
$task = $_GET['task'];
$subtask = $_GET['subtask'];
$task_title = $_POST['subtask_title'];
$task_details = $_POST['subtask_details'];
$date = $_POST['subtask_date'];
	if(!empty($task)){
		require_once("connect.php");
		$query = "UPDATE `subtasks` SET `task_title` = '$task_title', `task_details` = '$task_details', `deadline` = '$date' WHERE subtask_id = '$subtask' AND task_id = '$task'";
		mysql_query($query) or die(mysql_error());
		$task_title = "SELECT `task_title` FROM `subtasks` WHERE subtask_id= '$subtask'";
		$task_title = mysql_query($task_title) or die(mysql_error());
		$task_title = mysql_result($task_title, 0);
		//header("Location: ../projects.php?error=success&error_text=$project_title+has+been+successfully+restored");
		// Add who edited the tasks to the log.
		echo "<META http-equiv='refresh' content='0;URL=../edit.php?tab=tasks&project=$project&subtask=$subtask&error=success&error_text=Successfully+updated+$task_title.'>";
	}else
//header("Location: ../projects.php?error=danger&error_text=An+error+has+occured+could+not+restore.");
echo "<META http-equiv='refresh' content='0;URL=../edit.php?tab=subtasks&project=$project&subtask=$subtask&error=danger&error_text=Could+not+update+task.'>";

?></body>
