<?php
session_start();

$cname = $_REQUEST['cname'];
$cid = $_REQUEST['cid'];
$dname = $_REQUEST['dname'];
$dishid = $_REQUEST['dishid'];
$rname = $_REQUEST['rname'];
$rid = $_REQUEST['rid'];

require 'constring.php';

if ($cname && $dname && $rname && $cid && $dishid) {
    // edit the post with $_POST['id']
    $query = "INSERT INTO orders (c_id, d_id, c_name, d_name, r_name, r_id) VALUES ('$cid', '$dishid', '$cname', '$dname', '$rname', '$rid')";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error());
    $_SESSION['order'] = 'success';
    header("Location: ordersuccess.php");
    echo 'true';


} else {
    echo 'false';

  }


?>