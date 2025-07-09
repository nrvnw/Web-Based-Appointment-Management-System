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

// Get student number and password from form
$studentID = $_POST['studentID'];
$Password = $_POST['Password'];

// Check if student exists in database
$sql = "SELECT * FROM students WHERE studentID='$studentID' AND Password='$Password'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
	// Student exists, redirect to dashboard
	$_SESSION['studentID'] = $studentID;
	header('Location: ../User/SDate_Time.php');
} else {
	// Student doesn't exist, show error message
	header("Location: LoginPagewrong.php");
}

// Close database connection
mysqli_close($conn);
?>