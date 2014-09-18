<?php include("includes/header.php");?>
          <ul class="nav nav-tabs" style="margin-left:70px;">
			<li><a href="?tab=overview"><span class="glyphicon glyphicon-home icon"></span> Overview</a></li>
			<li><a href="?tab=client<?php error_reporting(0); if($_GET['project'] == null){/*nothing*/}else echo "&project=".$_GET['project'];?>"><span class="glyphicon glyphicon-user icon"></span> Client Base</a></li>
			<li><a href="?tab=partner"><span class="glyphicon glyphicon-phone-alt icon"></span> Partners</a></li>
			<li><a href="?tab=archive<?php error_reporting(0); if($_GET['project'] == null){/*nothing*/}else echo "&project=".$_GET['project'];?>"><span class="glyphicon glyphicon-hdd icon"></span> Archives</a></li>
		  </ul>
			
			<?php if($_GET['error']){ ?><div class='alert alert-<?php error_reporting(0); if($_GET['error']){echo $_GET['error'];}else echo "danger";?>'>
			   <button type='button' class='close' data-dismiss='alert'>&times;</button>
			   <p><?php if($_GET['error']){echo $_GET['error_text'];}else echo "We apologize, This feature has been disabled and is undergoing maintenance. Please check again later.";?></p>
			</div><?php }?>
			<?php
							require("functions/connect.php");
							$query = "SELECT * FROM information WHERE 1";
							$query = mysql_query($query);
							$numrows = mysql_num_rows($query);
							if ($numrows > 0){
								
								while ($row = mysql_fetch_assoc($query)){
									$client_id = $row ['id'];
									$client_firstname = $row ['firstname'];
									$client_lastname = $row ['lastname'];
									$gender = $row ['gender'];
									$representation = $row ['representing'];
									$client_email = $row ['email'];
									$client_phone = $row ['phone'];
									$client_project = $row ['project_id'];
									$client_website = $row ['website'];
									$client_type = $row ['type'];
								}
							
								if($gender = 1){
								$gender = 'Male';
								}elseif($gender = 2){
								$gender = 'Female';
								}
								
								$query = "SELECT project_name FROM projects WHERE project_id='$client_project'";
								$query = mysql_query($query);
								$client_project = mysql_result($query, 0);
							}
							else
								echo "Their is no projects";
			?>
			<div id="content" class="tab-content">
				<div class="tab-pane <?php if($_GET['tab'] == "overview"){echo "active";}?>" id="overview">
					<div class="container">
						<h3>Overview</h3>
					</div>
				</div>
																		<!-- New Tab -->
				<div class="tab-pane <?php if($_GET['tab'] == "client"){echo "active";}?>" id="client">
				 <ul class="nav nav-tabs" style="margin-left:70px;">
					<li><a href="#"><span class="glyphicon glyphicon-new"></span> New Client</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-new"></span> Remove Client</a></li>
				 </ul>
					<div class="container">
						<h3>Client Base</h3>
						<table class="table">
						  <tr>
							<th>Name</th>
							<th>Gender</th>
							<th>Company/Organization</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Project</th>
							<th>Website</th>
						  </tr>
						  <!-- Edit with PHP -->
						  <?php
						
							if($client_type==1){
								echo "<tr>
										<td>$client_firstname $client_lastname</td>
										<td>$gender</td>
										<td>$representation</td>
										<td>$client_email</td>
										<td>$client_phone</td>
										<td>$client_project</td>
										<td><a class='btn btn-primary' href='http://$client_website'>$client_website</a></td>
									  </tr>";
									
							}
						  
						  ?>
						</table>
					</div>
				</div>
																		<!-- New Tab -->
				<div class="tab-pane <?php if($_GET['tab'] == "partner"){echo "active";}?>" id="partner">
				 <ul class="nav nav-tabs" style="margin-left:70px;">
					<li><a href="#"><span class="glyphicon glyphicon-new"></span> New Partner</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-new"></span> Remove Partner</a></li>
				 </ul>
					<div class="container">
						<h3>Partners</h3>
						<table class="table">
						  <tr>
							<th>Name</th>
							<th>Gender</th>
							<th>Company/Organization</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Project</th>
							<th>Website</th>
						  </tr>
						  <!-- Edit with PHP -->
						  
						  <?php if($client_type==2){
								echo "<tr>
										<td>$client_firstname $client_lastname</td>
										<td>$gender</td>
										<td>$representation</td>
										<td>$client_email</td>
										<td>$client_phone</td>
										<td>$client_project</td>
										<td><a class='btn btn-primary' target='_blank' href='http://$client_website'>$client_website</a></td>
									  </tr>";
									
							}?>
						</table>
					</div>
				</div>
																		<!-- New Tab -->
				<div class="tab-pane <?php if($_GET['tab'] == "archive"){echo "active";}?>" id="archive">
				<ul class="nav nav-tabs" style="margin-left:70px;">
					<li class="<?php error_reporting(0); if(!$_GET['project']){ echo "disabled";}?>"><a href="functions/unarchive.php?project=<?php echo $_GET['project'];?>&archived=0" >Unarchive Project</a></li>
					<li class="<?php error_reporting(0); if(!$_GET['project']){ echo "disabled";}?>"><a href="">Delete Project</a></li>
					<li class="navbar-text">Current Project Selected: <b><?php if($_GET['project']){
						$current_project = $_GET['project'];
						$query = "SELECT `project_name` FROM `projects` WHERE project_id = $current_project";
						$query = mysql_query($query);
						$selected_project = mysql_result($query, 0);
						echo $selected_project;
						}else echo "<b>None</b>"; ?></b></li>
				</ul>
					<div class="container">
						<h3>Archives</h3>
						<table class="table">
						  <tr>
							<th>Project Name</th>
							<th>Client</th>
							<th>Tasks</th>
							<th>Start</th>
							<th>Finished</th>
							<th>Description</th>
							<th>Select</th>
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
									$client_id = $row ['client_id'];
									$project_name = $row ['project_name'];
									$start = $row ['start'];
									$deadline = $row ['deadline'];
									$description = $row ['description'];
									$tasks = $row ['tasks'];
									$archived = $row ['archived'];
									$deadline = strtotime($deadline);
									$deadline = date("F j,Y", $deadline);
									
									$client_id = "SELECT * FROM information WHERE id='$client_id' ";
									$client_id = mysql_query($client_id);
									$client_firstname = mysql_result($client_id,0,1);
									$client_lastname = mysql_result($client_id,0,2);
									
									$tasks =  "SELECT `task_id`, COUNT(task_id) FROM `tasks` WHERE `project_id` = '$project_id'";
									$tasks = mysql_query($tasks);
									$tasks = mysql_result($tasks,0,1);
									if($archived == 1){
										echo "<tr>
										<td>$project_name</td>
										<td>$client_firstname $client_lastname</td>
										<td>$tasks</td>
										<td>$start</td>
										<td>$deadline</td>
										<td>$description</td>
										<td><a class='btn btn-primary' href='?tab=archive&project=$project_id'>Select</a></td>
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
<?php include("includes/footer.php");?>