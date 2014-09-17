<?php include("site/inc/header.php");?>
	
	<div id="Slider" class="carousel slide">
		<div class="carousel-inner">
			<div class="item active">
				<img src="http://placehold.it/1490x300/000/000.png&text=_" alt="First slide">
				<div class="container">
					<div class="carousel-caption">
						<h2>Welcome to the Developers Panel</h2>
						<p>Here we can manage projects and assign tasks.</p>
						<p><a class="btn btn-lg btn-info" href="#">Learn More</a></p>
					</div>
				</div>
			</div>
			<div class="item">
				<img src="http://placehold.it/1490x300/000/000.png&text=_" alt="Second slide">
				<div class="container">
					<div class="carousel-caption">
						<h2>Version 1.7.0 Beta</h2>
						<p>Recent Stable Version, No Known Bugs, Project Management System Complete</p>
						<p><a class="btn btn-lg btn-info" href="#">Learn More</a></p>
					</div>
				</div>
			</div>
			<div class="item">
				<img src="http://placehold.it/1490x300/000/000.png&text=_" alt="Third slide">
				<div class="container">
					<div class="carousel-caption">
						<h2>RoadMap & Changelog</h2>
						<p>Check out what's new and what will be happening.</p>
						<p><a class="btn btn-lg btn-info" href="#">Learn More</a></p>
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#Slider" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
		<a class="right carousel-control" href="#Slider" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	</div><!-- /.carousel -->
	<nav class="fast_nav navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="fast_nav_brand navbar-brand" href="#">Quick Links</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="fast_nav_ul nav navbar-nav">
      <li><a href="http://wubcrate.com">Wubcrate</a></li>
      <li><a href="http://blog.wubcrate.com">Blog</a></li>
      <li><a href="http://support.wubcrate.com">Support</a></li>
      <li><a href="http://community.wubcrate.com">Community</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
<ul class="nav nav-tabs front-page" style="margin-top: -1.6%;">
	<li><a href="#about" data-toggle="tab"><span class="glyphicon glyphicon-home icon"></span> About</a></li>
	<li><a href="#track" data-toggle="tab"><span class="glyphicon glyphicon-signal icon"></span> Track</a></li>
	<li><a href="#collaborate" data-toggle="tab"><span class="glyphicon glyphicon-envelope icon"></span> Collaborate</a></li>
	<li><a href="#maintain" data-toggle="tab"><span class="glyphicon glyphicon-cog icon"></span> Maintain</a></li>
</ul>
<div id="content" class="tab-content">
	<div class="tab-pane active" id="about">
		<div class="container">
			<h3>About</h3>
		</div>
	</div>
	
	<div class="tab-pane" id="track">
		<div class="container">
			<h3>Track</h3>
		</div>
	</div>
	
	<div class="tab-pane" id="collaborate">
		<div class="container">
			<h3>Collaborate</h3>
		</div>
	</div>
	
	<div class="tab-pane" id="maintain">
		<div class="container">
			<h3>Maintain</h3>
		</div>
	</div>
</div>
<?php include("site/inc/footer.php");?>