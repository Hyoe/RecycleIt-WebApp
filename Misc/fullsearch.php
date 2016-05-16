<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Recycle It!</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link href="css/nav.css" media="screen" rel="stylesheet" type="text/css">
  <link href="css/navSmall.css" media="screen and (max-width: 749px)" rel="stylesheet" type="text/css">

  <!-- JS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="js/map.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>


  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/icon1.png">


  <title>Recycle It!</title>

    <script type="text/javascript">
      var originalNavClasses;

      function toggleNav() {
        var elem = document.getElementById('nav'),
            classes = elem.className,
            newClasses;

        if (originalNavClasses === undefined) { originalNavClasses = classes; }

        elem.className = /expanded/.test(classes) ?
                          originalNavClasses :
                          originalNavClasses + ' expanded';
      }
    </script>

</head>

<body>

  <!-- Navigation
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div id="nav" class="navcontainer">
    <div class="content">
      <a href="index.html" class="logo"><img src="images/logoFinalSmall.png"></a>
      <a href="#" class="menu-button" onclick="toggleNav(); return false;">Menu</a>
      <ul>
        <li><a href="#">LEARN</a></li>
        <li><a href="#">SEARCH</a></li>
        <li><a href="#">SIGN IN</a></li>
        <li><a href="#">REGISTER</a></li>
        <li><a href="#">CONTACT</a></li>
      </ul>
    </div>
  </div>


<div id="out_map_container">
  <div id="map_container">
    <div id="map"></div>
  </div>
</div>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcy8z3nYxttNR3k6I85Z934hagUu0LepM&libraries=places&callback=initMap" async defer>
  </script>
</body>
</html>