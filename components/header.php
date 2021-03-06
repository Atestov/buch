<?php
  require_once $_SERVER['DOCUMENT_ROOT'] . "/buch/include/functions.php";
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<link rel="stylesheet" href="/buch/src/style.css">

	<title>Домашняя бухгалтерия</title>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<script type='text/javascript' src='/buch/src/Table_Sort/common.js'></script>
	<script type='text/javascript' src='/buch/src/Table_Sort/css.js'></script>
	<script type='text/javascript' src='/buch/src/Table_Sort/standardista-table-sorting.js'></script>
</head>

<body>
	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
		<h5 class="my-0 mr-md-auto font-weight-normal">Домашняя бухгалтерия v0.04</h5>
		<nav class="my-2 my-md-0 mr-md-3">
			<a class="p-2 text-dark" href="/buch/">Счета</a>
			<a class="p-2 text-dark" href="/buch/pages/operation.php">Операции</a>
			<a class="p-2 text-dark" href="/buch/pages/statistics.php">Статистика</a>
			<a class="p-2 text-dark" href="/buch/pages/budget.php">Бюджет</a>
			<a class="p-2 text-dark" href="/buch/pages/currency.php">Валюты</a>
		</nav>
		<a class="btn btn-outline-primary" href="#">Войти</a>
	</div>
    