<?php require_once 'header-footer/header.php';?>
<?php require_once 'header-footer/nav.php';?>

<link rel="stylesheet" type="text/css" href="../../../node_modules/intro.js/introjs.css">


<div class="container">
	<?php require_once 'contents/simulate.php';?>
 
</div> <!-- end-container -->

	
    <script src="../../../lib/jquery/jquery-1.8.3.min.js"></script>
	<script src="../../../lib/ace/ace.js"></script>
	<script src="../../../lib/ace/theme-twilight.js"></script>
	<script src="../../../lib/ace/mode-c_cpp.js"></script>
	<script src="../../../lib/jquery-ace.min.js"></script>

    <script type="text/javascript" src="../../../node_modules/intro.js/intro.js"></script>
	<script>
		 $('document').ready(function(){
		 	$('.my-code-area').find('div');
		 });
	</script>

	<script type="text/javascript">
		<?php include $dir . '/simulate/js/js-lesson1.js';?>
		function startSimulate(){
			var intro = introJs();
			var stepsLine = {
				steps: <?php include $dir . '/simulate/json/'.$jsonPage;?>
			};
			intro.setOptions({ steps: stepsLine.steps });

			intro.start();
		}
    </script>

<?php require_once 'header-footer/footer.php';?>