<?php


$db = parse_ini_file("/var/config/db.ini");
//connect to the DB
   $dsn = $db['type']
   . ":host=" . $db['host'] . ";dbname=" . $db['name'] . ";charset=utf8";
   $user = $db['user'];
   $password = $db['pass'];

try {
 $db = new PDO($dsn, $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       } catch (PDOException $e) {
     echo 'Connection failed: ' . $e->getMessage();
           die('Sorry, database problem');
       }
?>
