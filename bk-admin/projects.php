<?php include("includes/header.php");?>  
    <div id="tree">
        <nav id="menu">
            <li><a href="?tab=projects"><span class="glyphicon glyphicon-home icon"></span> Projects</a></li>
                <li><a href="?tab=myprojects"><span class="glyphicon glyphicon-user icon"></span> My Projects</a></li>
                <li><a data-toggle="modal" href="#new_project"><span class="glyphicon glyphicon-folder-close icon"></span> New Project</a></li>
                <li class="<?php error_reporting(0); if(!$_GET['project']){ echo "disabled";}?>"><a href="edit.php?tab=overview&project=<?php error_reporting(0); echo $_GET['project'] ?>"><span class="glyphicon glyphicon-folder-open icon"></span> Edit Project</a></li>
                <li class="<?php error_reporting(0); if(!$_GET['project']){ echo "disabled";}?>"><a href="projects.php?tab=projects&project=<?php echo $_GET['project'];?>&action=archive_project"><span class="glyphicon glyphicon-remove icon"></span> Archive Project</a></li>
                <!--<li class="navbar-text">Current Project Selected: <b><?php if($_GET['project']){
                            $current_project = $_GET['project'];
                            $DataConnect = mysqli_connect('localhost','barkley','barkley','barkley');
                            $query = mysqli_query($DataConnect, "SELECT `project_name` FROM `projects` WHERE project_id = $current_project");
                            $selected_project = $query->fetch_row()[0];
                            echo $selected_project;
                            }else echo "<b>None</b>";?></b></li>-->
        </nav>
        <?php if($_GET['error']){ ?><div class='alert alert-<?php error_reporting(0); if($_GET['error']){echo $_GET['error'];}else echo "danger";?>'>
			   <button type='button' class='close' data-dismiss='alert'>&times;</button>
			   <p><?php if($_GET['error']){echo $_GET['error_text'];}else echo "We apologize, This feature has been disabled and is undergoing maintenance. Please check again later.";?></p>
			</div><?php }?>
        <div id="bark">
			<div class="branch <?php if($_GET['tab'] == "projects"){echo "active";}?>">
                <div class="leaf">
                    <h3 id="title">Projects</h3>
                    <!--<nav id="sort">
                        <li>All</li>
                        <li>In House</li>
                        <li>Clients</li>
                        <li>Archived</li>
                    </nav>
                    <input type="text" placeholder="Search Projects" value=""/>-->
                </div>
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
                        $Projects = new Project();
                        if($Projects){
                            $Project_Results = $Projects->ReturnAll();
                        }else{
                            echo "Project object could not be created.";
                        }
                
                        if($Project_Results){
                            foreach ($Project_Results as $Project){
                                //echo "Returned Project <b>\"".$Project->projectName ."\"</b> from your database.</br>";
                        
                                if($Project->projectArchived == 0){
                                    echo "<tr>
                                    <td>".$Project->projectName."</td>
                                    <td>".$Project->projectStart."</td>
                                    <td>".$Project->projectTasks."</td>
                                    <td>".$Project->projectDeadline."</td>
                                    <td>".$Project->projectDescription."</td>
                                    </tr>";
                                }
                            }
                        }
                                
                        if($_GET['action'] == 'new_project'){
                            if(isset($_POST['project_title'])){
                                if(isset($_POST['project_deadline'])){
                                    if(isset($_POST['project_details'])){
                                        $TempProject = new Project();
                                        $TempProject->accountID = $userid;
                                        $TempProject->projectName = $_POST['project_title'];
                                        $TempProject->projectDeadline = $_POST['project_deadline'];
                                        $TempProject->projectDescription = $_POST['project_details'];
                                        $TempProjectResult = $TempProject->Create();
                                        if($TempProjectResult){
                                            echo "<META http-equiv='refresh' content='0;URL=projects.php?tab=projects&error=success&error_text=Your+Project+<b>$TempProject->projectName</b>+has+been+created+successfully.'>";
                                        }
                                    }
                                }
                            }
                        }
                                
                        if($_GET['action'] == 'archive_project'){
                            $TempProject = new Project();
                            $TempProject->accountID = $userid;
                            $TempProject->projectID = $_GET['project'];
                            $TempProjectResult = $TempProject->Archive();
                            if($TempProjectResult){
                                echo "<META http-equiv='refresh' content='0;URL=projects.php?tab=projects&error=success&error_text=Your+Project+has+been+archived+successfully.'>";
                                }
                            }
                    ?>
                </table>
			</div> <!-- Branch -->
            
            <div class="branch <?php if($_GET['tab'] == "myprojects"){echo "active";}?>" id="my_projects">
                <div class="leaf">
                    <h3 id="title">My Projects</h3>
                    <nav id="sort">
                        <li>All</li>
                        <li>In House</li>
                        <li>Clients</li>
                        <li>Archived</li>
                    </nav>
                    <input type="text" placeholder="Search Projects" value=""/>
                </div>
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
                    $Projects = new Project();
                    if($Projects){
                        $Project_Results = $Projects->ReturnAll($userid);
                    }else{
                        echo "Project object could not be created.";
                    }
                                
                    if($Project_Results){
                        foreach ($Project_Results as $Project){
                            //echo "Returned Project <b>\"".$Project->projectName ."\"</b> from your database.</br>";
                            if($Project->projectArchived == 0){
                                echo "<tr>
                                <td>".$Project->projectName."</td>
                                <td>".$Project->projectStart."</td>
                                <td>".$Project->projectTasks."</td>
                                <td>".$Project->projectDeadline."</td>
                                <td>".$Project->projectDescription."</td>
                                <td><a class='btn btn-primary' href='?tab=myprojects&project=".$Project->projectID."'>Select</a></td>
                                </tr>";
                            }
                        }
                    }
                ?>
                </table>
            </div>
		</div>
    </div>

<?php include("includes/footer.php");?>