<?php
// Start session
session_start();
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "people";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Check if connection failed
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Get admin number and password from form
$ID_number = $_POST['ID_number'];
$Password = $_POST['Password'];

// Check if admin exists in database
$sql = "SELECT * FROM admin WHERE ID_number='$ID_number' AND Password='$Password'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
	// admin exists, redirect to dashboard
	$_SESSION['ID_number'] = $ID_number;
	header('Location: ../Admin/MainUser.php');
} else {
	// admin doesn't exist, show error message
	header("Location: LoginPagewrongAdmin.php");
}

// Close database connection
mysqli_close($conn);
?>