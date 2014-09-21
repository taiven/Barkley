<?php

class Project{
	
	public $projectID;
	public $projectName;
	public $projectStart;
	public $projectDeadline;
	public $projectDescription;
	public $projectArchived;
	public $projectTasks;
	
	public function Create(){}
	public function Update(){}
	public function Delete(){}
	public function Archive(){}
	public function Restore(){}
	
	public function ReturnAll($AccountID = null){
		$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
		if(isset($AccountID)){
			$result = mysqli_query($DataConnect,"SELECT * FROM project_mapping, projects WHERE a_id = '$AccountID' AND p_id=project_id");
		}else{
			$result = mysqli_query($DataConnect,"SELECT * FROM projects WHERE 1");
		}
		$Projects = array();
			while($row = mysqli_fetch_array($result)) {			
					
					$Project = new Project();
					$Project->projectID = $row ['project_id'];
					$Project->projectName = $row ['project_name'];
					$Project->projectDescription = $row ['description'];
					$Project->projectArchived = $row ['archived'];
					$start = $row ['start'];
					$start = strtotime($start);
					$Project->projectStart = date("F j,Y", $start);
					$deadline = $row ['deadline'];
					$deadline = strtotime($deadline);
					$Project->projectDeadline = date("F j,Y", $deadline);
					
					$tasks = mysqli_query($DataConnect,"SELECT `task_id`, COUNT(task_id) FROM `tasks` WHERE `project_id` = '".$row ['project_id']."'");
					$Project->projectTasks = $tasks->fetch_row()[1];
					$Projects[] = $Project;
			}
		return $Projects;
	}
	
	public function Get($ProjectID = null){
		$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
		if(isset($ProjectID)){
			$result = mysqli_query($DataConnect,"SELECT * FROM projects WHERE project_id='$ProjectID'");
			while($row = mysqli_fetch_array($result)) {			
					$Project = new Project();
					$Project->projectID = $row ['project_id'];
					$Project->projectName = $row ['project_name'];
					$Project->projectDescription = $row ['description'];
					$Project->projectArchived = $row ['archived'];
					$start = $row ['start'];
					$start = strtotime($start);
					$Project->projectStart = date("F j,Y", $start);
					$deadline = $row ['deadline'];
					$deadline = strtotime($deadline);
					$Project->projectDeadline = date("F j,Y", $deadline);
					
					$tasks = mysqli_query($DataConnect,"SELECT `task_id`, COUNT(task_id) FROM `tasks` WHERE `project_id` = '".$row ['project_id']."'");
					$Project->projectTasks = $tasks->fetch_row()[1];
			}
		return $Project;
		}
	}
}

?>