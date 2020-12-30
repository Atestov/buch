<?php require $_SERVER['DOCUMENT_ROOT'] . "/buch/components/header.php";
	
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