
<?php 
if(isset($_SESSION['user_id'])){ 
	$user = array();
	$user['user_id'] = $_SESSION['user_id'];
	$key = check_hash_user($user,$conn);
	$key = $key[0];
	$key = $key['hash_key'];
	if(!isset($_SESSION[$key])){  echo "<script>window.location = 'login.php';</script>"; }
}

?>