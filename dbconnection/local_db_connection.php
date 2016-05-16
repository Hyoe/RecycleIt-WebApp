<?php
try {
  $db = new pdo('mysql:host=127.0.0.1;dbname=Recycle_It','root','root');
}
catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br />";
        die();
}

?>