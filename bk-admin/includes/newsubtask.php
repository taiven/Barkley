<html>
	<head>
		<title>Uploading Please Wait</title>
		<script type="text/javascript" src="../site/js/developer.js"></script>
	</head>
<body><?php 
error_reporting(0);
// First Form
$project = $_GET['project'];
$task = $_GET['task'];
$task_title = $_POST['subtask_title'];
$deadline = $_POST['subtask_deadline'];
$task_details = $_POST['subtask_details'];
$date = date("Y-m-d");

if($task){
$connect = require("connect.php");

			$next_id = mysql_query(" SHOW TABLE STATUS LIKE 'subtasks' ");
			$next = mysql_fetch_assoc($next_id);
			$next_id = $next['Auto_increment'];
// Form1
mysql_query("INSERT INTO subtasks VALUES ('', '$task', '$task_title', '$task_details', '', '', '$deadline', '0', '') ");
mysql_query("INSERT INTO subtask_mapping VALUES ('', '$task', '$next_id', '$date')");
echo "$task_title && $project && $deadline && $task_details";
//header("Location: ../edit.php?project=$project&error=success&error_text=Successfully+added+$task_title+to+tasks.");
echo "<META http-equiv='refresh' content='0;URL=../edit.php?tab=subtasks&project=$project&task=$task&error=success&error_text=Successfully+added+$task_title+to+tasks.'>";
// Add who created a new task to the log.
// Create the email form that notifies users that are assigned to the task that a new task has been assigned to them.
}elseif(!$project){
echo "<META http-equiv='refresh' content='0;URL=../edit.php?tab=subtasks&project=$project&task=$task&error=success&error_text=An+error+has+occurred$task_title+could+not+be+added.'>";
}
?></body>
