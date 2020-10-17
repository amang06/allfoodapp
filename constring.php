<?php


//Open a new connection to the MySQL server
$mysqli = new mysqli('localhost', 'foodappadmin', 'food', 'foodapp', 3308);
//$mysqli = new mysqli('localhost', 'id15145587_foodappadmin', 'Whydontyouconnect@1', 'id15145587_foodapp');

//Output any connection error
if ($mysqli->connect_error) {
    die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

//define('DB_HOST','localhost');
//define('DB_USER','foodappadmin');
//define('DB_PASS','food');
//define('DB_NAME','foodapp');

//try{
    //$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES
      //  'utf8'"));
//}
//catch (PDOException $e) {
    //exit("Error: " . $e -> getMessage());
//}


?>