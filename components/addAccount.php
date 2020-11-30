<!DOCTYPE html>
<html>
<body>

<form method="post" action="/buch/actions/addAccount.php">
	<div class="form-group">
    <input type="textarea" class="form-control" id="name" name="name" placeholder="Название счета">
	</div>
	<div class="form-group">
		<input type="textarea" class="form-control" id="type" name="type" placeholder="Тип счета: Банковская карта / наличные / etc">
	</div>
	<div class="form-group">
		<label>Валюта счёта</label>
		<select class="form-control" id="currency" name="currency">
		<?php 
		  	if ($result = $mysqli->query("SELECT currency.name, currency.id FROM currency")) {
		   	$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
		   	$result->close();
		}
		foreach ($rows as $key => $currency) {
			$key = $currency['id'];
			echo "<option value='$key'> " . $currency['name'] . '</option>';
		}
		?>
		</select>
	</div>
	<div class="form-group">
		<label for="newAccountValue">Начальное значение</label>
		<input type="text" class="form-control" id="value" name="value" placeholder="1000.10">
	</div>
	<button type="submit" class="btn btn-success">Добавить</button>
</form>

</body>
</html>