<?php

require '../vendor/autoload.php';

$google_places = new joshtronic\GooglePlaces('AIzaSyALVhOgeFiEdQePVTvVDNDl5PulEz_gJOM');

$lat = $_POST['lat'];
$lng = $_POST['lng'];
//$place_types = $_POST['place_types'];

$google_keyword = $_POST['place_types'];

$google_places->location = array($lat, $lng);
$google_places->radius = 8046; //hard-coded radius
//$google_places->types = $place_types;
$google_places->keyword = "recycling";
//$google_places->keyword = "waste";
//$google_places->reference = 'ChIJv8eIzs4r3YARlyg_wEI49l8';
//$details = $google_places->details();


//$nearby_places = $google_places->nearbySearch();

$google_places->reference = '#reference#'; // Reference from search results
$details                  = $google_places->details();


$nearby_places = $google_places->nearbySearch();

echo json_encode($nearby_places);

?>