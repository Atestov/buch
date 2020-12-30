<?php 
require $_SERVER['DOCUMENT_ROOT'] . "/buch/components/header.php";
	

$data = sql("
	SELECT Datetime, operation.value, operation.comment, dAcc.name as debit, cAcc.name as credit, 
	currency.name as 'валюта списания', currency2.name as 'валюта зачисления' 
	FROM operation
	LEFT JOIN accounts as dAcc on operation.debit_acc = dAcc.id 
	LEFT JOIN accounts as cAcc on operation.credit_acc = cAcc.id 
	LEFT JOIN currency on dAcc.currency = currency.id 
	Left JOIN currency as currency2 on cAcc.currency = currency2.id
	ORDER BY `operation`.`Datetime` DESC, `operation`.`id` ASC
	LIMIT 10
");


?>

<table class="table sortable table-striped table-bordered " id="operation_table";>
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
		<?php foreach ($data as $key => $operation): ?>
			<tr>
				<td>
					<b><?=++$key?></b>
				</td>
				<td>
					<?= $operation['Datetime'] ?>
				</td>
				<td>
					<?= $operation['debit'] ? $operation['debit'] : 'Внешний счет' ?>
				</td>
				<td>
					<?= $operation['credit'] ? $operation['credit'] : 'Внешний счет' ?>
				</td>
				<td>
					<?= $operation['value'] ?>
				</td>
				<td>
					<?= $operation['валюта списания'] ? $operation['валюта списания'] : $operation['валюта зачисления'] ?>
				</td>
				<td>
					<?= $operation['comment'] ?>
				</td>
			</tr>
		<?php endforeach ?>	
  	</tbody>
</table>

</body>
</html>