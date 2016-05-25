<?php
session_start();
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

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!-- Latest compiled and minified CSS -->
  <link href="/bootstrap/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css">
  <link href="/css/nav.css" media="screen" rel="stylesheet" type="text/css">
  <link href="/css/style.css" media="screen" rel="stylesheet" type="text/css">

  <!-- JS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="/js/ajax.js"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="/bootstrap/js/bootstrap.min.js"></script>

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
<script>
function edit_field(id){

var type_id='type_' + id;
var data_type='data_type' + id;

var price_id='price_'+ id;
var data_price='data_price' + id;

var comment_id='comment_' + id;
var data_comment='data_comment'+ id;

var sid='s'+id;
var type=document.getElementById(type_id).innerHTML; // Read the present type
document.getElementById(type_id).innerHTML = "<input type=text id='" + data_type + "' value='"+ type + "' size=22>"; // Display text input

var price=document.getElementById(price_id).innerHTML; // Read the present price
document.getElementById(price_id).innerHTML = "<input type=text id='" + data_price + "' value='"+ price + "' size=4>"; //

var comment=document.getElementById(comment_id).innerHTML; // Read the present comment
document.getElementById(comment_id).innerHTML = "<input type=text id='" + data_comment + "' value='"+ comment + "' size=42>"; //

document.getElementById(sid).innerHTML = '<input type=button class="btn btn-warning" value=Update onclick=ajax(' + id + ');>';
} // end of function
</script>


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
//require("../dbconnection/appenginedbhl.php");
require("../dbconnection/local_db_connection.php");

  $sql = "SELECT favs_comments.place_id, places.place_name, places.place_address, places.place_phone, places.place_website, favs_comments.comment, materials_prices.material_price, materials_prices.material_type
          FROM places JOIN favs_comments
          ON places.place_id = favs_comments.place_id
          JOIN materials_prices
          ON favs_comments.place_id = materials_prices.place_id
          WHERE username = :username";
  $stmt=$db->prepare($sql);
  $stmt->execute(array(":username" => $_SESSION['recycleitusername']));
  $favs = $stmt->fetchAll();
?>

<div id="msgDsp" STYLE="z-index:1"></div>


  <div class="container-fluid">
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
                  <th>Material Type</th>
                  <th>Price</th>
                  <th>Comment</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
              </thead>
      <?php
          foreach ($favs as $fav) {
            $id = $fav['place_id'];
            $sid = 's' . $id;
              echo '<tbody>';
              echo '<tr>';
                  echo '<td class="hidden" id='.$id.'>'.$id.'</td>';
                  echo '<td>'.$fav['place_name'].'</td>';
                  echo '<td>'.$fav['place_address'].'</td>';
                  echo '<td>'.$fav['place_phone'].'</td>';
                  echo '<td>'.$fav['place_website'].'</td>';
                  echo '<td><div id="type_'.$fav['place_id'].'" STYLE="width:180px;">'.$fav['material_type'].'</div></td>';
                  echo '<td><div id="price_'.$fav['place_id'].'" STYLE="width:54px;">'.$fav['material_price'].'</div></td>';
                  echo '<td><div id="comment_'.$fav['place_id'].'" STYLE="width:340px;">'.$fav['comment'].'</div></td>';
                  echo "<td><div id='".$sid."'><input type='button' class='btn btn-success' value='Edit' onclick=edit_field('".$id."')></div></td>";
                  echo '<td><button type="button" class="btn btn-danger">Delete</button></td>';
              echo '</tr>';
              echo '</tbody>';
          }
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
