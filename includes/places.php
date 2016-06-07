<?php

require '../vendor/autoload.php';

$google_places = new joshtronic\GooglePlaces('AIzaSyALVhOgeFiEdQePVTvVDNDl5PulEz_gJOM');

$lat = $_POST['lat'];
$lng = $_POST['lng'];
//$place_types = $_POST['place_types'];

$google_keyword = $_POST['place_types'];

$google_places->location = array($lat, $lng);
$google_places->radius = 8500; //hard-coded radius
//$google_places->types = $place_types;
//$google_places->keyword = "recycling|waste_management";
$google_places->keyword = "recycling";

//$nearby_places = $google_places->nearbySearch();
//$google_places->reference = '#reference#'; // Reference from search results
//$details                  = $google_places->details();

$nearby_places = $google_places->nearbySearch();


echo json_encode($nearby_places);


?>