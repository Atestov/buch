<?php
/*
* Форма добавления новой расчетной операции
*/
$data = sql('
	SELECT accounts.name as account, currency.name, accounts.id 
	FROM accounts, currency 
	WHERE accounts.currency = currency.id AND accounts.is_deleted = 0
');

?>
<form method="post" action="/buch/actions/addOperation.php">
	<div class="form-group">
		<input type="text" class="form-control" id="value" name="value" placeholder="555.99">
	</div>
	<div class="form-group">

		<label>Счет списания</label>
		<select class="form-control" id="writeoff" name="writeoff">
			<option value='0'> Внешний счет </option>
			<?php foreach ($data as $i): ?>
				<option value="<?= $i['id']?>"><?= $i['account'] . ' - ' . $i['name'] ?></option>
			<?php endforeach ?>
		</select>
	</div>

	<div class="form-group">
	    <label>Счет зачисления</label>
	    <select class="form-control" id="enrollment" name="enrollment">
	    	<option value='0'> Внешний счет </option>
			<?php foreach ($data as $i): ?>
				<option value="<?= $i['id']?>"><?= $i['account'] . ' - ' . $i['name'] ?></option>
			<?php endforeach ?>
	    </select>
	</div>

    <div class="form-group">
	    <label for="inputDate">Дата</label>
	    <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" id="Datetime" name="Datetime">
  	</div>

    <label>Комментарий к операции</label>
    <input type="text" class="form-control" id="comment" name="comment" placeholder="Купил продукты">
    <br>
    <button type="submit" class="btn btn-success">Добавить</button>
</form>