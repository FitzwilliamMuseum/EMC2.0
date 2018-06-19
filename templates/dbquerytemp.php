<?php
include("components/dbconnect.php");
$statement = $db->prepare(); // query between brackets
$statement->execute();
$results = $statement->fetchall(); 
