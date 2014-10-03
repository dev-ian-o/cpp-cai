<?php require_once 'header-footer/header.php';?>
<?php require_once 'header-footer/nav.php';?>

<div class="container">
 
	<?php require_once 'contents/index.php';?>
	
	<a href="#" class="go-top">Go Top</a>

</div> <!--  end container -->



<?php require_once 'header-footer/footer.php';?>
<!-- <script src="../includes/scripts-ajax/script-index.js"></script>   	 -->

<script type="text/javascript">
	$('document').ready(function(){
		// $('.sub-chapter-link').on('click',function(){
		// 	sub_chapter = $(this).find('input[type="hidden"]').val();
		// 	console.log(sub_chapter);
		// })
	});
</script>
<script type="text/javascript">
$('document').ready(function(){
		(function() {
    var pre = $('pre.code'),
        pl = pre.length;
    for (var i = 0; i < pl; i++) {
        pre[i].innerHTML = '<span class="line-number"></span>' + pre[i].innerHTML + '<span class="cl"></span>';
        var num = pre[i].innerHTML.split(/\n/).length;
        for (var j = 0; j < num; j++) {
            var line_num = pre[i].getElementsByTagName('span')[0];
            line_num.innerHTML += '<span>' + (j + 1) + '</span>';
        }
    }
})();
});

</script>