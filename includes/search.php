<? session_start() ?>

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
  <link href="/bootstrap/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css">
  <link href="/css/nav.css" media="screen" rel="stylesheet" type="text/css">
  <link href="/css/map.css" media="screen" rel="stylesheet" type="text/css">

  <!-- JS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="/bootstrap/js/bootstrap.min.js"></script>
  <script src="/js/map.js" type="text/javascript" ></script>

  <!-- JQUERY VALIDATE CDNS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.min.js"></script>

  <!-- Optional theme -->
  <link href="/bootstrap/css/bootstrap-theme.min.css" media="screen" rel="stylesheet" type="text/css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="/images/icon1.png">

</head>

<body>

<?php include(__DIR__ . "/nav.php") ?>


  <!-- Header
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <div class="map-container">
    <div class="container-fluid">
      <div class="row">
        <div class=".col-xs-4 .col-sm-6 .col-md-8 .col-lg-12">
          <div id="map-canvas"></div>
        </div>
      </div>
    </div>
  </div>

<div class="search-container">
  <div class="container-fluid">
    <div class="row">
      <div class=".col-md-12">
        <div class="form-group">
          <form class="form-inline">

          <div class="panel-default">

                <div class="btn-toolbar" role="toolbar" aria-label="...">
                  <div class="btn-group" role="group" aria-label="...">

                  <div class="input-group input-group-lg">
                    <input type="text" class="form-control" aria-label="..." placeholder="Enter Location..." id="search">
                    <div class="input-group-btn">

                    <div class="btn-group" role="group" aria-label="...">
                      <button type="button" class="btn btn-success btn-lg" id="find-places">
                        <span class="glyphicon glyphicon-search"></span> Find Places
                      </button>
                    </div>

                  <div class="btn-group" role="group" aria-label="...">
                    <button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> All Materials <span class="caret"></span>
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


<!--
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

-->

     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApN6i2gKLF_3nzPGWacafhqZAow0UPJK0&libraries=places&callback=initMap" async defer>
    </script>




<?php include(__DIR__ . "/footer.php") ?>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
