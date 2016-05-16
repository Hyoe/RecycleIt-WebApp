<?php
    require_once(local_db_connection.php);
    $places = $db->query("SELECT * FROM places");
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
  <link href="css/nav.css" media="screen" rel="stylesheet" type="text/css">
  <!--<link href="css/navSmall.css" media="screen and (max-width: 749px)" rel="stylesheet" type="text/css">-->
  <link rel="stylesheet" href="css/register.css">

  <!-- JS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="js/general.js" type="text/javascript"></script>
  <script src="js/map.js" type="text/javascript"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">


  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/icon1.png">


  <title>Recycle It!</title>

</head>

<body>

<?php include(__DIR__ . "/includes/nav.php") ?>


<label for="search_ex_places">Saved Places</label>
<input id="search_ex_places" type="text" />

<!--this will hold the place id of the selected existing place-->
<input id="place_id" type="hidden" name="place_id" />

<!--The following are used for holding the name of the place and its description-->

<label for="place">Name</label>
<input id="n_place" type="text" name="n_place" />

<label for="description">Description</label>
<input id="n_description" type="text" name="n_description" />

<!--buttons used for executing functions for saving the place and plotting marker into the map-->

<input id="btn_save" type="button" value="save place" />
<input id="plot_marker" type="button" value="plot marker" />



<?php include(__DIR__ . "/includes/footer.php") ?>




<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>