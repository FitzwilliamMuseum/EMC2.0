<?php



/* Connect to Database etc. */

  $dsn = 'mysql:host=127.0.0.1:8889;dbname=EMC';
  $user = 'root';
  $password = 'root';
try {
 $pdo = new PDO($dsn, $user, $password);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       } catch (PDOException $e) {
     echo 'Connection failed: ' . $e->getMessage();
           die('Sorry, database problem');
       }

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
$column6 = "tblFindspot_County";
$column7 = "FindspotName";
$column8 = "objNum";
$column9 = "Denomination";
$column10 = "Metal";
$tablecontent = '';

/* build query based on current advanced builder system */


if (!empty($_POST['rulername']))
    {
           $localconditions = [];
           $name = $_POST['rulername'];
           $parameters[] = "$name";
           $localconditions[] = "$column = ?";
           $conditions[] = "(".implode(" AND ", $localconditions).")";
    }
if (!empty($_POST['kingdom']))
    {
           $localconditions = [];
           $kingdom = $_POST['kingdom'];
           $parameters[] = "$kingdom";
           $localconditions[] = "$column2 = ?";
           $conditions[] = "(".implode(" AND ", $localconditions).")";
    }
if (!empty($_POST['mint']))
    {
           $localconditions = [];
           $mint = $_POST['mint'];
           $parameters[] = "$mint";
           $localconditions[] = "$column3 = ?";
           $conditions[] = "(".implode(" AND ", $localconditions).")";
    }
if (!empty($_POST['moneyernorm']))
    {
           $localconditions = [];
           $moneyernorm = $_POST['moneyernorm'];
           $parameters[] = "$moneyernorm ";
           $localconditions[] = "$column4 = ?";
           $conditions[] = "(".implode(" AND ", $localconditions).")";
    }
if (!empty($_POST['$moneyeroncoin']))
    {
           $localconditions = [];
           $moneyeroncoin = $_POST['$moneyeroncoin'];
           $parameters[] = "$moneyeroncoin ";
           $localconditions[] = "$column5 = ?";
           $conditions[] = "(".implode(" AND ", $localconditions).")";
    }
if (!empty($_POST['county']))
    {
           $localconditions = [];
           $county = $_POST['county'];
           $parameters[] = "$county ";
           $localconditions[] = "$column6 = ?";
           $conditions[] = "(".implode(" AND ", $localconditions).")";
    }

if (!empty($_POST['Find-spot']))
   {
           $localconditions = [];
           $findspot = $_POST['Find-spot'];
           $parameters[] = "$findspot";
           $localconditions[] = "$column7 = ?";
           $conditions[] = "(".implode(" AND ", $localconditions).")";
    }

if (!empty($_POST['emcnumb']))
    {
           $localconditions = [];
           $EMCnumb = $_POST['emcnumb'];
           $parameters[] = "$EMCnumb";
           $localconditions[] = "$column8 = ?";
           $conditions[] = "(".implode(" AND ", $localconditions).")";

    }

if (!empty($_POST['Denomination']))
    {
           $localconditions = [];
           $denomination = $_POST['Denomination'];
           $parameters[] = "$denomination";
           $localconditions[] = "$column9 = ?";
           $conditions[] = "(".implode(" AND ", $localconditions).")";
    }
if (!empty($_POST['Metal']))
    {
           $localconditions = [];
           $metal = $_POST['Metal'];
           $parameters[] = "$metal";
           $localconditions[] = "$column10 = ?";
           $conditions[] = "(".implode(" AND ", $localconditions).")";
    }

    $sql = "SELECT * FROM gallifrey";







     $sql .= " WHERE ".implode(" AND ",  $conditions);

     $stmt = $pdo->prepare($sql);
     $stmt->execute($parameters);

     $results = $stmt->fetchAll();



foreach ($results as $result)

     {



        $objnum = str_replace('.','_',$result['objNum']);
        $emptyfile = "noimg.jpg";
        $rulername = $result['RulerName'];
        $tablecontent = $tablecontent



        .'<div class=imghalf id=imghalf data-emcscbi='. $result['NotSingleFind?'].' data-period="'.$result['Period'].'" data-metal="'.$result['Metal'].'" data-mint="'.$result['MintName'].'" data-ruler="'. $rulername . '">'

        .'<ul id=coincard>'
        .'<a href="#Focus_Result?link='.$result['CoinID'].'" onclick="setTimeout(printurl, delay)">'.'<img class=coinimg src=http://www-img.fitzmuseum.cam.ac.uk/img/emc/300jpg/'.$objnum . 'obv.jpg'.' onError="imgError(this);"</img>'.'</a>'
        .'<li class=coincarditem>'.' EMC NUMBER: '. $result['objNum']. '</li>'
   		 .'<li class=coincarditem>'.' Mint: '. $result['MintName']. '</li>'
        .'<li class=coincarditem>'. $rulername. '</li>'
        .'<li class=coincarditem>'.' StateName: '. $result['StateName']. '</li>'
        .'<li class=coincarditem>'.' Source: '. $result['Source']. '</li>'
        .'<li class=coincarditem>'.' Findspot: '. $result['FindspotName']. '</li>'
        .'<li class=coincarditem>'.' Grid Reference: '. $result['tblFindspot_NGRabc']. '</li>'
        .'<li class=coincarditem>'.'<a id=cardref href="/emc/Emcfullrecord.php?link='.$result['CoinID'].'"">Full Record →</a>'.'</li>'
        .'</ul>'
        .'</div>';




   unset($result); /* Really Important, this clears "Result" to prevent iterations of the Loop from having ANY remnants of the previous loop, which translates to copies of the same records appearing in the search. */


     }



?>
