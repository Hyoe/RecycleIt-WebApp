<?php
session_start();
//require("../dbconnection/appenginedbhl.php");
require("../dbconnection/local_db_connection.php");

$id=$_POST['id'];
$type=$_POST['data_type'].$id;
$price=$_POST['data_price'].$id;
$comment=$_POST['data_comment'].$id;

$message=''; //
$status='success';              // Set the flag
//sleep(2); // if you want any time delay to be added

//// Data validation starts ///
//if(!is_numeric($mark)){ // checking data
//$message= "Data Error";
//$status='Failed';
// }

//if(!is_numeric($id)){  // checking data
//$message= "Data Error";
//$status='Failed';
//}

if($price > 100 or $price < 0.00 ){
$message= "Price should be between 0 & 100";
$status='Failed';
}
//// Data Validation ends /////
if($status<>'Failed'){  // Update the table now

  $sql = "UPDATE favs_comments JOIN materials_prices
          SET favs_comments.comment = :comment, materials_prices.material_type = :type, materials_prices.material_price = :price
          WHERE favs_comments.place_id = materials_prices.place_id
          AND username = :username
          AND materials_prices.place_id = :place_id";
  $stmt=$db->prepare($sql);
  $records = $stmt->execute(array(":type" => $type, ":price" => $price, ":comment" => $comment, ":username" => $_SESSION['recycleitusername'], ":place_id" => $id));
  $records = $stmt->fetchAll();

  $updateResponse = array('data'=>$records,'value'=>array("status"=>"$status","message"=>"$message"));

  echo json_encode($updateResponse);

}

?>