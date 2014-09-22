<?php

class Project{
	
	public $projectID;
	public $projectName;
	public $projectStart;
	public $projectDeadline;
	public $projectDescription;
	public $projectArchived;
	public $projectTasks;
	
	public function Create($AccountID, $ProjectName, $ProjectStart, $ProjectDeadline, $ProjectDescription, $ProjectArchived){
		$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
		if(isset($ProjectName) && isset($ProjectStart) && isset($ProjectDeadline) && isset($ProjectDescription) && isset($ProjectArchived)){
			$results = mysqli_query($DataConnect, "INSERT INTO `projects` '', '0', '$ProjectName','$ProjectStart','$ProjectDescription','$ProjectDeadline','$ProjectArchived'");
			$Project = $results->insert_id;
			if($Project){
				$DefAction = mysqli_query($DataConnect, "INSERT INTO `project_mapping` '', '$Project', '$AccountID', 'NOW()'");
			}
		}
	}
	
	public function Update($ProjectID=null,$ProjectName, $ProjectStart, $ProjectDeadline, $ProjectDescription, $ProjectArchived){
		$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
		if(isset($ProjectID)){
			$results = mysqli_query($DataConnect, "UPDATE projects SET project_name='$ProjectName',start='$ProjectStart',deadline='$ProjectDeadline',description='$ProjectDescription',archived='$ProjectArchived' WHERE project_id='$ProjectID'");
		}else{
			$results = mysqli_query($DataConnect, "UPDATE projects SET project_name='$ProjectName',start='$ProjectStart',deadline='$ProjectDeadline',description='$ProjectDescription',archived='$ProjectArchived' WHERE project_id='".$This->projectID."'");
		}
	}
	public function Delete($ProjectID=null){
		$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
		$task = mysqli_query($DataConnect, "SELECT task_id FROM tasks WHERE project_id='$Project_ID'");
		if(isset($ProjectID)){
			$results = mysqli_query($DataConnect, "DELETE FROM `projects` WHERE project_id='$ProjectID' AND DELETE FROM `project_mapping` WHERE p_id = '$Project_ID' AND DELETE FROM `tasks` WHERE project_id = '$ProjectID'");
		}else{
			$ProjectID = $This->projectID;
		}
		while($tasks->num_rows > 0){
				$results = mysqli_query($DataConnect, "DELETE FROM `subtasks` WHERE task_id='$task'");
			}
	}
	public function Archive($ProjectID=null, $Value=true){
		$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
		$results = mysqli_query($DataConnect, "UPDATE `projects` SET archived='$Value' WHERE project_id='$ProjectID'");
		
		if($results){
			return true;
		}else return false;
	}
	
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