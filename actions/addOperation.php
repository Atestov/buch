<?php

	$mysqli = new mysqli("localhost", "root", "", "bookkeeping");
	if ($mysqli->connect_errno) {
	    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	$writeoff = $_REQUEST['writeoff'];
	$enrollment = $_REQUEST['enrollment'];
	$value = $_REQUEST['value'];
	$comment = $_REQUEST['comment'];

	if ($result = $mysqli->query("SELECT MAX(record) as max FROM operation")) {
		$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
		$result->close();
		$rows = $rows[0]['max'] + 1;
	}

	$mysqli->query("INSERT INTO operation (debit_acc,credit_acc,value,comment, record) VALUES ('$writeoff','$enrollment','$value','$comment','$rows')");
	$mysqli->query("UPDATE accounts set value=value-'$value' where accounts.id = '$writeoff'");
	$mysqli->query("UPDATE accounts set value=value+'$value' where accounts.id = '$enrollment'");

	header('Location: /buch/index.php');
