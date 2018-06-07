<div class="inner_right">
<h1>Advanced Search</h1>
<p>Use the below form to generate a complex query.</p>
<form class="advanced_search_form" method="post" id="advanced_search" name="advanced_search" action="Advanced_search_results.php">
<div class="select">
  <select name="rulername">
    <option value=""> Ruler name </option>
      <?php include("/Applications/MAMP/htdocs/EMC/textfiles/advanced_search/advanced-rulers.txt") ?>
    </select>
</div>
<div class="select">
  <select name="kingdom" id="slct">
      <option value=""> Kingdom </option>
      <?php include("/Applications/MAMP/htdocs/EMC/textfiles/advanced_search/advanced-kingdoms.txt") ?>
    </select>
</div>
<div class="select">
  <select name="mint">
    <option value=""> Mint </option>
  <?php include("/Applications/MAMP/htdocs/EMC/textfiles/advanced_search/advanced-mints.txt") ?>
    </select>
</div>
<div class="select">
  <select name="Moneyer (as on coin)" id="slct">
      <option>Moneyer (as on coin)</option>
    <?php include("/Applications/MAMP/htdocs/EMC/textfiles/advanced_search/advanced-moneyer.txt") ?>
    </select>
</div>
<div class="select">
  <select name="county">
    <option value=""> County </option>
    <?php include("/Applications/MAMP/htdocs/EMC/textfiles/advanced_search/advanced-county.txt") ?>
   </select>
</div>
<div class="text-input">
  <input class="advanced_freetext" name="Find-spot" placeholder="Find-Spot">
</input>
</div>
<div class="select">
  <select name="Type">
      <option value="">Type</option>
    <?php include("/Applications/MAMP/htdocs/EMC/textfiles/advanced_search/advanced-type.txt") ?>
    </select>
</div>
<div class="select">
  <select name="Denomination">
      <option value="">Denomination</option>
        <?php include("/Applications/MAMP/htdocs/EMC/textfiles/advanced_search/advanced-denomination.txt") ?>

    </select>
</div>
<div class="text-input">
  <input name="emcnumb" class="advanced_freetext" placeholder="EMC Number">
</div>
<div class="select">
  <select name="Metal">
      <option value="">Metal</option>
  <?php include("/Applications/MAMP/htdocs/EMC/textfiles/advanced_search/advanced-metal.txt") ?>
    </select>
</div>
<div class="text-input">
  <input class="advanced_freetext" value="from"></input>



</div>
<div class="text-input">
  <input class="advanced_freetext" value="to"></input>
</div>


</form>
<div class="submit_button_wrap">
<input class="submit_button" type="submit" form="advanced_search" value="Search"></input>
</div>
</div>
