<?php require_once 'header-footer/header.php';?>
<?php require_once 'header-footer/nav.php';?>

<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php require_once '../includes/database/database.php';?>
<?php require_once '../includes/classes/exam-functions.php';?>
<?php require_once '../includes/classes/file.php';?>
<?php $sub_lessons = json_decode(fetch_sub_lessons($conn,false)); ?>
<?php 
// defaul if there's no get
  if (isset($_GET['lesson'])) {$lesson = $_GET['lesson'];}
  else { $lesson = $sub_lessons[0]->lesson_sub_id; }
?>


<div id="page-wrapper">
  <div class="row">

      <br>
      <div class="row">
          <div class="col-lg-12">
              <?php foreach ($sub_lessons as $key => $value): ?>
                  <a href="<?= 'lesson-content.php?lesson='.$value->lesson_sub_id;?>" class="btn btn-primary btn-sm">
                      <?= $value->lesson_chapter;?>: <?= $value->lesson_sub_description;?>
                  </a>
              <?php endforeach;?>
          </div>
      </div>
      <br>
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading clearfix">
                  CPP Lessons Content
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
              <form id="form-lesson-content"method="post">
              <?php 
                if(isset($lesson)){ $val = $lesson; }
                else { $val = $sub_lessons[0]->lesson_sub_id; }
              ?>
              <input type="hidden" name="lesson_sub_id" value="<?= $val;?>">
              <?php 
                if(isset($lesson))
                { 
                  foreach ($sub_lessons as $key => $value):
                    if($value->lesson_sub_id === $lesson)
                    {
                        $content = $value->content;

                        if($content !== "") { $codeHere = File::get($dir."/lesson-content/". $content); }
                        else {$codeHere = "";}
                    }

                  endforeach;
                }else { $content = ""; $codeHere = "";}
              ?>
              <textarea class="my-code-area" name="code"><?= $codeHere;?></textarea>
              <div class="form-group clearfix">
                <br>
                  <input type="hidden" name="content" value="<?= $content;?>">

                <button type="submit" name="submit" class="pull-right btn btn-sm btn-success">Save</button>
              </div>
              </form>
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
  </div>
</div>

<?php 
  
    if(isset($_POST['submit']))
    {
      $vars = $_POST;
      // $vars['code'] = $vars['code'] );
      if($vars['content'] === "")
      { 
        $content = File::random().".html";
        File::newFile($dir."/lesson-content/". $content, $vars['code']);
        $vars['content'] = $content;
        update_sub_lesson_content($vars,$conn);
        echo "<script>window.location='lesson-content.php?lesson=".$lesson."';</script>";
      }
      else
      {
        File::put($dir."/lesson-content/".$vars['content'], $vars['code']);
        update_sub_lesson_content($vars,$conn);
        echo "<script>window.location='lesson-content.php?lesson=".$lesson."';</script>";


      }
    }

?>


<a href="#" class="go-top">Go Top</a>
<?php require_once 'header-footer/footer.php';?>
  <script src="../lib/ace/ace.js"></script>
  <script src="../lib/ace/theme-twilight.js"></script>
  <script src="../lib/ace/mode-html.js"></script>
  <script src="../lib/jquery-ace.min.js"></script>
  <script>
      $('.my-code-area').ace({ theme: 'twilight', lang: 'html',height:"300px",width:"auto"})
  </script>