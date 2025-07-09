<?php
    // check if the appointment ID is set
    if(isset($_GET['id'])) {
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

      // select the appointment data from the database
      $id = $_GET['id'];
      $sql = "SELECT * FROM filecheck WHERE id=$id";
      $result = mysqli_query($conn, $sql);
        // check if the appointment exists
      if(mysqli_num_rows($result) > 0) {
        // display the appointment data
        $row = mysqli_fetch_assoc($result);
        
        // Set the content type and disposition headers
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; documents="' . $row['documents'] . '"');
        
        // Output the PDF file content
        echo $row['documents'];
      }
    }
?>
