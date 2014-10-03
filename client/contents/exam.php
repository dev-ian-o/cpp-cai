<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php require_once '../includes/database/database.php';?>
<?php require_once '../includes/classes/exam-functions.php';?>

<?php $lessons = json_decode(fetch_lessons($conn,false)); ?>
<?php $sub_lessons = json_decode(fetch_sub_lessons($conn,false)); ?>
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">CHOOSE QUIZ FROM THE LIST:</div>
			<div class="panel-body">
				<div class="panel-group" id="accordion">
				  <!-- panel #1 -->
				 <?php foreach ($lessons as $key => $value) : ?>
				  <div class="panel">
					<div class="panel-heading">
					  <h3 class="panel-title">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?= 'chapter'.$value->lesson_chapter;?>">
						<!-- lesson here -->
						  <?= $value->lesson_description;?> <small class="pull-right">(Lesson #<?= $value->lesson_chapter;?>)</small>
						</a>
					  </h3>
					</div>
					<div id="<?= 'chapter'.$value->lesson_chapter;?>" class="panel-collapse  <?php if($key === 4){print'collapse in';}else{print 'collapse';}?>">
					  	<div class="panel-body">
					  		<div class="list-group">
			  					<?php foreach ($sub_lessons as $key_sub => $value_sub) : ?>
			  						<?php if($value->lesson_id == $value_sub->lesson_id ):?>
			  						<form method="post">
									<a href="quiz.php?type=lesson_test&lesson_id=<?=  $value_sub->lesson_sub_id;?>" type="submit" name="lesson" class="list-group-item sub-chapter-link">
										<?= $value_sub->lesson_sub_description;?>
									</a>

									</form>
									<?php endif;?>
								<?php endforeach; ?>
									<a href="quiz.php?type=chapter_test&lesson_id=<?=  $value->lesson_id;?>" class="list-group-item sub-chapter-link">
										Chapter Test
									</a>
							</div>
					  	</div>
					</div>
				  </div>
				<?php endforeach;?>
				</div>
			</div>
		</div>
	
	</div>
	
</div>

<div class="panel panel-default hide">
		<div class="panel-heading clearfix">EXAM
			<div class="pull-right">
				<a class="right btn-right btn btn-danger btn-sm" href="#test-page" data-slide="next">
					<span class="icon-next"></span>
					Next
				</a>
			</div>
		</div>
		<form id="form-exam" method="post">
		<input type="hidden" name="form" value="form-exam">
		<div class="panel-body">
			<div id="test-page" class="test-page ">
				<div class="">
					<form id="form-quiz" method="post">
					<?php foreach ($items as $key => $value) : ?>

					<div class="item <?php if($key === 0){echo 'active';}?>">
						<div class="mL20">
							<p><?= ++$key.')'.$value->lesson_question;?></p>
							<?php $arrChoices = array($value->lesson_choice1,$value->lesson_choice2,$value->lesson_choice3,$value->lesson_choice4); ?>
							<?php foreach ($arrChoices as $cKey => $cValue) :?>
							<div class="radio">
							<!-- store to array and random array and foreach to input -->
							
								<label>
									<input type="radio" name="exam_item_id[<?=$value->exam_item_id;?>]"  value="<?=$cValue;?>">
									<?= $cValue;?>
								</label>
							</div>
							<?php endforeach;?>

						</div>
					</div>
					<?php endforeach;?>
					<div class="item">
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
					</div>
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
