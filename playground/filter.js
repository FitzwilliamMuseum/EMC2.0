
    var selected = [];
    $('.css-checkbox').click(function() {
          var box = $(this).attr('name');


        if(this.checked) {    // If the checkbox has been checked
       selected.push($(this).attr('name')); // Push names of Selected filters into an array
    // Displays current filter selection to the user

      $(".imghalf").each(function() {  // Iterate through each record
        var data = $(this).data("mint");
        if( box !== data)  {
          if ( $(this).hasClass( "selected" )) {  // if has class "selected"
            if (box == data) { } // And if matches the value of the selection.
            else { // If it doesn't match the value of the selection, remove that class.
            $(this).removeClass("selected")
            }
          } //code block for if element has class "selected" and doesn't match (i.e. if a second/third check is selected).

          else {
               $(this).addClass("hidden").removeClass("visible");
          }
       else {

          $(this).addClass("selected")
    }
      }
    }); // End of iteration for when a box is checked.
  }; //code block for if checkbox is checked.
 else  {

    var remove = $(this).attr('name');
    selected = $.grep(selected, function(value) {
          return value != remove;

});

$(".imghalf").each(function() {  // Iterate through each record
  var data = $(this).data("mint");
  console.log(data);
  if( box !== data ) {
     $(this).addClass("visible").removeClass("hidden")
}
else {

   $(this.removeClass("selected"))

}
});

}
document.getElementById("filter_display").innerText = selected;

});
