<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php require_once $dir . '/includes/database/database.php';?>
<?php require_once $dir . '/includes/classes/exam-functions.php';?>

<?php 
	$id = "";
	if(isset($_GET['type']) && isset($_GET['lesson_id']))
	{
		//
		$id = $_GET['lesson_id'];	
		if($_GET['type'] === "chapter_test")
		{
			$items = json_decode(fetch_exam_by_chapter($conn,$id,false));
		}
		else if ($_GET['type'] === "lesson_test")
		{
			$items = json_decode(fetch_exam_by_lesson($conn,$id,false));
		}
	}
	else
	{
		echo "<script>alert('Please choose first from the exam menu');</script>";
		echo "<script>window.location = 'exam.php';</script>";
	}
?>

<?php $lessons = json_decode(fetch_lessons($conn,false)); ?>
<?php $sub_lessons = json_decode(fetch_sub_lessons($conn,false)); ?>

<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">EXAM
				<div class="pull-right">
					<a class="right btn-right btn btn-danger btn-sm" href="#test-page" data-slide="next">
						<span class="icon-next"></span>
						Next
					</a>
				</div>
			</div>
			<form id="form-exam" method="post" action="result.php">
			<input type="hidden" name="form" value="form-exam">
			<div class="panel-body">
				<div id="test-page" class="test-page carousel slide bs-docs-carousel-example">
					<div class="carousel-inner">
						<form id="form-quiz" method="post">
						<input type="hidden" name="type" value="<?= $_GET['type']?>">
						<input type="hidden" name="lesson_id" value="<?= $_GET['lesson_id']?>">

						<?php foreach ($items as $key => $value) : ?>
						<?php $a= 0;?>
						<div class="item <?php if($key === 0){echo 'active';}?>">
							<div class="mL20">
								<p><?= ++$key.')'.$value->lesson_question;?></p>
								<?php $arrChoices = array($value->lesson_choice1,$value->lesson_choice2,$value->lesson_choice3,$value->lesson_choice4); ?>
								<?php foreach ($arrChoices as $cKey => $cValue) :?>
								<div class="radio">
								<!-- store to array and random array and foreach to input -->
									<label>
										<input type="radio" name="exam_item_id[<?=$value->exam_item_id;?>]"  value="<?=$cValue;?>" <?php if($a++ == 0){echo 'checked="checked"';}?>>
										<?= $cValue;?>
									</label>
								</div>
								<?php endforeach;?>

							</div>
						</div>
						<?php endforeach;?>
						<!-- <div class="item">
							<div class="mL20">
								<p>1. What is C++?</p>
								<div class="radio">
									<label>
										<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
										Option one is this and that—be sure to include why it's great
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
										Option one is this and that—be sure to include why it's great
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
										Option one is this and that—be sure to include why it's great
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
										Option one is this and that—be sure to include why it's great
									</label>
								</div>
							</div>
						</div> -->
						<div class="item">
							<div class="text-center">
								<button type="submit" name="submit" class="btn btn-lg btn-primary">
										SUBMIT
								</button>

							</div>
						</div>
						</form>

					</div>
					
				</div>
			</div>
			
			</form>

		</div>
	</div>
</div>