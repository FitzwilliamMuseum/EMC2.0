// This function is triggered when somebody types something into the search bar.
// This sends data to a .php script which executes a function, it also returns that data and puts it into "Search_results"

function showResult(str, str2) {
  if (str.length==0) {
    document.getElementById("Search_Result").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("Search_Result").innerHTML=this.responseText;

    }
  }
  xmlhttp.open("POST","script_for_ajax.php?q="+str + "&q2="+str2 , true);
  xmlhttp.send();
  return false;
}

// This function loads the advanced search page when "advanced search is clicked"

function loadadvanced() {

  $(function() {

       $('.Welcome_Right').hide();
       $('.Search_Right').hide();
       $('.Advanced_search_right').show();


});
return false;

};

// This captures the URL when "full record" is clicked, chunks  it up and uses the value (emc number) to do a query which returns the coin somebody has clicked on. It also delays to ensure that the query loads properly.


 function printurl(delay) {


var url = $(location).attr("href");
var split = url.split("=")
var split_url = split[1]

xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("full_result").innerHTML=this.responseText;

    }
  }
xmlhttp.open("POST","Coindetail.php?q="+split_url,true);
xmlhttp.send();


}

var delay = 100;

// This simply raplaces  an image with a placeholder if the record doesn't have one.

function imgError(image) {
   image.onerror = "";
   image.src = "images/noimage.jpg";
  return true;}

// This shows the filters after somebody has started typing in the emc search bar
  function showfilters() {
  str2 = $(".search_bar").val().length;
  var x = window.matchMedia("(min-width: 700px)")
  $('.search_bar').keyup(function() {
    if (str2 > 2 && x.matches) {
             $('#select_wrap').css("display","flex");
             return false;
         } else {
         $('#select_wrap').hide();
         $('#Search_Result').css("margin-top","50px");
         };


   });

   };
