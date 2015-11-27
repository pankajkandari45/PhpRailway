<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions service</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
#floating-panel {
  position: absolute;
  top: 10px;
  left: 25%;
  z-index: 5;
  background-color: #fff;
  padding: 5px;
  border: 1px solid #999;
  text-align: center;
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}

    </style>
  </head>
  <body>

    <div style="height:80%; width:80%">
    <?php 
    $from = $_REQUEST["from"]; 
    $to =   $_REQUEST["to"];
    ?>
    <div id="floating-panel">
    <b>Start: </b>
     <select id="start" onchange="calcRoute();">
      <option value="Dehradun">Select source</option>
      <option value="<?php echo $from ?>"><?php echo $from ?></option>    
    </select>
    <b>End: </b>
    <select id="end" onchange="calcRoute();">
      <option value="Delhi">Select destination</option>
      <option value="<?php echo $to ?>"><?php echo $to ?></option>
    </select>
    </div>

    <div id="map"></div>

    
    <script>
function initMap() {
  var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer;
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: {lat: 30.3180, lng: 78.0290}
  });
  directionsDisplay.setMap(map);

  var onChangeHandler = function() {
    calculateAndDisplayRoute(directionsService, directionsDisplay);
  };
  document.getElementById('start').addEventListener('change', onChangeHandler);
  document.getElementById('end').addEventListener('change', onChangeHandler);
}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
  directionsService.route({
    
    origin: document.getElementById('start').value,
    destination: document.getElementById('end').value,
    travelMode: google.maps.TravelMode.TRANSIT
  }, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZIIdRuFBN2a7o_r89BRyV06k4_4Ym1s4&signed_in=true&callback=initMap"
        async defer></script>

      </div>
  </body>
</html>