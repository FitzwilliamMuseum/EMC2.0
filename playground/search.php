<?php

 header('Content-Type: text/html; charset=utf-8');




include("dbconnect.php");


$tablecontent5 = '';
$soundq = $_REQUEST["q"];
$column = 'All';
$column = strip_tags($column);




						$selectStmt = $db->prepare("SELECT DISTINCT * FROM gallifrey WHERE RulerName LIKE 'Alfred (the Great)' LIMIT 20");
      //      $selectStmt->bindParam(':soundq', $soundq, PDO::PARAM_STR, 12);
            $selectStmt->execute(); //execute the query
            $results = $selectStmt->fetchall(); //fetch results


$a = 0;



 foreach ($results as $result)

  {



     $objnum = str_replace('.','_',$result['objNum']);
     $emptyfile = "noimg.jpg";

     $rulername = $result['RulerName'];
     $tablecontent5 = $tablecontent5



     .'<div class=imghalf id=imghalf data-emcscbi='. $result['NotSingleFind?'].' data-period="'.$result['Period'].'" data-metal="'.$result['Metal'].'" data-mint="'.$result['MintName'].'" data-ruler="'.$result['RulerName']. '">'

     .'<ul id=coincard>'
     .'<a href="#Focus_Result?link='.$result['CoinID'].'" onclick="setTimeout(printurl, delay)">'.'<img class=coinimg src=http://www-img.fitzmuseum.cam.ac.uk/img/emc/300jpg/'.$objnum . 'obv.jpg'.' onError="imgError(this);"</img>'.'</a>'
     .'<li class=coincarditem>'.' EMC NUMBER: '. $result['objNum']. '</li>'
		 .'<li class=coingcarditem>'.'  Mint:  '. $result['MintName']. '</li>'
  /*   .'<li class=coincarditem>'. $result['Title']. '</li>' */
/* .'<li class=coincarditem>'.' EMC NUMBER: '. $result['CoinID']. '</li>' */
.'<li class=coincarditem>'. $rulername. '</li>'
.'<li class=coincarditem>'.' StateName: '. $result['StateName']. '</li>'
.'<li class=coincarditem>'.' Findspot: '. $result['FindspotName']. '</li>'
.'<li class=coincarditem>'.'<a id=cardref href="#Focus_Result?link='.$result['CoinID'].'" onclick="setTimeout(printurl, delay)">Full Record</a>'.'</li>'
.'</ul>'
.'</div>'
.'</div>';




unset($result); /* Really Important, this clears "Result" to prevent iterations of the Loop from having ANY remnants of the previous loop, which translates to copies of the same records appearing in the search. */


  }





echo $tablecontent5;
?>
