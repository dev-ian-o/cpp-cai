<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php require_once $dir . '/includes/database/database.php';?>
<?php require_once $dir . '/includes/classes/exam-functions.php';?>
<?php 

	$htmlPagesArr = array(
		"0" => "html-lesson1.php",
		"1" => "html-lesson2.php",
	);

	$jsonPagesArr = array(
		"0" => "json-lesson1.json",
		"1" => "json-lesson1.json",
	);

	$programNameArr = array(
		"0" => "Array Program 1",
		"1" => "Array Program 2",
	);

	if(isset($_GET['html']) && isset($_GET['json'])){
		$htmlPage = $_GET['html'];
		$jsonPage = $_GET['json'];
	}else { $htmlPage = "html-lesson1.php"; $jsonPage = "json-lesson1.json";}
?>
<style type="text/css">
	.my-code-area{
		color: #313131;
		background-color: #E1E4E1!important; 
	}
	.my-code-area > pre{
		color: #313131;
		background-color: #E1E4E1!important;
		line-height: 10px;
	}

</style>

<div class="row">
	<!-- panels -->
	<div class="col-sm-12">
		<div class="panel panel-default">
		<div class="panel-heading clearfix">Programs:</div>
			<div class="panel-body">
				<div class="list-group">
				<?php for($a = 0; $a < sizeof($htmlPagesArr); $a++):?>
					<a href="simulate.php?page=simulate&html=<?= $htmlPagesArr[$a];?>&json=<?= $jsonPagesArr[$a];?>" class="list-group-item">
						<?= $programNameArr[$a];?>
					</a>
				<?php endfor;?>
				</div>

			</div>
		</div>
	</div>
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">Simulate
				<div class="pull-right">
					<a class="btn btn-sm btn-success" href="javascript:void(0);" onclick="startSimulate();">Simulate</a>
				</div>
			</div>
			<div class="panel-body">
				<div class="my-code-area">
					<pre>
						<?php include $dir . '/simulate/html/'.$htmlPage;?>
					</pre>
				</div>
			</div>
		</div>
	</div>

	<!-- end of panels -->
	
</div>

<a href="#" class="go-top">Go Top</a>

