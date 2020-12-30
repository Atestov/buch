<?php
/**
* Создание нового счета
*/

$currency = sql('SELECT currency.name, currency.id FROM currency');

?>
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
		<?php foreach ($currency as $i): ?>
			<option value="<?= $i['id']?>"><?= $i['name'] ?></option>
		<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<label for="newAccountValue">Начальное значение</label>
		<input type="text" class="form-control" id="value" name="value" placeholder="1000.10">
	</div>
	<button type="submit" class="btn btn-success">Добавить</button>
</form>
