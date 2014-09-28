<?php

function upload($file){
	if($file == null){ $file = "file";}
	$allowedExts = array("gif", "jpeg", "jpg", "png", "mp4", "avi", "vlc", "mkv", "ogm", "mov");
	$temp = explode(".", $_FILES[$file]["name"]);
	$extension = end($temp);
	$allowed_size = 200000;    	
	$filename = "upload/". random() . $extension;

	if (in_array(strtolower($extension), $allowedExts)) {
		echo "ok";
    	return move_uploaded_file( $_FILES[$file]["tmp_name"], $filename);
	} else {
	  echo "Invalid file";
	}
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
?>
