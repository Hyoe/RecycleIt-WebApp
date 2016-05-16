<?php

require "dbconnection/local_db_connection.php";

$username = $_GET['email'];

$sql = "SELECT * FROM users where 'username' = '$username'";
$stmt = $dbConn -> prepare($sql);
$stmt -> execute();
$results = $stmt->fetchAll();

$results = array();
foreach ($results as $result) {
    array_push($results, $result);
}
echo json_encode($results);





//class Database{




    /*

    public static function query($sql){
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DB);
        $res = $conn->query($sql);
        $conn->close();
        Database::formatResults($res);
    }

    public static function formatResults($res){
        $results = array();
        foreach($res as $r){
            array_push($results, $r);
        }
        echo json_encode($results);
    }

}

$username = $_GET['username'];
Database::query("SELECT * FROM users WHERE 'username' = $username");

*/


?>