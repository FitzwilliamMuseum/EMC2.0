<?php

//connect to the DB
include("/Applications/MAMP/htdocs/EMC/components/dbconnect.php");

$list = '';
$statement = $db->prepare("SELECT DISTINCT Period FROM gallifrey ORDER BY Period ASC;"); // query between brackets
$statement->execute();
$results = $statement->fetchall();
foreach ($results as $result) {
  # code...

  $list = $list

.'<div class="checkbox_wrap"><input class="css-checkbox" name="'.  $result['Period'].'" type="checkbox" data-type="mint" id="'. $result['Period'] .'" value="' . $result['Period'] .'"></input>
<label class="css-label" for="'.$result['Period'].'">'.$result['Period'].'</label></div>';

}

$file = "periods.txt";
$current = file_get_contents($file);
$current .= $list;


file_put_contents($file, $current);



?>
