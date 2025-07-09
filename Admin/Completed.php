<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Completed.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;900&display=swap" rel="stylesheet">
    <title>A.Point</title>
</head>
<body>
    <div class="container">
        <h1 class="lbl_adm">ADMIN</h1>
        <p class="lbl_cmpt">Completed</p>
    <form class="search" method="POST">
        <input type="text" id="receipt_number" name="receipt_number" placeholder="Enter Receipt Number">
        <input type="submit" value="Search">
    </form>
        <div class="outer-box">
            <div class="table-box">
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
// check if the receipt number is submitted
if(isset($_POST['receipt_number'])) {
  $receipt_number = $_POST['receipt_number'];
  // query the database with the receipt number
  $sql = "SELECT * FROM completed WHERE receipt_number = '$receipt_number'";
  $result = mysqli_query($conn, $sql);

  // check if there is a matching appointment in the database
  if(mysqli_num_rows($result) > 0) {
      // display the matching appointment in a table
      echo "<table>";
      echo "<tr>
                <th>Receipt Number</th>
                <th>Appointment Date</th>
                <th>Time</th>
                <th>Requirements</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>";
      while($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td>" . $row['receipt_number'] . "</td><td>" . $row['date'] . "</td><td>" . $row['time'] . "</td><td>" . $row['requirements'] . "</td><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phone'] . "</td><td><a href='o_completed.php?id=" . $row['id'] . "' class=\"act\">Open</a></td></tr>";
      }
      echo "</table>";
  }
  else {
      echo "No appointment found with receipt number $receipt_number.";
  }
}
else {
    // select all the data from the completed table
    $sql = "SELECT * FROM completed";
    $result = mysqli_query($conn, $sql);

    // check if there are any appointments in the database
    if(mysqli_num_rows($result) > 0) {
      // display the data in a table
      echo "<table>";
      echo "<tr>
                   <th>Receipt Number</th>
                   <th>Appointment Date</th>
                   <th>Time</th>
                   <th>Requirements</th>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Phone</th>
                   <th>Action</th>
            </tr>";
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['receipt_number'] . "</td><td>" . $row['date'] . "</td><td>" . $row['time'] . "</td><td>" . $row['requirements'] . "</td><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phone'] . "</td><td><a href='o_completed.php?id=" . $row['id'] . "' class=\"act\">Open</a></td></tr>";
      }
      echo "</table>";
    }
    else {
      echo "No appointments found.";
    }
  }
    // close the database connection
    mysqli_close($conn);
  ?>
            </div>
            </div>
        <a href="MainUser.php" class="bck">Back</a>

    </div>




</body>
</html>