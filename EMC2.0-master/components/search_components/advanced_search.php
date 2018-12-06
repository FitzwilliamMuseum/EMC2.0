<link rel="stylesheet" href="assets/multiple-select.css"/>
<div class="inner_right">
<h1>Advanced Search</h1>
<p>Use the below form to generate a complex query.</p>
<form class="advanced_search_form" method="get" id="advanced_search" name="advanced_search" action="Advanced_search_results.php">
  <select multiple="multiple" id="rulernameslc" name="rulername[]">
      <?php include("textfiles/advanced_search/advanced-rulers.txt") ?>
    </select>
      <script src="javascript/multiple-select.js"></script>

      <script>
         $('#rulernameslc').multipleSelect({

           filter: true,
            width: '30%',
          placeholder: "Ruler",
            selectAll: false

      });
     </script>
     <select name="kingdom[]" id="kingdomslc" multiple >
        <?php include("textfiles/advanced_search/advanced-kingdoms.txt") ?>
     </select>
     <script>
       $('#kingdomslc').multipleSelect({

                    filter: true,
                     width: '30%',
                   placeholder: "Kingdom",
                     selectAll: false

       });
     </script>
     <select name="Type[]" multiple="multiple">
         <?php include("textfiles/advanced_search/advanced-type.txt") ?>
     </select>
     <script>
       $('select').multipleSelect({

                    filter: true,
                     width: '30%',
                   placeholder: "Type",
                     selectAll: false

       });
    </script>
    <select name="mint[]" id="mintslc"  multiple="multiple">
        <?php include("textfiles/advanced_search/advanced-mints.txt") ?>
    </select>
  <script>
       $('#mintslc').multipleSelect({

                     filter: true,
                     width: '30%',
                     placeholder: "Mint",
                       selectAll: false

       });
    </script>
    <select name="MoneyerLemma[]" multiple id="moneyerslc">
    <?php include("textfiles/advanced_search/advanced-moneyer.txt") ?>
    </select>
    <script>
      $('#moneyerslc').multipleSelect({

                   filter: true,
                  width: '30%',
                  placeholder: "Moneyer",
                    selectAll: false

      });
   </script>
<select name="Denomination[]" multiple="multiple" id="denomslc" >

    <?php include("textfiles/advanced_search/advanced-denomination.txt") ?>
    </select>
    <script>
       $('#denomslc').multipleSelect({

         filter: true,
        width: '30%',
        placeholder: "Denomination",
          selectAll: false

    });
   </script>
   <div class="text-input">
       <input class="advanced_freetext" name="Find-spot" placeholder="Find-Spot">
     </input>
     </div>
  <select name="county[]" multiple id="countyslc">

        <?php include("textfiles/advanced_search/advanced-county.txt") ?>

    </select>
    <script>
       $('#countyslc').multipleSelect({

         filter: true,
        width: '30%',
        placeholder: "County",
          selectAll: false

    });
   </script>
<div class="text-input">
  <input name="emcnumb" class="advanced_freetext" placeholder="EMC Number / SCBI Number">
</div>
<!--<div class="select">-->
  <select name="Metal[]" multiple="multiple" id="metalslc">
  <?php include("textfiles/advanced_search/advanced-metal.txt") ?>
</select>
<script>
   $('#metalslc').multipleSelect({

     filter: true,
       width: '30%',
    placeholder: "Metal",
      selectAll: false

});
</script>
<!--</div>-->
<div class="text-input">
  <input class="advanced_freetext" name="startdate" placeholder="from"></input>



</div>
<div class="text-input">
  <input class="advanced_freetext" name="enddate" placeholder="to"></input>
</div>


</form>
<input type=checkbox id="imagefree" form="advanced_search" name=imagefree></input>
 <label for="imagefree">Check for image-free search.</label>
 <input type=checkbox id="point-map" form="advanced_search" name=point-map></input>
  <label for="point-map">Check to map results.</label>
  <input type=checkbox id="heat-map" form="advanced_search" name=heat-map></input>
   <label for="heat-map">Check to heat map results</label>
  <select name="emc-scbi" form="advanced_search" class="mini-dropdown">
     <option value="">EMC & SCBI</option>
     <option value="EMC">EMC only</option>
     <option value="SCBI">SCBI only</option>
  </select>

<div class="submit_button_wrap">
<input class="submit_button mb" type="submit" form="advanced_search" value="Search"></input>
</div>
<script>
$("#imagefree").change(function(){

  if(this.checked) {


        $("#advanced_search").attr('action','image_free_query.php');
   }else{
        $("#advanced_search").attr('action','Advanced_search_results.php');
   }


})
 $("#point-map").change(function(){

 if(this.checked) {


        $("#advanced_search").attr('action','point_map.php');
   }else{
      $("#advanced_search").attr('action','Advanced_search_results.php');
  }


})

</script>
<script>
$("#heat-map").change(function(){

if(this.checked) {


       $("#advanced_search").attr('action','map.php');
  }else{
     $("#advanced_search").attr('action','Advanced_search_results.php');
 }


})

</script>
</div>
