<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

require 'constring.php';

$query = "SELECT * FROM restaurant WHERE r_email='$email'";
$result = mysqli_query($mysqli, $query) or die(mysqli_error());
$num_row = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

if ($num_row >= 1) {

    if (password_verify($password, $row['password'])) {

        $_SESSION['login'] = $row['r_id'];
        $_SESSION['fname'] = $row['r_name'];
        $_SESSION['role'] = 'restaurant';
        echo 'true';
    }
    else {
        echo 'false';
    }

} else {
    echo 'false';
}

?>