<?php

 header('Content-Type: text/html; charset=utf-8');



 //connect to the DB
 include("components/dbconnect.php");

$tablecontent = '';
$wildcard = '*';
$soundq = $_REQUEST["q"];
$soundq = strip_tags($soundq);
$soundq = $soundq . $wildcard;
$column = $_REQUEST['q2'];
$column = strip_tags($column);


if (strlen($soundq) >= '4') {

          if ($column == 'All') {

						$selectStmt = $db->prepare("SELECT DISTINCT * FROM gallifrey WHERE MATCH ( Metal, Period, RulerName ) AGAINST(:soundq IN BOOLEAN MODE) LIMIT 300 OFFSET 0");


					}
			 else {

$selectStmt = $db->prepare("SELECT DISTINCT * FROM gallifrey WHERE MATCH ( `$column` ) AGAINST(:soundq IN BOOLEAN MODE) LIMIT 300 OFFSET 0");
};

$selectStmt->bindParam(':soundq', $soundq, PDO::PARAM_STR, 12);
$selectStmt->execute(); //execute the query
$results = $selectStmt->fetchall(); //fetch results


$a = 0;



 foreach ($results as $result)

  {



     $objnum = str_replace('.','_',$result['objNum']);
     $emptyfile = "noimg.jpg";

     $rulername = $result['RulerName'];
     $tablecontent = $tablecontent



     .'<div class=imghalf id=imghalf data-score=0 data-emcscbi='. $result['NotSingleFind?'].' data-period="'.$result['Period'].'" data-metal="'.$result['Metal'].'" data-mint="'.$result['MintName'].'" data-ruler="'. $rulername . '">'
     .'<ul id=coincard>'
     .'<img class=coinimg src=http://www-img.fitzmuseum.cam.ac.uk/img/emc/300jpg/'.$objnum . 'obv.jpg'.' onError="imgError(this);"</img>'
     .'<li class=coincarditem>'.' EMC NUMBER: '. $result['objNum']. '</li>'
		 .'<li class=coincarditem>'.' Mint: '. $result['MintName']. '</li>'
     .'<li class=coincarditem>'. $rulername. '</li>'
     .'<li class=coincarditem>'.' StateName: '. $result['StateName']. '</li>'
     .'<li class=coincarditem>'.' Source: '. $result['Source']. '</li>'
     .'<li class=coincarditem>'.' Findspot: '. $result['FindspotName']. '</li>'
     .'<li class=coincarditem>'.' Grid Reference: '. $result['tblFindspot_NGRabc']. '</li>'
     .'<li class=coincarditem>'.'<a id=cardref href="/emc/Emcfullrecord.php?link='.$result['CoinID'].'"">Full Record →</a>'.'</li>'
     .'</ul>'
     .'</div>'
     .'</div>';




unset($result); /* Really Important, this clears "Result" to prevent iterations of the Loop from having ANY remnants of the previous loop, which translates to copies of the same records appearing in the search. */


  }

 }



echo $tablecontent;
?>
