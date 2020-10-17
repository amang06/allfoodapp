<?php
session_start();

$d_id = $_REQUEST['id'];
unset($_SESSION['error']);

require 'constring.php';

if ($d_id) {
    // edit the post with $_POST['id']
    $query = "DELETE FROM dish WHERE d_id=$d_id";
    if ($mysqli->query($query) === TRUE) {
        echo 'true';
        $_SESSION['error'] = "Deleted!";
        header("Location: delicacies.php");
    } else {
        $_SESSION['error'] = "Cannot delete because a customer has already ordered this dish!";
        header("Location: delicacies.php");
    }
    

} else {
    $_SESSION['error'] = "Error!";
    header("Location: delicacies.php");
  }


?>