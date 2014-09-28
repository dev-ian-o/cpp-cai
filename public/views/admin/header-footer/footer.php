
	<div class="animated rotateIn infinite loader glyphicon glyphicon-refresh"></div>
   	    <!-- jQuery Version 1.11.0 -->
    <script src="../../../lib/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../../lib/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../../lib/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../../../lib/js/plugins/morris/raphael.min.js"></script>
    <script src="../../../lib/js/plugins/morris/morris.min.js"></script>
    <script src="../../../lib/js/plugins/morris/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../../lib/js/sb-admin-2.js"></script>
    <script src="../../../lib/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="../../../lib/js/plugins/dataTables/dataTables.bootstrap.js"></script>

<script src="../../../lib/js/jquery.gritter/js/jquery.gritter.js"></script>
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

</body>
</html>