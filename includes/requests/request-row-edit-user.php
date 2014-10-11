<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php include("../classes/exam-functions-request.php"); ?>
<?php	
	//form name here ----------v
	if (($_POST['form']) === "edit-row-user-page-name")
	{

		$vars = $_POST;
		$return = array(
			"error" => "",
			"output" => "",
		);

		update_user_name($vars,$conn);
		$return['error'] = "ok";
		print_r(json_encode($return));
	}
	if (($_POST['form']) === "edit-row-user-page-password")
	{

		$vars = $_POST;
		$return = array(
			"error" => "",
			"output" => "",
		);
		$vars['password'] = sha1(md5($vars['password']));
		update_user_password($vars,$conn);
		$return['error'] = "ok";
		print_r(json_encode($return));
	}

?>