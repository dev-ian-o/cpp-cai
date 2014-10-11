<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>

<?php include("../classes/exam-functions-request.php"); ?>
<?php require_once '../classes/session-request.php'; ?>

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