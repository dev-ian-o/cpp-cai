<script src="jquery/jquery-1.8.3.min.js"></script>
<script src="ace/ace.js"></script>
<script src="ace/theme-twilight.js"></script>
<script src="ace/mode-c_cpp.js"></script>
<script src="jquery-ace.min.js"></script>
<form method="post">

	<textarea class="my-code-area" rows="100" style="width: 100%" name="code">
		<?php echo '

	#include <iostream>
	using namespace std;

	int main ()
	{
	  int i;
	  cout << "Please enter an integer values: ";
	  cin >> i;
	  // cout << "The value you entered is " << i;
	  // cout << " and its double is " << i*2 << ".\n";


	  // cout << "Please enter an integer values: ";
	  // cin >> i;
	  // cout << "The value you entered is " << i;
	  // cout << " and its double is " << i*2 << ".\n";

	  return 0;
	}


		'; ?>
	</textarea>
	<input type="submit" name="submit">
</form>
<script>
  $('.my-code-area').ace({ theme: 'twilight', lang: 'c_cpp',height:"300px"})
</script>

<script type="text/javascript" src="js/jquery.min.js"></script>



<?php 

	if(isset($_POST['code'])) { echo  json_encode($_POST['code']); }
	// echo "asdas";
?>

<?php
$file = fopen("test.cpp","w");


$text = $_POST['code'];

fwrite($file,$text);
fclose($file);
?>

<pre>
	

</code>

<!-- <iframe src="test.cpp" width="600px" height="500"></iframe> -->
48.31
45.37
<?php
$path = "c:" ."\\". "xampp\htdocs\cai_project\ooo.js ";
$cpp = "c:" ."\\". "xampp\htdocs\cai_project"."\\"."test.cpp ";
// echo $path;

// $cmd = "cd ". 'c:\Program Files\Emscripten\emscripten'."\\"."1.12.0\  ";
$cmd = "emsdk activate";
$cmd .= "& emcc  -O2".$cpp." -o " . $path;
// $cmd .= "& emcc ".$cpp;

// echo $cmd;


// $shell =  shell_exec($cmd);
// if( ($fp = popen($cmd, "r")) ) {
//     while( !feof($fp) ){
//         echo fread($fp, 1024);
//         flush(); // you have to flush buffer
//     }
//     fclose($fp);
// }

// $shell .=  shell_exec("emsdk activate");
// $shell .=  shell_exec("cd 'c:\Program Files\Emscripten\emscripten\1.12.0 \ ");
// $shell .=  shell_exec("emcc tests/hello_world.cpp -o  c:\xammp\htdocs\cai_project\o.html ");

// echo "<pre>";
// echo $shell;



?>

<!-- <iframe src="samp.html" width="600px" height="500"></iframe> -->