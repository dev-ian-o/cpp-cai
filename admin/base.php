<?php require_once 'header-footer/header.php';?>
<?php require_once 'header-footer/nav.php';?>

<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php require_once '../includes/database/database.php';?>
<?php require_once '../includes/classes/exam-functions.php';?>
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
</div>


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

	<a href="#" class="go-top">Go Top</a>
<?php require_once 'header-footer/footer.php';?>
