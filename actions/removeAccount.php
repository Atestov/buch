<?php

	$mysqli = new mysqli("localhost", "root", "", "bookkeeping");
	if ($mysqli->connect_errno) {
	    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	$id = $_REQUEST['id'];	

	$mysqli->query("DELETE FROM `accounts` WHERE id = '$id'");

	header('Location: /buch/index.php');
