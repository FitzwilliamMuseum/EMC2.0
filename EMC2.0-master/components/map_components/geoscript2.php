<?php

//connect to the DB

/* Performs the Query */

$data_jsons = array();

if (empty($_GET['heat-map'])) {
$initial = $_POST['search'];
$query = $initial . '%';


    $sql = "SELECT Latitude , Longitude FROM gallifrey WHERE Latitude !='' AND Longitude !='' AND `RulerName` LIKE ? LIMIT 10000";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1, $query, PDO::PARAM_STR, 12);
    $stmt->execute();
    $mapresults = $stmt->fetchAll();
    foreach ($mapresults as $mapresult) {

        /* Turns each record into the format the Google Heat map API recognises for
        the Heat Map Layer... not sure why it doesn't like geoJSON */


        $point = "new google.maps.LatLng( " . $mapresult['Latitude'] . " , " . $mapresult['Longitude'] . " ), ";


        array_push($data_jsons, $point);
    }

}
/* If coming from advanced search */
else {

  /* capture posted data as variables */

  $conditions = [];
  $rulername= [];
  $kingdom = [];
  $mint = [];
  $moneyernorm = [];
  $moneyeroncoin = [];
  $county = [];
  $findspot = [];
  $type = [];
  $denomination = [];
  $EMCnumb = [];
  $metal = [];
  $column = "RulerName";
  $column2 = "StateName";
  $column3 = "MintName";
  $column5 = "MoneyerLemma";
  $column6 = "tblFindspot_County";
  $column7 = "FindspotName";
  $column8 = "objNum";
  $column9 = "Denomination";
  $column10 = "Metal";
  $column11 = "TypeName";
  $column12 = "BeginProd";
  $column13 = 'NotSingleFind';




  /* build query based on current advanced builder system */


  if (!empty($_GET['rulername']))
      {
             $localconditions = [];  // set empty array
             $names = $_GET['rulername']; // create array for POST data
             foreach ($names as $name) { // Loop through that to make every key an parameter
              $parameters[] = $name;
              $localconditions[] = "$column = ?"; // for every parameter make sure an additional query is being passed that can be bound to

             }

             $conditions[] = "(".implode(" OR ", $localconditions).")"; // Add an OR between the statements

      }
  if (!empty($_GET['kingdom']))
      {
             $localconditions = [];
             $kingdoms = $_GET['kingdom'];
             foreach ($kingdoms as $kingdom) {
              $parameters[] = $kingdom;
              $localconditions[] = "$column2 = ?";
             }

             $conditions[] = "(".implode(" OR ", $localconditions).")";
      }
  if (!empty($_GET['mint']))
      {
             $localconditions = [];
             $mints = $_GET['mint'];
             foreach ($mints as $mint) {
              $parameters[] = $mint;
              $localconditions[] = "$column3 = ?";
             }
             $conditions[] = "(".implode(" OR ", $localconditions).")";
      }
  if (!empty($_GET['MoneyerLemma']))
      {
             $localconditions = [];
             $moneyeroncoins = $_GET['MoneyerLemma'];
             foreach ($moneyeroncoins as $moneyeroncoin) {
              $parameters[] = $moneyeroncoin;
              $localconditions[] = "$column5 = ?";
             }
             $conditions[] = "(".implode(" OR ", $localconditions).")";
      }
  if (!empty($_GET['county']))
      {
             $localconditions = [];
             $countys = $_GET['county'];
             foreach ($countys as $county) {
             $parameters[] = "$county";
             $localconditions[] = "$column6 = ?";

           }
             $conditions[] = "(".implode(" OR ", $localconditions).")";
      }

  if (!empty($_GET['Find-spot']))
     {
             $localconditions = [];
             $findspot = $_GET['Find-spot'];
             $findspot = preg_replace('/[^a-z0-9]/i', '_', $findspot);
             $findspot = '%' . $findspot . '%';
             $parameters[] = "$findspot";
             $localconditions[] = "$column7 LIKE ?";
             $conditions[] = "(".implode(" AND ", $localconditions).")";
      }

  if (!empty($_GET['emcnumb']))
      {
             $localconditions = [];
             $EMCnumb = $_GET['emcnumb'];
             $parameters[] = "$EMCnumb";
             $localconditions[] = "$column8 = ?";
             $conditions[] = "(".implode(" AND ", $localconditions).")";

      }

  if (!empty($_GET['Denomination']))
      {
             $localconditions = [];
             $denoms = $_GET['Denomination'];
             foreach ($denoms as $denom) {
             $parameters[] = "$denom";
             $localconditions[] = "$column9 = ?";

           }
             $conditions[] = "(".implode(" OR ", $localconditions ).")";
      }
  if (!empty($_GET['Metal']))
      {
             $localconditions = [];
             $metals = $_GET['Metal'];
             foreach ($metals as $metal) {
               $parameters[] = "$metal";
               $localconditions[] = "$column10 = ?";
             }

             $conditions[] = "(".implode(" OR ", $localconditions).")";
      }
  if (!empty($_GET['Type']))
      {
             $localconditions = [];
             $types = $_GET['Type'];
             foreach ($types as $type) {
               $type = strip_tags($type);
               $parameters[] = "$type";
               $localconditions[] = "$column11 = ?";
             }

             $conditions[] = "(".implode(" OR ", $localconditions).")";
      }
  if (!empty($_GET['startdate']) AND !empty($_GET['enddate']))
          {
                 $localconditions = [];
                 $startdate = $_GET['startdate'];
                 $enddate = $_GET['enddate'];
                 $parameters[] = "$startdate";
                 $parameters[] = "$enddate";
                 $localconditions[] = "$column12 BETWEEN ? AND ?";
                 $conditions[] = "(".implode(" AND ", $localconditions).")";
          }


  if ($_GET['emc-scbi'] == "EMC") {

    $localconditions = [];
    $emcfind = 0;
    $parameters[] = "$emcfind";
    $localconditions[] = "$column13 = ?";
    $conditions[] = "(".implode(" AND ", $localconditions).")";
  }
  elseif ($_GET['emc-scbi'] == "SCBI") {

    $localconditions = [];
    $scbifind = 1;
    $parameters[] = "$scbifind";
    $localconditions[] = "$column13 = ?";
    $conditions[] = "(".implode(" AND ", $localconditions).")";

  }
  else {}

    $sql = "SELECT Latitude , Longitude FROM geodata";
    $sql .= " WHERE Latitude !='' AND Longitude !='' AND ".implode(" AND ",  $conditions) ."LIMIT 10000";
    $stmt = $db->prepare($sql);
    $stmt->execute($parameters);
    $mapresults = $stmt->fetchAll();
    foreach ($mapresults as $mapresult) {

        /* Turns each record into the format the Google Heat map API recognises for
        the Heat Map Layer... not sure why it doesn't like geoJSON */


        $point = "new google.maps.LatLng( " . $mapresult['Latitude'] . " , " . $mapresult['Longitude'] . " ), ";


        array_push($data_jsons, $point);


    }

}
