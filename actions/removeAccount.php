<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . "/buch/include/functions.php";

	$id = mysqli_real_escape_string(connect(), $_REQUEST['id']);	

	// sql("DELETE FROM `accounts` WHERE id = '$id'");
	sql("UPDATE accounts Set accounts.is_deleted = TRUE WHERE accounts.id = $id");

	header('Location: /buch/');
