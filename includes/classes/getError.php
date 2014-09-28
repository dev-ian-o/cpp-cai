<?php  ?>
<?php


function getError($file){
	$folder = "c:" ."\\". "xampp\htdocs\cai_project"."\\"."compiled-cpp"."\\";

	$run_exec = "cd c:\cygnus\cygwin-b20\H-i586-cygwin32\bin ";
	$replace = "c:\\\\xampp\\\\htdocs\\\\cai_project\\\\compiled-cpp\\\\".$file; 
	$cpp = $folder.$file;

	$run_exec .= "& c++ ". $cpp . " 2>&1";


	$error = str_replace($replace, "", shell_exec($run_exec));
	$error = str_replace($cpp.":", "", $error);
	if($error == null){
		$error = "Compilation complete";
	}
	
	return $error;
}


function compileCPP($file){
	$folder = "c:" ."\\". "xampp\htdocs\cai_project"."\\"."compiled-cpp"."\\";
	$run_exec = "cd c:\cygnus\cygwin-b20\H-i586-cygwin32\bin ";
	
	$path = $folder.$file;
	$cpp = $folder.$file.".cpp";

	$run_exec .= "& c++ -o ". $path . " " . $cpp;
	return shell_exec($run_exec);
}


function outputCPP($file){
	$folder = "c:" ."\\". "xampp\htdocs\cai_project"."\\"."compiled-cpp"."\\";

	$run_exec = $folder.$file;
	return shell_exec($run_exec);
}


function random() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); 
    $length = 5;
    $alphaLength = strlen($alphabet) - 1; 
    for ($i = 0; $i < $length; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}


function writeCPP($code){
	$dir = $_SERVER['DOCUMENT_ROOT'] .'cai_project';
	session_start();
	if(!isset($_SESSION['file_name'])) { $file_name = random() . ".cpp"; }
	else { $file_name = $_SESSION['file_name']; }
	
	// $file = fopen("..\..\compiled-cpp\\".$file_name,"w");
	$file = fopen($dir."\compiled-cpp\\".$file_name,"w");

	$text = $code;
	$_SESSION['file_name'] = $file_name;
	
	fwrite($file,$text);
	fclose($file);

}

// writeCPP("asdasdasdasdasdasdas");
// session_start();
// echo $_SESSION['file_name'];

// echo getError($_SESSION['file_name']);

?>