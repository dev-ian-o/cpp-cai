<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php require_once '../includes/database/database.php';?>
<?php require_once '../includes/classes/exam-functions.php';?>
<?php //require_once $dir . '/includes/classes/file.php';?>


<?php $lessons = json_decode(fetch_lessons($conn,false)); ?>
<?php $sub_lessons = json_decode(fetch_sub_lessons($conn,false)); ?>
	<style type="text/css">
	pre {
  background-color:#eee;
  overflow:auto;
  margin:0 0 1em;
  padding:.5em 1em;
}

pre code,
pre .line-number {
  /* Ukuran line-height antara teks di dalam tag <code> dan <span class="line-number"> harus sama! */
  font:normal normal 12px/14px "Courier New",Courier,Monospace;
  color:black;
  display:block;
}

pre .line-number {
  float:left;
  margin:0 1em 0 -1em;
  border-right:1px solid;
  text-align:right;
}

pre .line-number span {
  display:block;
  padding:0 .5em 0 1em;
}

pre .cl {
  display:block;
  clear:both;
}
	</style>


<div class="row">
	<!-- panels -->
	<div class="col-xs-12 col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">LESSONS</div>
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
									<a href="index.php?page=index&lesson=<?= $key_sub?>" class="list-group-item sub-chapter-link"><?= $value_sub->lesson_sub_description;?>
										<input type="hidden" value="<?= $value_sub->lesson_sub_id;?>">

									</a>
									<?php $filename = "http://".$_SERVER['SERVER_NAME']."/cai_project/uploads/docs/".$value_sub->video_url; ?>

									<a href="<?= $filename; ?>" style="width: 100%"class="btn btn-danger btn-sm" download>Download</a>



									<?php endif;?>
								<?php endforeach; ?>
							</div>
					  	</div>
					</div>
				  </div>
				<?php endforeach;?>
				</div>
			</div>
		</div>
	
	</div>
	<!-- end of panels -->
	
	<!-- content -->
	<div class="col-xs-12 col-md-8">

			<div class="panel panel-default" id="lesson">
				

				<?php 
				if(isset($_GET['lesson'])){
					if(isset($_GET['lesson']) != "")
					{	
						if(isset($sub_lessons[$_GET['lesson']]->content))
						echo '<div class="panel-heading lesson-title">'. $sub_lessons[$_GET['lesson']]->lesson_sub_description.'</div>';
				
					}
					else
					{
						echo '<div class="panel-heading lesson-title">'. $sub_lessons[16]->lesson_sub_description.'</div>';
					
					}
				}
				else {
					echo '<div class="panel-heading lesson-title">'. $sub_lessons[16]->lesson_sub_description.'</div>';
				}
				?>
				<div class="panel">
					<div class="panel-body">
						<div class="content-chapter">
							<?php 
							if(isset($_GET['lesson'])){
								if($_GET['lesson'] != "")
								{	
									if(isset($sub_lessons[$_GET['lesson']]->content) && $sub_lessons[$_GET['lesson']]->content != "" )
									{
										include('../lesson-content/'.$sub_lessons[$_GET['lesson']]->content);
									}
									else
									{
										echo "No Content!";
									}
								}
								else
								{
									echo "No Content!";
								}
							}
							else {
								require_once '../lesson-content/'.$sub_lessons[16]->content;
							}
							?>
						</div>
					</div>
				</div>
			</div>
	</div>
	<!-- end of content -->
</div>

<a href="#" class="go-top">Go Top</a>

