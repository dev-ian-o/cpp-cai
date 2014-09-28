<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php include($dir ."/includes/classes/exam-functions.php"); ?>
<?php	

	if (($_POST['form']) === "edit-row-sub-page")
	{

		$vars = $_POST;
		$return = array(
			"error" => "",
			"output" => "",
		);
		update_sub_lesson($vars,$conn);
		$return['error'] = "ok";
		print_r(json_encode($return));
		
	}

?>