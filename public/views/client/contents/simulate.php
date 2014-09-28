<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php require_once $dir . '/includes/database/database.php';?>
<?php require_once $dir . '/includes/classes/exam-functions.php';?>
<style type="text/css">
	.my-code-area{
		color: #313131;
		background-color: #75ff75!important;
	}
	.my-code-area > pre{
		color: #313131;
		background-color: #75ff75!important;
		line-height: 10px;
	}

</style>

<div class="row">
	<!-- panels -->

	<div class="panel panel-default">
		<div class="panel-heading clearfix">Simulate
			<div class="pull-right">
				<a class="btn btn-sm btn-success" href="javascript:void(0);" onclick="startSimulate();">Simulate</a>
			</div>
		</div>
		<div class="panel-body">
			<div class="my-code-area">
				<pre>
					<?php include $dir . '/simulate/html/html-lesson1.php';?>
				</pre>
			</div>
		</div>
	</div>

	<!-- end of panels -->
	
</div>

<a href="#" class="go-top">Go Top</a>

