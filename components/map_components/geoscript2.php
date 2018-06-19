<?php


/* Performs the Query */

$data_jsons = array();
$query = $_POST['search'];
$column = $_POST['column_select'];
$column = strip_tags($column);

if ($column == 'All') {

    $sql = "SELECT Latitude , Longitude FROM geodata WHERE Latitude !='' AND Longitude !='' AND `RulerName` LIKE ? LIMIT 10000";

} else {

    $sql = "SELECT Latitude , Longitude FROM geodata WHERE Latitude !='' AND Longitude !='' AND `$column` LIKE ? LIMIT 10000";

}


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