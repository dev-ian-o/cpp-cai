<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php include("../classes/exam-functions-request.php"); ?>
<?php require_once '../classes/session-request.php'; ?>
<?php	
	//form name here ----------v
	if (($_POST['form']) === "add-row-user-page")
	{

		$vars = $_POST;
		$return = array(
			"error" => "",
			"output" => "",
		);
		$vars['password'] = sha1(md5($vars['password']));
		add_user($vars,$conn);
		$return['error'] = "ok";
		print_r(json_encode($return));
	}

?>