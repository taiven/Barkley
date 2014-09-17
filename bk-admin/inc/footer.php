	<footer>
		<div id="footer" class="container">
        <p class="pull-left">Wubcrate Copyright &copy; 2013 | <a href="http://wubcrate.com">Back to Wubcrate</a> | <a href="../logout.php">Logout</a> | <a href="#">Feedback</a></p>
        <p class="pull-right version">&middot;&middot;Developers&middot;&middot; | Beta V1.7.0</p>
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
						<form method="post" action="functions/newproject.php" role="form">
						<div id="newProjectForm">
						  <div class="form-group">
							<label for="project_name">Project Name</label>
							<input type="text" class="form-control" id="project_name" name="project_name"  style="width:50%;" placeholder="Project Title" value=""/>
						  </div>
						  <label for="deadline">When is this project due to be finished?</label>
							<input type="date" class="form-control" style="width:50%;" id="deadline" name="deadline" value=""/>
						  <div class="form-group">
							<label for="description">Description</label>
							<textarea type="text" class="form-control" id="description" name="description" style="width:100%; max-width:100%; max-height:300px;" placeholder="Project Description" value=""></textarea>
						  </div>
						  <div class="radio">
							<label>Who is this project for?</label>
							 <div class="btn-group" data-toggle="buttons">
							  <label class="btn btn-link">
								<input type="radio" name="type" id="0" value="1"> Client
							  </label>
							  <label class="btn btn-link">
								<input type="radio" name="type" id="1" value="2"> Partner
							  </label>
							  <label class="btn btn-link">
								<input type="radio" name="type" id="2" value="3"> Internal
							  </label>
							</div>
						  </div>
						</div>
						  
						<div id="newProjectForm1" style="display:none;">
						<div class="panel panel-default assign_project">
						<div class="panel-heading">
							<h3 class="panel-title">Assign Project</h3>
						</div>
						<ul class="list-group">
						<?php 
							require("functions/connect.php");
							$query = "SELECT * FROM client_accounts WHERE 1";
							$query = mysql_query($query);
							$numrows = mysql_num_rows($query);
							if ($numrows > 0){
								
								while ($row = mysql_fetch_assoc($query)){
									$user_account_id = $row ['account_id'];
									$user_first_name = $row ['first_name'];
									$user_last_name = $row ['last_name'];
									$user_gender = $row ['gender'];
									$user_account_type = $row ['account_type'];
									
									echo	"
											<li class='list-group-item'>
											<div class='media' style='border:none;'>
												<a class='pull-left' href='#'>
													<div class='checkbox'><label for='selected_users'><input type='checkbox' name='selected_users[]' value='$user_account_id' style='margin: 25% -40%;'/></label><img class='media-object' src='http://placehold.it/60x60' alt='...'></div>
												</a>
												<div class='media-body'>
													<h4 class='media-heading'>$user_first_name $user_last_name</h4>
													# of Current Projects:  $user_current_assigned_projects
												</div>
											</div>
											</li>
											";
								}
							
							}
							else
								echo "No Users Found";
						  ?>
						  </ul>
						 </div>
						</div>
						<div id="newProjectForm2" style="display:none;">
						<p>Click Submit</p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default"onclick="nextFormPage(0)" data-dismiss="modal">Close</button>
					<button id="nextstep" type="button" onclick="nextFormPage(1)" class="btn btn-primary">Next Step</button>
					<button id="nextstep1" type="button" onclick="nextFormPage(2)" class="btn btn-primary" style="display:none;">Next Step</button>
					<button id="nextstep2" type="submit" name="new_project" class="btn btn-primary" style="display:none;" value="create">Submit</button>
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
						<form method="post" action="functions/newtask.php?project=<?php echo $_GET['project'];?>" role="form">
						<div id="newProjectForm">
						  <div class="form-group">
							<label for="project_name">Task Title</label>
							<input type="text" class="form-control" id="project_name" name="task_title"  style="width:50%;" placeholder="Task Title" value=""/>
						  </div>
						  <label for="deadline">When is this task due to be finished?</label>
							<input type="date" class="form-control" style="width:50%;" id="deadline" name="deadline" value=""/>
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
	<div class="modal fade" id="new_subtask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Create a New Task</h4>
				</div>
				<div class="modal-body">
					<div class="container">
						<form method="post" action="functions/newsubtask.php?project=<?php echo $_GET['project'];?>&task=<?php echo $_GET['task']; ?>" role="form">
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
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
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
						<form method="post" action="functions/newmilestone.php?project=<?php echo $_GET['project'];?>" role="form">
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
					$task_title = "SELECT `task_title` FROM `tasks` WHERE task_id= '$task'";
					$task_title = mysql_query($task_title) or die(mysql_error());
					$task_title = mysql_result($task_title, 0);
					echo $task_title;
					?></h4>
				</div>
				<div class="modal-body">
					<div class="container">
						<form method="post" action="functions/edit_task.php?project=<?php echo $_GET['project'];?>&task=<?php echo $_GET['task']; ?>" role="form">
						<div id="newProjectForm">
						  <div class="form-group">
						  <?php 
						  $task_deadline = "SELECT `deadline` FROM `tasks` WHERE task_id = '$task_id'";
						  $task_deadline = mysql_query($task_deadline);
						  $task_deadline = mysql_result($task_deadline, 0);
						  ?>
							<label for="project_name">Task Title</label>
							<input type="text" class="form-control" id="project_name" name="task_title"  style="width:50%;" placeholder="Task Title" value=""/>
						  </div>
						  <label for="deadline">Task Deadline</label>
							<input type="date" class="form-control" style="width:50%;" id="date" name="task_date" value=""/>
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
	<div class="modal fade" id="edit_subtask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Editing SubTask: <?php
					$subtask = $_GET['subtask'];
					$task_title = "SELECT `task_title` FROM `subtasks` WHERE subtask_id= '$subtask'";
					$task_title = mysql_query($task_title) or die(mysql_error());
					$task_title = mysql_result($task_title, 0);
					echo $task_title;
					?></h4>
				</div>
				<div class="modal-body">
					<div class="container">
						<form method="post" action="functions/edit_subtask.php?project=<?php echo $_GET['project'];?>&task=<?php echo $_GET['task']; ?>&subtask=<?php echo $_GET['subtask']; ?>" role="form">
						<div id="newProjectForm">
						  <div class="form-group">
						  <?php 
						  $task_deadline = "SELECT `deadline` FROM `subtasks` WHERE subtask_id = '$subtask'";
						  $task_deadline = mysql_query($task_deadline);
						  $task_deadline = mysql_result($task_deadline, 0);
						  ?>
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
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
		<div class="modal fade" id="edit_milestone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Editing Milestone: <?php
					$milestone = $_GET['milestone'];
					$milestone_title = "SELECT `milestone_title` FROM `milestones` WHERE milestone_id= '$milestone'";
					$milestone_title = mysql_query($milestone_title) or die(mysql_error());
					$milestone_title = mysql_result($milestone_title, 0);
					echo $milestone_title;
					?></h4>
				</div>
				<div class="modal-body">
					<div class="container">
						<form method="post" action="functions/edit_milestone.php?project=<?php echo $_GET['project'];?>&milestone=<?php echo $_GET['milestone']; ?>" role="form">
						<div id="newProjectForm">
						  <div class="form-group">
						  <?php 
						  $milestone_date = "SELECT `date` FROM `milestones` WHERE milestone_id = '$milestone'";
						  $milestone_date = mysql_query($milestone_date);
						  $milestone_date = mysql_result($milestone_date, 0);
						  ?>
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
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="site/js/jquery.js"></script>
    <script type="text/javascript" src="site/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="site/js/developer.js"></script>
	<script type="text/javascript" src="site/js/chat.js"></script>

  </body>
</html>
