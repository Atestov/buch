<!DOCTYPE html>
<html>
<body>
<form method="post" action="/buch/actions/addOperation.php">
	<div class="form-group">
		<input type="text" class="form-control" id="value" name="value" placeholder="555.99">
	</div>
	<div class="form-group">
    <label>Счет списания</label>
    <select class="form-control" id="writeoff" name="writeoff">
    	<?php 
    	if ($result = $mysqli->query("SELECT accounts.name as account, currency.name, accounts.id FROM accounts, currency WHERE accounts.currency = currency.id")) {
	    	$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
	    	$result->close();
		}
		echo "<option value='0'> Внешний счет </option>";
		foreach ($rows as $currency) {
			$key = $currency['id'];
			echo "<option value='$key'> " . $currency['account'] . ' - ' . $currency['name'] . '</option>';
		}
    	?>
    </select>
    <br>
    <label>Счет зачисления</label>
    <select class="form-control" id="enrollment" name="enrollment">
    	<?php 
    	if ($result = $mysqli->query("SELECT accounts.name as account, currency.name, accounts.id FROM accounts, currency WHERE accounts.currency = currency.id")) {
	    	$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
	    	$result->close();
		}
		echo "<option value='0'> Внешний счет </option>";
		foreach ($rows as $currency) {
			$key = $currency['id'];
			echo "<option value='$key'> " . $currency['account'] . ' - ' . $currency['name'] . '</option>';
		}
    	?>
    </select>
    <br>
    <label>Комментарий к операции</label>
    <input type="text" class="form-control" id="comment" name="comment" placeholder="Купил цветы любимой девушке">
    <br>
    <button type="submit" class="btn btn-success">Добавить</button>
</form>
</body>
</html>