<?php
	include_once('helper.php');

	session_start();
	unset($_SESSION['id']);
	unset($_SESSION['username']);
	header("location: ".BASE_PATH. "index.php?page=form_login");
?>
