<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php include($dir ."/includes/classes/exam-functions.php"); ?>
<?php
	// print_r(json_encode($_POST));

	if (($_POST['fetch_sub_chapter']) === "true")
	{

		$vars = $_POST;
		$return = array(
			"error" => "",
			"output" => "",
		);

		$vars = query_sub_lessons($conn,$vars['sub_chapter'],true);
		// print_r(json_encode($vars));
		


	}

?>