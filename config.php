<?php

$config = array(
	'host' => 'localhost',
	'dbname' => 'angel',
	'username' => 'root',
	'password' => ''
);


$conn = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'],$config['username'],$config['password']);	






function redirect_to( $location = NULL ) {
	if ($location != NULL) {
		header("Location: {$location}");
		// exit;	
	}
}

function strtohex($x) 
{
    $s='';
    foreach (str_split($x) as $c) $s.=sprintf("%02X",ord($c));
    return($s);
} 

function encrypt_pass($pass){
	return sha1(strtohex($pass));
}

function sign_up($username, $password, $retype, $email , $conn){
	if(($password === $retype)&&(check($email,$conn))){
		$password = encrypt_pass($password);
		$stmt = $conn->prepare("INSERT INTO tbl_user(name,pass,email) values(:username,:password,:email)");
		$stmt->execute(array(
			"username" => $username,
			"password" => $password,
			"email" => $email
		));
		echo "home.php";
	}
	else{
		if($password === $retype){ echo "invalid";}
		if((check($email,$conn))){ echo "invalid";}
	}

}
// sign_up($username, $password, $retype, $email , $conn);
function check($email,$conn){

	$stmt = $conn->prepare("SELECT * FROM tbl_user WHERE email = :email");
	$stmt->execute(array(
		"email" => $email
	));

	$row = $stmt->fetchAll(PDO::FETCH_OBJ);
	if(count($row)>0){
		return false;
	}else{
		return true;
	}
}

// sign_up("asdasd", "ian", "ian", "dasdasdasd", $conn);
function login($email,$password,$conn){
	$password = encrypt_pass($password);
	$stmt = $conn->prepare("SELECT * FROM tbl_user WHERE email = :email AND pass= :password");
	$stmt->execute(array(
		"email" => $email,
		"password" => $password
	));
	$row = $stmt->fetchAll(PDO::FETCH_COLUMN);
	if(count($row)>0){ 
		session_user(strval($row[0]));
		echo "home.php";
	}else{
		echo "not";
	}
}

function search_sn($sn,$conn){
	if($sn == null){ return false; }

	$stmt = $conn->prepare("SELECT * FROM tbl_item WHERE serial_no = :sn ");
	$stmt->execute(array(
		"sn" => $sn
	));
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if(count($row)>0){
		$row = json_encode($row);
		print_r($row);
		// return true;
	}else{
		return false;
	}
}






function add_sn($serials,$item,$dates,$contact,$message,$conn){
	session_start();
	$stmt = $conn->prepare("INSERT INTO tbl_item(id_user,serial_no,item,date_lost,message) values(:id_user,:serials,:item,:dates,:message)");
	$stmt->execute(array(
		"id_user" => $_SESSION['id_user'],
		"serials" => $serials,
		"item" => $item,
		"dates" => $dates,
		"message" => $message	
	));
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

};
function session_user($id_user){

	session_start();
	if($id_user == null){$id_user = 1;}
	$_SESSION['id_user_auth'] = encrypt_pass($id_user);
	$_SESSION['id_user'] = $id_user;
}


function upload($file){
	if($file == null){ $file = "file";}
	$allowedExts = array("gif", "jpeg", "jpg", "png", "mp4", "avi", "vlc", "mkv", "ogm", "mov");
	$temp = explode(".", $_FILES[$file]["name"]);
	$extension = end($temp);
	$allowed_size = 200000;    	
	$filename = "upload/" . random() . date("Ymdhis") . "." . $extension;

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