<?php


include("components/dbconnect.php");


$tablecontent = '';
$q = $_REQUEST["q"];
$selectStmt = $db->prepare("SELECT * FROM EMC.gallifrey WHERE (CoinID like :q)LIMIT 1"); //prepare the query
$selectStmt->execute(array(

    ':q' => $q . '%'

));
//execute the query
$results = $selectStmt->fetchall(); //fetch results

foreach ($results as $result) {//form the contents of the table


    $objnum = str_replace('.', '_', $result['objNum']);
    $emptyfile = "noimg.jpg";
    $tablecontent = $tablecontent


        . '<img class=coinimglarge src=http://www-img.fitzmuseum.cam.ac.uk/img/emc/300jpg/' . $objnum . 'obv.jpg' . ' onError="imgError(this);"</img>'
        . '<img class=coinimglarge src=http://www-img.fitzmuseum.cam.ac.uk/img/emc/300jpg/' . $objnum . 'rev.jpg' . ' onError="imgError(this);"</img>'
        . '<li class=coincarditem>' . $result['Title'] . '</li>'
        . '<li class=coincarditem>' . ' EMC NUMBER: ' . $result['objNum'] . '</li>'
        . '<li class=coincarditem>' . ' Period: ' . $result['Period'] . '</li>'
        . '<li class=coincarditem>' . $result['RulerName'] . '</li>'
        . '<li class=coincarditem>' . ' StateName: ' . $result['StateName'] . '</li>'
        . '<li class=coincarditem>' . ' Metal: ' . $result['Metal'] . '</li>'
        . '<li class=coincarditem>' . ' Source: ' . $result['Source'] . '</li>'
        . '<li class=coincarditem>' . ' Findspot: ' . $result['FindspotName'] . '</li>'
        . '<li class=coincarditem>' . ' Grid Reference: ' . $result['tblFindspot_NGRabc'] . '</li>';


}

echo $tablecontent;


?>
