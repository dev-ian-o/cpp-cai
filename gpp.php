<script src="lib/jquery/jquery-1.8.3.min.js"></script>
<script src="lib/ace/ace.js"></script>
<script src="lib/ace/theme-twilight.js"></script>
<script src="lib/ace/mode-c_cpp.js"></script>
<script src="lib/jquery-ace.min.js"></script>

<?php
if($_POST){
$file = fopen("test.cpp","w");


$text = $_POST['code'];

echo fwrite($file,$text);
fclose($file);
}
?>
<form method="post">

	<textarea class="my-code-area" rows="100" style="width: 100%" name="code">


	<?php 
		if(isset($_POST['code'])){ echo $_POST['code']; unset($_POST);}
	?>

			
	</textarea>
	<input type="submit" name="submit">
</form>
<script>
  $('.my-code-area').ace({ theme: 'twilight', lang: 'c_cpp',height:"300px"})
</script>

<script type="text/javascript" src="lib/js/jquery.min.js"></script>



<?php 
	// if(isset($_POST['code'])) { echo  json_encode($_POST['code']); }
?>




<?php

$run_exec = "cd c:\cygnus\cygwin-b20\H-i586-cygwin32\bin ";
$path = "c:" ."\\". "xampp\htdocs\cai_project\mau";
$cpp = "c:" ."\\". "xampp\htdocs\cai_project"."\\"."test.cpp ";



$run_exec .= "& g++ -o ". $path . " " . $cpp;



if(isset($_POST)){
	echo exec($run_exec);
	// echo "".shell_exec("mau.exe")."";
}
echo "output: <br>";
$output = shell_exec("mau.exe");
echo "<pre>";
echo htmlspecialchars_decode($output);
?>
