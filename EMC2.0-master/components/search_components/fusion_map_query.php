<?php
$localconditions = [];

if (!empty($_GET['rulername']))
    {

           $names = $_GET['rulername'];  // make an array of all the rulername values sent
           foreach ($names as $name) { // loop over them

              $name = '\''.$name.'\''; // encase each name in a single qoute  'Alfred'

            $parameters[] = $name; // Push each name into an array
           }

          $parameters = implode(",", $parameters); // Comma seperate each name
          $parameters = '('.$parameters .')'; // wrap the list of names in ()
          $localconditions[] = "'RulerName' IN $parameters"; // Add an "IN constraint" (behaves as OR)


    }
if (!empty($_GET['kingdom']))
        {

               $kingdoms = $_GET['kingdom'];
               foreach ($kingdoms as $kingdom) { // loop over them
                  $kingdom = strip_tags($kingdom);
                  $kingdom = '\''.$kingdom.'\''; // encase each name in a single qoute  'Alfred'

                $parameters2[] = $kingdom; // Push each name into an array
               }

               $parameters2 = implode(",", $parameters2); // Comma seperate each name
               $parameters2 = '('.$parameters2 .')'; // wrap the list of names in ()
               $localconditions[] = "'StateName' IN $parameters2";

        }
if (!empty($_GET['period']))
                {

                       $periods = $_GET['period'];
                       foreach ($periods as $period) { // loop over them
                          $period = strip_tags($period);
                          $period = '\''.$period.'\''; // encase each name in a single qoute  'Alfred'

                        $parameters3[] = $period; // Push each name into an array
                       }
                       $parameters3 = implode(",", $parameters3); // Comma seperate each name
                       $parameters3 = '('.$parameters3 .')'; // wrap the list of names in ()
                       $localconditions[] = "'period' IN $parameters3";

                }
if (!empty($_GET['Metal']))
                {

                                       $metals = $_GET['Metal'];
                                       foreach ($metals as $metal) { 
                 $metal = strip_tags($metal);
                 $metal = '\''.$metal.'\'';

               $parameters3a[] = $metal; 
              }
              $parameters3a = implode(",", $parameters3a); 
              $parameters3a = '('.$parameters3a .')'; 
              $localconditions[] = "'Metal' IN $parameters3a";

       }


                  
if (!empty($_GET['mint']))
                {

                       $mints = $_GET['mint'];
                       foreach ($mints as $mint) { // loop over them
                          $mint = strip_tags($mint);
                          $mint = '\''.$mint.'\''; // encase each name in a single qoute  'Alfred'

                        $parameters4[] = $mint; // Push each name into an array
                       }

                       $parameters4 = implode(",", $parameters4); // Comma seperate each name
                       $parameters4 = '('.$parameters4 .')'; // wrap the list of names in ()
                       $localconditions[] = "'MintName' IN $parameters4";
                }

if (!empty($_GET['MoneyerLemma'])) {
                $moneyers = $_GET['MoneyerLemma'];
                foreach ($moneyers as $moneyer) { // loop over them
                         $moneyer = strip_tags($moneyer);
                         $moneyer = '\''.$moneyer.'\''; // encase each name in a single qoute  'Alfred'

                       $parameters5[] = $moneyer; // Push each name into an array
                      }
                      $parameters5 = implode(",", $parameters5); // Comma seperate each name
                      $parameters5 = '('.$parameters5 .')'; // wrap the list of names in ()
                      $localconditions[] = "'MoneyerLemma' IN $parameters5";
}
if (!empty($_GET['Type'])) {
                $types = $_GET['Type'];
                foreach ($types as $type) { // loop over them
                         $type = strip_tags($type);
                         $type = '\''.$type.'\''; // encase each name in a single qoute  'Alfred'

                       $parameters6[] = $type; // Push each name into an array
                      }
                      $parameters6 = implode(",", $parameters6); // Comma seperate each name
                      $parameters6 = '('.$parameters6 .')'; // wrap the list of names in ()
                      $localconditions[] = "'TypeName' IN $parameters6";
}
if (!empty($_GET['Find-spot']))
                {

                       $Findspot = $_GET['Find-spot'];
                       $parameters[] = "$Findspot";
                       $localconditions[] = "'FindspotName' CONTAINS '$Findspot'";

                 }
if (!empty($_GET['Denomination']))
                {
                      $Denominations = $_GET['Denomination'];
                             foreach ($Denominations as $Denomination) { // loop over them
                                      $Denomination = strip_tags($Denomination);
                                      $Denomination = '\''.$Denomination.'\''; // encase each name in a single qoute  'Alfred'

                                    $parameters6[] = $Denomination; // Push each name into an array
                                   }
                                   $parameters6 = implode(",", $parameters6); // Comma seperate each name
                                   $parameters6 = '('.$parameters6 .')'; // wrap the list of names in ()
                                   $localconditions[] = "'Denomination' IN $parameters6";
                     }

$conditions = implode(" AND ", $localconditions);
$rulername = $_GET['rulername'];



