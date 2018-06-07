<?php
$periodlist = '';
$parishlist = '';
$mintlist = '';
$rulerlist = '';
$statement = $db->prepare("SELECT DISTINCT Parish FROM gallifrey ORDER BY Parish ASC;"); // query between brackets
$statement->execute();
$results = $statement->fetchall();
foreach ($results as $result) {
  # code...

  $parishlist = $parishlist

.'<div class="checkbox_wrap"><input class="css-checkbox" name="'.  $result['Parish'].'" type="checkbox" data-type="mint" id="'. $result['Parish'] .'" value="' . $result['Parish'] .'"></input>
<label class="css-label" for="'.$result['Parish'].'">'.$result['Parish'].'</label></div>';

}
$statement2 = $db->prepare("SELECT DISTINCT Period FROM gallifrey ORDER BY Period ASC"); // query between brackets
$statement2->execute();
$results2 = $statement2->fetchall();
foreach ($results2 as $result2) {
  # code...

  $periodlist = $periodlist

  .'<div class="checkbox_wrap"><input class="css-checkbox" name="'.  $result2['Period'].'" type="checkbox" data-type="period" id="'. $result2['Period'] .'" value="' . $result2['Period'] .'"></input>
  <label class="css-label" for="'.$result2['Period'].'">'.$result2['Period'].'</label></div>';

}
$statement3 = $db->prepare("SELECT DISTINCT RulerName FROM gallifrey ORDER BY RulerName ASC;"); // query between brackets
$statement3->execute();
$results3 = $statement3->fetchall();
foreach ($results3 as $result3) {
  # code...

  $rulerlist = $rulerlist

  .'<div class="checkbox_wrap"><input class="css-checkbox" name="'.  $result3['RulerName'].'" type="checkbox" data-type="ruler" id="'. $result3['RulerName'] .'" value="' . $result3['RulerName'] .'"></input>
  <label class="css-label" for="'.$result3['RulerName'].'">'.$result3['RulerName'].'</label></div>';

}
$statement4 = $db->prepare("SELECT DISTINCT MintName FROM gallifrey ORDER BY MintName ASC;"); // query between brackets
$statement4->execute();
$results4 = $statement4->fetchall();
foreach ($results4 as $result4) {
  # code...

  $mintlist = $mintlist

  .'<div class="checkbox_wrap"><input class="css-checkbox" name="'.  $result4['MintName'].'" type="checkbox" data-type="mint" id="'. $result4['MintName'] .'" value="' . $result4['MintName'] .'"></input>
  <label class="css-label" for="'.$result4['MintName'].'">'.$result4['MintName'].'</label></div>';

}


 ?>
