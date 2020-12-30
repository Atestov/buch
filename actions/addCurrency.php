<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . "/buch/include/functions.php";

	$name = mysqli_real_escape_string(connect(), $_REQUEST['name']);
	$cur_code = mysqli_real_escape_string(connect(), $_REQUEST['cur_code']);
	

	sql("INSERT INTO currency (name,cur_code) VALUES ('$name','$cur_code')");

	header('Location: /buch/');
