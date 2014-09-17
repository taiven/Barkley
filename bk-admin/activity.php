<?php include("site/inc/header.php");?>
			<ul class="nav nav-tabs" style="margin-left:70px;">
			<li><a href="#activity" data-toggle="tab"><span class="glyphicon glyphicon-bullhorn icon"></span> Activity</a></li>
			<li><a href="#milestones" data-toggle="tab"><span class="glyphicon glyphicon-certificate icon"></span> Milestones</a></li>
			<li><a href="#calendar" data-toggle="tab"><span class="glyphicon glyphicon-calendar icon"></span> Calendar</a></li>
			<li><a href="#statistics" data-toggle="tab"><span class="glyphicon glyphicon-stats icon"></span> Statistics</a></li>
			</ul>
			<style type="text/css">
			.breadcrumb{
			background-color: rgba(255, 255, 255, 0);
			border: none;
			color: #000;
			}
			</style>
			<div class='alert alert-danger'>
			   <button type='button' class='close' data-dismiss='alert'>&times;</button>
			   <p>We apologize, This feature has been disabled and is undergoing maintenance. Please check again later.</p>
			</div>
			
			<div id="content" class="tab-content">
				<div class="tab-pane active" id="activity">
					<div class="container">
						<h3>Activity</h3>
						<ol>		
							<li>
								<ol class="breadcrumb">
									<li>If Project then Project Title, if no project then user must have made a new project or deleted one.</li>
									<li>User</li>
									<li>Action</li>
									<li>If Task then task else Project</li>
									<li class="active">Date & Time</li>
								</ol>
							</li>
							<li>
								<ol class="breadcrumb">
									<li>If Project then Project Title, if no project then user must have made a new project or deleted one.</li>
									<li>User</li>
									<li>Action</li>
									<li>If Task then task else Project</li>
									<li class="active">Date & Time</li>
								</ol>
							</li>
						</ol>
					</div>
				</div>
																		<!-- New Tab -->
				<div class="tab-pane" id="milestones">
					<div class="container">
						<h3>Milestones</h3>
						<ol>		
							<li>
								<ol class="breadcrumb">
									<li>Project</li>
									<li>User</li>
									<li>Action</li>
									<li>Task</li>
									<li class="active">Date & Time</li>
								</ol>
							</li>
							<li>
								<ol class="breadcrumb">
									<li>Project</li>
									<li>User</li>
									<li>Action</li>
									<li>Task</li>
									<li class="active">Date & Time</li>
								</ol>
							</li>
						</ol>
					</div>
				</div>
																		<!-- New Tab -->
				<div class="tab-pane" id="calendar">
					<div class="container"><h1>Coming Soon!</h1></div>
				</div>
																		<!-- New Tab -->
				<div class="tab-pane" id="statistics">
					<div class="container">
						<h3>Statistics</h3>
						<ul class="nav nav-pills nav-stacked">
							<li class="">
								<a href="#">
								<span class="badge pull-right">#ofEmployees</span>
								Employees
								</a>
							</li>
							<li class="">
								<a href="#">
								<span class="badge pull-right">#ofProjects</span>
								Projects
								</a>
							</li>
							<li class="">
								<a href="#">
								<span class="badge pull-right">#ofClients</span>
								Clients
								</a>
							</li>
							<li class="">
								<a href="#">
								<span class="badge pull-right">#ofPartners</span>
								Partners
								</a>
							</li>
						</ul>
					</div>
				</div>
																		<!-- End Tabs -->
			</div>
<?php include("site/inc/footer.php");?> 