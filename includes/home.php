  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <div class="container">
    <div class="row">
      <div class="one-half column" style="margin-top: 2%">
        <h4>Home Page</h4>
        <p></p>
      </div>
    </div>
  </div>




<?php
/*
  require_once('../googlePlaces.php');
  require('search.php');




if (isset($_POST['submit'])) {

    $apiKey       = 'AIzaSyAvprgREuGctSdF2FRUdwe3q0dNeljN53c';
  $googlePlaces = new googlePlaces($apiKey);
    $address = $_POST['address']; // Google HQ
echo "<strong>Entered address: </strong>" . $address;

// creating a prepared address string by replacing all spaces in the entered address by '+' signs so as to feed it to the Google Maps API
$prepAddr = str_replace(' ','+',$address);
echo "<strong>Prepared address:</strong> " . $prepAddr;

// fetching data from Google Maps API with the prepared address string
$geocode_url = "http://maps.google.com/maps/api/geocode/json?address=" . $prepAddr. "&sensor=false";

// converting the received JSON array to a PHP variable
$output = json_decode(file_get_contents($geocode_url));

// fetching the 'lat' and 'lng' array items
$userLat = $output->results[0]->geometry->location->lat;
$userLng = $output->results[0]->geometry->location->lng;

echo "<strong>Latitude: </strong>" . $userLat;
echo "<strong>Longitude: </strong>" . $userLng;



  // Set the longitude and the latitude of the location you want to search near for places

    $latitude = $userLAT;
    $longitude = $userLNG;
    $googlePlaces->setLocation($latitude . ',' . $longitude);

    $googlePlaces->setRadius(5000);
    $results = $googlePlaces->nearbysearch(); //


    foreach ($results as $result) {
      $json = json_encode($result);
      echo $json;
    }
}
*/
?>



  <!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
