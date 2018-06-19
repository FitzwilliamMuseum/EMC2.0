$(document).ready(function(){
  $('#Mint_list').addClass("hidden");
  $('#Period_list').addClass("hidden");
  $('#Parish_list').addClass("hidden");
  $("#Metal_list").addClass("hidden");
  $('#mint_load_More').click(function() {

      $('#Mint_list').toggleClass("hidden");
      $('#Period_list').addClass("hidden");
          $('#metal_list').addClass("hidden");


  });
});
$(document).ready(function(){
  $('#Ruler_list').addClass("hidden");

  $('#Ruler_load_More').click(function() {

      $('#Ruler_list').toggleClass("hidden");
        $('#Period_list').addClass("hidden");
            $('#Metal_list').addClass("hidden");
              $('#Mint_list').addClass("hidden");


  });
});


  $('#Period_load_More').click(function() {

      $('#Period_list').toggleClass("hidden");
        $('#Ruler_list').addClass("hidden");
          $('#metal_list').addClass("hidden");


  });
  $('#Parish_load_More').click(function() {

      $('#Parish_list').toggleClass("hidden");


  });
  $('#Metal_load_More').click(function() {

      $('#Metal_list').toggleClass("hidden");
      $('#Ruler_list').addClass("hidden");
        $('#Period_list').addClass("hidden");


  });
// Define the arrays for later use

    var selected = [];
    var active_mints = [];
    var active_metals = [];
    var active_periods = [];
    var active_rulers = [];


// When check box is clicked
$('.css-checkbox').click(function() {


// Define checkboxes value as "box"
  var box = $(this).attr('name');

// Set the datatype variable as type attribute of the checkbox

  var datatype = $(this).data("type");
// This checks the datatype and puts the value into the appropriate array for matching agaisnt later.
  switch (datatype) {
  case "mint":
  active_mints.push($(this).attr('name'));
  break;
  case "metal":
  active_metals.push($(this).attr('name'));
  break;
  case "period":
  active_periods.push($(this).attr('name'));
  break;
  case "ruler":
  active_rulers.push($(this).attr('name'));
  break;


  }




// when the box is checked

  if(this.checked) {

    // Put the name attr of the box into an array for displaying on UI
    selected.push($(this).attr('name'));
      // Begin iterating through each record, this is where the matching happens.
       $(".imghalf").each(function() {

         console.log("record");
         // This creates an Array of all the records data attributes

         var recordmint = $(this).data("mint");
         var recordruler = $(this).data("ruler");
         var recordperiod = $(this).data("period");
         var recordmetal =  $(this).data("metal");
         // This needs to check each array, if it has data in matches agaisnt the records values.

        var test = '';

        if ( active_mints.length != 0 ) {

        test += '$.inArray(recordmint, active_mints) != -1 &&'
        }



        if ( active_rulers.length != 0) {

       test += '$.inArray(recordruler, active_rulers) != -1 &&'

        }




        if ( active_periods.length != 0 ) {

      test += '$.inArray(recordperiod, active_periods) != -1 &&'
        }




        if ( active_metals.length != 0 ) {

      test +=  '$.inArray(recordmetal, active_metals) != -1 &&'


        }

        if (test.endsWith("&&") ) {

          test = test.slice(0, -2);



        }



    //   if ((eval(test))) {
    if (
      (active_metals.length === 0 || $.inArray(recordmetal, active_metals) != -1 )
      &&
      (active_periods.length === 0 || $.inArray(recordperiod, active_periods)  != -1)
      &&
      (active_mints.length === 0 || $.inArray(recordmint, active_mints)  != -1)
      &&
      (active_rulers.length === 0 || $.inArray(recordruler, active_rulers) != -1 )
    ) {


    $(this).addClass("visible").removeClass("hidden").removeClass("selected");


        }
        else {

$(this).removeClass("selected").addClass("hidden").removeClass("visible");

        }

       })

   }
//begin for when a checkbox is unchecked
 else  {

    var remove = $(this).attr('name');
   selected = $.grep(selected, function(value) {
         return value != remove;

});

   var remove = $(this).attr('name');
   var datatype = $(this).data("type");
 // removes the value from the appropriate array
   switch (datatype) {
   case "mint":
   active_mints= $.grep(active_mints, function(value) {
         return value != remove;

   });
   active = active_mints;
   break;
   case "metal":
   active_metals = $.grep(active_metals, function(value) {
         return value != remove;

   });
   active = active_metals;
   break;
   case "period":
   active_periods = $.grep(active_periods, function(value) {
         return value != remove;

   });
   active = active_periods;
   break;
   case "ruler":
   active_rulers = $.grep(active_rulers, function(value) {
         return value != remove;

   });
   active = active_rulers;
   break;


   }




   $(".imghalf").each(function() {


     var recordmint = $(this).data("mint");
     var recordruler = $(this).data("ruler");
     var recordperiod = $(this).data("period");
     var recordmetal =  $(this).data("metal");
     // This needs to check each array, if it has data in matches agaisnt the records values.

    var test = '';

    if ( active_mints.length != 0 ) {

    test += '$.inArray(recordmint, active_mints) != -1 &&'
    }



    if ( active_rulers.length != 0) {

   test += '$.inArray(recordruler, active_rulers) != -1 &&'

    }




    if ( active_periods.length != 0 ) {

  test += '$.inArray(recordperiod, active_periods) != -1 &&'
    }




    if ( active_metals.length != 0 ) {

  test +=  '$.inArray(recordmetal, active_metals) != -1 &&'


    }

    if (test.endsWith("&&") ) {

      test = test.slice(0, -2);



    }


    if (
      (active_metals.length == 0 || $.inArray(recordmetal, active_metals) != -1 )
      &&
      (active_periods.length == 0 || $.inArray(recordperiod, active_periods)  != -1)
      &&
      (active_mints.length == 0 || $.inArray(recordmint, active_mints)  != -1)
      &&
      (active_rulers.length == 0 || $.inArray(recordruler, active_rulers) != -1 )
    ) {




    $(this).addClass("visible").removeClass("hidden").removeClass("selected");

    }
    else {
    $(this).removeClass("selected").addClass("hidden").removeClass("visible");


    }
 });
}
  if (selected.length == 0) {

   $(".imghalf").each(function() {

       $(this).addClass("visible").removeClass("hidden").removeClass("selected");

   });


  }
  document.getElementById("filter_display").innerText = "Filters: " + selected;
  window.scrollTo(0, 0);
});
