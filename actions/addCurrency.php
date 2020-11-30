<?php

	$mysqli = new mysqli("localhost", "root", "", "bookkeeping");
	if ($mysqli->connect_errno) {
	    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	$name = $_REQUEST['name'];
	$cur_code = $_REQUEST['cur_code'];
	

	$mysqli->query("INSERT INTO currency (name,cur_code) VALUES ('$name','$cur_code')");

	header('Location: /buch/index.php');
