<?php 
	require "components/header.php";
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