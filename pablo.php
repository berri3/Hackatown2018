<?php 
if (! empty ( $_GET ['action'] )) {
	$address = $_GET ['address'];
}
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <h3>My Pablo Maps Demo</h3>
    
    <?php 
    echo $address;
    ?>
    
    <div id="map"></div>
    <?php 
   		$xmlFile =  "https://maps.googleapis.com/maps/api/geocode/xml?address=" . $address . "&key=AIzaSyD5tTXTXwvNSZyrA-qJE_vKjEwnG1YwKA8";
    
		$xml=simplexml_load_file($xmlFile) or die("Error: Cannot create object");
		print_r($xml);
    
		$lat= $xml->result->geometry->location->lat;
		$lng=$xml->result->geometry->location->lng;
		
		echo "<br><br>Latitude: ".$lat."Longtitude: ".$lng;
		
    ?>
    <script>
      function initMap() {
        var montreal = {lat: <?php echo $lat;?>, lng: <?php echo $lng;?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: montreal
        });
        var marker = new google.maps.Marker({
          position: montreal,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9QPFxdwmLkIhPSBdaD_eiBbM7m7HHV9o&callback=initMap">
    </script>
  </body>
</html>