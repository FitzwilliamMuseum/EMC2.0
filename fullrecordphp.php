<?php


include("components/dbconnect.php");

$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$array = explode('=', $url);
$ID = $array[1];


$selectStmt = $db->prepare("SELECT * FROM EMC.gallifrey WHERE coinID like $ID"); //prepare the query
$selectStmt->execute(array()); //execute the query
$results = $selectStmt->fetchall(); //fetch results

foreach ($results as $result) //form the contents of the table
{


}


?>
