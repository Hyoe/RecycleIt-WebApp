function initMap() {

  var lat = 39.322241; //default latitude
  var lng = -99.648438; //default longitude
  var homeLatlng = new google.maps.LatLng(lat, lng); //set default coordinates

  var home_coordinates = new google.maps.LatLng(lat, lng); //set default coordinates
  var map_options = {
    center: new google.maps.LatLng(lat, lng), //set map center
    zoom: 17, //set zoom level to 17
    mapTypeId: google.maps.MapTypeId.ROADMAP //set map type to road map
  };

  var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';

  var home_marker = new google.maps.Marker({
    map: map,
    anchorPoint: new google.maps.Point(0, -29),
    draggable: true,
    position: homeLatlng,
    icon: iconBase + 'homegardenbusiness_maps.png'
  });

  home_marker.infowindow = new google.maps.InfoWindow({
    content: ('<div><strong>' + 'Home Marker</strong>' + '<br>Drag and Click the Find Places button <br>to perform another search</div>')
  });

  home_marker.addListener('click', function() {
    home_marker.infowindow.open(map, home_marker);
    infowindow.close()
  });

  var map = new google.maps.Map(document.getElementById('map-canvas'), {
    center :{lat, lng},
    zoom: 4,
    mapTypeControl: true,
    mapTypeControlOptions: {
      position: google.maps.ControlPosition.LEFT_BOTTOM
    },
  });

google.maps.event.addDomListener(window, "resize", function() {
    var center = map.getCenter();
    google.maps.event.trigger(map, "resize");
    map.setCenter(center);
});

  var service = new google.maps.places.PlacesService(map);
      //if the position of the marker changes set latitude and longitude to
      //current position of the marker
      google.maps.event.addListener(home_marker, 'position_changed', function(){
        var lat = home_marker.getPosition().lat(); //set lat current latitude where the marker is plotted
        var lng = home_marker.getPosition().lng(); //set lat current longitude where the marker is plotted
      });

      //if the center of the map has changed
      google.maps.event.addListener(map, 'center_changed', function(){
        var lat = home_marker.getPosition().lat(); //set lat to current latitude where the marker is plotted
        var lng = home_marker.getPosition().lng(); //set lng current latitude where the marker is plotted
      });

  var input = document.getElementById('search'); //get element to use as input for autocomplete

  var autocomplete = new google.maps.places.Autocomplete(input); //set it as the input for autocomplete
  autocomplete.bindTo('bounds', map); //bind auto-complete object to the map
  //executed when a place is selected from the search field
  google.maps.event.addListener(autocomplete, 'place_changed', function(){

      //get information about the selected place in the autocomplete text field
      var place = autocomplete.getPlace();

      if (place.geometry.viewport){ //for places within the default view port (continents, countries)
        map.fitBounds(place.geometry.viewport); //set map center to the coordinates of the location
        map.setZoom(12);
      } else { //for places that are not on the default view port (cities, streets)
        map.setCenter(place.geometry.location);  //set map center to the coordinates of the location
        map.setZoom(12);
      }

      var infowindow = new google.maps.InfoWindow();

      home_marker.setMap(map); //set the map to be used by the  marker
      home_marker.setPosition(place.geometry.location); //plot marker into the coordinates of the location
  });

  // Global variables (Ugly implementation)
  var markers_array = [];
  var p_id;
  var p_name;
  var p_vicinity;
  var lat;
  var lng;
  var p_phone;
  var p_website;
  var place;
  var request;
  var myButtonElement;

  function removeMarkers(){
    for(var i = 0; i < markers_array.length; i++){
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
        'place_types': place_types,
      },
      function(response){

        console.log(response);

        var response_data = JSON.parse(response);

        if(response_data.results){
          var results = response_data.results;
          var result_count = results.length;

          for(var x = 0; x < result_count; x++){

            //get coordinates of the place
            var lat = results[x]['geometry']['location']['lat'];
            var lng = results[x]['geometry']['location']['lng'];

            //create a new infowindow
            infowindow = new google.maps.InfoWindow();

            //plot the marker into the map
            var marker = new google.maps.Marker({
              position: new google.maps.LatLng(lat, lng),
              map: map,
              //icon: results[x]['icon']
            });

            markers_array.push(marker);

            //assign an infowindow to the marker so that when its clicked it shows the name of the place
            google.maps.event.addListener(marker, 'click', (function(marker, x){
              return function(){
                //infowindow.setContent("<div class='no-scroll'><strong>" + results[x]['name'] + "</strong><br>" + results[x]['vicinity'] +  results[x]['place_id'] + "</div>");
                //infowindow.open(map, marker);

                // Set variables from marker windows
                p_id = results[x]['place_id'];
                p_name = results[x]['name'];
                p_vicinity = results[x]['vicinity'];
                lat = marker.getPosition().lat();
                lng = marker.getPosition().lng();


            //var service = new google.maps.places.PlacesService(map);
            var request = { placeId: p_id };

            service.getDetails(request, function(details, status) {
              infowindow.setContent('<div class="no-scroll" id="infoWindowDiv"><strong>' + details.name + '</strong><br>' + details.formatted_address + '<br>' + details.formatted_phone_number + '<div id="websiteDiv"></div>' + '<div id="hours"></div>' + '<div id="addReinburse"></div>' + '<div id="addType"></div>' + '<div id="addComment"></div>' + '<div id="savedResponse"><div class="btn-group" role="group" aria-label="..."><button id="btn_save" type="button" value="save place" class="btn btn-default"><span class="glyphicon glyphicon-save"></span> Save Favorite</button></div></div>' + '</div>');
              infowindow.open(map, marker);
              //setTimeout(function(){ infowindow.open(map, marker) }, 110);
              home_marker.infowindow.close();


              /*
              if (details.website == undefined) {
                //$('#websiteDiv').hide();
                $('#websiteDiv').css('display', 'none');
              }
              */

              var website = "";
              try {
                website = details.website;
                if (website) {
                  $('#websiteDiv').html('<a href="' + details.website + '" target="_blank">' + details.website + '</a>');
                }
                else if (website == undefined) {
                  website = 'No Website';
                }
              }
              catch(e) {
                website = 'No Website';
              }

              var hours = "";
              try {
                hours = details.opening_hours.open_now;
                if (hours == true) {
                  $('#hours').html('<span style="color:green;">Open Now</span>');
                }
                else if (hours == false) {
                  $('#hours').html('<span style="color:red;">Currently Closed</span>');
                }
              }
              catch(e) {
                hours = 'no hours';
              }

              // Receive Json from dbCRUD.php
              $.getJSON('/includes/dbCRUD.php',function(data){
                  if(data.success == true) {
                      if(data.data.length > 0){
                          $.each(data.data,function(index, value){
                              id = data.data[index].place_id;
                              mb = data.data[index].material_reimburse;
                              type = data.data[index].material_type;
                              comment = data.data[index].comment;
                              addDbData(id, mb, type, comment);
                              //console.log(id, p_id);
                          });
                      }
                  }
              });

              // Function to add db data to infowindow divs
              function addDbData(id, mb, type, comment){
                if (p_id == id && mb != "") {
                  $('#addReinburse').html('<strong>Reimburse? :</strong> ' + mb);
                  //addReinburse.innerHTML = '<strong>Reimburse? :</strong> ' + mb;
                }
                if (p_id == id && type != "") {
                  $('#addType').html('<strong>Materials Accepted :</strong> ' + type);
                  //addType.innerHTML = '<strong>Materials Accepted :</strong> ' + type;
                }
                if (p_id == id && comment != "") {
                  $('#addComment').html('<strong>Comment :</strong> ' + comment);
                  //addComment.innerHTML = '<strong>Comment :</strong> ' + comment;
                }
              }

              $.getJSON('/includes/dbCRUD.php',function(dataFavs){
                  if(dataFavs.success == true) {
                      if(dataFavs.dataFavs.length > 0){
                          $.each(dataFavs.dataFavs,function(index, value){
                              id = dataFavs.dataFavs[index].place_id;
                              addDbDataFavs(id);
                              //console.log(id, p_id);
                          });
                      }
                  }
              });

              // Function to add db data to infowindow divs
              function addDbDataFavs(id){
                if (p_id == id) {
                  $('#savedResponse').html('<span class="glyphicon glyphicon-star"></span>');
                  //savedResponse.innerHTML = '<span class="glyphicon glyphicon-star"></span>';
                  //$("#savedResponse").css('display', 'none');
                  //star.innerHTML = '<span class="glyphicon glyphicon-star"></span>';
                }
              }


            //console.log(details.formatted_phone_number);
              p_phone = details.formatted_phone_number;
              p_website = details.website;

                $('#btn_save').click(function(){
                var pid = $.trim($('#pid').val());
                var pname = $.trim($('#pname').val());
                var paddress = $.trim($('#paddress').val());
                var pphone = $.trim($('#pphone').val());
                var pwebsite = $.trim($('#pwebsite').val());
                var plat = marker.getPosition().lat();
                var plng = marker.getPosition().lng();

                  $.post('/includes/save_place.php', {'pid' : p_id, 'plat' : lat, 'plng' : lng, 'pname' : p_name, 'paddress' : p_vicinity, 'pphone' : p_phone, 'pwebsite' : p_website},
                    function(data){
                      var place_id = data;
                      var new_option = $('<option>').attr({'data-pid' : p_id, 'data-plat' : lat, 'data-plng' : lng, 'data-pname' : p_name, 'data-paddress' : p_vicinity, 'data-pphone' : p_phone, 'data-pwebsite' : p_website}).text(place);
                      new_option.appendTo($('#saved_places'));
                      //console.log(place_id);

                        if (place_id == 'notloggedin') {
                          $('#savedResponse').html(' *** Log in to save favorites! ***');
                          //savedResponse.innerHTML = ' *** Log in to save favorites! ***';
                        }
                        else if (place_id == 'savedok') {
                          $('#savedResponse').html(' *** Favorite saved. ***');
                          //savedResponse.innerHTML = ' *** Favorite saved. ***';
                        }
                        else if (place_id == 'alreadyinfavs') {
                          $('#savedResponse').html(' *** Already in favorites. ***');
                          //savedResponse.innerHTML = ' *** Already in favorites. ***';
                        }
                        else {
                          $('#savedResponse').html(' *** Database down, try later! ***');
                          //savedResponse.innerHTML = ' *** Database down, try later! ***';
                        }
                    }
                  );

                  $('input[type=text], input[type=hidden]').val('');

                });

            });

            }
            })(marker, x));
          } // End of for loop

        }
      }
    );
  });
}