$( document ).ready(function() {
// Read a page's GET URL variables and return them as an associative array.
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
// define the list of navigable records as an array
var pairs = location.search.slice(0).split('&');
pairs.shift();
var navrecords = [];
pairs.forEach(function(pair) {
    pair = pair.split('=');
    navrecords[pair[0]] = decodeURIComponent(pair[1] || '');
});
// Define the objnum as a variable
var recordid = getUrlVars()["link"];
recordid = String(recordid);
// Find index of the objnum in the Array and set a variable which is the index
var coinindex = $.inArray( recordid, navrecords );
var coinindexup = $.inArray( recordid, navrecords );
// decrement to the next coin in the array unless it's the last coin already,
// in which case hide the button
if (coinindex > 0) {
coinindex = coinindex -1;
}
else  {
$("#leftbutton").css("display", "none" );

}



// Determine if the right button should be displayed

var x = navrecords.length;
x = x -1 ;
console.log(navrecords);
if (coinindexup != x) {


 coinindexup = coinindexup +1 ;

}
else if (coinindexup == x) {
  $("#rightbutton").css("display", "none" );

}
else {

}

newrecord = navrecords[coinindex];
newrecordup = navrecords[coinindexup];
// declare empty string which will hold the query string
var resultset = "";
for (var i in navrecords)
{

  test = i + "=" + navrecords[i] + "&"; // concat the navigable record into a query string
   resultset += test;


}

newurl = "https://emc.fitzmuseum.cam.ac.uk/Emcfullrecord.php?link=" + newrecord + "&" + resultset;
$("#leftbutton").attr("href", newurl );
// Handler for .load() called.
newurlup = "https://emc.fitzmuseum.cam.ac.uk/Emcfullrecord.php?link=" + newrecordup + "&" + resultset;
$("#rightbutton").attr("href", newurlup );




});


$("body").keydown(function(e){
    // left arrow
    if ((e.keyCode || e.which) == 37)
    {
      $("#leftbutton")[0].click();
        // click the left button, i.e. go to the next coin down.
    }
    // right arrow
    if ((e.keyCode || e.which) == 39)
    {
        $("#rightbutton")[0].click();
        // click the right button, i.e. go to the next coin up.
    }
  
});

