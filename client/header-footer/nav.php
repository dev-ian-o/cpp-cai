<nav class="navbar navbar-default navbar-fixed-top " role="navigation">
	<div class="container">
	  <!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		  <span class="sr-only">Toggle navigation</span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">C++ CAI</a>
	  </div>
	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="navbar-collapse navbar-ex1-collapse collapse" style="height: 1px;">
		<ul class="nav navbar-nav">
		  <li class="<?php if(isset($_GET['page']) && $_GET['page'] === 'index'){ echo 'active'; } ?>"><a href="index.php?page=index">Lessons</a></li>
		  <li class="<?php if(isset($_GET['page']) && $_GET['page'] === 'compile'){ echo 'active'; } ?>"><a href="compile.php?page=compile">Compile C++</a></li>
		  <li class="<?php if(isset($_GET['page']) && $_GET['page'] === 'simulate'){ echo 'active'; } ?>"><a href="simulate.php?page=simulate">Simulate Code</a></li>
		  <li class="<?php if(isset($_GET['page']) && $_GET['page'] === 'exam'){ echo 'active'; } ?>"><a href="exam.php?page=exam">Test yourself!</a></li>
		</ul>
		
		</div><!-- /.navbar-collapse --> 
	</div>	
</nav>