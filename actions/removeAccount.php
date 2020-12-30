<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . "/buch/include/functions.php";

	$id = mysqli_real_escape_string(connect(), $_REQUEST['id']);	

	sql("DELETE FROM `accounts` WHERE id = '$id'");

	header('Location: /buch/');
