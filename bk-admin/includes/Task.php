<?php
class Task{
	public $accountID;
	public $projectID;
	public $taskID;
	public $taskTitle;
	public $taskDescription;
	public $taskAssignedTo;
	public $taskAssignedBy;
	public $taskDeadline;
	public $taskComplete;
	public $taskDate;
	
	public function Create(){
		$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
		if(isset($this->accountID) && isset($this->projectID) && isset($this->taskTitle) && isset($this->taskDescription) && isset($this->taskDeadline)){
			$results = mysqli_query($DataConnect, "INSERT INTO `tasks` VALUES ('', '".$this->projectID."', '".$this->taskTitle."', '".$this->taskDescription."', '0', '0', '".$this->taskDeadline."', '0', 'NOW()')");
			if($results){
				return true;
			}else{
				return false;
			}
		}
	}
	public function Update(){
		$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
		if(isset($this->accountID) && isset($this->projectID) && isset($this->taskTitle) && isset($this->taskDescription) && isset($this->taskDeadline)){
			$results = mysqli_query($DataConnect, "UPDATE `tasks` SET `task_title`='".$this->taskTitle."',`task_details`='".$this->taskDescription."', `deadline`='".$this->taskDeadline."' WHERE task_id = '".$this->taskID."'");
			if($results){
				return true;
			}else{
				return false;
			}
		}
	}
	public function Delete(){
		$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
		if(isset($this->taskID)){
			$results = mysqli_query($DataConnect, "DELETE FROM `tasks` WHERE task_id = '".$this->taskID."'");
			if($results){
				return true;
			}else{
				return false;
			}
		}
	}
	public function Restore(){}
	public function Assign($Users = array()){
		$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
		
		foreach ($Users as $User){
			$UserList .= $prefix . '"' . $User . '"';
			$prefix = ', ';
		}
		
		if(isset($this->taskID)){
			$results = mysqli_query($DataConnect, "UPDATE `tasks` SET assignedto ='$UserList', assignedby='$this->accountID' WHERE task_id = '".$this->taskID."'");
			if($results){
				return true;
			}else{
				return false;
			}
		}
	}
	
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
