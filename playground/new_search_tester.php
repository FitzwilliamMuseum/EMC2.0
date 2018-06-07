<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">


<script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("search_results").innerHTML="";
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
      document.getElementById("search_results").innerHTML=this.responseText;

    }
  }
  xmlhttp.open("POST","search.php?q="+str, true);
  xmlhttp.send();
  return false;
}
</script>
<style>

body {

   font-family: 'PT Sans', sans-serif;
 width: 100%;
 height: auto;
 box-sizing: border-box;
 margin: 0;
 background-color: #F7F8F9;


}

h1 {

  font-family: 'PT Sans', sans-serif;

font-weight: 700;
margin: 10px;
margin-right: 5px;
margin-left: 5px;
font-size: 16px;
min-width: 61px;

}

.Nav_content > h1 {

 height: auto;
 margin: 0;
 padding-top: 15px;
 padding-bottom: 15px;
 color: white;
 transition:color 0.70s ease;



}

.Nav_content > h1:hover {

color: #AA7539;


}

button {

 border: 0;
 padding: 0;
 background: #F7F8F9;
}

button:focus {outline:0;}

.App_wrap {

  width: 100%;
  height: auto;
  display: flex;
  flex-wrap: wrap;



}

.Nav_bar {

 width: 100%;
 height: auto;
 display: flex;
 flex-wrap: wrap;
 background: #313A75;

}

.Nav_content {

width: 150px;
height: 50px;
text-align: center;


}

.search_wrap {

 width: 100%;
 height: auto;
 display: flex;
 flex-wrap: wrap;

}

.left_side {

width: 25%;
height: 100%;




}

.right_side {

width: 75%;
height: auto;


}

.search_column {

width: 200px;
height: 500px;
display: flex;
flex-wrap: wrap;
margin-bottom: auto;


}

.column_content {

width: 100%;
display: flex;
height: 38px;


}

.search_row {

width: auto;
margin-right: auto;
height: 500px;
display: flex;
flex-wrap: wrap;


}


.select-style {
    border: 1px solid #ccc;
    width: 120px;
    height: 35px;
    font-size: 16px;
    border-radius: 0px;
    overflow: hidden;
    background:#F7F8F9 url("img/icon-select.png") no-repeat 90% 50%;
    margin: 0;
}

.select-style select {
    padding: 5px 8px;
    width: 130%;
      font-size: 16px;
    border: none;
    box-shadow: none;
    background: transparent;
    background-image: none;
    -webkit-appearance: none;
    background: #F7F8F9
}

.select-style select:focus {
    outline: none;
}


.search_bar_wrap {

width: 100%;
margin: auto;
    display: flex;


}

.search_bar {

width: 350px;
height: 37px;
font-size: 16px;
margin: 0;
margin-left: 0px;

}

.search_results {

  width: 100%;
  height: 500px;
  margin: 0;

}

.checkbox_list {

width: 200px;
height: 125px;
display: flex;
flex-wrap: wrap;
text-align: left;
overflow-y: scroll;


}
.checkbox_wrap {
 width: 100%;
 height: auto;
 margin: 8px;


}
.checkbox {

width: 10px;
height: auto;


}

.hidden {
	display:none;
}

.visible {
	display:block;
}
input[type=checkbox].css-checkbox {
							position:absolute; z-index:-1000; left:-1000px; overflow: hidden; clip: rect(0 0 0 0); height:1px; width:1px; margin:-1px; padding:0; border:0;
						}

						input[type=checkbox].css-checkbox + label.css-label {
							padding-left:35px;
							height:30px;
							display:inline-block;
							line-height:30px;
							background-repeat:no-repeat;
							background-position: 0 0;
							font-size:14px;
							vertical-align:middle;
							cursor:pointer;

						}

						input[type=checkbox].css-checkbox:checked + label.css-label {
							background-position: 0 -30px;
						}
						label.css-label {
				background-image:url(http://csscheckbox.com/checkboxes/u/csscheckbox_f60067e68146be412873f96f1d2458cd.png);
				-webkit-touch-callout: none;
				-webkit-user-select: none;
				-khtml-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
			}
</style>
<body>
<div class="App_wrap">
<div class="Nav_bar">
<div class="Nav_content"><h1>Welcome</h1></div>
<div class="Nav_content"><h1>Search<h1></div>
<div class="Nav_content"><h1>About</h1></div>
</div>
<div class="search_wrap">
 <!-- flex box, main wrapper. -->
 <div class="left_side">
 <div class="search_column"> <!-- contains the heatmapping button and filters -->
   <div class="column_content">
   <h1> Generate a Heatmap: </h1>

   </div>
 <input class="search_select" type="submit" value="Heatmap"></input>
 <div class="column_content">
 <h1> Apply filters: </h1>
 </div>
  <div class="column_content">
 <h1>Mints</h1><button id="mint_load_More">+show options</button>
</div>
 <div class="checkbox_list" id="Mint_list">
 <?php include 'Load_mints.php' ?>
  <?php echo $tablecontent; ?>
</div>
<div class="column_content">
<h1>Rulers</h1><button id="Ruler_load_More">+show options</button>
</div>
<div class="checkbox_list" id="Ruler_list">
<?php include 'Load_rulers.php' ?>
 <?php echo $tablecontent; ?>
</div>
<div class="column_content">
<h1>Periods</h1><button id="Period_load_More">+show options</button>
</div>
<div class="checkbox_list" id="Period_list">
<?php include 'Load_periods.php' ?>
 <?php echo $tablecontent; ?>
</div>
<div class="column_content">
<h1>Parishes</h1><button id="Parish_load_More">+show options</button>
</div>
<div class="checkbox_list" id="Parish_list">
<?php include 'Load_parish.php' ?>
 <?php echo $tablecontent; ?>
</div>
<div class="column_content">
<h1> Applied filters: </h1>
</div>
<div class="column_content">
<div class="column_content" id="filter_display">

</div>
</div>
</div>
 </div>
 <div class="right_side">
<div class="search_row"> <!-- contains the column selector, searchbar and a hamburger menu -->
<div class="search_bar_wrap">
<div class="select-style">
<form name="search_form" id="search_form">
<select class="search_select">
<option>Any</option>
<option>Mint</option>
<option>Rulers</option>
</select>
</div>
<input class="search_bar" type="search" id="main_search" onkeyup="showResult(this.value);"></input>
</form>
</div>
</div>
<div class="search_results" id="search_results"> <!--contains AJAX search results -->
</div>

</div>
</div>
</div>
</body>
<script type="text/javascript">
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




</script>
