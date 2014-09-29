<?php require_once 'header-footer/header.php';?>

<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php require_once $dir . '/includes/database/database.php';?>
<?php require_once $dir . '/includes/classes/exam-functions.php';?>
<?php session_start();?>
<?php if( (isset($_SESSION['hash'])) && (isset($_SESSION[$_SESSION['hash']]))  ) { echo "<script>window.location = 'index.php';</script>"; } ?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">CPP CAI Admin Login</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    if(isset($_POST['submit'])){
        $vars = $_POST;
        $vars['password'] = sha1(md5($vars['password']));
        $row = validates_user($vars,$conn);
        if(validates_user($vars,$conn) === "[]")
        {
            echo "<script>alert('invalid username or password');</script>";
        }
        else
        {
            $row = json_decode($row);
            echo "<script>alert('successfully logged in');</script>";
            $hash = sha1(md5($row[0]->user_id));
            $_SESSION[$hash] = sha1(md5($row[0]->user_id));
            $_SESSION['hash'] = $hash; 

            if( (isset($_SESSION['hash'])) && (isset($_SESSION[$_SESSION['hash']]))  ) { echo "<script>window.location = 'index.php';</script>"; }
            echo "<script>window.location = 'index.php';</script>";
        }

        //session key
        //session value
    }
?>


    <a href="#" class="go-top">Go Top</a>
<?php require_once 'header-footer/footer.php';?>






