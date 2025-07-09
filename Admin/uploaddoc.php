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

// check if the appointment ID is set
if(isset($_POST['appointment_id']) && isset($_FILES['file'])) {
  $id = $_POST['appointment_id'];
  
  // read the file content into a variable
  $file_data = file_get_contents($_FILES['file']['tmp_name']);

  // prepare the SQL statement
  $stmt = mysqli_prepare($conn, "UPDATE filecheck SET documents=? WHERE id=?");
  mysqli_stmt_bind_param($stmt, "si", $file_data, $id);

  // execute the prepared statement
  if(mysqli_stmt_execute($stmt)) {
    // redirect back to the previous page
    header('Location: '.$_SERVER['HTTP_REFERER']);
    exit;
  }
  else {
    echo "Error updating file: " . mysqli_error($conn);
  }

  // close the prepared statement
  mysqli_stmt_close($stmt);
}
else {
  echo "Invalid request.";
}

// close the database connection
mysqli_close($conn);

?>
