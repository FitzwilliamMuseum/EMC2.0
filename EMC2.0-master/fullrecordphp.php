<?php


include("components/dbconnect.php");

$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$array = explode('=', $url);
$array = explode('&', $array[1]);
$ID = $array[0];  // Parses the URL to end up with ID of the coin.


$selectStmt = $db->prepare("SELECT * FROM EMC.gallifrey WHERE objNum like $ID"); //prepare the query
$selectStmt->execute(array()); //execute the query
$results = $selectStmt->fetchall(); //fetch results

foreach ($results as $result) //form the contents of the table
{


}


?>
