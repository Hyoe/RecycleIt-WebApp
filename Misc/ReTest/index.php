<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>gmap</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCOpQBYrCd72DkXF2ZlQGQJ6JikkXyOW1E&libraries=places"></script>
</head>
<body>
  <div id="map-container">
    <input type="text" id="search">
    <div id="map-canvas"></div>
  </div>

  <div id="place-types">
    <ul>
      <li>
        <input type="checkbox" data-type="recycling"> bar
      </li>
      <li>
        <input type="checkbox" data-type="bus_station"> bus station
      </li>
      <li>
        <input type="checkbox" data-type="hospital"> hospital
      </li>
      <li>
        <input type="checkbox" data-type="health"> health
      </li>
      <li>
        <input type="checkbox" data-type="police"> police
      </li>
      <li>
        <input type="checkbox" data-type="post_office"> post office
      </li>
      <li>
        <input type="checkbox" data-type="store"> store
      </li>
      <li>
        <input type="checkbox" data-type="library"> library
      </li>
      <li>
        <input type="checkbox" data-type="fire_station"> fire station
      </li>
      <li>
        <input type="checkbox" data-type="gas_station"> gas station
      </li>
      <li>
        <input type="checkbox" data-type="convenience_store"> convenience store
      </li>
      <li>
        <input type="checkbox" data-type="school"> school
      </li>
    </ul>
    <button id="find-places">Find Places</button>
  </div>

  <script src="map.js"></script>

</body>
</html>