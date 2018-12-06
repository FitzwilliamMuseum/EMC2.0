<div class=Search_Right id=Search_Right>
<div class=Search_H1><h1> Search </h1></div>
<div class=Search_H2><h2> Find a coin.</h2></div>
<div class="Search_flex">
<div class="Search_bar_results_flex">
<script>
$(document).keypress(
    function(event){
     if (event.which == '13') {
        event.preventDefault();
      }


});
</script>
<form id=Search_form method="post">

                <div class="search_bar_wrap">
                <input class="search_bar" type="text" placeholder="Start typing to search..." name="search" onkeyup="showResult(this.value); showfilters()" >
                  <div class="search_bar_wrap">
                <div class="keyboard-wrap">
                <div class="keyboard">
                  <div class="letter">Æ</div>

                </div>
                </div>
                <script>
                $( ".letter" ).click(function() {
                var l = $(this).html();
                $(".search_bar").val($(".search_bar").val() + l);
                $(".search_bar").focus();
                })
                </script>
                </div>
                <div id="filter_display">
                </div>
                </div>

               <div id="select_wrap">
                  <button class="search_button"  id="Heat_map" type="submit" formaction="map.php" value="Heat Map">Heat Map  </button>

              <select name="EMC/SCBI filter" class="filter_list" id=filtlist type="select">
              <option value="">EMC and SCBI</option>
              <option value="0">EMC only</option>
              <option value="1">SCBI only</option>
              </select>
                      <div class="filter_container">
              <button class="search_button" id="Moneyer_load_More" form="">Show Moneyers</button>
              <div class="select_container"  id="Moneyer_list">
              <?php include("textfiles/moneyer.txt")?>
            </div>
          </div>

                <div class="filter_container">
                <button class="search_button" id="Period_load_More" form="">Show Periods</button>
                <div class="select_container"  id="Period_list">
                <?php include("textfiles/periods.txt")?>
                  </div>
                </div>
                <div class="filter_container">
                      <button class="search_button" id="mint_load_More" form="">Show Mints</button>
                      <div class="select_container" id="Mint_list">

                <?php include("textfiles/mint.txt")?>

                    </div>
                  </div>
                  <div class="filter_container">
                   <button class="search_button" id="Ruler_load_More" form="">Show Rulers</button>
                  <div class="select_container" id="Ruler_list">
                 <?php include("textfiles/rulers.txt")?>
                  </div>
                </div>




                  </div>


                </form>

<div class="Search_Result" id="Search_Result" >
</div>
</div>

<!--
<div class=Focus_Result id=Focus_Result>

-->
</div>
</div>
<!--<div id="full_result">

</div>-->
