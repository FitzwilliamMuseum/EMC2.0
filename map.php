<html>
<?php include("components/dbconnect.php")?>
<?php include("components/map_components/map_head.php") ?>
<?php /* This is the script file that returns the heatmap data */
 include("components/map_components/geoscript2.php")
?>
<body>
<div class="body_wrap">
<?php include("components/layout/navbar.php") ?>
<div class="Right_Side">
<div class="map_section_one">

    <h1>Heatmap Results </h1>
    <p> This heatmap is generated from <?php echo count($mapresults); ?> Results. </p>
    <p> This Map was generated from an initial request of '<?php echo $query ?>' </p>

    </div>
    <div id="floating-panel">
  <button onclick="changeRadius()">Change radius</button>
</div>
       <div id="map"></div>
      <script>

/* Builds the Map, sets it to focus on London */

       var map, heatmap;
       function initMap() {
       map = new google.maps.Map(document.getElementById('map'), {
       zoom: 8,
       center: {lat: 51.509865, lng:	-0.118092},
       mapTypeId: 'terrain'
       });




/* This sets the heat maps Data to be the Array from the PHP script. */

       var heatmapData =[
      <?php foreach ($data_jsons as $data_json) {
        echo $data_json;
          };
       ?>
     ]


    heatmap = new google.maps.visualization.HeatmapLayer({
      data: heatmapData,
      dissipating: true,
      radius: 50




      });

heatmap.setMap(map);



}
function changeRadius() {
heatmap.set('radius', heatmap.get('radius') ? null : 50);
}


  </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDECxddYXYSqB7pqCaeyT5sIAgqQZQ8_DI&libraries=visualization&callback=initMap"
    async defer></script>
  </div>
</div>
  </body>
<?php include("components/layout/footer.php") ?>

</html>
