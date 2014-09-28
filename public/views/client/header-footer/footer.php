
	<div class="animated rotateIn infinite loader glyphicon glyphicon-refresh"></div>
   	<script src="../../../lib/js/jquery.min.js"></script>
	<script>
        
	    $(window).load(function() {
	        $(".loader").fadeOut("slow");
	    });

	</script>   	
    <script>
		$(document).ready(function() {
			// Show or hide the sticky footer button
			$(window).scroll(function() {
				if ($(this).scrollTop() > 200) {
					$('.go-top').fadeIn(200);
				} else {
					$('.go-top').fadeOut(200);
				}
			});
			
			// Animate the scroll to top
			$('.go-top').click(function(event) {
				event.preventDefault();
				
				$('html, body').animate({scrollTop: 0}, 300);
			})
		});
	</script>
    <script src="../../../lib/js/bootstrap.min.js"></script>

</body>
</html>