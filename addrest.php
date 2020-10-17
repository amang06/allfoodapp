<?php
session_start();
require 'constring.php';
$rname = mysqli_real_escape_string($mysqli, $_POST['name']);
$address = mysqli_real_escape_string($mysqli, $_POST['address']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$password = mysqli_real_escape_string($mysqli, $_POST['password']);

//VALIDATION

if (strlen($rname) < 2) {
    echo 'name';
} elseif (strlen($address) < 2) {
    echo 'address';
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
	
	$query = "SELECT * FROM restaurant WHERE r_email='$email'";
	$result = mysqli_query($mysqli, $query) or die(mysqli_error());
	$num_row = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
		if ($num_row < 1) {

			$insert_row = $mysqli->query("INSERT INTO restaurant (r_name, r_address, r_email, password) VALUES ('$rname', '$address', '$email', '$spassword')");

			if ($insert_row) {

				$_SESSION['login'] = $mysqli->insert_id;
				$_SESSION['fname'] = $rname;
				$_SESSION['role'] = 'restaurant';
				echo 'true';

			}

		} else {

			echo 'false';

		}
		
}

?>