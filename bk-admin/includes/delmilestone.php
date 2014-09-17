<html>
	<head>
		<title>Deleting...</title>
		<script type="text/javascript" src="../site/js/developer.js"></script>
	</head>
<body><?php
error_reporting(0);
$project = $_GET['project'];
$milestone = $_GET['milestone'];

if(!$project == null && !$milestone == null){
	if($milestone == $milestone){
		require_once("connect.php");
		$milestone_title = "SELECT `milestone_title` FROM `milestones` WHERE milestone_id= $milestone";
		$milestone_title = mysql_query($milestone_title);
		$milestone_title = mysql_result($milestone_title, 0);
		
		$query= "DELETE FROM `milestones` WHERE milestone_id = $milestone";
		mysql_query($query);
		//header("Location: ../edit.php?project=$project&error=success&error_text=$milestone_title+has+been+successfully+deleted");
		// Add who deleted a milestone to the log.
		echo "<META http-equiv='refresh' content='0;URL=../edit.php?tab=milestones&project=$project&error=success&error_text=$milestone_title+has+been+successfully+deleted'>";
	}
}else
//header("Location: ../edit.php?project=$project&error=danger&error_text=An+error+has+occured+could+not+delete+milestone.");
echo "<META http-equiv='refresh' content='0;URL=../edit.php?tab=milestones&project=$project&error=danger&error_text=An+error+has+occured+could+not+delete+milestone.'>";

?></body>
