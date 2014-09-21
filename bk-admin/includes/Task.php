<?php
class Task{
	
	public $projectID;
	public $taskID;
	public $taskTitle;
	public $taskDescription;
	public $taskAssignedTo;
	public $taskAssignedBy;
	public $taskDeadline;
	public $taskComplete;
	public $taskDate;
	
	public function Create(){}
	public function Update(){}
	public function Delete(){}
	public function Restore(){}
	public function Assign(){}
	
	public function ReturnAll($ProjectID = null){
		$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
		if(isset($ProjectID)){
			$result = mysqli_query($DataConnect,"SELECT * FROM tasks WHERE project_id='$ProjectID'");
			$this->projectID = $ProjectID;
		}else{
			$result = mysqli_query($DataConnect,"SELECT * FROM tasks WHERE project_id='".$this->projectID."'");
		}
		$Tasks = array();
			while($row = mysqli_fetch_array($result)) {			
					
					$Task = new Task();
					$Task->taskID = $row ['task_id'];
					$Task->taskTitle = $row ['task_title'];
					$Task->taskDetails = $row ['task_details'];
					$Task->taskAssignedTo = $row ['assignedto'];
					$Task->taskAssignedBy = $row ['assignedby'];
					$Task->taskComplete = $row ['complete'];
					$date = $row ['date'];
					$date = strtotime($date);
					$Task->taskDate = date("F j,Y", $date);
					$deadline = $row ['deadline'];
					$deadline = strtotime($deadline);
					$Task->taskDeadline = date("F j,Y", $deadline);
					
					$tasks = mysqli_query($DataConnect,"SELECT `subtask_id`, COUNT(subtask_id) FROM `subtasks` WHERE `task_id` = '".$row ['task_id']."'");
					$Task->projectSubTasks = $tasks->fetch_row()[1];
					$Tasks[] = $Task;
			}
		return $Tasks;
	}
}
