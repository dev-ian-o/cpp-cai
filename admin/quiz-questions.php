<?php require_once 'header-footer/header.php';?>
<?php require_once 'header-footer/nav.php';?>

<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php require_once '../includes/database/database.php';?>
<?php require_once '../includes/classes/exam-functions.php';?>
<?php $lessons = json_decode(fetch_lessons($conn,false)); ?>
<?php $sub_lessons = json_decode(fetch_sub_lessons($conn,false)); ?>
<div id="page-wrapper">
    <br>
    <div class="row">
        <div class="col-lg-12">
            <?php foreach ($lessons as $key => $value): ?>
                <a href="<?= 'quiz-questions.php?page='.$value->lesson_chapter;?>" class="btn btn-primary btn-sm">
                    <?= $value->lesson_chapter;?>: <?= $value->lesson_description;?>
                </a>
            <?php endforeach;?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    CPP Quiz Items 
                    <b>(<?php 
                        $ok = false;
                        $lesson_id = $lessons[4]->lesson_id;
                        foreach ($lessons as $key => $value):
                            if(isset($_GET['page']) && $_GET['page'] === $value->lesson_chapter)
                            {
                                $ok = true;
                                echo $value->lesson_chapter.": ".$value->lesson_description;
                                $lesson_id = $value->lesson_id;
                            }
                        endforeach;
                        if (!$ok)
                        {
                            echo $lessons[4]->lesson_chapter.":". $lessons[4]->lesson_description;
                        }
                    ?>)</b> 
                </div>
        <?php $exam_items = json_decode(fetch_exam_items_lesson_id($conn,$lesson_id,false));?>
        <?php $sub_lessons_per_id = json_decode(fetch_sub_lesson_id($conn,$lesson_id,false));?>


                <!-- /.panel-heading -->
                <div class="panel-body">
<?php foreach($sub_lessons_per_id as $key => $valueSub): ?>

                    <div class="clearfix">
                        <div class="pull-left">
                            <h4>Lesson: <?= $valueSub->lesson_sub_description?></h4>
                        </div>
                        <div class="pull-right">
                            <input type="hidden" name="lesson_id" value="<?= $valueSub->lesson_id;?>">
                            <input type="hidden" name="lesson_sub_id" value="<?= $valueSub->lesson_sub_id;?>">
                            <button class="btn btn-sm btn-success add-exam-btn" data-toggle="modal" data-target="#add-row-exam"><i class="fa fa-plus"></i> ADD</button>
                        </div>                        
                    </div>
                    <hr class="mTn5">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="<?= 'chapter'.$key;?>">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Question</th>
                                    <th>Choices</th>
                                    <th>Answer</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                <?php $a = 1;?>
        <?php foreach($exam_items as $key => $value):?>
                <?php if($value->lesson_sub_id === $valueSub->lesson_sub_id):?>
                    <tr>
                        <td><?= $a++; ?></td>
                        <td class="lesson_question">
                            <a href="#" class="tooltip-texts" data-toggle="tooltip" data-placement="top" title="<?= htmlspecialchars($value->lesson_question);?>"><?= htmlspecialchars(show_limit($value->lesson_question, 20));?></a>
                        </td>
                        <td class="lesson_choices">
                            <?php $combinedQuestions = $value->lesson_choice1.", ".$value->lesson_choice2.", ".$value->lesson_choice3.", ".$value->lesson_choice4;?>
                            <a href="#" class="tooltip-texts" data-toggle="tooltip" data-placement="top" title="<?= htmlspecialchars($combinedQuestions);?>"><?=  htmlspecialchars(show_limit($combinedQuestions, 20));?></a>
                        </td>
                        <td class="lesson_answer">
                            <a href="#" class="tooltip-texts" data-toggle="tooltip" data-placement="top" title="<?= htmlspecialchars($value->lesson_answer);?>"><?=  htmlspecialchars(show_limit($value->lesson_answer, 20));?></a>
                        </td>
                        <td>
                            <input type="hidden" name="exam_item_id" value="<?= $value->exam_item_id;?>">
                            <input type="hidden" name="lesson_question" value="<?= htmlspecialchars($value->lesson_question);?>">
                            <input type="hidden" name="lesson_id" value="<?= $value->lesson_id;?>">
                            <input type="hidden" name="lesson_sub_id" value="<?= $value->lesson_sub_id;?>">
                            <input type="hidden" name="lesson_answer" value="<?= htmlspecialchars($value->lesson_answer);?>">

                            <input type="hidden" name="lesson_choice1" value="<?= htmlspecialchars($value->lesson_choice1);?>">
                            <input type="hidden" name="lesson_choice2" value="<?= htmlspecialchars($value->lesson_choice2);?>">
                            <input type="hidden" name="lesson_choice3" value="<?= htmlspecialchars($value->lesson_choice3);?>">
                            <input type="hidden" name="lesson_choice4" value="<?= htmlspecialchars($value->lesson_choice4);?>">
                            <button class="btn btn-info btn-sm edit-exam-btn" data-toggle="modal" data-target="#edit-row-exam"><i class="fa fa-pencil"></i> Edit</button>
                            <button class="btn btn-danger btn-sm remove-exam-btn" data-toggle="modal" data-target="#remove-row-exam"><i class="fa fa-remove"></i> Remove</button>
                        </td>
                    </tr>
                <?php endif;?>
        <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
<?php endforeach;?>


                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>


<!-- add-row-lesson -->
<div class="modal fade" id="add-row-exam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-add-row-exam" method="post">
        <input type="hidden" name="add-row-exam-page" value="exam">
        <input type="hidden" name="lesson_id" value="">
        <input type="hidden" name="lesson_sub_id" value="">
        <input type="hidden" name="form" value="add-row-exam-page">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add CPP Lessons</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Question</label>
                    <textarea name="lesson_question" class="form-control" placeholder="Enter text"></textarea required>
                </div>
                <div class="form-group">
                    <label>Choice #1</label>
                    <input type="text" name="lesson_choice1" class="form-control" placeholder="Enter text" required>
                </div>
                <div class="form-group">
                    <label>Choice #2</label>
                    <input type="text" name="lesson_choice2" class="form-control" placeholder="Enter text" required>
                </div>
                <div class="form-group">
                    <label>Choice #3</label>
                    <input type="text" name="lesson_choice3" class="form-control" placeholder="Enter text" required>
                </div>
                <div class="form-group">
                    <label>Choice #4</label>
                    <input type="text" name="lesson_choice4" class="form-control" placeholder="Enter text" required>
                </div>
                <div class="form-group">
                    <label>Answer</label>
                    <input type="text" name="lesson_answer" class="form-control" placeholder="Enter text" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- edit-row-lesson -->
<div class="modal fade" id="edit-row-exam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-edit-row-exam" method="post">
        <input type="hidden" name="edit-row-exam-page" value="exam">
        <input type="hidden" name="lesson_id" value="">
        <input type="hidden" name="lesson_sub_id" value="">
        <input type="hidden" name="exam_item_id" value="">
        <input type="hidden" name="form" value="edit-row-exam-page">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit CPP Lessons</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Question</label>
                    <textarea name="lesson_question" class="form-control" placeholder="Enter text"></textarea required>
                </div>
                <div class="form-group">
                    <label>Choice #1</label>
                    <input type="text" name="lesson_choice1" class="form-control" placeholder="Enter text" required>
                </div>
                <div class="form-group">
                    <label>Choice #2</label>
                    <input type="text" name="lesson_choice2" class="form-control" placeholder="Enter text" required>
                </div>
                <div class="form-group">
                    <label>Choice #3</label>
                    <input type="text" name="lesson_choice3" class="form-control" placeholder="Enter text" required>
                </div>
                <div class="form-group">
                    <label>Choice #4</label>
                    <input type="text" name="lesson_choice4" class="form-control" placeholder="Enter text" required>
                </div>
                <div class="form-group">
                    <label>Answer</label>
                    <input type="text" name="lesson_answer" class="form-control" placeholder="Enter text" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>
        </form>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- remove-row-lesson -->
<div class="modal fade" id="remove-row-exam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-remove-row-exam" method="post">
        <input type="hidden" name="remove-row-exam-page" value="exam">
        <input type="hidden" name="exam_item_id" value="">
        <input type="hidden" name="form" value="remove-row-exam-page">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Are you sure you want to remove?</h4>
            </div>
            <div class="modal-body">
                <p><b class="delete_entity"></b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Remove</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

	<a href="#" class="go-top">Go Top</a>
<?php require_once 'header-footer/footer.php';?>
<script src="../includes/scripts-ajax/script-row-add-quiz-question.js"></script>    
<script src="../includes/scripts-ajax/script-row-edit-quiz-question.js"></script>    
<script src="../includes/scripts-ajax/script-row-remove-quiz-question.js"></script>    

<script>
    $(document).ready(function() { 
    <?php foreach($sub_lessons_per_id as $key => $valueSub): ?>
        $("#<?= 'chapter'.$key;?>").dataTable(); 
    <?php endforeach;?>
    }); 

</script>
<script type="text/javascript">
    $(document).on('ready change input click',function() {
        $('.tooltip-texts').tooltip();
        $(".edit-exam-btn").click(function(){
            $parent = this.parentElement;
            exam_item_id = $($parent).find('[name=exam_item_id]').val();
            lesson_question = $($parent).find('[name=lesson_question]').val();
            lesson_answer = $($parent).find('[name=lesson_answer]').val();
            lesson_choice1 = $($parent).find('[name=lesson_choice1]').val();
            lesson_choice2 = $($parent).find('[name=lesson_choice2]').val();
            lesson_choice3 = $($parent).find('[name=lesson_choice3]').val();
            lesson_choice4 = $($parent).find('[name=lesson_choice4]').val();
            lesson_id = $($parent).find('[name=lesson_id]').val();
            lesson_sub_id = $($parent).find('[name=lesson_sub_id]').val();
            $form = "#form-edit-row-exam";
            $($form).find('[name=exam_item_id]').val(exam_item_id)
            $($form).find('[name=lesson_question]').val(lesson_question);
            $($form).find('[name=lesson_answer]').val(lesson_answer);
            $($form).find('[name=lesson_choice1]').val(lesson_choice1);
            $($form).find('[name=lesson_choice2]').val(lesson_choice2);
            $($form).find('[name=lesson_choice3]').val(lesson_choice3);
            $($form).find('[name=lesson_choice4]').val(lesson_choice4);
            $($form).find('[name=lesson_id]').val(lesson_choice3);
            $($form).find('[name=lesson_sub_id]').val(lesson_choice4);
        });
        $(".add-exam-btn").click(function(){
            $parent = this.parentElement;
            lesson_id = $($parent).find('input[name=lesson_id]').val();
            lesson_sub_id = $($parent).find('input[name=lesson_sub_id]').val();
            $form = "#form-add-row-exam";
            $($form).find('input[name=lesson_id]').val(lesson_id);
            $($form).find('input[name=lesson_sub_id]').val(lesson_sub_id);
        });
        $('.remove-exam-btn').click(function(){
           
            $parent = this.parentElement;
            exam_item_id = $($parent).find('[name=exam_item_id]').val();
            lesson_question = $($parent).find('[name=lesson_question]').val();
            lesson_answer = $($parent).find('[name=lesson_answer]').val();
            lesson_choice1 = $($parent).find('[name=lesson_choice1]').val();
            lesson_choice2 = $($parent).find('[name=lesson_choice2]').val();
            lesson_choice3 = $($parent).find('[name=lesson_choice3]').val();
            lesson_choice4 = $($parent).find('[name=lesson_choice4]').val();
            lesson_id = $($parent).find('[name=lesson_id]').val();
            lesson_sub_id = $($parent).find('[name=lesson_sub_id]').val();
            $form = "#form-remove-row-exam";
            $($form).find('[name=exam_item_id]').val(exam_item_id)
            $($form).find('[name=lesson_question]').val(lesson_question);
            $($form).find('[name=lesson_answer]').val(lesson_answer);
            $($form).find('[name=lesson_choice1]').val(lesson_choice1);
            $($form).find('[name=lesson_choice2]').val(lesson_choice2);
            $($form).find('[name=lesson_choice3]').val(lesson_choice3);
            $($form).find('[name=lesson_choice4]').val(lesson_choice4);
            $($form).find('[name=lesson_id]').val(lesson_choice3);
            $($form).find('[name=lesson_sub_id]').val(lesson_choice4); 
            $($form).find('.delete_entity').html("ID:"+lesson_sub_id+"<br>"+lesson_question); 
        });
    });

</script>

