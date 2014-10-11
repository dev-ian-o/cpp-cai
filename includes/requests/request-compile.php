<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php include("../includes/classes/getError.php"); ?>
<?php
	if (($_POST['form']) === "form-compile")
	{

		$vars = $_POST;
		$return = array(
			"error" => "",
			"output" => "",
		);
		writeCPP($vars['code']); // create a file cpp random name

		if(getError($_SESSION['file_name']) !== "Compilation complete"){
			$error = getError($_SESSION['file_name']);
			$return['error'] = $error;
			print_r(json_encode($return));
		}
		else{
			$file = str_replace(".cpp", "", $_SESSION['file_name']);
			$file_exe = str_replace(".cpp", ".exe", $_SESSION['file_name']);
			compileCPP($file);
			$error = getError($_SESSION['file_name']);
			$return['error'] = $error;
			$return['output'] = outputCPP($file_exe);
			print_r(json_encode($return));

		}

	}

?>