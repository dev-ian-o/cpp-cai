<?php require_once 'header-footer/header.php';?>
<?php require_once 'header-footer/nav.php';?>

<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php require_once $dir . '/includes/database/database.php';?>
<?php require_once $dir . '/includes/classes/exam-functions.php';?>
<?php $lessons = json_decode(fetch_lessons($conn,false)); ?>
<?php $sub_lessons = json_decode(fetch_sub_lessons($conn,false)); ?>

	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        CPP Lessons 
                        <div class="pull-right">
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#add-row"><i class="fa fa-plus"></i> ADD</button>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="datatable-lesson">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Lesson</th>
                                        <th>Chapter No.</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $a = 1;?>                            
                                <?php foreach ($lessons as $key => $value): ?>
                                        <tr>
                                                <td><?= $a++; ?></td>
                                                <td class="lesson_description"><?= $value->lesson_description;?></td>
                                                <td class="lesson_chapter"><?= $value->lesson_chapter;?></td>
                                                <td>
                                                    <input type="hidden" name="lesson_id" value="<?= $value->lesson_id;?>">
                                                    <button class="btn btn-info btn-sm edit-btn" data-toggle="modal" data-target="#edit-row"><i class="fa fa-pencil"></i> Edit</button>
                                                    <button class="btn btn-danger btn-sm remove-btn" data-toggle="modal" data-target="#remove-row"><i class="fa fa-remove"></i> Remove</button>
                                                </td>
                                        </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        CPP Sub Lessons 
                        <div class="pull-right">
                            <button class="btn btn-sm btn-success add-btn-sub" data-toggle="modal" data-target="#add-row-sub"><i class="fa fa-plus"></i> ADD</button>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="datatable-sub-lesson">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sub lesson</th>
                                        <th>Chapter No.</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $a = 1;?>                            
                                <?php foreach ($sub_lessons as $key => $value): ?>
                                        <tr>
                                                <td><?= $a++; ?></td>
                                                <td class="lesson_sub_description"><?= $value->lesson_sub_description;?></td>
                                                <td class="lesson_chapter-sub"><?= $value->lesson_chapter;?></td>
                                                <td>
                                                    <input type="hidden" name="lesson_sub_id" value="<?= $value->lesson_sub_id;?>">
                                                    <input type="hidden" name="lesson_id" value="<?= $value->lesson_id;?>">
                                                    <button class="btn btn-info btn-sm edit-btn-sub" data-toggle="modal" data-target="#edit-row-sub"><i class="fa fa-pencil"></i> Edit</button>
                                                    <button class="btn btn-danger btn-sm remove-btn-sub" data-toggle="modal" data-target="#remove-row-sub"><i class="fa fa-remove"></i> Remove</button>
                                                </td>
                                        </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>

	<a href="#" class="go-top">Go Top</a>
<!-- add-row-lesson -->
<div class="modal fade" id="add-row" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-add-row-lesson" method="post">
        <input type="hidden" name="add-row-lesson-page" value="lesson">
        <input type="hidden" name="form" value="add-row-lesson-page">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add CPP Lessons</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Chapter Lesson</label>
                    <input type="text" name="lesson_description" class="form-control" placeholder="Chapter Lesson">
                </div>
                <div class="form-group">
                    <label>Chapter No.</label>
                    <input type="text" name="lesson_chapter" class="form-control" placeholder="Enter text">
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
<div class="modal fade" id="edit-row" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-edit-row-lesson" method="post">
        <input type="hidden" name="edit-row-lesson-page" value="lesson">
        <input type="hidden" name="lesson_id" value="">
        <input type="hidden" name="form" value="edit-row-lesson-page">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit CPP Lessons</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Chapter Lesson</label>
                    <input type="text" name="lesson_description" class="form-control" placeholder="Chapter Lesson">
                </div>
                <div class="form-group">
                    <label>Chapter No.</label>
                    <input type="text" name="lesson_chapter" class="form-control" placeholder="Enter text">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- remove-row-lesson -->
<div class="modal fade" id="remove-row" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-remove-row-lesson" method="post">
        <input type="hidden" name="remove-row-lesson-page" value="lesson">
        <input type="hidden" name="lesson_id" value="">
        <input type="hidden" name="form" value="remove-row-lesson-page">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Are you sure you want to remove?</h4>
            </div>
            <div class="modal-body">
                <p><b class="lesson-chapter"></b>: <b class="lesson-description"></b></p>
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

<!-- add-row-sub-lesson -->
<div class="modal fade" id="add-row-sub" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-add-row-sub-lesson" method="post">
        <input type="hidden" name="add-row--page" value="lesson">
        <input type="hidden" name="form" value="add-row-sub-page">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add CPP Sub Lesson</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Chapter</label>
                    <select class="form-control" name="lesson_description">
                    <?php foreach ($lessons as $key => $value): ?>           
                        <option data-pos="<?= $key;?>" data-val="<?= $value->lesson_chapter;?>"><?= $value->lesson_description;?></option>
                    <?php endforeach;?>
                    </select>
                </div>
                <div class="hide">                    
                    <select class="form-control" name="lesson_chapter">
                    <?php foreach ($lessons as $key => $value): ?>           
                        <option data-pos="<?= $key;?>" data-val="<?= $value->lesson_chapter;?>"><?= $value->lesson_chapter;?></option>
                    <?php endforeach;?>
                    </select>
                </div>
                <div class="hide">                    
                    <select class="form-control" name="lesson_id">
                    <?php foreach ($lessons as $key => $value): ?>           
                        <option data-pos="<?= $key;?>" data-val="<?= $value->lesson_chapter;?>"><?= $value->lesson_id;?></option>
                    <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Sub Lesson Title:</label>
                    <input type="text" name="lesson_sub_description" class="form-control" placeholder="Sub Lesson Title">
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
<!-- edit-row-sub-lesson -->
<div class="modal fade" id="edit-row-sub" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-edit-row-sub-lesson" method="post">
        <input type="hidden" name="edit-row-page" value="lesson">
        <input type="hidden" name="lesson_sub_id" value="">
        <input type="hidden" name="form" value="edit-row-sub-page">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit CPP Sub Lessons</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Chapter</label>
                    <select class="form-control" name="lesson_description">
                    <?php foreach ($lessons as $key => $value): ?>           
                        <option data-pos="<?= $key;?>" data-val="<?= $value->lesson_chapter;?>"><?= $value->lesson_description;?></option>
                    <?php endforeach;?>
                    </select>
                </div>
                <div class="hide">                    
                    <select class="form-control" name="lesson_chapter">
                    <?php foreach ($lessons as $key => $value): ?>           
                        <option data-pos="<?= $key;?>" data-val="<?= $value->lesson_chapter;?>"><?= $value->lesson_chapter;?></option>
                    <?php endforeach;?>
                    </select>
                </div>
                <div class="hide">                    
                    <select class="form-control" name="lesson_id">
                    <?php foreach ($lessons as $key => $value): ?>           
                        <option data-pos="<?= $key;?>" data-val="<?= $value->lesson_chapter;?>"><?= $value->lesson_id;?></option>
                    <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Sub Lesson Title:</label>
                    <input type="text" name="lesson_sub_description" class="form-control" placeholder="Sub Lesson Title">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- remove-row-sub-lesson -->
<div class="modal fade" id="remove-row-sub" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-remove-row" method="post">
        <input type="hidden" name="remove-row-page" value="lesson">
        <input type="hidden" name="lesson_id" value="">
        <input type="hidden" name="form" value="remove-row-page">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Are you sure you want to remove?</h4>
            </div>
            <div class="modal-body">
                <p><b class="lesson-chapter"></b>: <b class="lesson-description"></b></p>
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







<?php require_once 'header-footer/footer.php';?>
<script src="../../../includes/scripts-ajax/script-row-add-lesson.js"></script>    
<script src="../../../includes/scripts-ajax/script-row-edit-lesson.js"></script>   
<script src="../../../includes/scripts-ajax/script-row-add-sub-lesson.js"></script>    
<script src="../../../includes/scripts-ajax/script-row-edit-sub-lesson.js"></script>    
<script>
    $(document).ready(function() {
        $('#datatable-lesson').dataTable();
        $('#datatable-sub-lesson').dataTable();
        $('.edit-btn').on('click', function(){
            
            lesson_id = $(this.parentElement).find('input').val();
            lesson_description = $(this.parentElement.parentElement).find('td.lesson_description').html();
            lesson_chapter = $(this.parentElement.parentElement).find('td.lesson_chapter').html();
            

            $('#form-edit-row-lesson').find('[name="lesson_description"]').val(lesson_description);
            $('#form-edit-row-lesson').find('[name="lesson_chapter"]').val(lesson_chapter);
            $('#form-edit-row-lesson').find('[name="lesson_id"]').val(lesson_id);
        });
        $('.remove-btn').on('click', function(){

            lesson_id = $(this.parentElement).find('input').val();
            lesson_description = $(this.parentElement.parentElement).find('td.lesson_description').html();
            lesson_chapter = $(this.parentElement.parentElement).find('td.lesson_chapter').html();
            
            $('#form-remove-row-lesson').find('b.lesson-description').html(lesson_description);
            $('#form-remove-row-lesson').find('b.lesson-chapter').html("Chapter "+lesson_chapter);
            $('#form-remove-row-lesson').find('[name="lesson_id"]').val(lesson_id);
            // debugger;

        });
        lesson_sub_id = "";
        lesson_sub_description = "";
        lesson_chapter_sub = "";
        lesson_content = "";
        $('.edit-btn-sub').on('click', function(){
            lesson_sub_id = $(this.parentElement).find('input[name=lesson_sub_id]').val();
            lesson_id = $(this.parentElement).find('input[name=lesson_id]').val();
            console.log(lesson_sub_id);
            lesson_sub_description = $(this.parentElement.parentElement).find('td.lesson_sub_description').html();
            lesson_chapter_sub = $(this.parentElement.parentElement).find('td.lesson_chapter-sub').html();
            lesson_content = $(this.parentElement.parentElement).find('td.content').html();
            // debugger;
            $('#form-edit-row-sub-lesson').find('[name=lesson_chapter]').find('[data-val='+lesson_chapter_sub+']').attr('selected','selected');
            $('#form-edit-row-sub-lesson').find('[name=lesson_id]').find('[data-val='+lesson_chapter_sub+']').attr('selected','selected');
            $('#form-edit-row-sub-lesson').find('[name="lesson_sub_description"]').val(lesson_sub_description);
            $('#form-edit-row-sub-lesson').find('[name="lesson_description"]').val(lesson_chapter_sub);
            $('#form-edit-row-sub-lesson').find('[name="lesson_description"]').find('[data-val='+lesson_chapter_sub+']').attr('selected','selected');
            // debugger;
            $('#form-edit-row-sub-lesson').find('[name="lesson_sub_id"]').val(lesson_sub_id);
            $('#form-edit-row-sub-lesson').find('[name=lesson_sub_id]').val(lesson_sub_id);
            // debugger;
        });

        $('#form-edit-row-sub-lesson').find('[name=lesson_description]').on('input',function(e){
            length = this.childElementCount;
            selected = this.selectedOptions;
            position = $(this.selectedOptions).data('pos');
            $('#form-edit-row-sub-lesson').find('[name=lesson_chapter]').find('[data-pos]').removeAttr('selected');
            $('#form-edit-row-sub-lesson').find('[name=lesson_chapter]').find('[data-pos='+position+']').attr('selected','selected');
            // console.log('her');

            $('#form-edit-row-sub-lesson').find('[name=lesson_id]').find('[data-pos]').removeAttr('selected');
            $('#form-edit-row-sub-lesson').find('[name=lesson_id]').find('[data-pos='+position+']').attr('selected','selected');

            // debugger;

            console.log(this);
        });


        $('.add-btn-sub').on('click', function(){
            lesson_sub_id = $(this.parentElement).find('input').val();
            lesson_sub_description = $(this.parentElement.parentElement).find('td.lesson_sub_description').html();
            lesson_chapter_sub = $(this.parentElement.parentElement).find('td.lesson_chapter-sub').html();
            lesson_content = $(this.parentElement.parentElement).find('td.content').html();
            

            $('#form-add-row-sub-lesson').find('[name="lesson_sub_description"]').val(lesson_sub_description);
            $('#form-add-row-sub-lesson').find('[name="lesson_description"]').val(lesson_chapter_sub);
            $('#form-add-row-sub-lesson').find('[name="lesson_description"]').find('[data-val='+lesson_chapter_sub+']').attr('selected','selected');
            // debugger;
            $('#form-add-row-sub-lesson').find('[name="lesson_sub_id"]').val(lesson_sub_id);
        });

        $('#form-add-row-sub-lesson').find('[name=lesson_description]').on('input',function(e){
            length = this.childElementCount;
            selected = this.selectedOptions;
            position = $(this.selectedOptions).data('pos');
            $('#form-add-row-sub-lesson').find('[name=lesson_chapter]').find('[data-pos]').removeAttr('selected');
            $('#form-add-row-sub-lesson').find('[name=lesson_chapter]').find('[data-pos='+position+']').attr('selected','selected');


            $('#form-add-row-sub-lesson').find('[name=lesson_id]').find('[data-pos]').removeAttr('selected');
            $('#form-add-row-sub-lesson').find('[name=lesson_id]').find('[data-pos='+position+']').attr('selected','selected');

            // debugger;

            console.log(this);
        });

        $('#form-edit-row-sub-lesson').on('submit',function(e){
            e.preventDefault();
            // console.log($(this).serializeArray());
        });


    });
</script>