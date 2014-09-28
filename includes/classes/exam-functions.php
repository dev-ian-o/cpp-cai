<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>

<?php require_once $dir.'/includes/database/database.php';?>


<?php


function add_lesson($row,$conn){
	$stmt = $conn->prepare("INSERT INTO tbl_lessons_chapters(
		lesson_description,
		lesson_chapter) values(:lesson_description,:lesson_chapter)
	");

	$stmt->execute(array(
		"lesson_description" => $row['lesson_description'],
		"lesson_chapter" => $row['lesson_chapter']
	));
	
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $row;
}

function add_sub_lesson($row,$conn){
	$stmt = $conn->prepare("INSERT INTO tbl_lessons_sub_chapters(
		lesson_id,
		lesson_chapter,
		lesson_sub_description,
		content) values(:lesson_id,:lesson_chapter,:lesson_sub_description,:content)
	");

	$stmt->execute(array(
		"lesson_id" => $row["lesson_id"],
		"lesson_chapter" => $row["lesson_chapter"],
		"lesson_sub_description" => $row["lesson_sub_description"],
		"content" => $row["content"]
	));
	
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $row;
}


function update_lesson($row,$conn){
	$stmt = $conn->prepare("UPDATE tbl_lessons_chapters 
		SET lesson_chapter = :lesson_chapter, 
			lesson_description = :lesson_description
		WHERE lesson_id = :lesson_id
	");

	$stmt->execute(array(
		"lesson_description" => $row['lesson_description'],
		"lesson_chapter" => $row['lesson_chapter'],
		"lesson_id" => $row['lesson_id']
	));
	
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function update_sub_lesson($row,$conn){
	$stmt = $conn->prepare("UPDATE tbl_lessons_sub_chapters 
		SET lesson_id = :lesson_id,
			lesson_chapter = :lesson_chapter,
			lesson_sub_description = :lesson_sub_description,
			content = :content
		WHERE lesson_sub_id = :lesson_sub_id
	");

	$stmt->execute(array(
		"lesson_sub_id" => $row["lesson_sub_id"],
		"lesson_id" => $row["lesson_id"],
		"lesson_chapter" => $row["lesson_chapter"],
		"lesson_sub_description" => $row["lesson_sub_description"],
		"content" => $row["content"],
	));
	
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// $arr = array(
// 		"lesson_sub_id" => "1",
// 		"lesson_id" => "1",
// 		"lesson_chapter" => "1",
// 		"lesson_sub_description" => "sample",
// 		"content" => "asd",
// );

// update_sub_lesson($arr,$conn);

function fetch_lessons($conn,$print = true){
	$stmt = $conn->prepare("SELECT * 
		FROM tbl_lessons_chapters
	");
	
	$stmt->execute(array(

	));
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$row = json_encode($row);

	if ($print) print_r($row); else return $row;
}
function fetch_exam_items($conn,$id,$print = true){
	$stmt = $conn->prepare("SELECT * 
		FROM tbl_exam_items
		WHERE lesson_id =:lesson_id
	");
	
	$stmt->execute(array(
		"lesson_id" => $id
	));
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$row = json_encode($row);

	if ($print) print_r($row); else return $row;
}

function query_lessons($conn, $row, $print=true){
	$stmt = $conn->prepare("SELECT * 
		FROM tbl_lessons_chapters
		WHERE lesson_chapter = :lesson_chapter OR
		lesson_description = :lesson_description
	");
	
	$stmt->execute(array(
		"lesson_description" => $row['lesson_description'],
		"lesson_chapter" => $row['lesson_chapter']
	));

	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$row = json_encode($row);

	if ($print) print_r($row); else return $row;
}

function query_lessons_id($conn, $row, $print=true){
	$stmt = $conn->prepare("SELECT * 
		FROM tbl_lessons_chapters
		WHERE lesson_id = :lesson_id
	");
	
	$stmt->execute(array(
		"lesson_id" => $row['lesson_id'],
	));

	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	// $row = json_encode($row);

	if ($print) print_r($row); else return $row;
}

function fetch_sub_lessons($conn,$print = true){
	$stmt = $conn->prepare("SELECT * 
		FROM tbl_lessons_sub_chapters
	");
	
	$stmt->execute(array(

	));
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$row = json_encode($row);

	if ($print) print_r($row); else return $row;
}

function query_sub_lessons($conn,$id = 1,$print = true){
	$stmt = $conn->prepare("SELECT * 
		FROM tbl_lessons_sub_chapters
		WHERE lesson_sub_id = :id
	");
	
	$stmt->execute(array(
		'id' => $id
	));
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$row = json_encode($row);

	if ($print) print_r($row); else return $row;
}




function add_tally($row,$conn){

	$stmt = $conn->prepare("INSERT INTO tbl_tally(
		lesson_id,
		lesson_sub_id,
		exam_item_id,
		correct,
		wrong
		) 
		VALUES(:lesson_id,:lesson_sub_id,:exam_item_id,:correct,:wrong)
	");

	$stmt->execute(array(
		"lesson_id" => $row["lesson_id"],
		"lesson_sub_id" => $row["lesson_sub_id"],
		"exam_item_id" => $row["exam_item_id"],
		"correct" => $row["correct"],
		"wrong" => $row["wrong"]
	));
	
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);	
}



function add_results($row,$conn){

	$stmt = $conn->prepare("INSERT INTO tbl_results(
		lesson_id,
		result_date,
		result_score
		) 
		VALUES(:lesson_id,:result_date,:result_score)
	");

	$stmt->execute(array(
		"lesson_id" => $row["lesson_id"],
		"result_date" => $row["result_date"],
		"result_score" => $row["result_score"]
	));
	
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);	
}


function add_exam($row,$conn){
	$stmt = $conn->prepare("INSERT INTO tbl_exams(
		exam_id,
		lesson_id,
		exam_description
		) 
		VALUES(:exam_id,:lesson_id,:exam_description)
	");

	$stmt->execute(array(
		"exam_id" => "exam_id",
		"lesson_id" => "lesson_id",
		"exam_description" => "exam_description"
	));
	
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);	

}


function add_exam_items($row,$conn){
	$stmt = $conn->prepare("INSERT INTO tbl_exam_items(
		lesson_id,
		lesson_sub_id,
		lesson_question,
		lesson_choices,
		lesson_answer
		) 
		VALUES(:lesson_id,:lesson_sub_id,:lesson_question,:lesson_choices,:lesson_answer)
	");

	$stmt->execute(array(
		"lesson_id" => "lesson_id",
		"lesson_sub_id" => "lesson_sub_id",
		"lesson_question" => "lesson_question",
		"lesson_choices" => "lesson_choices",
		"lesson_answer" => "lesson_answer"
	));

	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);	
}

function update_exam_items($row,$conn){
	$stmt = $conn->prepare("UPDATE tbl_exam_items 
		SET lesson_id = :lesson_id,
			lesson_sub_id = :lesson_sub_id,
			lesson_question = :lesson_question,
			lesson_choices = :lesson_choices,
			lesson_answer = :lesson_answer
		WHERE lesson_id = :lesson_id AND lesson_sub_id = :lesson_sub_id
	");

	$stmt->execute(array(
		"lesson_id" => "lesson_id",
		"lesson_sub_id" => "lesson_sub_id",
		"lesson_question" => "lesson_question",
		"lesson_choices" => "lesson_choices",
		"lesson_answer" => "lesson_answer"
	));
	
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
}



// $arr = array(
// 	'lesson_chapter' => '1',
// 	'lesson_description' => 'c++ thingy',
// );
// update_lesson($arr, $conn);

// fetch_lessons($conn);


function show_limit($val,$limit = 20){
	$str = substr($val, 0, $limit);
	if(strlen($val) > $limit) $str .= "...";
	return $str;
}
