<?php include("site/inc/header.php");?>
         <ul class="nav nav-tabs" style="margin-left:70px;">
			<li><a href="?tab=projects"><span class="glyphicon glyphicon-home icon"></span> Projects</a></li>
			<li><a href="?tab=myprojects"><span class="glyphicon glyphicon-user icon"></span> My Projects</a></li>
			<li><a data-toggle="modal" href="#new_project"><span class="glyphicon glyphicon-folder-close icon"></span> New Project</a></li>
			<li class="<?php error_reporting(0); if(!$_GET['project']){ echo "disabled";}?>"><a href="edit.php?tab=overview&project=<?php error_reporting(0); echo $_GET['project'] ?>"><span class="glyphicon glyphicon-folder-open icon"></span> Edit Project</a></li>
			<li class="<?php error_reporting(0); if(!$_GET['project']){ echo "disabled";}?>"><a href="functions/archive.php?project=<?php echo $_GET['project'];?>&archived=1"><span class="glyphicon glyphicon-remove icon"></span> Archive Project</a></li>
			<li class="navbar-text">Current Project Selected: <b><?php if($_GET['project']){
						$current_project = $_GET['project'];
						$query = "SELECT `project_name` FROM `projects` WHERE project_id = $current_project";
						$query = mysql_query($query);
						$selected_project = mysql_result($query, 0);
						echo $selected_project;
						}else echo "<b>None</b>";?></b></li>
			</ul>
			
			<?php if($_GET['error']){ ?><div class='alert alert-<?php error_reporting(0); if($_GET['error']){echo $_GET['error'];}else echo "danger";?>'>
			   <button type='button' class='close' data-dismiss='alert'>&times;</button>
			   <p><?php if($_GET['error']){echo $_GET['error_text'];}else echo "We apologize, This feature has been disabled and is undergoing maintenance. Please check again later.";?></p>
			</div><?php }?>
			
			<div id="content" class="tab-content">
				<div class="tab-pane <?php if($_GET['tab'] == "projects"){echo "active";}?>" id="projects">
					<div class="container">
						<h3>Projects</h3>
						<table class="table">
						  <tr>
							<th>Project Name</th>
							<th>Start</th>
							<th>Tasks</th>
							<th>Deadline</th>
							<th>Description</th>
							<!--<th>Select</th>-->
						  </tr>
						  <!-- Edit with PHP -->
						  <?php
							require("functions/connect.php");
							$query = "SELECT * FROM projects WHERE 1";
							$query = mysql_query($query);
							$numrows = mysql_num_rows($query);
							if ($numrows > 0){
								
								while ($row = mysql_fetch_assoc($query)){
									$project_id = $row ['project_id'];
									$project_name = $row ['project_name'];
									$start = $row ['start'];
									$deadline = $row ['deadline'];
									$description = $row ['description'];
									$archived = $row ['archived'];
									$deadline = strtotime($deadline);
									$deadline = date("F j,Y", $deadline);
									$start = strtotime($start);
									$start = date("F j,Y", $start);
									
									$tasks =  "SELECT `task_id`, COUNT(task_id) FROM `tasks` WHERE `project_id` = '$project_id'";
									$tasks = mysql_query($tasks);
									$tasks = mysql_result($tasks,0,1);
									
									if($archived == 0){
										echo "<tr>
											<td>$project_name</td>
											<td>$start</td>
											<td>$tasks</td>
											<td>$deadline</td>
											<td>$description</td>
											<!--<td><a class='btn btn-primary' href='?tab=myprojects&project=$project_id'>Select</a></td>-->
											</tr>";
									}
								}
							
							}
							else
								echo "Their is no projects";
						  ?>
						</table>
					</div>
				</div>
				<div class="tab-pane <?php if($_GET['tab'] == "myprojects"){echo "active";}?>" id="my_projects">
					<div class="container">
							<h3>My Projects</h3>
							<table class="table">
							  <tr>
								<th>Project Name</th>
								<th>Start</th>
								<th>Tasks</th>
								<th>Deadline</th>
								<th>Description</th>
								<th>Select</th>
							  </tr>
							  <!-- Edit with PHP -->
							<?php
								$query = "SELECT * FROM project_mapping, projects WHERE a_id = '$userid' AND p_id= project_id";
								$query = mysql_query($query);
								$numrows = mysql_num_rows($query);
								if ($numrows > 0){
								
								while ($row = mysql_fetch_assoc($query)){
									$project_id = $row ['project_id'];
									$project_name = $row ['project_name'];
									$start = $row ['start'];
									$deadline = $row ['deadline'];
									$description = $row ['description'];
									$archived = $row ['archived'];
									$deadline = strtotime($deadline);
									$deadline = date("F j,Y", $deadline);
									$start = strtotime($start);
									$start = date("F j,Y", $start);
									
									$tasks =  "SELECT `task_id`, COUNT(task_id) FROM `tasks` WHERE `project_id` = '$project_id'";
									$tasks = mysql_query($tasks);
									$tasks = mysql_result($tasks,0,1);
									
									if($archived == 0){
										echo "<tr>
											<td>$project_name</td>
											<td>$start</td>
											<td>$tasks</td>
											<td>$deadline</td>
											<td>$description</td>
											<td><a class='btn btn-primary' href='?tab=myprojects&project=$project_id'>Select</a></td>
											</tr>";
									}
								}
							
							}
							else
								echo "Their is no projects";
							?>
							</table>
						</div>
				</div>
																	<!-- End Tabs -->
			</div>
<?php include("site/inc/footer.php");?>