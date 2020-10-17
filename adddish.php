<?php
session_start();
$d_name = $_POST['d_name'];
$d_type = $_POST['d_type'];
$rname = $_POST['fname'];
$rid = $_POST['rid'];
unset($_SESSION['error']);

require 'constring.php';

if ($d_name && $d_type && $rname && $rid) {
    // edit the post with $_POST['id']
    $query = "INSERT INTO dish (d_name, d_type, r_id, r_name) VALUES ('$d_name', '$d_type', '$rid', '$rname')";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error());
    $_SESSION['error'] = "Added!";
    echo 'true';

} else {
    echo 'false';

  }


?>