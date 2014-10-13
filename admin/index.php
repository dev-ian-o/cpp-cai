<?php require_once 'header-footer/header.php';?>
<?php require_once 'header-footer/nav.php';?>
<?php $lessons = json_decode(fetch_lessons($conn,false)); ?>
<?php $sub_lessons = json_decode(fetch_sub_lessons($conn,false)); ?>
<?php

// check lesson id
// query check date
//
$sortedBy = "y";
$sortBy = array('y','my','mdy');
if(isset($_GET['sortby'])){
    $indicatorSortBy = $_GET['sortby'];
    if(in_array($indicatorSortBy, $sortBy)){
        
        $sortedBy = $indicatorSortBy;

    }else{
        $sortedBy = "y";
    }
}else{
    $sortedBy = "y";
}
if(isset($_GET['year'])){ $year = $_GET['year']; } else{ $year = "2004";}
if(isset($_GET['month'])){ $month = $_GET['month']; } else { $month = "1"; }
if(isset($_GET['day'])){ $day = $_GET['day']; } else { $day = "1"; }
$lesson_id = $lessons[4]->lesson_id;
if(isset($_GET['lesson'])){ $lesson_id = $_GET['lesson']; }

$row['lesson_id'] = '5';
$tally = fetch_tally($row,$conn);
?>
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <?php foreach ($lessons as $key => $value): ?>
                <a href="<?= 'index.php?lesson='.$value->lesson_id;?>" class="btn btn-primary btn-sm">
                    <?= $value->lesson_chapter;?>: <?= $value->lesson_description;?>
                </a>
            <?php endforeach;?>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chapter Test Results Analytics</h1>
        </div>
        <div class="col-lg-12 clearfix">
            <?php foreach($lessons as $key => $value):?>
                <?php 
                    if($value->lesson_id == $lesson_id){
                        echo "<h3> Chapter ". $value->lesson_chapter. ": ".  $value->lesson_description . "</h3>";
                        $catch_chapter = false;

                        break;
                    }
                    else{
                        $catch_chapter = true;
                    }
                ?>
            <?php endforeach;?>
            <?php if($catch_chapter){  $lesson_id = $lessons[4]->lesson_id;  echo "<h3> Chapter ". $lessons[4]->lesson_chapter. ": ".  $lessons[4]->lesson_description . "</h3>"; } ?>
                <div> 
                    <h3>SORT BY: </h3>
                    <form method="get">
                        <input type="hidden" name="lesson" value="<?=  $lesson_id;?>">
                        <select class="form-control sort-date" name="sortby">
                            <option value="y" <?php if($sortedBy == "y"){echo "selected";}?>>YEAR</option>
                            <option value="my" <?php if($sortedBy == "my"){echo "selected";}?>>MONTH AND YEAR</option>
                            <option value="mdy" <?php if($sortedBy == "mdy"){echo "selected";}?>>MONTH, DAY AND YEAR</option>
                        </select><br>
                        <div class="render-sort">
                            <select class="form-control sort-year" name="year">
                                <?php for($a = date("Y"); $a >= 2013; $a--):?>
                                    <option value="<?= $a;?>" <?php if($year == $a){echo "selected";}?>><?= $a; ?></option>
                                <?php endfor;?>
                            </select>
                        <?php if($sortedBy === "my" || $sortedBy === "mdy"):?>
                            <br><select class="form-control sort-month" name="month">
                                <?php $monthsArr = array('January','February','March','April','May','June','July','August','September','October','November','December');?>
                                <?php for($a = 0; $a < sizeof($monthsArr); $a++):?>
                                    <option value="<?= $a+1;?>" <?php if($month == $a+1){echo "selected";}?> ><?= $monthsArr[$a]; ?></option>
                                <?php endfor;?>
                            </select>
                        <?php endif;?>

                        <?php if($sortedBy === "mdy"):?>
                            <br><select class="form-control sort-day" name="day">
                                <?php for($a = 1; $a < 32; $a++):?>
                                    <option value="<?= $a;?>" <?php if($day == $a){echo "selected";}?>><?= $a; ?></option>
                                <?php endfor;?>
                            </select>
                        <?php endif;?>

                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary">Sort</button>
                        </div>
                    </form>
                </div>
            <br>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <?php foreach ($sub_lessons as $key => $value): ?>
        <?php if($value->lesson_id == $lesson_id):?>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <?= $value->lesson_sub_description ?>

                </div>
                <div class="panel-body">
                    <div id="morris-bar<?= $value->lesson_sub_id; ?>"></div>
                </div>
            </div>
        </div>
        <?php endif;?>
        <?php endforeach;?>
    </div>
</div>

<a href="#" class="go-top">Go Top</a>





<?php require_once 'header-footer/footer.php';?>

<?php $exam_items = json_decode(fetch_exam_items_lesson_id($conn,$lesson_id,false));?>
<?php $sub_lessons_per_id = json_decode(fetch_sub_lesson_id($conn,$lesson_id,false));?>

<?php //print_r($exam_items); ?>
<?php //print_r($sub_lessons_per_id); ?>
<?php 
    $count = array();
    foreach($sub_lessons_per_id as $key => $valueSub){

        foreach($exam_items as $key => $value){
            if($value->lesson_sub_id === $valueSub->lesson_sub_id){
                $count['exam_item_id'] = $value->exam_item_id;
                $count['sort_by'] = $sortedBy;
                $count['year'] = $year;
                $count['month'] = $month;
                $count['day'] = $day;
                $wrong = json_decode(count_wrong($count,$conn));
                // print_r(json_decode(count_correct($count,$conn)));
                // echo "<br>_____________________<br>";
            }
        }
    }
?>
<?php $count = array(); ?>
<?php //$no = 1 ?>
<?php foreach($sub_lessons_per_id as $key => $valueSub): ?>
<script type="text/javascript">
	Morris.Bar({
        element: 'morris-bar<?= $valueSub->lesson_sub_id; ?>',
        data: [
        <?php foreach($exam_items as $key => $value):?>
        <?php if($value->lesson_sub_id === $valueSub->lesson_sub_id):?>
        <?php 
            $count['exam_item_id'] = $value->exam_item_id;
            $count['sort_by'] = $sortedBy;
            $count['year'] = $year;
            $count['month'] = $month;
            $count['day'] = $day;
        ?>
        <?php $wrong = json_decode(count_wrong($count,$conn));?>
        <?php $correct = json_decode(count_correct($count,$conn));?>
        {
            exam_item_id : '<?= "Q:".++$key; ?>',
            correct: <?= $correct[0]->total;?>,
            incorrect: <?= $wrong[0]->total;?>
        },
        <?php endif; ?>
        <?php endforeach;?>
        ],
        xkey: 'exam_item_id',
        ykeys: ['correct', 'incorrect'],
        labels: ['Correct', 'Incorrect'],
        hideHover: 'auto',
        resize: true
    });
</script>
<?php endforeach;?>



<script type="text/javascript">
    $('document').ready(function(){
        console.log('ready');
        date = new Date();
        year = date.getFullYear();        
        months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        $elYear = $('.sort-year');
        $elMonth = "<br><select class='form-control sort-month' name='month'>";
        for(a = 0; a < months.length; a++){
            $elMonth += "<option value="+(a+1)+">"+months[a]+"</option>";
        }
        $elMonth += "</select>";

        $elDay = "<br><select class='form-control sort-day' name='day'>";
        for(a = 1; a < 32; a++){
            $elDay += "<option value="+a+">"+a+"</option>";
        }
        $elDay += "</select>";
        $('.sort-date').on('input', function(e){
            sortby = $('.sort-date').val();
            if(sortby === 'y'){
                console.log('year');
                $('.render-sort').html($elYear);

            }else if(sortby === 'my'){
                console.log('month and year');                
                $('.render-sort').html($elYear).append($elMonth);            

            }else if(sortby === 'mdy'){
                console.log('month, day and year');

                $('.render-sort').html($elYear).append($elMonth).append($elDay);            

            }
        });
    });
</script>