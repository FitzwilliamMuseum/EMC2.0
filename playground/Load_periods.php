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

$tablecontent = '';
$tablecontent2 = '';
   $selectStmt = $db->prepare("SELECT DISTINCT Period FROM gallifrey ORDER BY Period ASC");
  $selectStmt->execute(); //execute the query
  $results = $selectStmt->fetchall(); //fetch results
  $results2 =array_slice($results, 6); //This will contain the initally hidden results that can be loaded in.
  //$results = array_slice($results,0, 5 ); // This contains the first 15 records.
  foreach ($results as $result) {
    # code...

    $tablecontent = $tablecontent

  .'<div class="checkbox_wrap"><input class="css-checkbox" name="'. $result['Period'].'" data-type="period" type="checkbox" id="'. $result['Period'] .'" value="' . $result['Period'] .'"></input>
  <label class="css-label" for="'.$result['Period'].'">'.$result['Period'].'</label></div>';

  }

 foreach ($results2 as $result2) {

   $tablecontent2 = $tablecontent2

 .'<div class="checkbox_wrap"><input class="css-checkbox" type="checkbox" id="'. $result2['Period'] .'" value="' . $result2['Period'] .'"></input>
 <label class="css-label" for="'.$result2['Period'].'">'.$result2['Period'].'</label></div>';

 }
