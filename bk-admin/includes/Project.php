<?php

class Project{
	
	public $projectID;
	public $projectName;
	public $projectStart;
	public $projectDeadline;
	public $projectDescription;
	public $projectArchived;
	
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
					$Projects[] = $Project;
					/*$tasks =  "SELECT `task_id`, COUNT(task_id) FROM `tasks` WHERE `project_id` = '$project_id'";
					$tasks = mysql_query($tasks);
					$tasks = mysql_result($tasks,0,1);
					*/				
					/*if($archived == 0){
						echo "<tr>
							<td>$project_name</td>
							<td>$start</td>
							<td>$tasks</td>
							<td>$deadline</td>
							<td>$description</td>
							<!--<td><a class='btn btn-primary' href='?tab=myprojects&project=$project_id'>Select</a></td>-->
						</tr>";
					}*/
			}
		return $Projects;
	}
	
	public function Statistics($statistic){
		switch ($statistic) {
		case 'tasks':
			echo "Retrieve number of tasks, completed, uncompleted, pending, average percentage of completed for overall project. The number of unassigned tasks.";
			break;
		case 'subtasks':
			echo "Retrieve number of subtasks for a given task, completed, uncompleted, pending, average percentage of completion for overall task.";
			break;
		case 'milestones':
			echo "Retrieve number of milestones for given project or task, milestones met, milestones unmet, average milestones completed per week/hour/month for given project.";
			break;
		case 'all':
			echo "Retrieve the overall percentage of completed tasks+subtasks+milestones/total amount of tasks/subtasks. Retrieves the overall percentage of uncompleted tasks and subtasks+unmet milestones.";
			break;
		}
	}
}

?>