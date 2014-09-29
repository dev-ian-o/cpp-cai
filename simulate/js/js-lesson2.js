function startSimulate(){
	var intro = introJs();
	var stepsLine = {
		steps: <?php include $dir . '/simulate/json/json-lesson2.json';?>
	};
	intro.setOptions({ steps: stepsLine.steps });

	intro.start();
}