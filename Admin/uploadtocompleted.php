<?php
// connect to the database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "school_appointments";

$conn = mysqli_connect($host, $username, $password, $dbname);

// check if the connection is successful
if(!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// check if appointment id is provided
if(isset($_POST["appointment_id"])) {
  $appointment_id = $_POST["appointment_id"];

  // transfer the data from appointments to completed table
  $sql = "INSERT INTO completed (date, time, requirements, name, email, phone, receipt_number, documents) SELECT date, time, requirements, name, email, phone, receipt_number, documents FROM filecheck WHERE id = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $appointment_id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);


  // delete the row from filecheck table
  $sql = "DELETE FROM filecheck WHERE id = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $appointment_id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  // Redirect to FileCheck.php
  header("Location: FileChecking.php");
  exit;
}
else {
  // Redirect to o_pending.php
  header('Location: '.$_SERVER['HTTP_REFERER']);
  exit;
}

// close the database connection
mysqli_close($conn);
