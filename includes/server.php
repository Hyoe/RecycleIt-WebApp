<?php
session_start();
//require("../dbconnection/appenginedbhl.php");
require("../dbconnection/local_db_connection.php");

  //define index of column
  $columns = array(
    0 =>'employee_name',
    1 => 'employee_salary',
    2 => 'employee_age'
  );
  $error = true;
  $colVal = '';
  $colIndex = $rowId = 0;

  $msg = array('status' => !$error, 'msg' => 'Failed! updation in mysql');

  if(isset($_POST)){
    if(isset($_POST['val']) && !empty($_POST['val']) && $error) {
      $colVal = $_POST['val'];
      $error = false;

    } else {
      $error = true;
    }
    if(isset($_POST['index']) && $_POST['index'] >= 0 &&  $error) {
      $colIndex = $_POST['index'];
      $error = false;
    } else {
      $error = true;
    }
    if(isset($_POST['id']) && $_POST['id'] > 0 && $error) {
      $rowId = $_POST['id'];
      $error = false;
    } else {
      $error = true;
    }

    if(!$error) {
          $sql = "UPDATE favs_comments JOIN materials_prices
          SET favs_comments.comment = :comment, materials_prices.material_type = :type, materials_prices.material_price = :price
          WHERE favs_comments.place_id = materials_prices.place_id
          AND username = :username
          AND materials_prices.place_id = :place_id";
  $stmt=$db->prepare($sql);
  $stmt->execute(array(":type" => $type, ":price" => $price, ":comment" => $comment, ":username" => $_SESSION['recycleitusername'], ":place_id" => $id));
  $records = $stmt->fetchAll();

  $updateResponse = array('data'=>$records,'value'=>array("status"=>"$status","message"=>"$message"));
        $status = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
        $msg = array('status' => !$error, 'msg' => 'Success! updation in mysql');
    }
  }

  // send data as json format
  echo json_encode($msg);

?>