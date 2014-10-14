<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php require_once '../includes/database/database.php';?>
<?php require_once '../includes/classes/exam-functions.php';?>
<?php $users = json_decode(fetch_users($conn,false)); ?>
<title>Admin User</title>
<?php require_once 'header-footer/header.php';?>
<?php require_once 'header-footer/nav.php';?>



<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div class="pull-left">Users </div>
                    <div class="pull-right">
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#add-row"><i class="fa fa-plus"></i> ADD</button>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="datatable-user">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $a = 1;?>                            
                            <?php foreach ($users as $key => $value): ?>
                                    <tr>
                                            <td><?= $a++; ?></td>
                                            <td class="username"><?= htmlspecialchars($value->username);?></td>
                                            <td class="lesson_chapter">xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</td>
                                            <td>
                                                <input type="hidden" name="user_id" value="<?= $value->user_id;?>">
                                                <input type="hidden" name="username" value="<?= htmlspecialchars($value->username);?>">
                                                <button class="btn btn-info btn-sm edit-btn-name" data-toggle="modal" data-target="#edit-row-name"><i class="fa fa-pencil"></i> Edit Username</button>
                                                <button class="btn btn-info btn-sm edit-btn-password" data-toggle="modal" data-target="#edit-row-password"><i class="fa fa-pencil"></i> New Password</button>
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


<!-- add-row-user -->
<div class="modal fade" id="add-row" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-add-row-user" method="post">
        <input type="hidden" name="add-row-user-page" value="lesson">
        <input type="hidden" name="form" value="add-row-user-page">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add User</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label>Re-type Password:</label>
                    <input type="password" name="retypepassword" class="form-control" placeholder="Password" required>
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
<!-- edit-row-user -->
<div class="modal fade" id="edit-row-name" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-edit-row-user-name" method="post">
        <input type="hidden" name="edit-row-user-page" value="lesson">
        <input type="hidden" name="user_id" value="">
        <input type="hidden" name="form" value="edit-row-user-page-name">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit User</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
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


<div class="modal fade" id="edit-row-password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-edit-row-user-password" method="post">
        <input type="hidden" name="edit-row-user-page" value="lesson">
        <input type="hidden" name="user_id" value="">
        <input type="hidden" name="form" value="edit-row-user-page-password">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit User</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label>Re-type Password:</label>
                    <input type="password" name="retypepassword" class="form-control" placeholder="Password" required>
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
<!-- remove-row-user -->
<div class="modal fade" id="remove-row" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-remove-row-user" method="post">
        <input type="hidden" name="remove-row-user-page" value="lesson">
        <input type="hidden" name="lesson_id" value="">
        <input type="hidden" name="form" value="remove-row-user-page">
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
<script src="../includes/scripts-ajax/script-row-add-user.js"></script>    
<script src="../includes/scripts-ajax/script-row-edit-user.js"></script>    

<script type="text/javascript">
    
$(document).on('ready change input click',function() {
    $("#datatable-user").dataTable(); 
    $(".edit-btn-name").click(function(){
        user_id = $(this.parentElement).find('input[name=user_id]').val();
        username = $(this.parentElement).find('input[name=username]').val();
        $form = "#form-edit-row-user-name";
        $($form).find('input[name=user_id]').val(user_id);
        $($form).find('input[name=username]').val(username);
    });
    $(".edit-btn-password").click(function(){
        user_id = $(this.parentElement).find('input[name=user_id]').val();
        username = $(this.parentElement).find('input[name=username]').val();
        $form = "#form-edit-row-user-password";
        $($form).find('input[name=user_id]').val(user_id);
        // debugger;
    });
});
</script>

<script type="text/javascript">
    $('document').ready(function(){
        $('#form-edit-row-user-name').bootstrapValidator({
            // container: 'tooltip',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                username: {
                    validators: {
                        notEmpty: {
                            message: 'The username is required'
                        },
                        stringLength: {
                            min: 8,
                            message: 'The username must be 8 or above characters'
                        }

                    }
                }
            }
        });

        // form-add-row-user
    $('#form-add-row-user').bootstrapValidator({
        // container: 'tooltip',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'The username is required'
                    },
                    stringLength: {
                        min: 8,
                        message: 'The username must be 8 or above characters'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    },
                    identical: {
                        field: 'retypepassword',
                        message: 'The password and its confirm are not the same'
                    },
                    stringLength: {
                        min: 8,
                        message: 'The password must be 8 or above characters'
                    }
                }
            },
            retypepassword: {
                validators: {
                    notEmpty: {
                        message: 'The retype password is required'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            }
        }
    });
    $('#form-edit-row-user-password').bootstrapValidator({
        // container: 'tooltip',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    },
                    identical: {
                        field: 'retypepassword',
                        message: 'The password and its confirm are not the same'
                    },
                    stringLength: {
                        min: 8,
                        message: 'The password must be 8 or above characters'
                    }
                }
            },
            retypepassword: {
                validators: {
                    notEmpty: {
                        message: 'The retype password is required'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            }
        }
    });
});
    // form-edit-row-user-password



</script>