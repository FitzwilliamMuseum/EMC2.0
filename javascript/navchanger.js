// The functions in this file do the following - 
//  Grabs the handler of the clicked navbar item, hides alls of the right side divs not associated with that navbar item and shows the navbar item associated with the clicked navbar item.
// they also ensure the footer goes to the bottom of the page.


   $(function() {
       $('.Welcome').click(function() {
           $('.Search_Right').hide();
           $('.Map_Right').hide();
           $('.Welcome_Right').show();
            $('.Advanced_search_right').hide();
              $('.About_Right').hide();
                $('.contact_right').hide();
                  $('.Search_help_right').hide();
                    $('.further_reading_right').hide();
                  $('.Footertest').css(
                 {'position':'relative',
                  'top': '0px'

               });
           return false;
       });
   });

   $(function() {
       $('.Further_Reading').click(function() {
           $('.Search_Right').hide();
           $('.Map_Right').hide();
           $('.Search_help_right').hide();
           $('.Welcome_Right').hide();
            $('.Advanced_search_right').hide();
            $('.About_Right').hide();
             $('.contact_right').hide();
                $('.further_reading_right').show();
             $('.Footertest').css(
            {'position':'relative',
             'top': '0px'

          });

           return false;
       });
   });
   $(function() {
       $('.Contact').click(function() {
           $('.Search_Right').hide();
           $('.Map_Right').hide();
           $('.Search_help_right').hide();
           $('.Welcome_Right').hide();
            $('.Advanced_search_right').hide();
            $('.About_Right').hide();
             $('.contact_right').show();
               $('.further_reading_right').hide();
             $('.Footertest').css(
            {'position':'relative',
             'top': '0px'

          });

           return false;
       });
   });
   $(function() {
       $('.About').click(function() {
           $('.Search_Right').hide();
           $('.Map_Right').hide();
           $('.Search_help_right').hide();
           $('.Welcome_Right').hide();
            $('.Advanced_search_right').hide();
            $('.About_right').show();
             $('.contact_right').hide();
               $('.further_reading_right').hide();
             $('.Footertest').css(
            {'position':'relative',
             'top': '0px'

          });
           return false;
       });
   });
   $(function() {
       $('.Search').click(function() {
           $('.Search_Right').show();
           $('.Map_Right').hide();
           $('.Search_help_right').hide();
            $('.Welcome_Right').hide();
             $('.Advanced_search_right').hide();
             $('.contact_right').hide();
               $('.About_right').hide();
                 $('.further_reading_right').hide();
           $('.Footertest').css(
          {'position':'relative',
           'top': '0px'

       });
    return false;
   });
});
   $(function() {
       $('.Search_help').click(function() {
           $('.Search_Right').hide();
           $('.Map_Right').hide();
           $('.Search_help_right').show();
            $('.Welcome_Right').hide();
             $('.Advanced_search_right').hide();
               $('.contact_right').hide();
                 $('.further_reading_right').hide();
                 $('.About_right').hide();
           $('.Footertest').css(
          {'position':'relative',
           'top': '0px'

       });
    return false;
   });
});
   $(function() {
       $('.Map').click(function() {
           $('.Search_Right').hide();
           $('.Map_Right').show();
           $('.Welcome_Right').hide();
            $('.Advanced_search_right').hide();
            $('.Search_help_right').hide();
             $('.contact_right').hide();

           return false;
       });
   });
$(document).ready(function () {
    if(window.location.href.indexOf("#Search_Right") > -1) {
      $(function() {

           $('.Search_Right').show();
           $('.About_right').hide();
           $('.Map_Right').hide();
           $('.Welcome_Right').hide();
          $('.Advanced_search_right').hide();
           $('.contact_right').hide();
             $('.further_reading_right').hide();


    return false;
   });
};

});
    if(window.location.href.indexOf("#Search_Right") > -1) {
      $(function() {

           $('.Search_Right').show();
           $('.About_right').hide();
           $('.Map_Right').hide();
           $('.Welcome_Right').hide();
          $('.Advanced_search_right').hide();
           $('.contact_right').hide();
             $('.further_reading_right').hide();


    return false;
   });
};


