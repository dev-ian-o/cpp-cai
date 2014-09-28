<?php
session_start();
unset($_SESSION[$_SESSION['hash']]);
unset($_SESSION['hash']);
echo "<script>window.location = 'login.php';</script>";

?>