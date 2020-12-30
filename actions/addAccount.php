<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . "/buch/include/functions.php";

	$name = mysqli_real_escape_string(connect(), $_REQUEST['name']);
	$type = mysqli_real_escape_string(connect(), $_REQUEST['type']);
	$value = mysqli_real_escape_string(connect(), $_REQUEST['value']) * 100;
	$currency = mysqli_real_escape_string(connect(), $_REQUEST['currency']);

	sql("INSERT INTO accounts (name,type,value,currency) VALUES ('$name','$type','$value','$currency')");

	header('Location: /buch/index.php');