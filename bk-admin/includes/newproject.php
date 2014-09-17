<html>
	<head>
		<title>Creating New Project</title>
		<script type="text/javascript" src="../site/js/developer.js"></script>
	</head>
<body><?php 
error_reporting(0);
// First Form
$project_id = $_GET['project'];
$project_name = $_POST['project_name'];
$deadline = $_POST['deadline'];
$description = $_POST['description'];
$team = $_POST['selected_users'];
$team_size = count($team);
$date = date("Y-m-d");
if($_POST['new_project'] == 'create'){
	$connect = require("connect.php");
	
	$next_id = mysql_query(" SHOW TABLE STATUS LIKE 'projects' ");
	$next = mysql_fetch_assoc($next_id);
	$next_id = $next['Auto_increment'];

	mysql_query("INSERT INTO projects VALUES ('', '','$project_name', '', '$description', '$deadine', '0') ");
	foreach($team as $user){
	mysql_query("INSERT INTO project_mapping VALUES ('', '$next_id','$user', '$date') ");
	// Add who created a new project to the log.
	// Create the email form that notifies users that are assigned to the project that they are assigned to the project.
	}
//header("Location: ../projects.php?error=success&error_text=$project_name+successfuly+created.");
echo "<META http-equiv='refresh' content='0;URL=../projects.php?error=success&error_text=$project_name+successfuly+created+with+$team_size+team+members.'>";

}else
echo "<META http-equiv='refresh' content='0;URL=../projects.php?error=danger&error_text=Please+complete+the+form+and+try+again.'>";
?></body>
