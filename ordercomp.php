<?php
session_start();

$o_id = $_REQUEST['id'];
unset($_SESSION['error']);

//Open a new connection to the MySQL server
$mysqli = new mysqli('localhost', 'id15143663_foodappadmin', 'XppQ2az^dBaV7pc', 'id15143663_foodapp');


//Output any connection error
if ($mysqli->connect_error) {
    die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

if ($o_id) {
    // edit the post with $_POST['id']
    $query = "DELETE FROM orders WHERE o_id=$o_id";
    if ($mysqli->query($query) === TRUE) {
        echo 'true';
        $_SESSION['error'] = "Order Completed!";
        header("Location: rorders.php");
    } else {
        $_SESSION['error'] = "Record not updated";
        header("Location: rorders.php");
    }
    

} else {
    $_SESSION['error'] = "Error!";
    header("Location: rorders.php");
  }


?>