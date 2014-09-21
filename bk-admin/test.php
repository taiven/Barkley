Projects
<?php
include('../bk-config.php');

$Projects = new Project();
if($Projects){
	echo "Created new Projects Object.</br>";
	var_dump($Projects);
}
$Project_Results = $Projects->ReturnAll(74736733);

if($Project_Results){
	echo "Projects Object Returned Results!";
	var_dump($Project_Results);
	foreach ($Project_Results as $Project){
		echo "Returned Project <b>\"".$Project->projectName ."\"</b> from your database.</br>";
	}
}
?>
</br>
</br>
</br>
Tasks
<?php
$Tasks = new Task();
if($Tasks){
	echo "Created new Tasks Object.</br>";
	var_dump($Tasks);
	//$Tasks->projectID = 51;
}
$Tasks_Results = $Tasks->ReturnAll(51);

if($Tasks_Results){
	echo "Tasks Object Returned Results!";
	var_dump($Tasks_Results);
	foreach ($Tasks_Results as $Task){
		echo "Returned Task <b>\"".$Task->taskTitle ."\"</b> from your database.</br>";
	}
}

?>
</br>
</br>
</br>
Milestones
<?php
$Milestones = new Milestone();
if($Milestones){
	echo "Created new Milestones Object.</br>";
	var_dump($Milestones);
	//$Milestones->projectID = 51;
}
$Milestones_Results = $Milestones->ReturnAll(51);

if($Milestones_Results){
	echo "Milestones Object Returned Results!";
	var_dump($Milestones_Results);
	foreach ($Milestones_Results as $Milestone){
		echo "Returned Milestone <b>\"".$Milestone->milestoneTitle ."\"</b> from your database.</br>";
	}
}
?>