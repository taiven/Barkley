<?php include("includes/header.php");?>
          <ul class="nav nav-tabs" style="margin-left:70px;">
			<li><a href="?tab=overview"><span class="glyphicon glyphicon-home icon"></span> Overview</a></li>
			<li><a href="?tab=client<?php error_reporting(0); if($_GET['project'] == null){/*nothing*/}else echo "&project=".$_GET['project'];?>"><span class="glyphicon glyphicon-user icon"></span> Client Base</a></li>
			<li><a href="?tab=partner"><span class="glyphicon glyphicon-phone-alt icon"></span> Partners</a></li>
			<li><a href="?tab=archive<?php error_reporting(0); if($_GET['project'] == null){/*nothing*/}else echo "&project=".$_GET['project'];?>"><span class="glyphicon glyphicon-hdd icon"></span> Archives</a></li>
		  </ul>
		
		</div>
<?php include("includes/footer.php");?>