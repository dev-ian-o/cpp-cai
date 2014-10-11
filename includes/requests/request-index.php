<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php include("../includes/classes/exam-functions.php"); ?>
<?php include("../includes/classes/file.php"); ?>
<?php
	// print_r(json_encode($_POST));

	if (($_POST['fetch_sub_chapter']) === "true")
	{

		$vars = $_POST;
		$return = array(
			"error" => "",
			"output" => "",
		);

		$vars = query_sub_lessons($conn,$vars['sub_chapter'],false);
		$vars = json_decode($vars);
		// $vars[0]->content = File::get($dir."/lesson-content/".$vars[0]->content);
		if($vars[0]->content !== "") {$vars[0]->contentHTML = File::get($dir."/lesson-content/".$vars[0]->content);}
		else{ $vars[0]->contentHTML = "No content!";}
		$vars = json_encode($vars);
		print_r($vars);
		


	}

?>