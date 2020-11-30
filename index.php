<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Домашняя бухгалтерия</title>
    
  </head>
  <body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <?php require "components/header.php";

	require "components/listOfAccounts.php";
	?>
	<br><br><br>
	<table class="table table-bordered sortable">
		<thead>
			<tr>
				<th scope="col"> Добавить счет</th>
				<th scope="col"> Новая операция</th>
				<th scope="col"> Новая валюта</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<?php require "components/addAccount.php" ?>
				</td>
				<td>
					<?php require "components/addOperation.php" ?>
				</td>
				<td>
					<?php require "components/currency.php" ?>
				</td>
			</tr>
		</tbody>
	</table>
  </body>
</html>