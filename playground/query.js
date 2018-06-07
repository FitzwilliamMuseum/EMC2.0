//When search bar is typed in.
$('#main_search').on('search', function () {
  (function($){
      function processForm( e ){
          $.ajax({
              url: 'search.php',
              dataType: 'text',
              type: 'post',
              contentType: 'application/x-www-form-urlencoded',
              data: $(this).serialize(),
              success: function( data, textStatus, jQxhr ){
                  $('.search_results').html( data );
              },
              error: function( jqXhr, textStatus, errorThrown ){
                  console.log( errorThrown );
              }
          });

          e.preventDefault();
      }

      $('#search_form').submit( processForm );
  })(jQuery);
});
