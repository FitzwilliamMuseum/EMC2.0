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

// EMC / SCBI only filter



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



// BEGIN FILTER SCRIPT



        var selected = [];  // the current selection of applied filters.




        $('.css-checkbox').click(function() {



              var box = $(this).attr('name'); // the value of the box being checked.
              var datatype = $(this).data("type"); // Checkboxes filter category


            if(this.checked) {    // If the checkbox has been checked
           selected.push($(this).attr('name')); // Push names of Selected filters into an array
        // Displays current filter selection to the user


        $(".imghalf").each(function() {  // Iterate through each record


            var  recordsdata = [];  // This creates an Array of all the records data attributes
            recordsdata.push($(this).data("mint"));
            recordsdata.push($(this).data("ruler"));
            recordsdata.push($(this).data("period"));
            recordsdata.push($(this).data("metal"));
            var matched_data = []; // creates array for all the records data that is in current seleciton.


             // Following IF statements check records data array and puts the key into another array, if it matches
             // the filters value,  e.g. if filters selected value was "silver" it would put data into matched_data if
             // "silver" was the value of key 3 of the recordsdata array.



            if($.inArray(recordsdata[0], selected) != -1) {

              matched_data.push($(this).data("mint"));


            }
            if($.inArray(recordsdata[1], selected) != -1) {

              matched_data.push($(this).data("ruler"));


            }
            if($.inArray(recordsdata[2], selected) != -1) {

              matched_data.push($(this).data("period"));


            }
            if($.inArray(recordsdata[3], selected) != -1) {

              matched_data.push($(this).data("metal"));


            }

            var i = 0;
            var len = recordsdata.length;
            for (; i < len; i++ ) {
               if ( $.inArray(recordsdata[i], selected) == -1 ) { // if the records data doesn't match the active array

                 $(this).removeClass("selected").addClass("hidden").removeClass("visible");
                 continue; // cycle through every key

               }
               else {

               $(this).addClass("visible").removeClass("hidden").removeClass("selected");
               break;

               // if something matches display it and break the cycle
               }

            }

 console.log(recordsdata);
 console.log(selected);




            switch(datatype) {

            case "mint":
            var data = $(this).data("mint");
            break;
            case "ruler":
            var data = $(this).data("ruler");
            break;
            case "period":
            var data = $(this).data("period");
            break;
            case "parish":
            var data = $(this).data("mint");
            break;
            case "metal":
            var data = $(this).data("metal");
            break;


            }



      }); // End of iteration for when a box is checked.
    } //end of code block for if checkbox is checked.

     else  {

        var remove = $(this).attr('name');
        selected = $.grep(selected, function(value) {
              return value != remove;

    });

    $(".imghalf").each(function() {  // Iterate through each record


      var  recordsdata = [];  // This creates an Array of all the records data attributes.
      recordsdata.push($(this).data("mint"));
      recordsdata.push($(this).data("ruler"));
      recordsdata.push($(this).data("period"));
      recordsdata.push($(this).data("metal"));



                  switch(datatype) {

                  case "mint":
                  var data = $(this).data("mint");
                  break;
                  case "ruler":
                  var data = $(this).data("ruler");
                  break;
                  case "period":
                  var data = $(this).data("period");
                  break;
                  case "parish":
                  var data = $(this).data("mint");
                  break;
                  case "mint":
                  var data = $(this).data("metal");
                  break;


                }





    });

    }
  if (selected.length === 0 ) {

  $(".imghalf").each(function() {

    $(this).addClass("visible").removeClass("hidden").removeClass("selected");

  });

    }
    document.getElementById("filter_display").innerText = selected;

    });
