<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php require_once $dir . '/includes/database/database.php';?>
<?php require_once $dir . '/includes/classes/exam-functions.php';?>


<div class="panel panel-default mT60">
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
				<div class="item active">
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

