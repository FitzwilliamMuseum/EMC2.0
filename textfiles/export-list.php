<?php

//connect to the DB
include("/Applications/MAMP/htdocs/EMC/components/dbconnect.php");

$list = '';
$statement = $db->prepare("SELECT DISTINCT RulerName FROM gallifrey ORDER BY RulerName ASC;"); // query between brackets
$statement->execute();
$results = $statement->fetchall();
foreach ($results as $result) {
  # code...

  $list = $list

.'<div class="checkbox_wrap"><input class="css-checkbox" name="'.  $result['RulerName'].'" type="checkbox" data-type="ruler" id="'. $result['RulerName'] .'" value="' . $result['RulerName'] .'"></input>
<label class="css-label" for="'.$result['RulerName'].'">'.$result['RulerName'].'</label></div>';

}

$file = "rulers.txt";
$current = file_get_contents($file);
$current = $list;


file_put_contents($file, $current);



?>
