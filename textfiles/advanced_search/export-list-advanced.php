<?php

//connect to the DB
include("/Applications/MAMP/htdocs/EMC/components/dbconnect.php");

$list = '';
$statement = $db->prepare("SELECT DISTINCT Metal FROM gallifrey ORDER BY Metal ASC;"); // Put column name you want to export as list here
$statement->execute();
$results = $statement->fetchall();
foreach ($results as $result) {
  # code...

  $list = $list

.'<option>'.$result['Metal'].'</option>'; // change to column name

}

$file = "advanced-metal.txt"; // name to martch corresponding file
$current = file_get_contents($file);
$current = $list;
file_put_contents($file, $current);



?>
