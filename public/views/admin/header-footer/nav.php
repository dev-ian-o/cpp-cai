<div id="wrapper">
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" href="index.html">CPP-CAI ADMIN</a>
		</div>
		<!-- /.navbar-header -->

		<ul class="nav navbar-top-links navbar-right">
		    <li class="dropdown">
		        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
		        </a>
		        <ul class="dropdown-menu dropdown-user">
		            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
		            </li>
		            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
		            </li>
		            <li class="divider"></li>
		            <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
		            </li>
		        </ul>
		        <!-- /.dropdown-user -->
		    </li>
		    <!-- /.dropdown -->
		</ul>
		<!-- /.navbar-top-links -->

		<div class="navbar-default sidebar" role="navigation">
		    <div class="sidebar-nav navbar-collapse">
		        <!-- <ul class="nav" id="side-menu">
		            <li>
		                <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
		            </li>
		            <li class="active">
		                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
		                <ul class="nav nav-second-level">
		                    <li>
		                        <a href="flot.html">Flot Charts</a>
		                    </li>
		                    <li>
		                        <a class="active" href="morris.html">Morris.js Charts</a>
		                    </li>
		                </ul>
		                
		            </li>
		            <li>
		                <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
		            </li>
		            <li>
		                <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
		            </li>
		            <li>
		                <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
		                <ul class="nav nav-second-level">
		                    <li>
		                        <a href="panels-wells.html">Panels and Wells</a>
		                    </li>
		                    <li>
		                        <a href="buttons.html">Buttons</a>
		                    </li>
		                    <li>
		                        <a href="notifications.html">Notifications</a>
		                    </li>
		                    <li>
		                        <a href="typography.html">Typography</a>
		                    </li>
		                    <li>
		                        <a href="grid.html">Grid</a>
		                    </li>
		                </ul>
		                
		            </li>
		            <li>
		                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
		                <ul class="nav nav-second-level">
		                    <li>
		                        <a href="#">Second Level Item</a>
		                    </li>
		                    <li>
		                        <a href="#">Second Level Item</a>
		                    </li>
		                    <li>
		                        <a href="#">Third Level <span class="fa arrow"></span></a>
		                        <ul class="nav nav-third-level">
		                            <li>
		                                <a href="#">Third Level Item</a>
		                            </li>
		                            <li>
		                                <a href="#">Third Level Item</a>
		                            </li>
		                            <li>
		                                <a href="#">Third Level Item</a>
		                            </li>
		                            <li>
		                                <a href="#">Third Level Item</a>
		                            </li>
		                        </ul>
		                        
		                    </li>
		                </ul>
		                
		            </li>
		            <li>
		                <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
		                <ul class="nav nav-second-level">
		                    <li>
		                        <a href="blank.html">Blank Page</a>
		                    </li>
		                    <li>
		                        <a href="login.html">Login Page</a>
		                    </li>
		                </ul>
		                
		            </li>
		        </ul> -->
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
		                <a href="quiz-analytics.php"><i class="fa fa-dashboard fa-fw"></i> Quiz Results Analtics</a>
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