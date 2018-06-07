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

  $mintcontent = '';
  $selectStmt = $db->prepare("SELECT DISTINCT MintName FROM gallifrey ORDER BY MintName ASC;");
  $selectStmt->execute(); //execute the query
  $results = $selectStmt->fetchall(); //fetch results
  $results2 =array_slice($results, 6); //This will contain the initally hidden results that can be loaded in.
  //$results = array_slice($results,0, 5 ); // This contains the first 15 records.
  foreach ($results as $result) {
    # code...

    $mintcontent = $mintcontent

  .'<div class="checkbox_wrap"><input class="css-checkbox" name="'. $result['MintName'].'" type="checkbox" data-type="mint" id="'. $result['MintName'] .'" value="' . $result['MintName'] .'"></input>
  <label class="css-label" for="'.$result['MintName'].'">'.$result['MintName'].'</label></div>';

  }

 $tablecontent = '';
 $tablecontent2 = '';
    $selectStmt = $db->prepare("SELECT DISTINCT Parish FROM gallifrey ORDER BY Parish ASC;");
   $selectStmt->execute(); //execute the query
   $results = $selectStmt->fetchall(); //fetch results
   $results2 =array_slice($results, 6); //This will contain the initally hidden results that can be loaded in.
   //$results = array_slice($results,0, 5 ); // This contains the first 15 records.
   foreach ($results as $result) {
     # code...

     $tablecontent = $tablecontent

   .'<div class="checkbox_wrap"><input class="css-checkbox" name="'. $result['Parish'].'" type="checkbox" id="'. $result['Parish'] .'" value="' . $result['Parish'] .'"></input>
   <label class="css-label" for="'.$result['Parish'].'">'.$result['Parish'].'</label></div>';

   }

  foreach ($results2 as $result2) {

    $tablecontent2 = $tablecontent2

  .'<div class="checkbox_wrap"><input class="css-checkbox" type="checkbox" id="'. $result2['Parish'] .'" value="' . $result2['Parish'] .'"></input>
  <label class="css-label" for="'.$result2['Parish'].'">'.$result2['Parish'].'</label></div>';

  }
