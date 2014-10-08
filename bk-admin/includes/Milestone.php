<?php 
class Milestone{
	
	public $accountID;
	public $projectID;
	public $milestoneID;
	public $milestoneTitle;
	public $milestoneDetails;
	public $milestoneDate;

	public function Create(){
		$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
		if(isset($this->projectID) && isset($this->milestoneTitle) && isset($this->milestoneDetails) && isset($this->milestoneDate)){
			$results = mysqli_query($DataConnect, "INSERT INTO `milestones` VALUES ('', '".$this->projectID."', '".$this->milestoneTitle."', '".$this->milestoneDetails."', '0', 'NOW()')");
			if($results){
				return true;
			}else{
				return false;
			}
		}
	}
	public function NewProjectMilestone(){}
	public function Complete(){}
	public function Update(){}
	public function Delete(){
		$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
		if(isset($this->milestoneID)){
			$results = mysqli_query($DataConnect, "DELETE FROM `milestones` WHERE milestone_id = '".$this->milestoneID."'");
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
			$result = mysqli_query($DataConnect,"SELECT * FROM milestones WHERE project_id='$ProjectID'");
			$this->projectID = $ProjectID;
		}else{
			$result = mysqli_query($DataConnect,"SELECT * FROM milestones WHERE project_id='".$this->projectID."'");
		}
		$Milestones = array();
			while($row = mysqli_fetch_array($result)) {			
					
					$Milestone = new Milestone();
					$Milestone->milestoneID = $row ['milestone_id'];
					$Milestone->milestoneTitle = $row ['milestone_title'];
					$Milestone->milestoneDetails = $row ['milestone_details'];
					$date = $row ['date'];
					$date = strtotime($date);
					$Milestone->milestoneDate = date("F j,Y", $date);
					
					//$tasks = mysqli_query($DataConnect,"SELECT `subtask_id`, COUNT(subtask_id) FROM `subtasks` WHERE `task_id` = '".$row ['task_id']."'");
					//$Task->projectSubTasks = $tasks->fetch_row()[1];
					$Milestones[] = $Milestone;
			}
		return $Milestones;
	}
}
?>