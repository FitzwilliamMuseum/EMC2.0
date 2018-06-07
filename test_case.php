<?php

$dsn = 'mysql:host=localhost;dbname=EMC;charset=utf8';
$user = 'EMC';
$password = 'uvEgZFQeaHypXV5f!';


try {
 $pdo = new PDO($dsn, $user, $password);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       } catch (PDOException $e) {
     echo 'Connection failed: ' . $e->getMessage();
           die('Sorry, database problem');
       }


$conditions = [];
$contains_all = []; //Terms MUST be seperated by a comma.
$contains_exact = [];
$contains_any = []; //Terms MUST be seperated by a comma.
$contains_none = []; // Terms MUST be seperated by a comma.
$date_range_start = []; //Needs to be checked that it's an Interger of 3 or 4.
$date_range_end = $_POST['date_range_end']; // Needs be check that it's an Interger of 3 or 4 AND is a greater value than range_ start.
$column = $_POST['dropdown'];
$column = strip_tags($column);
$column1 = $_POST['dropdown1'];
$column1 = strip_tags($column1);
$column2 = $_POST['dropdown2'];
$column2 = strip_tags($column2);
$column3 = $_POST['dropdown3'];
$column3 = strip_tags($column3);
$amount = $_POST['amount'];
$amount =  strip_tags($amount);
$tablecontent = '';


if (!empty($_POST['contains_all']))
{
    $localconditions = [];
    foreach(explode(',',$_POST['contains_all']) as $name)
    {
        $name = trim($name);
        $parameters[] = "%$name%";
        $localconditions[] = "$column LIKE ?";
    }
    $conditions[] = "(".implode(" OR ", $localconditions).")";
}
if (!empty($_POST['contains_exact']))

    {
       $exact = $_POST['contains_exact'];
       $conditions[] = "$column1 = ?";
       $parameters[] = "$exact";

    }
if (!empty($_POST['contains_any']))

      {

        $localconditions = [];
        foreach(explode(',',$_POST['contains_any']) as $name1)
        {
            $name1 = trim($name1);
            $parameters[] = "%$name1%";
            $localconditions[] = "$column2 = ANY (SELECT $column2 FROM gallifrey WHERE $column2 LIKE ?) ";
        }
        $conditions[] = "(".implode(" OR ", $localconditions).")";

      }

      if (!empty($_POST['contains_none']))

            {
             $localconditions = [];
             foreach(explode(',',$_POST['contains_none']) as $name2)

             {
               $name2 = trim($name2);
               $parameters[] = "$name2";
               $localconditions[] = "NOT $column3 = ? ";


}
$conditions[] = "(".implode(" AND ", $localconditions).")";
            }

            if (!empty($_POST['date_range_start']))

                {

                   $conditions[] = 'ReignBegin BETWEEN ? AND ? ';
                   $parameters[] = $_POST['date_range_start'];
                   $parameters[] = $_POST['date_range_end'];
                }



$sql = "SELECT * FROM gallifrey";



if ($conditions) {
   if  ($amount == "All")
 {

   $sql .= " WHERE ".implode(" AND ", $conditions);
 } else {
    $sql .= " WHERE ".implode(" AND ", $conditions). " LIMIT " ."". $amount;
    };
 $stmt = $pdo->prepare($sql);
 $stmt->execute($parameters);
 $results = $stmt->fetchAll();


foreach( $results as $result)


{

  $filename = str_replace('.','_',$result['objNum']) . "obv.jpg";
  $emptyfile = "noimg.jpg";
  $tablecontent = $tablecontent



  .'<div class=imghalf id=imghalf data-emcscbi='. $result['NotSingleFind?'].' data-period="'.$result['Period'].'" data-metal='.$result['Metal'].' data-ruler="'. htmlspecialchars($result["RulerName"]) . '">'

/* .'<img  class=coinimg src=http://www-img.fitzmuseum.cam.ac.uk/img/emc/300jpg/'.$result['CoinID']. 'obv.jpg </img>'  ' if file_exists(filename)) { echo $filename } else { echo $emptyfile}; ' */
  .'<div class=listhalf>'
  .'<ul id=coincard>'
  .'<img class=coinimg src=http://www-img.fitzmuseum.cam.ac.uk/img/emc/300jpg/'.$filename .' onError="imgError(this);"</img>'
  .'<li class=coincarditem>'.' EMC NUMBER: '. $result['objNum']. '</li>'
  .'<li class=coincarditem>'. htmlentities(mb_convert_encoding($result['Title'], 'UTF-8', 'ASCII'), ENT_SUBSTITUTE, "UTF-8"). '</li>'
/* .'<li class=coincarditem>'.' EMC NUMBER: '. $result['CoinID']. '</li>' */
.'<li class=coincarditem>'. htmlentities(mb_convert_encoding($result['RulerName'], 'UTF-8', 'ASCII'), ENT_SUBSTITUTE, "UTF-8"). '</li>'
.'<li class=coincarditem>'. $result['StateName']. '</li>'
.'<li class=coincarditem>'.'<a id=cardref href="Emcfullrecord.php?='.$result['CoinID'].'" onclick="setTimeout(printurl, delay)">Full Record</a>'.'</li>'
.'</ul>'
.'</div>'
.'</div>';








unset($result);

}


echo $tablecontent;

}

?>
