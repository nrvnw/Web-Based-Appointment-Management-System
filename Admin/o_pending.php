<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="o_pending.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;900&display=swap" rel="stylesheet">
    <title>A.Point</title>
</head>
<body>
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
      $sql = "SELECT * FROM appointments WHERE id=$id";
      $result = mysqli_query($conn, $sql);
        // check if the appointment exists
      if(mysqli_num_rows($result) > 0) {
        // display the appointment data
        $row = mysqli_fetch_assoc($result);

        echo "<div class=\"container\">";
        
        echo "<h1 class=\"lbl_adm\">ADMIN</h1>";
        echo "<p class=\"lbl_pnd\">Pending Request</p>";
        echo "<p class=\"lbl_rcpt\">Receipt No.</p>";
        echo "<p class=\"lbl_rnum\"> " . $row['receipt_number'] . "</p>";
        echo "<p class=\"date\"> " . $row['date'] . "</p>";
        echo "<p class=\"time\"> " . $row['time'] . "</p>";

        echo "<div class=\"f-doc\">";

        echo "<h1> " . $row['name'] . "</h1>";
        echo "<p class=\"eml\"> " . $row['email'] . "</p>";
        echo "<p class=\"stdN\"> " . $row['phone'] . "</p>";
        echo "<a id=\"preview-link\" class=\"PrvFile\">No File Selected</a>";
        echo "<form method='post' action='upload.php' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='appointment_id' value='" . $row['id'] . "'>";
        echo "<label for='file-upload' class='adfl'>Add File +</label>";
        echo "<input type='file' id='file-upload' name='file' style='display:none;'>";
        echo "<button type='submit' class='save'>Save</button>";
        echo "</form>";
        echo "</div>";
        echo "<div class=\"reqlist\">";
        echo "<p class=\"ffl\">";
        echo "    The student requested for the following document/s:";
        echo "</p>";
        
        echo "<div class=\"list\">";
        echo "<ul>";
        $requirements = explode(',', $row['requirements']);
    foreach ($requirements as $req) {
        echo "<li>" . $req . "</li><br>";
    }
        echo "</ul>";
        echo "</div>";
        


    $requirements_values = array(
      'Certificate of Grades (COG)' => 30, ' Certificate of Grades (COG)' =>30,
      'Certificate of Graduation' => 30, ' Certificate of Graduation' => 30,
      'Certificate of Enrollment' => 30, ' Certificate of Enrollment' => 30,
      'CAV S.O Cert.' => 30, ' CAV S.O Cert.' => 30,
      'Certificate of Earned Units' => 30, ' Certificate of Earned Units' => 30,
      'CHED Endorsement' => 30, ' CHED Endorsement' => 30,
      'Certificate of Incumbent' => 30, ' Certificate of Incumbent' => 30,
      'GWA Certification' => 30, ' GWA Certification' => 30,
      'Evaluation Form' => 30, ' Evaluation Form' => 30,
      'Subject Credit Form' => 30, ' Subject Credit Form' => 30,
      'Shifting Form' => 30, ' Shifting Form' => 30,
      'Completion Form' => 30, ' Completion Form' => 30,
      'AW/Adding/Dropping Form' => 30, ' AW/Adding/Dropping Form' => 30,
      'CAV (3 sets per document)' => 80, ' CAV (3 sets per document)' => 80,
      'COM Reprint' => 120, ' COM Reprint' => 120,
      'Diploma' => 100, ' Diploma' => 100,
      'Cert. for Candidacy for Grad' => 30, ' Cert. for Candidacy for Grad' => 30,
      'Medium of Instruction' => 30, ' Medium of Instruction' => 30,
    );
    
    // calculate the total value of the requirements
    $total_value = 0;
    $requirements = explode(',', $row['requirements']);
    foreach ($requirements as $req) {
      if (isset($requirements_values[$req])) {
        $total_value += $requirements_values[$req];
      }
    }
    
    // output the total value
    echo "<p class=\"lbl_total\">TOTAL:</p>";
    echo "<p class=\"lbl_tNum\">" . $total_value . " PHP</p>";
   
    echo"</div>";


    echo"<a href=\"Pending.php\" class=\"bck\">Back</a>";
        
    echo"</div>";
      }
      else {
        echo"No receipt number.";
      }
      mysqli_close($conn);
    }
    else {
      echo "Invalid request.";
    }
  ?>

<script>
  const fileUpload = document.getElementById('file-upload');
  const previewLink = document.getElementById('preview-link');

  fileUpload.addEventListener('change', () => {
    previewLink.textContent = fileUpload.files[0].name;
  });
</script>



</body>
</html>