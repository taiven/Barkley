	<footer>
		<div id="footer" class="container">
        <p class="pull-left">Wubcrate Copyright &copy; 2013 | <a href="http://wubcrate.com">Back to Wubcrate</a> | <a href="logout.php">Logout</a> | <a href="#">Feedback</a></p>
        <p class="pull-right version">&middot;&middot;Developers&middot;&middot; | Development V0.1</p>
		</div>
	</footer>
	
	 <!-- Modal -->
	<div class="modal fade" id="new_project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Create a New Project</h4>
				</div>
				<div class="modal-body">
				<div class="container">
						<form method="post" action="projects.php?tab=projects&action=new_project" role="form">
						<div id="newProjectForm">
						  <div class="form-group">
							<label for="project_title">Project Name</label>
							<input type="text" class="form-control" id="project_title" name="project_title"  style="width:50%;" placeholder="Project Title" value=""/>
						  </div>
						  <label for="project_deadline">When is this project due to be finished?</label>
							<input type="date" class="form-control" style="width:50%;" id="project_deadline" name="project_deadline" value=""/>
						  <div class="form-group">
							<label for="project_details">Description</label>
							<textarea type="text" class="form-control" id="project_details" name="project_details" style="width:100%; max-width:100%; max-height:300px;" placeholder="Project Description" value=""></textarea>
						  </div>
						</div>
				</div>
				</div>
				<div class="modal-footer">
					<button type="submit" name="new_project" class="btn btn-primary" value="submit">Submit</button>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<!-- Modal -->
	<div class="modal fade" id="new_task" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Create a New Task</h4>
				</div>
				<div class="modal-body">
					<div class="container">
						<form method="post" action="edit.php?tab=tasks&project=<?php echo $_GET['project'];?>&action=new_task" role="form">
						<div id="newProjectForm">
						  <div class="form-group">
							<label for="project_name">Task Title</label>
							<input type="text" class="form-control" id="task_title" name="task_title"  style="width:50%;" placeholder="Task Title" value=""/>
						  </div>
						  <label for="deadline">When is this task due to be finished?</label>
							<input type="date" class="form-control" style="width:50%;" id="deadline" name="task_deadline" value=""/>
						  <div class="form-group">
							<label for="description">Task Details</label>
							<textarea type="text" class="form-control" id="description" name="task_details" style="width:100%; max-width:100%; max-height:300px;" placeholder="Task Details" value=""></textarea>
						  </div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button id="nextstep2" type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
		<!-- Modal -->
	<!--<div class="modal fade" id="new_subtask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Create a New Task</h4>
				</div>
				<div class="modal-body">
					<div class="container">
						<form method="post" action="functions/newsubtask.php?project=<?php //echo $_GET['project'];?>&task=<?php //echo $_GET['task']; ?>" role="form">
						<div id="newProjectForm">
						  <div class="form-group">
							<label for="project_name">SubTask Title</label>
							<input type="text" class="form-control" id="project_name" name="subtask_title"  style="width:50%;" placeholder="Task Title" value=""/>
						  </div>
						  <label for="deadline">When is this subtask due to be finished?</label>
							<input type="date" class="form-control" style="width:50%;" id="deadline" name="subtask_deadline" value=""/>
						  <div class="form-group">
							<label for="description">SubTask Details</label>
							<textarea type="text" class="form-control" id="description" name="subtask_details" style="width:100%; max-width:100%; max-height:300px;" placeholder="Task Details" value=""></textarea>
						  </div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button id="nextstep2" type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div><!-- /.modal-content -->
	<!--	</div><!-- /.modal-dialog -->
	<!--</div><!-- /.modal -->
	
	<!-- Modal -->
	<div class="modal fade" id="new_milestone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Create a New Milestone</h4>
				</div>
				<div class="modal-body">
					<div class="container">
						<form method="post" action="edit.php?tab=milestones&project=<?php echo $_GET['project'];?>&action=new_milestone" role="form">
						<div id="newProjectForm">
						  <div class="form-group">
							<label for="project_name">Milestone Title</label>
							<input type="text" class="form-control" id="project_name" name="milestone_title"  style="width:50%;" placeholder="Milestone Title" value=""/>
						  </div>
						  <label for="deadline">When is this task due to be finished?</label>
							<input type="date" class="form-control" style="width:50%;" id="date" name="milestone_date" value=""/>
						  <div class="form-group">
							<label for="description">Milestone Details</label>
							<textarea type="text" class="form-control" id="description" name="milestone_details" style="width:100%; max-width:100%; max-height:300px;" placeholder="Milestone Details" value=""></textarea>
						  </div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button id="nextstep2" type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<!-- Modal -->
	<div class="modal fade" id="edit_task" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Editing Task: <?php
					$task = $_GET['task'];
					if(isset($task)){
					$DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
					$query = mysqli_query($DataConnect, "SELECT `task_title` FROM `tasks` WHERE task_id = $task");
					$task_title = $query->fetch_row()[0];
					echo $task_title;
					}
					?></h4>
				</div>
				<div class="modal-body">
					<div class="container">
						<form method="post" action="edit.php?tab=tasks&project=<?php echo $_GET['project'];?>&task=<?php echo $_GET['task']; ?>&action=edit_task" role="form">
						<div id="newProjectForm">
						  <div class="form-group">
						  <?php 
						 if(isset($task)){
						 $DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
						 $query = mysqli_query($DataConnect, "SELECT `deadline` FROM `tasks` WHERE task_id = $task");
						 $task_deadline = $query->fetch_row()[0];
					 	 $query = mysqli_query($DataConnect, "SELECT `task_details` FROM `tasks` WHERE task_id = $task");
					  	 $task_description = $query->fetch_row()[0];
						 }
						 ?>
							<label for="project_name">Task Title</label>
							<input type="text" class="form-control" id="project_name" name="task_title"  style="width:50%;" placeholder="Task Title" value="<?php echo $task_title;?>"/>
						  </div>
						  <label for="deadline">Task Deadline</label>
							<input type="date" class="form-control" style="width:50%;" id="date" name="task_deadline" value="<?php echo $task_deadline;?>"/>
						  <div class="form-group">
							<label for="description">Task Details</label>
							<textarea type="text" class="form-control" id="description" name="task_details" style="width:100%; max-width:100%; max-height:300px;" placeholder="Task Details" value=""><?php echo $task_description; ?></textarea>
						  </div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button id="nextstep2" type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<!-- Modal -->
	<!--<div class="modal fade" id="edit_subtask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Editing SubTask: <?php
					/*$subtask = $_GET['subtask'];
					$task_title = "SELECT `task_title` FROM `subtasks` WHERE subtask_id= '$subtask'";
					$task_title = mysql_query($task_title) or die(mysql_error());
					$task_title = mysql_result($task_title, 0);
					echo $task_title;*/
					?></h4>
				</div>
				<div class="modal-body">
					<div class="container">
						<form method="post" action="functions/edit_subtask.php?project=<?php //echo $_GET['project'];?>&task=<?php //echo $_GET['task']; ?>&subtask=<?php //echo $_GET['subtask']; ?>" role="form">
						<div id="newProjectForm">
						  <div class="form-group">
						  <?php /*
						  $task_deadline = "SELECT `deadline` FROM `subtasks` WHERE subtask_id = '$subtask'";
						  $task_deadline = mysql_query($task_deadline);
						  $task_deadline = mysql_result($task_deadline, 0);
						  */?>
							<label for="project_name">Task Title</label>
							<input type="text" class="form-control" id="project_name" name="subtask_title"  style="width:50%;" placeholder="Task Title" value=""/>
						  </div>
						  <label for="deadline">Task Deadline</label>
							<input type="date" class="form-control" style="width:50%;" id="date" name="subtask_date" value=""/>
						  <div class="form-group">
							<label for="description">Task Details</label>
							<textarea type="text" class="form-control" id="description" name="subtask_details" style="width:100%; max-width:100%; max-height:300px;" placeholder="Task Details" value=""></textarea>
						  </div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button id="nextstep2" type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div><!-- /.modal-content -->
	<!--	</div><!-- /.modal-dialog -->
	<!--</div><!-- /.modal -->
	
	<!--	<div class="modal fade" id="edit_milestone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Editing Milestone: <?php/*
					$milestone = $_GET['milestone'];
					$milestone_title = "SELECT `milestone_title` FROM `milestones` WHERE milestone_id= '$milestone'";
					$milestone_title = mysql_query($milestone_title) or die(mysql_error());
					$milestone_title = mysql_result($milestone_title, 0);
					echo $milestone_title;
					*/?></h4>
				</div>
				<div class="modal-body">
					<div class="container">
						<form method="post" action="functions/edit_milestone.php?project=<?php //echo $_GET['project'];?>&milestone=<?php //echo $_GET['milestone']; ?>" role="form">
						<div id="newProjectForm">
						  <div class="form-group">
						  <?php /*
						  $milestone_date = "SELECT `date` FROM `milestones` WHERE milestone_id = '$milestone'";
						  $milestone_date = mysql_query($milestone_date);
						  $milestone_date = mysql_result($milestone_date, 0);
						  */?>
							<label for="project_name">Milestone Title</label>
							<input type="text" class="form-control" id="milestone_title" name="milestone_title"  style="width:50%;" placeholder="Milestone Title" value=""/>
						  </div>
						  <label for="deadline">Milestone Deadline</label>
							<input type="date" class="form-control" style="width:50%;" id="milestone_date" name="milestone_date" value=""/>
						  <div class="form-group">
							<label for="description">Milestone Details</label>
							<textarea type="text" class="form-control" id="milestone_details" name="milestone_details" style="width:100%; max-width:100%; max-height:300px;" placeholder="Milestone Details" value=""></textarea>
						  </div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button id="nextstep2" type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div><!-- /.modal-content -->
	<!--	</div><!-- /.modal-dialog -->
	<!--</div><!-- /.modal -->
	
	<!-- Modal -->
	<div class="modal fade" id="new_meeting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Schedule a Meeting</h4>
				</div>
				<div class="modal-body">
					<div class="container">
						<form method="post" action="edit.php?tab=meetings&project=<?php echo $_GET['project'];?>&action=new_meeting" role="form">
						<div id="newProjectForm">
						  <div class="form-group">
							<label for="meeting_title">Meeting Title</label>
							<input type="text" class="form-control" id="meeting_title" name="meeting_title"  style="width:50%;" placeholder="Meeting Title" value=""/>
						  </div>
						  <label for="deadline">When is this meeting to be attended?</label>
							<input type="date" class="form-control" style="width:50%;" id="date" name="meeting_date" value=""/>
						  <div class="form-group">
							<label for="description">Meeting Details</label>
							<textarea type="text" class="form-control" id="description" name="meeting_details" style="width:100%; max-width:100%; max-height:300px;" placeholder="Meeting Details" value=""></textarea>
						  </div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button id="nextstep2" type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
<!-- </div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/developer.js"></script>
	<script type="text/javascript" src="js/chat.js"></script>

  </body>
</html>
