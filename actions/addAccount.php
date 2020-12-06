<?php

	$mysqli = new mysqli("localhost", "root", "", "bookkeeping");
	if ($mysqli->connect_errno) {
	    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	$name = $_REQUEST['name'];
	$type = $_REQUEST['type'];
	$value = $_REQUEST['value'] * 100;
	$currency = $_REQUEST['currency'];

	$mysqli->query("INSERT INTO accounts (name,type,value,currency) VALUES ('$name','$type','$value','$currency')");

	header('Location: /buch/index.php');