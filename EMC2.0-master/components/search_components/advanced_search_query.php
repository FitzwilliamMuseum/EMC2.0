<?php
header('Content-Type: text/html; charset=utf-8');



//connect to the DB
include("components/dbconnect.php");

/* capture posted data as variables */

$tablecontent = '';
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
$column14 = "Preservation";


$tablecontent = '';
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

    if (!empty($_GET['Preservation']))
    {
        $localconditions = [];
        $Preserved= $_GET['Preservation'];
        if (strcasecmp($Preserved,"Pierced") == 0) {
        $Preserved = '%' . $Preserved . '%';
        $Preservations = array($Preserved,"%Piercing%");
        foreach ($Preservations as $Preservation) {
        $Preservation = strip_tags($Preservation);
        $parameters[] = "$Preservation";
        $localconditions[] = "$column14 LIKE ?";


        }
        }
        else {
        $Preserved = preg_replace('/[^a-z0-9]/i', '_', $Preserved);
        $Preserved = '%' . $Preserved . '%';
        $parameters[] = "$Preserved";
        $localconditions[] = "$column14 LIKE ?";


      }


        $conditions[] = "(".implode(" OR ", $localconditions).")";
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

    $sql = "SELECT * FROM gallifrey";




     $sql .= " WHERE ".implode(" AND ",  $conditions) ."ORDER BY CoinID, tblMain_TypeID ASC LIMIT 2000";
     $stmt = $db->prepare($sql);
     $stmt->execute($parameters);
     $results = $stmt->fetchAll();
     $coinnumbers = [];
     foreach ($results as $result) {
         array_push($coinnumbers, $result['objNum']);
         $i++;
             if ($i == 501 ) {
                break;    /* creates an array for nav url limits to 500 records */
           }

    }
$coinnumbers = http_build_query($coinnumbers) . "\n";


$a = sizeof($results);

foreach ($results as $result)

     {



        $objnum = str_replace('.','_',$result['objNum']);
        $emptyfile = "noimg.jpg";
        $rulername = $result['RulerName'];
        $tablecontent = $tablecontent



        .'<div class=imghalf id=imghalf data-emcscbi='. $result['NotSingleFind?'].' data-period="'.$result['Period'].'" data-metal="'.$result['Metal'].'" data-mint="'.$result['MintName'].'" data-ruler="'. $rulername . '">'

        .'<ul id=coincard>'
        .'<a href="Emcfullrecord.php?link='.$result['CoinID'].'">'.'<img class=coinimg src=http://www-img.fitzmuseum.cam.ac.uk/img/emc/300jpg/'.$objnum . 'obv.jpg'.' onError="imgError(this);">'.'</a>'
        .'<li class=coincarditem>'.' EMC/SCBI NUMBER: '. $result['objNum']. '</li>'
        .'<li class=coincarditem>'.' Ruler: '. $result['RulerName']. '</li>'
        .'<li class=coincarditem>'.' Type: '. $result['TypeName']. '</li>'
        .'<li class=coincarditem>'.' Mint: '. $result['MintName']. '</li>'
        .'<li class=coincarditem>'.' Moneyer: '. $result['MoneyerLemma']. '</li>'
        .'<li class=coincarditem>'.' Findspot: '. $result['FindspotName']. '</li>'
        .'<li class=coincarditem>'.'<a id=cardref href="Emcfullrecord.php?link='.$result['objNum'].'&'."$coinnumbers".'">Full Record →</a>'.'</li>'
        .'</ul>'
        .'</div>';




   unset($result); /* Really Important, this clears "Result" to prevent iterations of the Loop from having ANY remnants of the previous loop, which translates to copies of the same records appearing in the search. */


     }






?>
