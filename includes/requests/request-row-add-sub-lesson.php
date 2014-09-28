<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php include($dir ."/includes/classes/exam-functions.php"); ?>
<?php	
	//form name here ----------v
	if (($_POST['form']) === "add-row-sub-page")
	{

		$vars = $_POST;
		$return = array(
			"error" => "",
			"output" => "",
		);

		add_sub_lesson($vars,$conn);
		$return['error'] = 'ok';
		print_r(json_encode($return));
	}

?>