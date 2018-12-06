$(document).ready(function(){
  $('#Mint_list').addClass("hidden");
  $('#Period_list').addClass("hidden");
  $('#Parish_list').addClass("hidden");
  $("#Moneyer_list").addClass("hidden");
  $('#mint_load_More').click(function() {

      $('#Mint_list').toggleClass("hidden");
      $('#Period_list').addClass("hidden");
          $('#Moneyer_list').addClass("hidden");


  });
});
$(document).ready(function(){
  $('#Ruler_list').addClass("hidden");

  $('#Ruler_load_More').click(function() {

      $('#Ruler_list').toggleClass("hidden");
        $('#Period_list').addClass("hidden");
            $('#Moneyer_list').addClass("hidden");
              $('#Mint_list').addClass("hidden");


  });
});


  $('#Period_load_More').click(function() {

      $('#Period_list').toggleClass("hidden");
        $('#Ruler_list').addClass("hidden");
          $('##Moneyer_list').addClass("hidden");


  });
  $('#Parish_load_More').click(function() {

      $('#Parish_list').toggleClass("hidden");


  });
  $('#Moneyer_load_More').click(function() {

      $('#Moneyer_list').toggleClass("hidden");
      $('#Ruler_list').addClass("hidden");
        $('#Period_list').addClass("hidden");


  });

// Get your select dropdown by id (eg: $('#filtlist');)
var select = document.getElementById('filtlist');


// Apply an event listener with callback to select element
// (eg: select.on('change', callbackfunction());)
select.addEventListener('change', e => {
  // get all matching elements to classname ( $('.imghalf'); )
  var elements = document.getElementsByClassName('imghalf');

  // if selected option is '' make everything visible and return
  if (e.target.value === '') {
    Array.prototype.forEach.call(elements, val => { val.classList.remove('hidden') });
    return;
  }
  // grab and format selected option to a number
  var option = Number(e.target.value);

  //  Foreach is exactly what you would expect for each value in collection, do this function (maybe - $.each(elements, function); )
  Array.prototype.forEach.call(elements, val => { val.classList.add('hidden'); });
  // filter by matching data option to select option, returns HTMLCollection
  let visible = Array.prototype.filter.call(elements, val => Number(val.dataset.emcscbi) === option);
  // Make matching elements visible
  Array.prototype.forEach.call(visible, val => { val.classList.remove('hidden') })
});




// Define the arrays for later use

    var selected = [];
    var active_mints = [];
    var active_moneyers = [];
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
  case "moneyer":
  active_moneyers.push($(this).attr('name'));
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
         var recordmoneyer =  $(this).data("moneyer");
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




        if ( active_moneyers.length != 0 ) {

      test +=  '$.inArray(recordmetal, active_moneyers) != -1 &&'


        }

        if (test.endsWith("&&") ) {

          test = test.slice(0, -2);



        }



    //   if ((eval(test))) {
    if (
      (active_moneyers.length === 0 || $.inArray(recordmoneyer, active_moneyers) != -1 )
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
   case "moneyer":
   active_moneyers = $.grep(active_moneyers, function(value) {
         return value != remove;

   });
   active = active_moneyers;
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
     var recordmoneyer =  $(this).data("moneyer");
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




    if ( active_moneyers.length != 0 ) {

  test +=  '$.inArray(recordmoneyer, active_moneyers) != -1 &&'


    }

    if (test.endsWith("&&") ) {

      test = test.slice(0, -2);



    }


    if (
      (active_moneyers.length == 0 || $.inArray(recordmoneyer, active_moneyers) != -1 )
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
