<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php include($dir ."/includes/classes/exam-functions.php"); ?>
<?php require_once '../includes/classes/session.php'; ?>

<?php	

	if (($_POST['form']) === "remove-row-lesson-page")
	{

		$vars = $_POST;
		$return = array(
			"error" => "",
			"output" => "",
		);

		
		// print_r(json_encode(query_lessons_id($conn,$vars,false)));
		// if(query_lessons($conn,$vars,false) === "[]"){
		// 	update_lesson($vars,$conn);
		// 	$return['error'] = "ok";
		// 	print_r(json_encode($return));
		// }
		// else{
		// 	// not ok
		// 	print_r(json_encode($return));	
		// }
	}

?>