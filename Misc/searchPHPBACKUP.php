<? session_start() ?>
<?php
//require(__DIR__ . "/appenginedbhl.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Recycle It!</title>
  <meta name="Recycling" content="">
  <meta name="Recycle It!" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!--<link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">-->

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!--<link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">-->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link href="../css/nav.css" media="screen" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../css/register.css">
  <link rel="stylesheet" href="../css/map.css">

  <!-- JS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="../js/general.js" type="text/javascript"></script>
  <script src="../js/map.js" type="text/javascript"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">


  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="/images/icon1.png">

</head>

<body>

<?php include(__DIR__ . "/nav.php") ?>


  <!-- Header
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<!--
<div class="headerImg">
</div>
-->



  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="container-fluid">
  <div class="row">
    <div class=col-md-9>
      <div id="map-container">
        <div id="map-canvas"></div>
      </div>
    </div>

      <div class="col-md-3">
        <div id="place-types">
            <ul class="list-group">
              <li>
                <input type="text" id="search" class="controls">
              </li>
              <li>
                <input checked type="checkbox" class="hidden" data-type="recycling">
              </li>
              <li class="list-group-item">
                <input type="checkbox"> Metals
              </li>
              <li class="list-group-item">
                <input type="checkbox"> Plastic
              </li>
              <li class="list-group-item">
                <input type="checkbox"> Electronics
              </li>
              <li class="list-group-item">
                <input type="checkbox"> Paper
              </li>
              <li class="list-group-item">
                <input type="checkbox"> Batteries
              </li>
              <li class="list-group-item">
                <input type="checkbox"> Hazardous
              </li>
            </ul>
                <button type="button" class="btn-success" id="find-places">Find Places</button>
        </div>
      </div>
 </div>
      <div class=in-out-group>
        <div class="row">
          <div class="col-md-3">
            <label for="search_new_places">New Places</label>
            <input type="text" placeholder="Search New Places" id="search_new_places" />


            <label for="search_ex_places">Saved Places</label>
            <input id="search_ex_places" type="text" list="saved_places" placeholder="Search Saved Places" />

            <!--this will hold the place id of the selected existing place-->
            <label for="pid">Place_ID</label>
            <input id="pid" name="pid" type="text" />

            <!--The following are used for holding the name of the place and its description-->

            <label for="name">Name</label>
            <input id="pname" type="text" name="pname" />

            <label for="address">Address</label>
            <input id="paddress" type="text" name="address" />

            <label for="phone">Phone</label>
            <input id="pphone" type="text" name="phone" />

            <label for="website">Website</label>
            <input id="pwebsite" type="text" name="pwebste" />

            <label for="email">Email</label>
            <input id="pemail" type="text" name="pemail" />



            <!--buttons used for executing functions for saving the place and plotting marker into the map-->

            <input id="btn_save" type="button" value="save place" />
            <input id="plot_marker" type="button" value="plot marker" />
          </div>
        </div>
      </div>
</div>



     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApN6i2gKLF_3nzPGWacafhqZAow0UPJK0&libraries=places&callback=initMap" async defer>
    </script>

  <script src="../js/map.js"></script>





<?php include(__DIR__ . "/footer.php") ?>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>

<datalist id="saved_places">
<!--loop through the places saved in the database and store their data into each of the data attribute in the options-->


