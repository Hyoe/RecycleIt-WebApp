<?php
session_start();
require("../dbconnection/appenginedbhl.php");
//require("../dbconnection/local_db_connection.php");
?>
<?php
if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
    $actionfunction = $_REQUEST['actionfunction'];

    call_user_func($actionfunction,$_REQUEST,$db);
}


function saveData($data,$db){


   if($db->query($sql)){
       showData($data,$db);
   }
   else{
       echo "error";
   }
}

function showData($data,$db){

  $sql = "SELECT favs_comments.place_id, places.place_name, places.place_address, places.place_phone, places.place_website, favs_comments.comment, materials_prices.material_price, materials_prices.material_type
  FROM places JOIN favs_comments
  ON places.place_id = favs_comments.place_id
  JOIN materials_prices
  ON favs_comments.place_id = materials_prices.place_id
  WHERE username = :username";
  $data=$db->prepare($sql);
  $data->execute(array(":username" => $_SESSION['recycleitusername']));
  $favs=$data->fetchAll();

  $tableResults =
  '<thead>
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
  </thead>';


  foreach ($favs as $fav) {
    $id = $fav['place_id'];
    $tableResults .=
    '<tr id='.$id.'>'.
    '<td>'.$fav['place_name'].'</td>'.
    '<td>'.$fav['place_address'].'</td>'.
    '<td>'.$fav['place_phone'].'</td>'.
    '<td>'.$fav['place_website'].'</td>'.
    '<td>'.$fav['material_type'].'</td>'.
    '<td>'.$fav['material_price'].'</td>'.
    '<td>'.$fav['comment'].'</td>'.
    '<td><input type="button" id="ajaxedit" class="btn btn-success" value="Edit"></td>'.
    '<td><input type="button" id="ajaxdelete" class="btn btn-danger" value="Delete"></td>'.
    '</tr>';
}

echo $tableResults;

}

function updateData($data,$db){

$placeid = $data['editid'];
$type = $data['mType'];
$price = $data['price'];
$comment = $data['comment'];

$sql = "UPDATE favs_comments JOIN materials_prices
          SET favs_comments.comment = :comment, materials_prices.material_type = :type, materials_prices.material_price = :price
          WHERE favs_comments.place_id = materials_prices.place_id
          AND username = :username
          AND materials_prices.place_id = :place_id";
  $data=$db->prepare($sql);
  $data->execute(array(":type" => $type, ":price" => $price, ":comment" => $comment, ":username" => $_SESSION['recycleitusername'], ":place_id" => $placeid));
  $data->fetchAll();
     showData($data,$db);
}


function deleteData($data,$db){

  $placeid = $data['deleteid'];

    $sql = "DELETE FROM favs_comments
            WHERE place_id = :place_id
            AND username = :username";
    $data = $db -> prepare($sql);
    $data -> execute(array(":place_id" => $placeid, ":username" => $_SESSION['recycleitusername']));
        showData($data,$db);

}
?>