<?php
session_start();
//require("../dbconnection/appenginedbhl.php");
require("../dbconnection/local_db_connection.php");
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

  <!-- JS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

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

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>
        <?php echo $_SESSION['recycleitusername']?>'s favorites & comments page
      </h1>
    </div>
  </div>
</div>

<?php
  $sql = "SELECT favs_comments.place_id, places.place_name, places.place_address, places.place_phone, places.place_website, favs_comments.comment
          FROM places JOIN favs_comments
          WHERE places.place_id = favs_comments.place_id
          AND username = :username";
  $stmt=$db->prepare($sql);
  $stmt->execute(array(":username" => $_SESSION['recycleitusername']));
  $favs = $stmt->fetchAll();

?>

  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading"><?php echo $_SESSION['recycleitusername']?>'s favorites & comments page</div>
      <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Website</th>
                <th>Comment</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
    <?php
        foreach ($favs as $fav) {
            echo '<tbody>';
            echo '<tr>';
                echo '<td>'.$fav['place_name'].'</td>';
                echo '<td>'.$fav['place_address'].'</td>';
                echo '<td>'.$fav['place_phone'].'</td>';
                echo '<td>'.$fav['place_website'].'</td>';
                echo '<td>'.$fav['comment'].'</td>';
                echo '<td><button type="button" class="btn btn-success" id="'.$fav['place_id'].'">Update</button></td>';
                echo '<td><button type="button" class="btn btn-danger" id="'.$fav['place_id'].'">Delete</button></td>';
            echo '</tr>';
            echo '</tbody>';
        }
    ?>

<?php

if (condition) {
  # code...
}
  $sql = "UPDATE comments
          FROM favs_comments
          WHERE place_id = :place_id
          AND username = :username";
  $stmt=$db->prepare($sql);
  $stmt->execute(array(":place_id" => $fav['place_id'], ":username" => $_SESSION['recycleitusername']));


?>

      </table>
      </div>
    </div>
  </div>








<?php include(__DIR__ . "/footer.php") ?>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
