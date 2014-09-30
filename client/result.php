<?php $dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project'; ?>
<?php require_once 'header-footer/header.php';?>
<?php require_once 'header-footer/nav.php';?>

<div class="container">
	<?php require_once 'contents/result.php'; ?>
</div>


<?php require_once 'header-footer/footer.php';?>
	<!-- // <script src="../includes/scripts-ajax/script-exam.js"></script>   	 -->
    <script type="text/javascript">
    $(document).ready(function(){
    	$('.carousel').carousel({
    		wrap : false,
    		pause : true,
    		interval: false
    	});
    	itemsLength = $('.carousel').find('.item').length;
    	times = 1;
    	$('.carousel').on('slide.bs.carousel', function () {
  			if(times++ == itemsLength - 1){
  				console.log('last item');
  				$('.btn-right').hide();
  			}
		})
    });
    </script>
</body>
</html>