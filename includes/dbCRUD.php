<?php
session_start();
//require("../dbconnection/appenginedbhl.php");
require("../dbconnection/local_db_connection.php");
?>
<?php
if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
    $actionfunction = $_REQUEST['actionfunction'];

    call_user_func($actionfunction,$_REQUEST,$db);
}

function saveData($data,$db){


   //if($db->query($sql)){
       showData($data,$db);
   //}
   //else{
       //echo "error";
   //}
}

function showData($data,$db){

  $sql = "SELECT favs_comments.place_id, places.place_name, places.place_address, places.place_phone, places.place_website, favs_comments.comment, materials_prices.material_reimburse, materials_prices.material_type
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
          <th>Reimburse?</th>
          <th>Comment</th>
          <th>Edit</th>
          <th>Delete</th>
      </tr>
  </thead>';

  if ($data->rowCount()>0) {
    foreach ($favs as $fav) {
      $id = $fav['place_id'];
      $tableResults .=
      '<tr id='.$id.'>'.
      '<td>'.$fav['place_name'].'</td>'.
      '<td>'.$fav['place_address'].'</td>'.
      '<td>'.$fav['place_phone'].'</td>'.
      '<td><a href="'.$fav['place_website'].'" target="_blank">Website</a></td>'.
      '<td>'.$fav['material_type'].'</td>'.
      '<td>'.$fav['material_reimburse'].'</td>'.
      '<td>'.$fav['comment'].'</td>'.
      '<td><input type="button" id="ajaxedit" class="btn btn-success" value="Edit"></td>'.
      '<td><input type="button" id="ajaxdelete" class="btn btn-danger" value="Delete"></td>'.
      '</tr>';
    }
  }
  else {
    $tableResults .= '<td colspan="5">Add favorites to edit them here</td>';
  }
  echo $tableResults;

  $response['success'] = false;
  if (!empty($tableResults)) {
    $response['success'] = true;
    $response['dataTable'] = $tableResults;
  }
  echo ($response);
}

function updateData($data,$db){
  $placeid = $data['editid'];
  $type = $data['mType'];
  $reimburse = $data['reimburse'];
  $comment = $data['comment'];

  $sql = "UPDATE favs_comments JOIN materials_prices
          SET favs_comments.comment = :comment, materials_prices.material_type = :type, materials_prices.material_reimburse = :reimburse
          WHERE favs_comments.place_id = materials_prices.place_id
          AND favs_comments.place_id = :place_id
          AND materials_prices.place_id = :place_id";

    $data=$db->prepare($sql);
    $data->execute(array(":type" => $type, ":reimburse" => $reimburse, ":comment" => $comment, ":username" => $_SESSION['recycleitusername'], ":place_id" => $placeid));
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

/*
// Json reimburse, material types, and comments back to map
  $response['success'] = false;
  $sql = "SELECT materials_prices.place_id, materials_prices.material_type, materials_prices.material_reimburse, favs_comments.comment
          FROM materials_prices
          JOIN favs_comments
          WHERE materials_prices.place_id = favs_comments.place_id";
  $data=$db->prepare($sql);
  $data->execute(array());
  $favs=$data->fetchAll();

  if (!empty($favs)) {
    $response['success'] = true;
    $response['data'] = $favs;
  }
  echo json_encode($response);
*/


// Json reimburse, material types, and comments back to map
  $response['success'] = false;
  $sql = "SELECT materials_prices.place_id, materials_prices.material_type, materials_prices.material_reimburse, favs_comments.comment
          FROM materials_prices
          JOIN favs_comments
          WHERE materials_prices.place_id = favs_comments.place_id";
  $data=$db->prepare($sql);
  $data->execute(array());
  $favs=$data->fetchAll();

  $sql = "SELECT place_id
          FROM favs_comments
          WHERE username = :username";
  $dataFavs=$db->prepare($sql);
  $dataFavs->execute(array(":username" => $_SESSION['recycleitusername']));
  $favsId=$dataFavs->fetchAll();

  if (!empty($favs)) {
    $response['success'] = true;
    $response['data'] = $favs;
    $response['dataFavs'] = $favsId;
  }

  echo json_encode($response);


?>