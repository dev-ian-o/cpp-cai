<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php include($dir ."/includes/classes/exam-functions.php"); ?>
<?php	

	if (($_POST['form']) === "add-row-lesson-page")
	{

		$vars = $_POST;
		$return = array(
			"error" => "",
			"output" => "",
		);
		// print_r(query_lessons($conn,$vars,false));
		if(query_lessons($conn,$vars,false) === "[]"){
			//ok
			add_lesson($vars,$conn);
			$return['error'] = "ok";
			print_r(json_encode($return));
		}
		else{
			// not ok
			print_r(json_encode($return));	
		}
	}

?>