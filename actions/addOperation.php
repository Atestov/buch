<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . "/buch/include/functions.php";

	$writeoff = mysqli_real_escape_string(connect(), $_REQUEST['writeoff']);
	$enrollment = mysqli_real_escape_string(connect(), $_REQUEST['enrollment']);
	$value = mysqli_real_escape_string(connect(), $_REQUEST['value']) * 100;
	$comment = mysqli_real_escape_string(connect(), $_REQUEST['comment']);
	$datetime = mysqli_real_escape_string(connect(), $_REQUEST['Datetime']);

	if ($result = sql("SELECT MAX(record) as max FROM operation")) {
		$record = $result[0]['max'] + 1;
	}

	sql("INSERT INTO operation (debit_acc, credit_acc, value, comment, record, Datetime) 
		VALUES ('$writeoff','$enrollment','$value','$comment','$record', '$datetime')");
	sql("UPDATE accounts set value=value-'$value' where accounts.id = '$writeoff'");
	sql("UPDATE accounts set value=value+'$value' where accounts.id = '$enrollment'");

	header('Location: /buch/');
