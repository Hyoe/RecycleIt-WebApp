     var map;
      function initMap() {

      if (navigator.geolocation) { //GEO LOCATION, FINDS USERS LOCATION
        navigator.geolocation.getCurrentPosition(function(position) {

          pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          }

          map = new google.maps.Map(document.getElementById('map'), {
            center: myLocation,
            zoom: 13
          });

          infowindow = new google.maps.InfoWindow({
            map: map
          });

          map.setCenter(pos);
          var myLocation = pos; //Sets variable to geo location long and lat co-ordinates.

          var service = new google.maps.places.PlacesService(map);
          service.nearbySearch({
            location: myLocation, //Uses geolocation to find the following
            radius: 6000,
            keyword: "(recycling centers)" OR "(waste)"
          }, callback);
              //service = new google.maps.places.PlacesService(map);
              //service.textSearch(request, callback);
        })
      };
    }

    function callback(results, status) {
      if (status === google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
          createMarker(results[i]);
        }
      }
    }

    function createMarker(place) {
      var placeLoc = place.geometry.location;
      var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location
      });

      google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(place.name);
        infowindow.open(map, this);
      });
    }

