<?php 

$rows = sql(
  "SELECT accounts.name as accountName, accounts.type, currency.name, accounts.value, accounts.id 
  FROM accounts, currency 
  WHERE accounts.currency = currency.id 
  ORDER BY type"
);

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
    <?php foreach ($rows as $i => $row): ?>
    <tr>
      <td scope="row" style="max-width: 0px;">
        <b><?= ++$i ?></b>
        <!-- Кнопка удаления счета. Предположу что существует способ лучше, но мне пока не хватает знаний -->
        <form method="post" action="/buch/actions/removeAccount.php" style="float: right;">
          <input type="hidden" id="id" name="id" value="<?= $row['id']?>">
          <button type="submit" class="btn-circle">x</button>
        </form>
      </td>
      <td>
        <?= $row['accountName'] ?>
      </td>
      <td>
        <?= $row['type'] ?>
      </td>
      <td>
        <?= $row['name'] ?>
      </td>
      <td>
        <?= $row['value'] / 100 ?> <!-- деление на 100 потому что в БД валюта храниться в "копейках" -->
      </td>
    </tr>
  <?php endforeach ?>
  </tbody>
</table>
