<?php

header('Content-Type: text/html; charset=utf-8');


//connect to the DB
$dsn = 'mysql:host=localhost:8889;dbname=EMC;charset=utf8';
$user = 'root';
$password = 'root';


try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    die('Sorry, database problem');
}


$mint = $_REQUEST['Mint filter'];


$selectStmt = $db->prepare("SELECT MintName FROM gallifrey WHERE MintName = :mint");
$selectStmt->bindParam(':mint', $mint, PDO::PARAM_STR, 12);
$selectStmt->execute(); //execute the query
$results = $selectStmt->fetchall(); //fetch results

$mint_results = json_encode($results);
print_r($results);
echo $mint_results;

?>
