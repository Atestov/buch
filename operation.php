<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Домашняя бухгалтерия</title>
    <style type="text/css">
    	table#operation_table {
    		float: right;
    		width: 98%;
    		margin-left: 1%;
    		margin-right: 1%;

    	}
    </style>
    
  </head>
  <body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type='text/javascript' src='common.js'></script>
	<script type='text/javascript' src='css.js'></script>
	<script type='text/javascript' src='standardista-table-sorting.js'></script>

    <?php require "components/header.php";
	
$mysqli = new mysqli("localhost", "root", "", "bookkeeping");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if ($result = $mysqli->query("SELECT accounts.name as accountsname, accounts.type, currency.name, accounts.value, accounts.id FROM accounts, currency WHERE accounts.currency = currency.id ORDER BY type")) {
	$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$result->close();
}
?>

<table class="table table-striped table-bordered sortable" id="operation_table";>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Дата платежа</th>
      <th scope="col">Счёт</th>
      <th scope="col">Получатель платежа</th>
      <th scope="col">Размер платежа</th>
      <th scope="col">Валюта</th>
      <th scope="col">Заметка</th>
    </tr>
  </thead>
	<tbody>

		<?php 
		$len = mysqli_fetch_all($mysqli->query("SELECT COUNT(*) as len FROM `operation` WHERE 1"), MYSQLI_ASSOC)[0]['len'];
		$operation = mysqli_fetch_all($mysqli->query("SELECT * FROM `operation` ORDER BY `operation`.`Datetime` DESC, `operation`.`id` DESC"), MYSQLI_ASSOC);
		for ($i=1; $i <=$len ; $i++) {
			echo "<tr>";
			echo "<td>" . $i . "</td>"; //Номер столбца

			echo "<td>" . $operation[$i-1]['Datetime'] . "</td>";

			//Счет списания
			if ($operation[$i-1]['debit_acc'] != 0) {
				$name = mysqli_fetch_all($mysqli->query(
					"SELECT accounts.name FROM accounts WHERE accounts.id = " . $operation[$i-1]['debit_acc']),MYSQLI_ASSOC)[0];
				echo "<td>" . $name['name'] . "</td>";
			} else {
				echo "<td>Внешний счёт</td>";
			}
			
			//Счет зачисления
			if ($operation[$i-1]['credit_acc'] != 0) {
				$name = mysqli_fetch_all($mysqli->query(
					"SELECT accounts.name FROM accounts WHERE accounts.id = " . $operation[$i-1]['credit_acc']),MYSQLI_ASSOC)[0];
				echo "<td>" . $name['name'] . "</td>";
			} else {
				echo "<td>Внешний счёт</td>";
			}

			//Размер платежа
			echo "<td>" . $operation[$i-1]['value']/100 . "</td>";

			//Валюта платежа
			if ($operation[$i-1]['debit_acc'] != 0) {
				$name = mysqli_fetch_all($mysqli->query(
					"SELECT currency.name FROM currency,accounts WHERE currency.id = accounts.currency and accounts.id = " . $operation[$i-1]['debit_acc']),MYSQLI_ASSOC)[0];
				echo "<td>" . $name['name'] . "</td>";
			} else {
				$name = mysqli_fetch_all($mysqli->query(
					"SELECT currency.name FROM currency,accounts WHERE currency.id = accounts.currency and accounts.id = " . $operation[$i-1]['credit_acc']),MYSQLI_ASSOC)[0];
				echo "<td>" . $name['name'] . "</td>";
			}
			echo "<td>" . $operation[$i-1]['comment'] . "</td>";
			//echo "<td>" . $accounts[id = $operation[$i-1]['debit_acc']] . "</td>"; хз как 
			echo "</tr>";
		}
		?>
  </tbody>
</table>
  </body>
</html>