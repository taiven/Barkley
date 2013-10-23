<html>
	<head>
		<title>Uploading Please Wait</title>
		<script type="text/javascript" src="../site/js/developer.js"></script>
	</head>
<body><?php 
error_reporting(0);
// First Form
$project = $_GET['project'];
$task_title = $_POST['task_title'];
$deadline = $_POST['deadline'];
$task_details = $_POST['task_details'];

if($project){
$connect = require("connect.php");
// Form1
mysql_query("INSERT INTO tasks VALUES ('', '$project','$task_title', '$task_details', '', '', '$deadline', '0', '') ");
echo "$task_title && $project && $deadline && $task_details";
//header("Location: ../edit.php?project=$project&error=success&error_text=Successfully+added+$task_title+to+tasks.");
echo "<META http-equiv='refresh' content='0;URL=../edit.php?tab=tasks&project=$project&error=success&error_text=Successfully+added+$task_title+to+tasks.'>";
// Add who created a new task to the log.
// Create the email form that notifies users that are assigned to the task that a new task has been assigned to them.
}elseif(!$project){
echo "<META http-equiv='refresh' content='0;URL=../edit.php?tab=tasks&project=$project&error=success&error_text=An+error+has+occurred$task_title+could+not+be+added.'>";
}
?></body>
