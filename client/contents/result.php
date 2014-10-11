<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php require_once '../includes/database/database.php';?>
<?php require_once '../includes/classes/exam-functions.php';?>
<?php require_once '../includes/classes/file.php';?>

<?php $lessons = json_decode(fetch_lessons($conn,false)); ?>
<?php $sub_lessons = json_decode(fetch_sub_lessons($conn,false)); ?>

<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">RESULTS
			<div class="pull-right">
			</div>
		</div>

		<div class="panel-body">
		<h3 class="here-score"><code>SCORE: </code></h3>
<?php
	$items = [];
	$arrKey = [];
	if (isset($_POST['submit']))
	{
		$exam_item_id = $_POST['exam_item_id'];
		$id = $_POST['lesson_id'];
		$total = 0;
		$score = 0;
		if($_POST['type'] === "chapter_test")
		{
			$items = json_decode(fetch_exam_by_chapter($conn,$id,false));
			// --> foreachhere
			$a = 1;
			foreach ($exam_item_id as $key => $value) 
			{
				$total++;
				//query here for database // if chapter test here
				$row['exam_item_id'] = $key;
				$row['lesson_answer'] = $value;
				if(query_correct_id($conn,$row,$print = false) === "[]")
				{
					$item = json_decode(query_item($conn,$key,false));
					echo "<p>".$a++.')'.$item[0]->lesson_question."</p>";
					echo "<p><b>incorrect&nbsp;&nbsp;</b>".$item[0]->lesson_answer." ";
					echo "<br></p>";
					$tally['lesson_id'] =  $item[0]->lesson_id;
					$tally['lesson_sub_id'] = $item[0]->lesson_sub_id;
					$tally['exam_item_id'] = $item[0]->exam_item_id;
					$tally['correct'] = 0;
					$tally['wrong'] = 1;
					$tally['exam_date'] = date('yyyy-mm-dd hh:mm');

					add_tally($tally, $conn);
					$file =  '../db/dbtally.txt';
					File::put($file, json_encode($tally), true);
					// print_r($item);
				}
				else{
					$item = json_decode(query_correct_id($conn,$row,false));

					echo "<p>".$a++.')'.$item[0]->lesson_question."</p>";
					echo "<p><b>correct&nbsp;&nbsp;</b>";
					echo "<br></p>";
					$score++;
					$tally['lesson_id'] =  $item[0]->lesson_id;
					$tally['lesson_sub_id'] = $item[0]->lesson_sub_id;
					$tally['exam_item_id'] = $item[0]->exam_item_id;
					$tally['correct'] = 1;
					$tally['wrong'] = 0;
					$tally['exam_date'] = date('yyyy-mm-dd hh:mm');
					add_tally($tally, $conn);

					$file =  '../db/dbtally.txt';
					// echo $file;
					File::put($file, json_encode($tally), true);
				}


			}
		}
		else if ($_POST['type'] === "lesson_test")
		{
			$a = 1;
			$items = json_decode(fetch_exam_by_chapter($conn,$id,false));

			foreach ($exam_item_id as $key => $value) 
			{
				//query here for database // if chapter test here
				$total++;
				$row['exam_item_id'] = $key;
				$row['lesson_answer'] = $value;
				if(query_correct_id($conn,$row,$print = false) === "[]")
				{
					$item = json_decode(query_item($conn,$key,$print = false));
					echo "<p>".$a++.')'.$item[0]->lesson_question."</p>";
					echo "<p><b>incorrect&nbsp;&nbsp;</b>".$item[0]->lesson_answer." ";
					echo "<br></p>";

					// print_r($item);
				}
				else{
					$item = json_decode(query_correct_id($conn,$row,$print = false));
					$score++;
					echo "<p>".$a++.')'.$item[0]->lesson_question."</p>";
					echo "<p><b>correct&nbsp;&nbsp;</b>";
					echo "<br></p>";
				}


			}

		}

	}
	else{
		echo "<script>window.location='exam.php'</script>";
	}
?>
<?php
	$percentage = (($score / $total) * 50 )+ 50;
	$status = "";
	if($percentage === 100){
		$status = "Excellent! You have mastered this topic in C++.";
	}else if($percentage >= 95 || $percentage >= 90){
		$status = "Very Good! You have learned advanced concepts of this topics in C++";
	}else if($percentage >  85|| $percentage >= 80){
		$status = "Good! You have learned the basics of this topic in C++";
	}else if($percentage >  80|| $percentage >= 76){
		$status = "Fair! You have passed this topic but you sill need to learn more to improve your rating";
	}else{
		$status = "Poor! You have failed in this topic and you still need to review the lesson again";
	}


?>
			<span class="hide score"><?= $score.'/'.$total.'<br> Rating: '.$status;?></span>

		</div>

	</div>
</div>