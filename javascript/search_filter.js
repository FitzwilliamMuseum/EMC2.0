$(document).ready(function(){
  $('#Mint_list').addClass("hidden");
  $('#Period_list').addClass("hidden");
  $('#Parish_list').addClass("hidden");

  $('#mint_load_More').click(function() {

      $('#Mint_list').toggleClass("hidden");


  });
});
$(document).ready(function(){
  $('#Ruler_list').addClass("hidden");

  $('#Ruler_load_More').click(function() {

      $('#Ruler_list').toggleClass("hidden");


  });
});


  $('#Period_load_More').click(function() {

      $('#Period_list').toggleClass("hidden");


  });
  $('#Parish_load_More').click(function() {

      $('#Parish_list').toggleClass("hidden");


  });




        var selected = [];
        $('.css-checkbox').click(function() {
              var box = $(this).attr('name'); // Checboxes value
              var datatype = $(this).data("type"); // Checkboxes filter category


            if(this.checked) {    // If the checkbox has been checked
           selected.push($(this).attr('name')); // Push names of Selected filters into an array
        // Displays current filter selection to the user

          $(".imghalf").each(function() {  // Iterate through each record


            var  recordsdata = [];  // This creates an Array of all the records data attributes
            recordsdata.push($(this).data("mint"));
            recordsdata.push($(this).data("ruler"));
            recordsdata.push($(this).data("period"));
            var datainselection = []; // creates array for all the records data that is in current seleciton.


            if($.inArray(recordsdata[0], selected) != -1) {

              datainselection.push($(this).data("mint"));


            }
            if($.inArray(recordsdata[1], selected) != -1) {

              datainselection.push($(this).data("ruler"));


            }
            if($.inArray(recordsdata[2], selected) != -1) {

              datainselection.push($(this).data("period"));


            }

            var i = 0;
            var len = datainselection.length;
            for (; i < len; i++ ) {
               if ( $.inArray(datainselection[i], selected) != -1) {

                   var matchesall = "true";
                   continue;

               }
               else if ( $.inArray(datainselection[i], selected) != 1) {

                  var matchesall = "false";
                  break;

               }

               // if element IS in array continue, else if an element isn't in array break the loop and return the array as false.





            } // Loop that checks all the data in the selection matches the data in dataselection and breaks if one isn't met.
            //this is used for a test later on, that checks if the matches all variable is true.
              console.log(matchesall);
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


            }
            console.log(data);

            if( box != data)  { // If it doesn't match
              if ( $(this).hasClass( "selected" )) {
                if ( $.inArray(data, selected) != -1) {
                // if has class "selected"
                // And if any data the value of the selection IN THE ARRAY
                   }
                else { // If it doesn't match the value of the selection, remove that class.

                $(this).removeClass("selected").addClass("hidden").removeClass("visible");
                }
              } //code block for if element has class "selected" and doesn't match (i.e. if a second/third check is selected).
              else {
                   $(this).addClass("hidden").removeClass("visible");
              }
            }
           else {  // if the checkbox datas value matches the records
                 if ( matchesall == false ) { // if it doesn't match ALL the criteria hide it
                    $(this).removeClass("selected").addClass("hidden").removeClass("visible");

                 }
                 else if ( matchesall == true) {

                       $(this).addClass("selected").removeClass("hidden").addClass("visible");

                 }
                 }

      }); // End of iteration for when a box is checked.
      } //code block for if checkbox is checked.
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


                }



    if ( $.inArray(recordsdata[0], selected) != -1 ||
         $.inArray(recordsdata[1], selected) != -1 ||
         $.inArray(recordsdata[2], selected) != -1)

    {

  // If when unchecked, the values do not match
        // Need to make an array of all of records Data-attributes and compare it to those
        // first array needs iterating over.
         $(this).addClass("visible").removeClass("hidden").addClass("selected");

    }
    else {

       $(this).removeClass("selected").addClass("hidden").removeClass("visible");

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
new function clear() {

  if (selected.length === 0 ) {

  $(".imghalf").each(function() {

    $(this).addClass("visible").removeClass("hidden").removeClass("selected");

  });

    }
    document.getElementById("filter_display").innerText = selected;

    };
