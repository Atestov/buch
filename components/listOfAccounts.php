<!DOCTYPE html>
<html>
<head>
	<style>
    	table#accounts_table {
    		float: right;
    		width: 98%;
    		margin-left: 1%;
    		margin-right: 1%;

    	}
    </style>
</head>
<body>
<?php 
$mysqli = new mysqli("localhost", "root", "", "bookkeeping");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if ($result = $mysqli->query("SELECT accounts.name as accountsname, accounts.type, currency.name, accounts.value, accounts.id FROM accounts, currency WHERE accounts.currency = currency.id ORDER BY type")) {
	$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$result->close();
}
?>

<table class="table sortable table-striped table-bordered" id="accounts_table";>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Счёт</th>
      <th scope="col">Тип счёта</th>
      <th scope="col">Валюта</th>
      <th scope="col">Значение</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($rows as $i => $row) {
    ?>
    <tr>
      <td scope="row" style="max-width: 1px;"> <b><?php echo ++$i ?></b>
      <form method="post" action="/buch/actions/removeAccount.php" style="float: right;">
        <input type="hidden" id="id" name="id" value="'<?php $row['id']?>'">
        <button type="submit" class="btn-dark" style="width: 25px; height: 25px;">x</button>
      </form>
      </td>
      <td>
        <?php echo $row['accountsname'] ?>
      </td>
      <td>
        <?php echo $row['type'] ?>
      </td>
      <td>
        <?php echo $row['name'] ?>
      </td>
      <td>
        <?php echo $row['value'] / 100 ?>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
</body>
</html>
