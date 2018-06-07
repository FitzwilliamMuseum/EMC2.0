<?php
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
?>
