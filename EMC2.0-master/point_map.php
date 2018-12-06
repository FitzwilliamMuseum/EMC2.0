<?php

include("components/search_components/fusion_map_query.php");

?>

<!DOCTYPE html>
<html>
<?php include("components/layout/header.php") ?>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Fusion Tables queries</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {


        width: 100%;
        min-height: 700px;
      }
      /* Optional: Makes the sample page fill the window. */
    </style>
  <body>
    <div class="body_wrap">
        <?php include("components/layout/navbar.php") ?>
        <div class="Right_Side">
        <h1> Map results </h1>
    <div id="map"></div>
    <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 51.509865, lng: -0.118092},
          zoom: 12,
          mapTypeId: 'terrain'

        });


        var layer = new google.maps.FusionTablesLayer({
          query: {
            select: 'Latitude',
            from: '1Pv2W_Gul-Zxri2pOYwDf_S4tZcf1F6IsF9Swf4GS',
            where: <?php  echo "\" $conditions  \""  ?>
          },
            options: {
     styleId: 2,
     templateId: 2
   },
          styles: [{

            markerOptions: {


               iconName: "large_red"


            }

          }]
        });


        layer.setMap(map);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDECxddYXYSqB7pqCaeyT5sIAgqQZQ8_DI&libraries=visualization&callback=initMap"
>
    </script>
  </div>
</div>
<?php include("components/layout/footer.php") ?>

  </body>
</html>
