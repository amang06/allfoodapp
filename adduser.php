<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('scream.enabled', false);
session_start();

require 'constring.php';

$fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
$lname = mysqli_real_escape_string($mysqli, $_POST['lname']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$password = mysqli_real_escape_string($mysqli, $_POST['password']);
$veg = mysqli_real_escape_string($mysqli, $_POST['veg']);
$nonveg = mysqli_real_escape_string($mysqli, $_POST['nonveg']);


//VALIDATION

if (strlen($fname) < 2) {
    echo 'fname';
} elseif (strlen($lname) < 2) {
    echo 'lname';
} elseif (strlen($email) <= 4) {
    echo 'eshort';
} elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo 'eformat';
} elseif (strlen($password) <= 4) {
    echo 'pshort';
	
//VALIDATION
	
} else {
	//PASSWORD ENCRYPT
	$spassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
	
	$query = "SELECT * FROM customer WHERE c_email='$email'";
	$result = mysqli_query($mysqli, $query) or die(mysqli_error());
	$num_row = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
		if ($num_row < 1) {

			$insert_row = $mysqli->query("INSERT INTO customer (c_fname, c_lname, c_email, password, veg, nonveg) VALUES ('$fname', '$lname', '$email', '$spassword', '$veg','$nonveg')");

			if ($insert_row) {

				$_SESSION['login'] = $mysqli->insert_id;
				$_SESSION['fname'] = $fname;
				$_SESSION['role'] = 'customer';

				echo 'true';

			}

		} else {

			echo 'false';

		}
		
}

?>