<?php

require 'vendor/autoload.php';

$google_places = new joshtronic\GooglePlaces('AIzaSyAvprgREuGctSdF2FRUdwe3q0dNeljN53c');

$lat = $_POST['lat']
$lng = $_POST['lng'];
$place_types = $_POST['place_types'];

$google_places->location = array($lat, $lng);
$google_places->radius = 8046; //hard-coded radius
$google_places->types = $place_types;
$nearby_places = $google_places->nearbySearch();

echo json_encode($nearby_places);
?>
