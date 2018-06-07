<?php


 //connect to the DB

include("components/dbconnect.php");

$tablecontent = '';
$wildcard = '*';
$soundq = $_POST["search"] . $wildcard;
$soundq = strip_tags($soundq);
$column = $_REQUEST['column'];
$column = strip_tags($column);
$amount = $_REQUEST['amount'];
$amount = strip_tags($amount);





if (strlen($soundq) >= '4') {

	if ($column == 'All') {


$selectStmt = $db->prepare("SELECT DISTINCT * FROM gallifrey  WHERE MATCH ( RulerName, Period, Metal ) AGAINST(:soundq IN BOOLEAN MODE)  LIMIT $amount OFFSET 0");

}
else {

$selectStmt = $db->prepare("SELECT DISTINCT * FROM gallifrey WHERE MATCH ( `$column` ) AGAINST(:soundq IN BOOLEAN MODE) LIMIT $amount OFFSET 0");
};

$selectStmt->execute(array(



	':soundq'=>$soundq.'%'

)); //execute the query
$results = $selectStmt->fetchall(); //fetch results


$a = 0;

/* MATCH( RulerName, Period, Metal ) AGAINST(:q) < removing for test */


 foreach ($results as $result)

  {



     $filename = $result['objNum'] . "obv.jpg";
     $emptyfile = "noimg.jpg";
     $tablecontent = $tablecontent



     .'<div class=imghalf id=imghalf data-emcscbi='. $result['NotSingleFind?'].' data-period="'.$result['Period'].'" data-metal='.$result['Metal'].' data-ruler="'. htmlspecialchars($result["RulerName"]) . '">'

     .'<div class=listhalf>'
     .'<ul id=coincard>'
     .'<li class=coincarditem>'.' EMC NUMBER: '. $result['objNum']. '</li>'
      .'<li class=coincarditem>'.' STATE: '. $result['StateName']. '</li>'
     .'<li class=coincarditem>'.'MINT: '. $result['MintName'] . '</li>'
.'<li class=coincarditem>'. 'RULER: '. $result['RulerName'] . '</li>'
.'<li class=coincarditem>'.'Findspot: '. $result['FindspotName']. '</li>'
.'<li class=coincarditem>'.'<a id=cardref href="/Emcfullrecord.php?='.$result['CoinID'].'" onclick="setTimeout(printurl, delay)">Full Record</a>'.'</li>'
.'</ul>'
.'</div>'
.'</div>'
.'<hr></hr>';




unset($result); /* Really Important, this clears "Result" to prevent iterations of the Loop from having ANY remnants of the previous loop, which translates to copies of the same records appearing in the search. */


  }

 }


echo $tablecontent;
?>
