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