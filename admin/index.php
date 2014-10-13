<?php require_once 'header-footer/header.php';?>
<?php require_once 'header-footer/nav.php';?>
<?php $lessons = json_decode(fetch_lessons($conn,false)); ?>
<?php $sub_lessons = json_decode(fetch_sub_lessons($conn,false)); ?>
<?php

$sortedBy = "y";
$sortBy = array('all','y','my','mdy');
if(isset($_GET['sortby'])){
    $indicatorSortBy = $_GET['sortby'];
    if(in_array($indicatorSortBy, $sortBy)){
        
        $sortedBy = $indicatorSortBy;

    }else{
        $sortedBy = "all";
    }
}else{
    $sortedBy = "all";
}
if(isset($_GET['year'])){ $year = $_GET['year']; } else{ $year = "2014";}
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
                            <option value="all" <?php if($sortedBy == "all"){echo "selected";}?>>All</option>
                            <option value="y" <?php if($sortedBy == "y"){echo "selected";}?>>YEAR</option>
                            <option value="my" <?php if($sortedBy == "my"){echo "selected";}?>>MONTH AND YEAR</option>
                            <option value="mdy" <?php if($sortedBy == "mdy"){echo "selected";}?>>MONTH, DAY AND YEAR</option>
                        </select><br>
                        <div class="render-sort">
                        <?php if($sortedBy === "y" || $sortedBy === "my" || $sortedBy === "mdy"):?>
                            <select class="form-control sort-year" name="year">
                                <?php for($a = date("Y"); $a >= 2013; $a--):?>
                                    <option value="<?= $a;?>" <?php if($year == $a){echo "selected";}?>><?= $a; ?></option>
                                <?php endfor;?>
                            </select>
                        <?php endif;?>

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

<?php $exam_items = json_decode(fetch_exam_items_lesson_id($conn,$lesson_id,false));?>
<?php $sub_lessons_per_id = json_decode(fetch_sub_lesson_id($conn,$lesson_id,false));?>
    <div class="row">
        <div class="col-md-12">
             <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <b>*LEGEND </b>
                </div>
                <div class="panel-body">

                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <td>Label</td>
                                <td>Question</td>
                                <td>Lesson</td>
                                <td>Correct</td>
                                <td>Incorrect</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($sub_lessons_per_id as $key => $valueSub): ?>
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
                            <tr>
                                <td><?= "Q:".++$key; ?></td>    
                                <td><a href="#" class="tooltip-texts" data-toggle="tooltip" data-placement="top" title="<?= $value->lesson_question;?>"><?= show_limit($value->lesson_question, 20);?></a></td>
                                <td><?= $valueSub->lesson_sub_description;?></td>
                                <td><?= $correct[0]->total;?></td>
                                <td> <?= $wrong[0]->total;?></td>
                            </tr> 
                            <?php endif; ?>
                            <?php endforeach;?>
                        <?php endforeach;?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="#" class="go-top">Go Top</a>





<?php require_once 'header-footer/footer.php';?>



<?php $count = array(); ?>
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
        $('.tooltip-texts').tooltip();
        date = new Date();
        year = date.getFullYear();        
        months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        
        $elYear = "<select class='form-control sort-month' name='year'>";
        for(a = year; a >= 2013; a--){
            $elYear += "<option value="+a+">"+a+"</option>";
        }
        $elYear += "</select>";

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
            if(sortby === 'all'){
                console.log('all');
                $('.render-sort').html("");

            }else if(sortby === 'y'){
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