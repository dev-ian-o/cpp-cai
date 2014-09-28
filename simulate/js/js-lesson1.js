function startSimulate(){
	var intro = introJs();
	var stepsLine = {
		steps: <?php include $dir . '/simulate/json/json-lesson1.json';?>
	};
	intro.setOptions({ steps: stepsLine.steps });

	intro.start();
}