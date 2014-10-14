<?php session_start();?>
<?php require_once '../includes/classes/session.php'; ?>
<div id="wrapper">
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" href="index.php">CPP-CAI ADMIN</a>
		</div>
		<!-- /.navbar-header -->

		<ul class="nav navbar-top-links navbar-right">
		    <li class="dropdown">
		        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
		        </a>
		        <ul class="dropdown-menu dropdown-user">
		            <li><a href="admin-user.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
		            </li>
		            <li class="divider"></li>
		            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
		            </li>
		        </ul>
		        <!-- /.dropdown-user -->
		    </li>
		    <!-- /.dropdown -->
		</ul>
		<!-- /.navbar-top-links -->

		<div class="navbar-default sidebar" role="navigation">
		    <div class="sidebar-nav navbar-collapse">
		        <ul class="nav" id="side-menu">
		            <li class="<?php if(isset($_GET['page']) && $_GET['page'] === 'index'){ echo 'active'; } ?>">
		                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
		            </li>
		            <li class="<?php if(isset($_GET['page']) && $_GET['page'] === 'index-page'){ echo 'active'; } ?>">
		                <a href="index-page.php?page=index-page"><i class="fa fa-dashboard fa-fw"></i> Chapters and Lessons</a>
		            </li>
		            <li>
		                <a href="lesson-content.php"><i class="fa fa-dashboard fa-fw"></i> Content Lessons</a>
		            </li>
		            <li>
		                <a href="quiz-questions.php"><i class="fa fa-dashboard fa-fw"></i> Quiz Questions</a>
		            </li>
		            <li>
		                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Quiz Results Analtics</a>
		            </li>
		            <li>
		                <a href="admin-user.php"><i class="fa fa-dashboard fa-fw"></i> Admin User Settings</a>
		            </li>
		        </ul>
		    </div>

		</div>
	<!-- /.navbar-static-side -->
	</nav>
</div>