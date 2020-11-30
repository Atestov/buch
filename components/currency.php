<!DOCTYPE html>
<html>
<body>
<form method="post" action="/buch/actions/addCurrency.php">
	<div class="form-group">
		<input type="text" class="form-control" id="name" name="name" placeholder="Название валюты - Евро / Фунт / etc">
	</div>
	<input type="text" class="form-control" id="cur_code" name="cur_code" placeholder="USD - Код валюты для обновления курса">
	<br><button type="submit" class="btn btn-success">Добавить</button>
</form>
</body>
</html>