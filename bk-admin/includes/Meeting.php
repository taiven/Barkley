<?php 
class Meeting{
	
	public $accountID;
	public $projectID;
	public $meetingID;
	public $meetingTitle;
	public $meetingDetails;
	public $meetingDate;

	public function Create(){
		$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
		if(isset($this->projectID) && isset($this->meetingTitle) && isset($this->meetingDetails) && isset($this->meetingDate)){
			$results = mysqli_query($DataConnect, "INSERT INTO `meetings` VALUES ('', '".$this->projectID."', '".$this->meetingTitle."', '".$this->meetingDetails."', 'NOW()')");
			if($results){
				return true;
			}else{
				return false;
			}
		}
	}
	public function NewProjectMeeting(){}
	public function Complete(){}
	public function Update(){}
	public function Delete(){
		$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
		if(isset($this->meetingID)){
			$results = mysqli_query($DataConnect, "DELETE FROM `meetings` WHERE meeting_id = '".$this->meetingID."'");
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
			$result = mysqli_query($DataConnect,"SELECT * FROM meetings WHERE project_id='$ProjectID'");
			$this->projectID = $ProjectID;
		}else{
			$result = mysqli_query($DataConnect,"SELECT * FROM meetings WHERE project_id='".$this->projectID."'");
		}
		$Meetings = array();
			while($row = mysqli_fetch_array($result)) {			
					
					$Meeting = new Meeting();
					$Meeting->meetingID = $row ['meeting_id'];
					$Meeting->meetingTitle = $row ['meeting_title'];
					$Meeting->meetingDetails = $row ['meeting_details'];
					$date = $row ['date'];
					$date = strtotime($date);
					$Meeting->meetingDate = date("F j,Y", $date);
					
					$Meetings[] = $Meeting;
			}
		return $Meetings;
	}
}
?>