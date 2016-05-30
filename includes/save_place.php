<?php
session_start();
?>
<?php
  //require("../dbconnection/appenginedbhl.php");
  require("../dbconnection/local_db_connection.php");

    if (!$_SESSION['recycleitusername']){
        //header("Location: ./includes/login.php");
        echo "notloggedin";
    }
    else{
        //get place information submitted via ajax earlier
        $p_id = $_POST['pid'];
        $p_lat = $_POST['plat'];
        $p_lng = $_POST['plng'];
        $p_name = $_POST['pname'];
        $p_vicinity = $_POST['paddress'];
        $p_phone = $_POST['pphone'];
        $p_website = $_POST['pwebsite'];
        $p_email = $_POST['pemail'];

        //select * statment needed to account for duplicates
        $sql = "SELECT place_id FROM places
                WHERE place_id = :place_id";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(":place_id" => $p_id));
        $record = $stmt->rowCount();

        if ($_SESSION['recycleitusername'] && $record <= 0){
        $sql = "INSERT INTO places
            (place_id, place_lat, place_lng, place_name, place_address, place_phone, place_website, place_email)
            VALUES (:place_id, :place_lat, :place_lng, :place_name, :place_address, :place_phone, :place_website, :place_email)";
        $stmt = $db -> prepare($sql);
        $stmt -> execute(array(
                            ":place_id" => $p_id,
                            ":place_lat" => $p_lat,
                            ":place_lng" => $p_lng,
                            ":place_name" => $p_name,
                            ":place_address" => $p_vicinity,
                            ":place_phone" => $p_phone,
                            ":place_website" => $p_website,
                            ":place_email" => $p_email));
        }

        //select * statment needed to account for duplicates
        $sql = "SELECT place_id FROM favs_comments
                WHERE place_id = :place_id
                AND username = :username";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(":place_id" => $p_id, ":username" => $_SESSION['recycleitusername']));
        $recordFavs = $stmt->rowCount();

        if ($_SESSION['recycleitusername'] && $recordFavs <= 0){
            $sql = "INSERT INTO favs_comments
                   (username, place_id, comment)
                   VALUES (:username,:place_id,:comment)";
            $stmt = $db -> prepare($sql);
            $stmt -> execute(array(
                                ":username" => $_SESSION['recycleitusername'],
                                ":place_id" => $p_id,
                                ":comment" => "empty"));
            echo "savedok";
        }

        //select * statment needed to account for duplicates
        $sql = "SELECT place_id FROM materials_prices
                WHERE place_id = :place_id";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(":place_id" => $p_id));
        $recordMatPri = $stmt->rowCount();

        if ($_SESSION['recycleitusername'] && $recordMatPri <= 0){
            $sql = "INSERT INTO materials_prices
                   (place_id, material_type, material_reimburse)
                   VALUES (:place_id, :material_type, :material_reimburse)";
            $stmt = $db -> prepare($sql);
            $stmt -> execute(array(
                                ":place_id" => $p_id,
                                ":material_type" => "",
                                ":material_reimburse" => ""));
        }
    }


$place_id = $db->insert_id;
echo $place_id;

?>