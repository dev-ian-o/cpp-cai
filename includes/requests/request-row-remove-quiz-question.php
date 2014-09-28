<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php include($dir ."/includes/classes/exam-functions.php"); ?>
<?php	
	//form name here ----------v
	if (($_POST['form']) === "add-row-lesson-page")
	{

		$vars = $_POST;
		$return = array(
			"error" => "",
			"output" => "",
		);
		print_r(json_encode($return));
	}

?>