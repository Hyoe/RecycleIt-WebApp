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

  <div class="map-container">
    <div class="container-fluid">
      <div class="row">
        <div class=".col-xs-12 .col-sm-6 .col-md-8 .col-lg-12">
          <div id="map-canvas"></div>
        </div>
      </div>
    </div>
  </div>

<div class="search-container">
  <div class="container">
    <div class="row">
      <div class=".col-xs-12 .col-sm-6 .col-md-8 .col-lg-12">
        <div class="form-group">
          <form class="form-inline">
            <div class="input-group">
              <div class="input-group-btn">
                <div class="btn-toolbar" role="toolbar" aria-label="...">
                  <div class="btn-group" role="group" aria-label="...">
                    <button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Materials <span class="caret"></span>
                    </button>
                      <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="#">All Materials</a></li>
                        <li><a tabindex="-1" href="#">Metals</a></li>
                        <li><a tabindex="-1" href="#">Pastic</a></li>
                        <li><a tabindex="-1" href="#">Electronics</a></li>
                        <li><a tabindex="-1" href="#">Paper</a></li>
                        <li><a tabindex="-1" href="#">Batteries</a></li>
                        <li><a tabindex="-1" href="#">Hazardous</a></li>
                      </ul>
                  </div>
                  <div class="input-group input-group-lg">
                    <input type="text" class="form-control" aria-label="..." placeholder="Enter Location..." id="search">
                    <div class="input-group-btn">
                    <div class="btn-group" role="group" aria-label="...">
                      <button type="button" class="btn btn-default btn-lg" id="find-places">
                        <span class="glyphicon glyphicon-search"></span> Find Places
                      </button>
                    </div>
                    <div class="btn-group" role="group" aria-label="...">
                      <button id="btn_save" type="button" value="save place" class="btn btn-default btn-lg">
                        <span class="glyphicon glyphicon-save"></span> Save Favorite
                      </button>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<input checked type="checkbox" class="hidden" data-type="recycling" />
<label for="pid"></label>
<input id="pid" name="pid" type="hidden" />
<label for="name"></label>
<input id="pname" type="hidden" name="pname" />
<label for="address"></label>
<input id="paddress" type="hidden" name="address" />
<label for="phone"></label>
<input id="pphone" type="hidden" name="phone" />
<label for="website"></label>
<input id="pwebsite" type="hidden" name="pwebste" />
<label for="email"></label>
<input id="pemail" type="hidden" name="pemail" />



     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApN6i2gKLF_3nzPGWacafhqZAow0UPJK0&libraries=places&callback=initMap" async defer>
    </script>




<?php include(__DIR__ . "/footer.php") ?>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>

<datalist id="saved_places">
<!--loop through the places saved in the database and store their data into each of the data attribute in the options-->


