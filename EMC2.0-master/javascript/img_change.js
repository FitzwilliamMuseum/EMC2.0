$(document).ready(function(){

$( ".coinimg" ).mouseenter(function() {

  
                      // Set URL as variable
var imgurl = $(this).attr("src");
var imgurlrev = imgurl.replace("obv", "rev");

$( this ).attr("src", imgurlrev);

}).mouseout(function() {

var imgurl = $(this).attr("src");
var imgurlobv = imgurl.replace("rev", "obv");

$( this ).attr("src", imgurlobv);


});

});


// function() { $( this ).attr("src", "") ;
// change image source to be rev instead of obv
