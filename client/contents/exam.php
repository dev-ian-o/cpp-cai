<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php require_once $dir . '/includes/database/database.php';?>
<?php require_once $dir . '/includes/classes/exam-functions.php';?>

<?php $lessons = json_decode(fetch_lessons($conn,false)); ?>
<?php $sub_lessons = json_decode(fetch_sub_lessons($conn,false)); ?>


<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">EXAM</div>
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
									<a href="#" class="list-group-item sub-chapter-link"><?= $value_sub->lesson_sub_description;?>
										<input type="hidden" value="<?= $value_sub->lesson_sub_id;?>">
									</a>
									<?php endif;?>
								<?php endforeach; ?>
									<a href="#" class="list-group-item sub-chapter-link">
										Chapter Test
										<input type="hidden" value="<?= $value->lesson_id;?>">
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
			<div id="test-page" class="test-page carousel slide bs-docs-carousel-example">
				<div class="carousel-inner">
					<!-- <div class="item active">
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
							<button type="submit" class="btn btn-lg btn-primary">
									SUBMIT
							</button>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		
		</form>

	</div>
</div>

