<?php include("includes/header.php");?>
			<?php error_reporting (E_ALL); ?>
         <ul class="nav nav-tabs" style="margin-left:70px;">
			<li><a href="?tab=overview&project=<?php echo $_GET['project'];?>"><span class="glyphicon glyphicon-dashboard icon"></span> Overview</a></li>
			<li><a href="?tab=tasks&project=<?php echo $_GET['project'];?>"><span class="glyphicon glyphicon-list-alt icon"></span> Tasks</a></li>
			<li><a href="?tab=milestones&project=<?php echo $_GET['project'];?>"><span class="glyphicon glyphicon-list icon"></span> Milestones</a></li>
			<li><a href="?tab=meetings&project=<?php echo $_GET['project'];?>"><span class="glyphicon glyphicon-tree-conifer icon"></span> Meetings</a></li>
			<!--<li><a href="?tab=timer&project=<?php echo $_GET['project'];?>"><span class="glyphicon glyphicon-time icon"></span>Timer</a></li>-->
			</ul>
			<?php error_reporting(0); if($_GET['error']){ ?><div class='alert alert-<?php error_reporting(0); if($_GET['error']){echo $_GET['error'];}else echo "danger";?>'>
			   <button type='button' class='close' data-dismiss='alert'>&times;</button>
			   <p><?php if($_GET['error']){echo $_GET['error_text'];}else echo "We apologize, This feature has been disabled and is undergoing maintenance. Please check again later.";?></p>
			</div><?php }?>
			<?php 
			
					if($_GET['project']){
						$project = $_GET['project'];
						$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
						$Query = mysqli_query($DataConnect,"SELECT * FROM project_mapping WHERE a_id = '$userid' AND p_id= '$project'") or die('Query not working');
						$row = $Query->fetch_assoc();
							$id = $row ['id'];
							$p_id = $row ['p_id'];
							$a_id = $row ['a_id'];
							$project_mapping_date = $row ['date'];
						//echo "$id, $p_id, $a_id, $project_mapping_date";
					}
					if($userid == $a_id && $project == $p_id){
						// User belongs to project
					}else{
						echo "<META http-equiv='refresh' content='0;URL=projects.php?project=$project&error=danger&error_text=You+do+not+have+access+to+this+project.'>";
					}
					?>
			<div id="content" class="tab-content">
				<div class="tab-pane <?php if($_GET['tab'] == "overview"){echo "active";}?>" id="overview">
					<div class="container">
						<h3>Overview</h3>
						<table class="table">
							<tr>
								<th>Project Name</th>
								<th>Project Deadline</th>
								<th>Project Description</th>
								<th>Project Tasks</th>
							</tr>
							<?php
							$Projects = new Project();
							if($Projects){
								$Project = $Projects->Get($_GET['project']);
							}
								if($Project){
									echo "<tr>
											<td>". $Project->projectName ."</td>
											<td>". $Project->projectDeadline ."</td>
											<td>". $Project->projectDescription ."</td>
											<td>". $Project->projectTasks ."</td>
										</tr>";
								}else{
									//echo "<META http-equiv='refresh' content='0;URL=projects.php?project=$project&error=danger&error_text=An+error+has+occured+please+select+your+project.'>";
								}
							?>
						</table>
					</div>
				</div>
				
				<div class="tab-pane <?php if($_GET['tab'] == "tasks"){echo "active";}?>" id="tasks">
					
					<ul class="nav nav-tabs" style="margin-left:70px;">
						<li><a href="#new_task" data-toggle="modal"><span class="glyphicon glyphicon-folder-close icon"></span> New Task</a></li>
						<li class="<?php error_reporting(0); if(!$_GET['task']){ echo "disabled";}?>"><a href="#edit_task" <?php if($_GET['task']){ echo "data-toggle=\"modal\"";}  ?>><span class="glyphicon glyphicon-edit icon"></span> Edit Task</a></li>
						<li class="<?php error_reporting(0); if(!$_GET['task']){ echo "disabled";}?>"><a href="edit.php?tab=tasks&project=<?php echo $_GET['project'];?>&task=<?php echo $_GET['task'];?>&action=delete_task"><span class="glyphicon glyphicon-remove icon"></span> Delete Task</a></li>
						<li class="navbar-text">Current Task Selected:<b>
						<?php
						$current_task = $_GET['task'];
						if($current_task){
						$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
						$query = mysqli_query($DataConnect, "SELECT `task_title` FROM `tasks` WHERE task_id = $current_task");
						$selected_task = $query->fetch_row()[0];
						echo $selected_task;}else
						echo "None";
						?></b></li>
						<li class="pull-right"><a href="?tab=subtasks&project=<?php echo $_GET['project'];?>&task=<?php echo $_GET['task'];?>">Subtasks</a></li>
					</ul>
					<div class="container">
					<h3>Tasks</h3>
					 <table class="table">
							<tr>
								<th>Task Title</th>
								<th>Task Details</th>
								<th>Assigned To</th>
								<th>Assigned By</th>
								<th>Deadline</th>
								<th>Select</th>
							</tr>
						<?php 
						
						$Tasks = new Task();
						if($Tasks){$Tasks_Info = $Tasks->ReturnAll($_GET['project']);}
						
						if($Tasks_Info){
							foreach ($Tasks_Info as $Task){
								echo "<tr>
										<td>".$Task->taskTitle."</td>
										<td>".$Task->taskDetails."</td>
										<td>".$Task->taskAssignedTo."</td>
										<td>".$Task->taskAssignedBy."</td>
										<td>".$Task->taskDeadline."</td>
										<td><a class='btn btn-primary' href='?tab=tasks&project=".$_GET['project']."&task=".$Task->taskID."'>Select</a></td>
									</tr>";
							}
						}else
							echo "Their are no tasks associated with this project";
						
						
						if($_GET['action'] == 'new_task'){
							if(isset($_POST['task_title'])){
								if(isset($_POST['task_deadline'])){
									if(isset($_POST['task_details'])){
										$TempTask = new Task();
										$TempTask->accountID = $userid;
										$TempTask->projectID = $_GET['project'];
										$TempTask->taskTitle = $_POST['task_title'];
										$TempTask->taskDeadline = $_POST['task_deadline'];
										$TempTask->taskDescription = $_POST['task_details'];
										$TempTaskResult = $TempTask->Create();
										if($TempTaskResult){
											echo "<META http-equiv='refresh' content='0;URL=edit.php?tab=tasks&project=$TempTask->projectID&error=success&error_text=Your+Task+<b>$TempTask->taskTitle</b>+has+been+created+successfully.'>";
										}
									}
								}
							}
						}
						
						if($_GET['action'] == 'edit_task'){
							if(isset($_POST['task_title'])){
								if(isset($_POST['task_deadline'])){
									if(isset($_POST['task_details'])){
										$TempTask = new Task();
										$TempTask->accountID = $userid;
										$TempTask->projectID = $_GET['project'];
										$TempTask->taskID = $_GET['task'];
										$TempTask->taskTitle = $_POST['task_title'];
										$TempTask->taskDeadline = $_POST['task_deadline'];
										$TempTask->taskDescription = $_POST['task_details'];
										$TempTaskResult = $TempTask->Update();
										if($TempTaskResult){
											echo "<META http-equiv='refresh' content='0;URL=edit.php?tab=tasks&project=$TempTask->projectID&task=$TempTask->taskID&error=success&error_text=Your+Task+<b>$TempTask->taskTitle</b>+has+been+updated+successfully.'>";
										}
									}
								}
							}
						}
						
						if($_GET['action'] == 'delete_task'){
							if($_GET['task']){
								$TempTask = new Task();
								$TempTask->accountID = $userid;
								$TempTask->projectID = $_GET['project'];
								$TempTask->taskID = $_GET['task'];
								$TempTaskResult = $TempTask->Delete();
								if($TempTaskResult){
									echo "<META http-equiv='refresh' content='0;URL=edit.php?tab=tasks&project=$TempTask->projectID&task=$TempTask->taskID&error=success&error_text=Your+Task+<b>$selected_task</b>+has+been+deleted+successfully.'>";
								}					
							}else{
								echo "<META http-equiv='refresh' content='0;URL=edit.php?tab=tasks&project=".$_GET['project']."&error=danger&error_text=Please+select+a+task+first.'>";	
							}
						}
						
							if($_GET['action'] == 'assign_task'){
							if($_GET['task']){
								$TempTask = new Task();
								$TempTask->accountID = $userid;
								$TempTask->projectID = $_GET['project'];
								$TempTask->taskID = $_GET['task'];
								$Users = $_POST['users'];
								$TempTaskResult = $TempTask->Assign($Users);
								if($TempTaskResult){
									echo "<META http-equiv='refresh' content='0;URL=edit.php?tab=tasks&project=$TempTask->projectID&task=$TempTask->taskID&error=success&error_text=Your+Task+<b>$selected_task</b>+has+been+assigned+successfully.'>";
								}					
							}else{
								echo "<META http-equiv='refresh' content='0;URL=edit.php?tab=tasks&project=".$_GET['project']."&error=danger&error_text=Please+select+a+task+first.'>";	
							}
						}
						
						?>
						    </table>
					</div>
				</div>
					<div class="tab-pane <?php if($_GET['tab'] == "subtasks"){echo "active";}?>" id="subtasks">
						<?php $project = $_GET['project'];?>
							<?php if($_GET['tab'] == 'subtasks'){if($_GET['task'] == null){echo "<META http-equiv='refresh' content='0;URL=edit.php?tab=tasks&project=$project&error=danger&error_text=You+did+not+select+a+task.'>";}}?>
						<ul class="nav nav-tabs" style="margin-left:70px;">
							<li class=""><a href="#new_subtask" data-toggle="modal">New Subtask</a></li>
							<li class="<?php error_reporting(0); if(!$_GET['subtask']){ echo "disabled";}?>"><a href="#edit_subtask" data-toggle="modal">Edit Subtask</a></li>
							<li class="<?php error_reporting(0); if(!$_GET['subtask']){ echo "disabled";}?>"><a href="functions/delsubtask.php?project=<?php echo $_GET['project'];?>&task=<?php echo $_GET['task'];?>&subtask=<?php echo $_GET['subtask'];?>">Delete Subtask</a></li>
							<li class="navbar-text">Current Task Selected:<b>
						<?php
						/*require("functions/connect.php");
						$current_task = $_GET['subtask'];
						if($current_task){
						$query = "SELECT `task_title` FROM `subtasks` WHERE subtask_id = $current_task";
						//$query = mysql_query($query);
						//$selected_task = mysql_result($query, 0);
						echo $selected_task;}else
						echo "None";*/
						?></b></li>
						</ul>
						<div class="container">
						<h3>SubTasks</h3>
							<table class="table">
								<tr>
									<th>Task Title</th>
									<th>Task Details</th>
									<th>Assigned To</th>
									<th>Assigned By</th>
									<th>Deadline</th>
									<th>Select</th>
								</tr>
								<?php 
							$task_id = $_GET['task'];
							/*require("functions/connect.php");
							//$query = "SELECT * FROM subtasks WHERE task_id='$task'";
							$query = "SELECT * FROM subtask_mapping, subtasks WHERE t_id = '$task_id' AND st_id= subtask_id";
							//$query = mysql_query($query);
							//$numrows = mysql_num_rows($query);
							if ($numrows > 0){
								
								while ($row = mysql_fetch_assoc($query)){
									$subtask_id = $row ['subtask_id'];
									$subtask_task_id = $row ['task_id'];
									$subtask_task_title = $row ['task_title'];
									$subtask_task_details = $row ['task_details'];
									$subtask_assignedto = $row ['assignedto'];
									$subtask_assignedby = $row ['assignedby'];
									$subtask_task_deadline = $row ['deadline'];
									$subtask_complete = $row ['complete'];
									$subtask_task_date = $row ['date'];
									$subtask_task_deadline = strtotime($subtask_task_deadline);
									$subtask_task_deadline = date("F j,Y", $subtask_task_deadline);
						
									if($complete == 0){
										echo "<tr>
										<td>$subtask_task_title</td>
										<td>$subtask_task_details</td>
										<td>$subtask_assignedto</td>
										<td>$subtask_assignedby</td>
										<td>$subtask_task_deadline</td>
										<td><a class='btn btn-primary' href='?tab=subtasks&project=$project&task=$task_id&subtask=$subtask_id'>Select</a></td>
										</tr>";
									}
						  	}
							
							}
							else
								echo "Their are no subtasks associated with this task";
						 */ ?>
							</table>
						</div>
					</div>
				
				<div class="tab-pane <?php if($_GET['tab'] == "milestones"){echo "active";}?>" id="milestone">
						<ul class="nav nav-tabs" style="margin-left:70px;">
						<li><a href="#new_milestone" data-toggle="modal"><span class="glyphicon glyphicon-folder-close icon"></span> New Milestone</a></li>
						<li class="<?php error_reporting(0); if(!$_GET['milestone']){ echo "disabled";}?>"><a href="#edit_milestone" data-toggle="modal"><span class="glyphicon glyphicon-edit icon"></span> Edit Milestone</a></li>
						<li class="<?php error_reporting(0); if(!$_GET['milestone']){ echo "disabled";}?>"><a href="edit.php?tab=milestones&project=<?php echo $_GET['project'];?>&milestone=<?php echo $_GET['milestone']?>&action=delete_milestone"><span class="glyphicon glyphicon-remove icon"></span> Delete Milestone</a></li>
						<li class="navbar-text">Current Milestone Selected:<b>
						<?php
						$current_milestone = $_GET['milestone'];
						if($current_milestone){
						$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
						$query = mysqli_query($DataConnect, "SELECT `milestone_title` FROM `milestones` WHERE milestone_id = $current_milestone");
						$selected_milestone = $query->fetch_row()[0];
						echo $selected_milestone;}else
						echo "None";
						?></b></li>
						</ul>
					<div class="container">
					<h3>Milestones</h3>
					<table class="table">
							<tr>
								<th>Milestone Title</th>
								<th>Milestone Details</th>
								<th>Date</th>
								<th>Select</th>
							</tr>
						<?php 
						$Milestones = new Milestone();
						if($Milestones){$Milestone_Info = $Milestones->ReturnAll($_GET['project']);}
						
						if($Milestone_Info){
							foreach ($Milestone_Info as $Milestone){
								echo "<tr>
										<td>".$Milestone->milestoneTitle."</td>
										<td>".$Milestone->milestoneDetails."</td>
										<td>".$Milestone->milestoneDate."</td>
										<td><a class='btn btn-primary' href='?tab=milestones&project=".$_GET['project']."&milestone=".$Milestone->milestoneID."'>Select</a></td>
									</tr>";
							}
						}else
							echo "Their are no milestones associated with this project";

						if($_GET['action'] == "new_milestone"){
							if($_POST['milestone_title']){
								if($_POST["milestone_date"]){
									if($_POST["milestone_details"]){
										$TempMilestone = new Milestone();
										$TempMilestone->accountID = $userid;
										$TempMilestone->projectID = $_GET['project'];
										$TempMilestone->milestoneTitle = $_POST['milestone_title'];
										$TempMilestone->milestoneDetails = $_POST["milestone_details"];
										$TempMilestone->milestoneDate = $_POST["milestone_date"];
										$TempMilestoneResults = $TempMilestone->Create();

										if($TempMilestoneResults){
											echo "<META http-equiv='refresh' content='0;URL=edit.php?tab=milestones&project=$TempMilestone->projectID&error=success&error_text=Your+Milestone+has+been+created+successfully.'>";
										}else{
											echo "<META http-equiv='refresh' content='0;URL=edit.php?tab=milestones&project=$TempMilestone->projectID&error=danger&error_text=Your+Milestone+could+not+be+created+an+error+occured.'>";
										}
									}
								}
							}
						}

						if($_GET['action'] == "delete_milestone"){
							if($_GET['milestone']){
										$TempMilestone = new Milestone();
										$TempMilestone->accountID = $userid;
										$TempMilestone->milestoneID = $_GET['milestone'];
										$TempMilestoneResults = $TempMilestone->Delete();

										if($TempMilestoneResults){
											//echo "<META http-equiv='refresh' content='0;URL=edit.php?tab=milestones&project=$_GET['project']&error=success&error_text=Your+Milestone+<b>$selected_milestone</b>+has+been+deleted+successfully.'>";
										}else{
											//echo "<META http-equiv='refresh' content='0;URL=edit.php?tab=milestones&project=$_GET['project']&error=danger&error_text=Your+Milestone+<b>$selected_milestone</b>+could+not+be+deleted+an+error+occured.'>";
										}
							}
						}
								?>
						  </table>
					</div>
				</div>
				
				<div class="tab-pane <?php if($_GET['tab'] == "meetings"){echo "active";}?>" id="meetings">
				<ul class="nav nav-tabs" style="margin-left:70px;">
					<li><a href="#new_meeting" data-toggle="modal"><span class="glyphicon glyphicon-folder-close icon"></span> New Meeting</a></li>
					<li class="<?php error_reporting(0); if(!$_GET['meeting']){ echo "disabled";}?>"><a href="#edit_meeting" data-toggle="modal"><span class="glyphicon glyphicon-edit icon"></span> Edit Meeting</a></li>
					<li class="<?php error_reporting(0); if(!$_GET['meeting']){ echo "disabled";}?>"><a href="edit.php?tab=meetings&project=<?php echo $_GET['project'];?>&meeting=<?php echo $_GET['meeting']?>&action=delete_meeting"><span class="glyphicon glyphicon-remove icon"></span> Delete Meeting</a></li>
					<li class="navbar-text">Current Meeting Selected:<b>
					<?php
					$current_meeting = $_GET['meeting'];
					if($current_meeting){
					$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
					$query = mysqli_query($DataConnect, "SELECT `meeting_title` FROM `meetings` WHERE meeting_id = $current_meeting");
					$selected_meeting = $query->fetch_row()[0];
					echo $selected_meeting;}else
					echo "None";
					?></b></li>
				</ul>
					<div class="container">
						<h3>Meetings</h3>
						<table class="table">
							<tr>
								<th>Meeting Name</th>
								<th>Meeting Details</th>
								<th>Date</th>
								<th>Select</th>
							</tr>
							<?php
							$Meetings = new Meeting();
							if($Meetings){$Meeting_Info = $Meetings->ReturnAll($_GET['project']);}
						
							if($Meeting_Info){
								foreach ($Meeting_Info as $Meetings){
									echo "<tr>
											<td>".$Meetings->meetingTitle."</td>
											<td>".$Meetings->meetingDetails."</td>
											<td>".$Meetings->meetingDate."</td>
											<td><a class='btn btn-primary' href='?tab=meetings&project=".$_GET['project']."&meeting=".$Meetings->meetingID."'>Select</a></td>
										</tr>";
								}
							}else{
								echo "There are no meetings scheduled in this project"; }
								
							if($_GET['action'] == "new_meeting"){
								if($_POST['meeting_title']){
									if($_POST["meeting_date"]){
										if($_POST["meeting_details"]){
											$TempMeeting = new Meeting();
											$TempMeeting->accountID = $userid;
											$TempMeeting->projectID = $_GET['project'];
											$TempMeeting->meetingTitle = $_POST['meeting_title'];
											$TempMeeting->meetingDetails = $_POST["meeting_details"];
											$TempMeeting->meetingDate = $_POST["meeting_date"];
											$TempMeetingResults = $TempMeeting->Create();

												if($TempMeetingResults){
												echo "<META http-equiv='refresh' content='0;URL=edit.php?tab=meetings&project=$TempMeeting->projectID&error=success&error_text=Your+Meeting+has+been+scheduled+successfully.'>";
											}else{
												echo "<META http-equiv='refresh' content='0;URL=edit.php?tab=meetings&project=$TempMeeting->projectID&error=danger&error_text=Your+Milestone+could+not+be+scheduled+an+error+occured.'>";
											}
										}
									}
								}
							}
								
							if($_GET['action'] == "delete_meeting"){
								if($_GET['meeting']){
									$TempMeeting = new Meeting();
									$TempMeeting->accountID = $userid;
									$TempMeeting->projectID = $_GET['project'];
									$TempMeeting->meetingID = $_GET['meeting'];
									$TempMeetingResults = $TempMeeting->Delete();

									if($TempMeetingResults){
										echo "<META http-equiv='refresh' content='0;URL=edit.php?tab=meetings&project=$TempMeeting->projectID&error=success&error_text=Your+Meeting+<b>$selected_meeting</b>+has+been+deleted+successfully.'>";
									}else{
										echo "<META http-equiv='refresh' content='0;URL=edit.php?tab=meetings&project=$TempMeeting->projectID&error=danger&error_text=Your+Meeting+<b>$selected_meeting</b>+could+not+be+deleted+an+error+occured.'>";
									}
								}
							}
							?>
						</table>
					</div>
				</div>
				
				<div class="tab-pane <?php if($_GET['tab'] == "timer"){echo "active";}?>" id="timer">
						<ul class="nav nav-tabs" style="margin-left:70px;">
						<li><a id="startPause" href="#" onclick="startPause();"><span class="glyphicon glyphicon-play icon"></span> Start Timer</a></li>
						<li><a id="reset" href="#" onclick="reset();"><span class="glyphicon glyphicon-refresh icon"></span> Clear Timer</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-ok icon"></span> Save Time</a></li>
						</ul>
					<div class="container">
					<h3>Timer</h3>
					<p id="output"></p>
					</div>
				</div>
																		<!-- End Tabs -->
			</div>
<?php include("includes/footer.php");?>