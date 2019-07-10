<?php
	session_start();
	ob_start();
	unset($_SESSION["username"]);
	unset($_SESSION["status"]);
	header('Location:index.php');
	session_destroy();
	ob_end_flush();
	exit();

?>