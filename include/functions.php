<?php

function connect()
{
	static $connection = null;
	require $_SERVER['DOCUMENT_ROOT'] . "/buch/config/dbConfig.php";

	if (null === $connection) {
		$connection = mysqli_connect($host, $user, $password, $dbname);
	}
	return $connection;
}

function isCurrentUrl($url) 
{
	return $url == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
}

/**
* Функция осуществляет sql запрос
* принимает строку содержащую запрос
* возвращает массив с данными если запрос успешен
* или false если запрос не успешен
*/
function sql($request)
{
	$responce = mysqli_query(connect(), $request);
	return mysqli_fetch_all($responce, MYSQLI_ASSOC);
}