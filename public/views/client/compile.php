<?php require_once 'header-footer/header.php';?>
<?php require_once 'header-footer/nav.php';?>
<style>
	.button-compile{
		margin-top: -552px;
		position: absolute;		
	}
	.mLn200{
		margin-left: -200px;
	}
	.mLn116{
		margin-left: -116px;
	}

</style>


<div class="container">
	<?php require_once 'contents/compile.php';?>
 
</div> <!-- end-container -->

	
    <script src="../../../lib/jquery/jquery-1.8.3.min.js"></script>
	<script src="../../../lib/ace/ace.js"></script>
	<script src="../../../lib/ace/theme-twilight.js"></script>
	<script src="../../../lib/ace/mode-c_cpp.js"></script>
	<script src="../../../lib/jquery-ace.min.js"></script>
	<script src="../../../includes/scripts-ajax/script-compile.js"></script>   	
	<script>
		  $('.my-code-area').ace({ theme: 'twilight', lang: 'c_cpp',height:"500px",width:"auto"})
	</script>

<?php require_once 'header-footer/footer.php';?>