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

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!-- Latest compiled and minified CSS -->
  <link href="/bootstrap/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css">
  <link href="/css/nav.css" media="screen" rel="stylesheet" type="text/css">

  <!-- JS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

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
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>
        <?php echo $_SESSION['recycleitusername']?>'s favorites & comments page
      </h1>
    </div>
  </div>
</div>

<div id="msgDsp" STYLE="position: absolute; right: 0px; top: 10px;left:800px;text-align:left; FONT-SIZE: 12px;font-family: Verdana;border-style: solid;border-width: 1px;border-color:white;padding:0px;height:20px;width:250px;top:10px;z-index:1"> Edit mark </div>

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
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
    <?php
      $i = 1;
        foreach ($favs as $fav) {
          $m = $i%2;
          $sid = 's' . $fav['place_id'];
            echo '<tbody>';
            echo '<tr>';
                echo '<td>'.$fav['place_name'].'</td>';
                echo '<td>'.$fav['place_address'].'</td>';
                echo '<td>'.$fav['place_phone'].'</td>';
                echo '<td>'.$fav['place_website'].'</td>';
                echo '<td><div id="'.$fav['place_id'].'" STYLE="width:280px;">'.$fav['comment'].'</div></td>';
                echo "<td><button type='button' class='btn btn-success' id='".$sid."' onclick=edit_field('".$fav['place_id']."')>Edit</button></td>";
                echo '<td><button type="button" class="btn btn-danger">Delete</button></td>';
            echo '</tr>';
            echo '</tbody>';
        }
    ?>
      </table>
      </div>
    </div>
  </div>


<script language="JavaScript">
function edit_field(id){

var sid='s'+id;
var t1='t'+ id;

var comment=document.getElementById(id).innerHTML; // Read the present comment
document.getElementById(id).style.backgroundColor = '#ffff00'; // Add different color to background
document.getElementById(id).innerHTML = '<input type=text id=' + t1 + ' value='+ comment + ' size=45px> <input type=button value=Update onclick=ajax(' + id + ');>'; // Add different color to background
document.getElementById(id).style.display = 'inline';  // show the details
document.getElementById(sid).style.display = 'none'; // Hide the edit button
} // end of function

</script>

<?php
  $id = $_POST['id'];
  $comment=$_POST['comment'];

    $sql = "UPDATE favs_comments
           SET comments = :comments
           WHERE place_id = :place_id
           AND username = :username";
  $stmt=$db->prepare($sql);
  $stmt->execute(array(":comments" =>$comment, ":place_id" => $fav['place_id'], ":username" => $_SESSION['recycleitusername']));

  $a = array('id'=>$id,'comment'=>$comment);
  $a = array('data'=>$a,'value'=>array("status"=>"$status","message"=>"$message"));
  //echo json_encode($a);
?>

<script>

</script>




<?php include(__DIR__ . "/footer.php") ?>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
