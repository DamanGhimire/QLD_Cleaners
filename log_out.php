<?php
	session_start();
	unset($_SESSION['user']);
	session_destroy('user');
	header("location: index.php");
	exit();
?>