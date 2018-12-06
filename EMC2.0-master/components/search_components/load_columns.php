<?php

$columns = [];
$statement = $db->prepare("SELECT DISTINCT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS
WHERE TABLE_NAME='gallifrey'");
$statement->execute();
$results = $statement->fetchall();
foreach ($results as $result) {
  # code...


  $columns = $columns

.'<option value="'.$result['COLUMN_NAME'].'">'.$result['COLUMN_NAME'].'</option>';


}

echo $columns;


 ?>
