
function initMap() {

var lat = 18.35827827454; //default latitude
var lng = 121.63744354248; //default longitude
var home_coordinates = new google.maps.LatLng(lat, lng); //set default coordinates


var map_options = {
  center: new google.maps.LatLng(lat, lng), //set map center
  zoom: 17, //set zoom level to 17
  mapTypeId: google.maps.MapTypeId.ROADMAP //set map type to road map
};

var input = document.getElementById('search'); //get element to use as input for autocomplete
var autocomplete = new google.maps.places.Autocomplete(input); //set it as the input for autocomplete
autocomplete.bindTo('bounds', map); //bind auto-complete object to the map

//executed when a place is selected from the search field
google.maps.event.addListener(autocomplete, 'place_changed', function(){

    //get information about the selected place in the autocomplete text field
    var place = autocomplete.getPlace();

    if (place.geometry.viewport){ //for places within the default view port (continents, countries)
      map.fitBounds(place.geometry.viewport); //set map center to the coordinates of the location
    } else { //for places that are not on the default view port (cities, streets)
      map.setCenter(place.geometry.location);  //set map center to the coordinates of the location
      map.setZoom(17); //set a custom zoom level of 17
    }

    home_marker.setMap(map); //set the map to be used by the  marker
    home_marker.setPosition(place.geometry.location); //plot marker into the coordinates of the location

});

var markers_array = [];

function removeMarkers(){
  for(i = 0; i < markers_array.length; i++){
    markers_array[i].setMap(null);
  }
}

$('#find-places').click(function(){

  var lat = home_marker.getPosition().lat();
  var lng = home_marker.getPosition().lng();

  var place_types = [];

  //loop through all the place types that has been checked and push it to the place_types array
  $('#place-types input:checked').each(function(){
    var type = $(this).data('type');
    place_types.push(type);
  });

  removeMarkers(); //remove the current place type markers from the map

  //make a request to the server for the matching places
  $.post(
    'places.php',
    {
      'lat': lat,
      'lng': lng,
      'place_types': place_types
    },
    function(response){

      var response_data = JSON.parse(response);

      if(response_data.results){
        var results = response_data.results;
        var result_count = results.length;

        for(var x = 0; x < result_count; x++){

          //get coordinates of the place
          var lat = results[x]['geometry']['location']['lat'];
          var lng = results[x]['geometry']['location']['lng'];

          //create a new infowindow
          var infowindow = new google.maps.InfoWindow();

          //plot the marker into the map
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat, lng),
            map: map,
            icon: results[x]['icon']
          });

          markers_array.push(marker);

          //assign an infowindow to the marker so that when its clicked it shows the name of the place
          google.maps.event.addListener(marker, 'click', (function(marker, x){
            return function(){
              infowindow.setContent("<div class='no-scroll'><strong>" + results[x]['name'] + "</strong><br>" + results[x]['vicinity'] + "</div>");
              infowindow.open(map, marker);
            }
          })(marker, x));


        }
      }

    }
  );

});





/*
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: 36.65445, lng: -121.801764}
        });
        var geocoder = new google.maps.Geocoder();

        document.getElementById('initSubmit').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
        });
      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === google.maps.GeocoderStatus.OK) {
            resultsMap.setCenter(results[0].geometry.location);
            document.getElementById('userLat').value = results[0].geometry.location.lat();
            document.getElementById('userLng').value = results[0].geometry.location.lng();
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }

      var markers_array = [];

      function removeMarkers(){
        for(i = 0; i < markers_array.length; i++){
          markers_array[i].setMap(null);
        }
      }
*/





/*
var userLat;
var userLng;

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: 36.65445, lng: -121.801764}
        });
        var geocoder = new google.maps.Geocoder();

        document.getElementById('submit').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
        });
      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === google.maps.GeocoderStatus.OK) {
            resultsMap.setCenter(results[0].geometry.location);
            userLat = results[0].geometry.location.lat();
            userLng = results[0].geometry.location.lng();
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
      */