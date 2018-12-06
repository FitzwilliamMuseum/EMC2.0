<?php

header('Content-Type: text/html; charset=utf-8');


//connect to the DB
include("components/dbconnect.php");

$tablecontent = '';
$wildcard = '*';
$soundq = $_REQUEST["q"];
$soundq = strip_tags($soundq);
$soundq = $soundq . $wildcard;
//$column = $_REQUEST['q2'];
//$column = strip_tags($column);


if (strlen($soundq) >= '4') {

     // This requires indexes to be built into the database or it wont work, needs to be a balance between distinct enough queries 
     // and things that people are likely to search for.
  

        $selectStmt = $db->prepare("SELECT DISTINCT * FROM gallifrey WHERE MATCH ( Metal, Period, RulerName) AGAINST(:soundq IN BOOLEAN MODE) LIMIT 1000 OFFSET 0");

  

    $selectStmt->bindParam(':soundq', $soundq, PDO::PARAM_STR, 12);
    $selectStmt->execute(); //execute the query
    $results = $selectStmt->fetchall(); //fetch results


    $a = 0;
    $b = sizeof($results);


    foreach ($results as $result) {


        $objnum = str_replace('.', '_', $result['objNum']);
        $emptyfile = "noimg.jpg";

        $rulername = $result['RulerName'];
        $tablecontent = $tablecontent


            . '<div class=imghalf id=imghalf data-score=0 data-emcscbi="' . $result['NotSingleFind?'] .'"  data-moneyer="' . $result['MoneyerLemma'] . '"  data-period="' . $result['Period'] . '" data-metal="' . $result['Metal'] . '" data-mint="' . $result['MintName'] . '" data-ruler="' . $rulername . '">'
            . '<ul id=coincard>'
            .'<a href="Emcfullrecord.php?link='.$result['CoinID'].'">'.'<img class=coinimg src=http://www-img.fitzmuseum.cam.ac.uk/img/emc/300jpg/'.$objnum . 'obv.jpg'.' onError="imgError(this);">'.'</a>'
            . '<li class=coincarditem>' . ' EMC/SCBI NUMBER: ' . $result['objNum'] . '</li>'
            . '<li class=coincarditem>' . ' Ruler: ' . $result['RulerName'] . '</li>'
            . '<li class=coincarditem>' . ' Type: ' . $result['TypeName'] . '</li>'
            . '<li class=coincarditem>' . ' Mint: ' . $result['MintName'] . '</li>'
            . '<li class=coincarditem>' . ' Moneyer: ' . $result['MoneyerLemma'] . '</li>'
            . '<li class=coincarditem>' . ' Findspot: ' . $result['FindspotName'] . '</li>'
            . '<li class=coincarditem>' . '<a id=cardref href="/Emcfullrecord.php?link=' . $result['CoinID'] . '"">Full Record →</a>' . '</li>'
            . '</ul>'
            . '</div>'
            . '</div>';


        unset($result); /* Really Important, this clears "Result" to prevent iterations of the Loop from having ANY remnants of the previous loop, which translates to copies of the same records appearing in the search. */


    }

}
if ($b > 1) {
echo "Your search returned " . $b . " records. <br>";
}
elseif ($b == 1) {
echo "Your search returned " . $b . " record. <br>";
}
elseif (empty($b) || $b == 0) {
echo "Sorry, this query returned no results. <br>";
};
echo $tablecontent;
?>
