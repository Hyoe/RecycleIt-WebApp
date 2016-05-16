<?php

try {
  $db = new pdo('mysql:unix_socket=/cloudsql/recycleit-1293:recycle-it-sql;dbname=Recycle_It','root','#kickascii');
}
catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br />";
        die();
}

?>