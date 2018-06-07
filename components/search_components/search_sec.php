<div class=Search_Right id=Search_Right>
<div class=Search_H1><h1> Search </h1></div>
<div class=Search_H2><h2> Find a coin.</h2></div>
<div class="Search_flex">
<div class="Search_bar_results_flex">

<form id=Search_form method="post">

                <div class="search_bar_wrap">
                <select name="column_select" id="column_select">
                 <option value="All"> Any </option>
                 <?php include("components/search_components/load_columns.php") ?>
                </select>
                <input class="search_bar" type="text" placeholder="Start typing to search..." name="search" onkeyup="showResult(this.value,column_select.value); showfilters()" >

                </div>

               <div id="select_wrap">
                  <input class="search_button"  id="Heat_map" type="submit" formaction="map.php" value="Heat Map">  </input>

              <select name="EMC/SCBI filter" class="filter_list" id=filtlist type="select">
              <option value="">EMC and SCBI</option>
              <option value="0">EMC only</option>
              <option value="1">SCBI only</option>
              </select>
              <select name="Metal filter" class="filter_list"id="filtlist3" type="select">
              <option value="">All Metals</option>
              <option value="gold">gold</option>
              <option value="pale gold">pale gold</option>
              <option value="silver">silver</option>
              <option value="copper alloy">copper alloy</option>
              <option value="copper">copper</option>
              </select>

                <div class="filter_container">
                <button class="search_button" id="Period_load_More" form="">show periods</button>
                <div class="select_container"  id="Period_list">
              <!--  <select name="Period filter" id=filtlist2 type="select">
                <option value="">All Periods</option> -->
                <?php include("/Applications/MAMP/htdocs/EMC/textfiles/periods.txt")?>
              <!--  </select> -->
                  </div>
                </div>
                <div class="filter_container">
                      <button class="search_button" id="mint_load_More" form="">show mints</button>
                      <div class="select_container" id="Mint_list">

                <?php include("/Applications/MAMP/htdocs/EMC/textfiles/mint.txt")?>

                    </div>
                  </div>
                  <div class="filter_container">
                   <button class="search_button" id="Ruler_load_More" form="">show rulers</button>
                  <div class="select_container" id="Ruler_list">
        <!--          <option value="">All Rulers</option> -->
                 <?php include("/Applications/MAMP/htdocs/EMC/textfiles/rulers.txt")?>
                <!--  </select> -->
                  </div>
                </div>




                  </div>
<div id="filter_display">
</div>

                </form>

<div class=Search_Result id=Search_Result>
</div>
</div>
<!--
<div class=Focus_Result id=Focus_Result>

-->
</div>
</div>
<!--<div id="full_result">

</div>-->
