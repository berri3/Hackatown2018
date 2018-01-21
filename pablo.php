<?php 
$my_dir = dirname ( __FILE__ );
require_once $my_dir . '/CsvParser.php';
require_once $my_dir . '/MapItem.php';

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
    
		$dlat= $xml->result->geometry->location->lat;
		$dlng=$xml->result->geometry->location->lng;
		
		echo "<br><br>Latitude: ".$dlat."Longtitude: ".$dlng;
		
		$csv = "OpenData/pabloData.csv";
		
		$csvReader = new CsvParser();
		
		$array = $csvReader->parseFileToMapItem($csv);
		
    ?>
    <script>
      function initMap() {
        var montreal = {lat: <?php echo $dlat;?>, lng: <?php echo $dlng;?>};
        
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: montreal
        });
        var marker = new google.maps.Marker({
          position: montreal,
          map: map
        });

		<?php 
		
		for($i=0;$i<5;$i++){
			$lat = $array{$i}->getLatitude();
			$lng = $array{$i}->getLongitude();
			
	        echo "var marker = new google.maps.Marker({
	          position: {lat: $lat, lng: $lng},
	          map: map
	        });";
			
		};
		
		
		
		foreach($array as $item){
			$lat = $item->getLatitude();
			$lng = $item->getLongitude();
			
			//echo sqrt(($lat-$dlat)*($lat-$dlat)+($lng-$dlng)*($lng-$dlng));
			
			$r = 6371e3;
			$p1 = deg2rad ($lat);
			$p2 = deg2rad ((float)$dlat);			
			$dp = deg2rad ($dlat-$lat);
			$dl = deg2rad ($dlng-$lng);
			
			$a = sin($dp/2) * sin($dp/2) +
				cos($p1)*cos($p2) *
				sin($dl/2) * sin($dl/2);
			$c = 2 * atan2(sqrt($a), sqrt(1-$a));
			$d = $r * $c;
				
			
				
			
			
			if( $d <= 200){
				echo "var marker = new google.maps.Marker({
			position: {lat: $lat, lng: $lng},
			map: map
			});";
			}
			
			
		};
		
		?>
        
        
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9QPFxdwmLkIhPSBdaD_eiBbM7m7HHV9o&callback=initMap">
    </script>
  </body>
</html>