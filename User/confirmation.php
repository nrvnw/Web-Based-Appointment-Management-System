<?php
session_start();

// check if the user has submitted the form
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {

    // get the user's selected date and time from the session
    $date = $_SESSION['date'];
    $time = $_SESSION['time'];


    $requirements1 = isset($_SESSION['requirements']) ? $_SESSION['requirements'] : array();
    $requirements2 = isset($_SESSION['requirements2']) ? $_SESSION['requirements2'] : array();

    $requirements = implode(', ', array_merge($requirements1, $requirements2));

    // generate a random receipt number
    $receipt_number = rand(100000, 999999);

    // set the receipt number in the session
    $_SESSION['receipt_number'] = $receipt_number;

    // get the user's personal information from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // connect to the database
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school_appointments";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    // check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // prepare the SQL statement with placeholders
    $stmt = mysqli_prepare($conn, "INSERT INTO appointments (date, time, requirements, receipt_number, name, email, phone) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // bind the parameters to the placeholders
    mysqli_stmt_bind_param($stmt, "sssssss", $date, $time, $requirements, $receipt_number, $name, $email, $phone);

    // execute the SQL statement
    $result = mysqli_stmt_execute($stmt);

    // check if the insertion was successful or not
    if (!$result) {
        die("Error inserting data: " . mysqli_error($conn));
    }

    // close the prepared statement
    mysqli_stmt_close($stmt);

    // close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="confirm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;900&display=swap" rel="stylesheet">
    <title>A.Point</title>
</head>
<body>
    <div class="Container">
        <span class="dotB"></span>
        <span class="dotY"></span>
        <span class="dotP"></span>

        <div class="Name">
            <p>A.POINT</p>
        </div>

        <div class="nav">
            <nav>
                <ul>
                    <li><a href="LoggedInMainUser.php">Home</a></li>
                    <li><a href="LoggedInMainUser.php#AU">About Us</a></li>
                    <li><a href="LoggedInMainUser.php#contacts">Contacts</a></li>
                    <button class="button1" ><a href="../LogIn/loginPage.php">Log out</a></button>
                </ul>
            </nav>
        </div>

        <div class="title">
            <h1>Appointment Form</h1>
            <div class="line"></div>
        </div>
        <div class="Summary">
            <h1 class="apt">Appointment Summary</h1>
            <h2>Here are the details of your booking:</h2>
            <div class="label">
                <p class="dtb">Date & Time Booked</p>
                <p class="datetime"><?php echo $_SESSION['date']; ?> | <?php echo $_SESSION['time']; ?></p> 

            </div>
            <div class="details">
                <p class="sb">Services Booked</p>
                <br>


                <div class="list">
                <ul class="sbList">
    <?php
    if (isset($_SESSION['requirements']) && count($_SESSION['requirements']) > 0) {
        foreach($_SESSION['requirements'] as $requirement) {
            echo "<li>" . $requirement . "</li>";
        }
    }
    if (isset($_SESSION['requirements2']) && count($_SESSION['requirements2']) > 0) {
        foreach($_SESSION['requirements2'] as $requirement) {
            echo "<li>" . $requirement . "</li>";
        }
    }
    if (!isset($_SESSION['requirements']) && !isset($_SESSION['requirements2'])) {
        echo "<li>None</li>";
    }
    ?>
    </ul>
           </div>
           </div>
           
            <div class="Stotal">
            <div class="st_txt">
            <p>Total: </p>
            </div>
            <div class="st_T">
                <p class="total" id="subtotal"></p> 
            </div>     
         </div>
     </div>
        <script>
    // Get the subtotal from the cookie
    const subtotal = parseFloat(getCookie('subtotal'));

    // Update the subtotal displayed on the page
    document.getElementById('subtotal').innerHTML = subtotal.toFixed(2);

    // Function to get cookie value by name
    function getCookie(name) {
      const value = `; ${document.cookie}`;
      const parts = value.split(`; ${name}=`);
      if (parts.length === 2) {
        return parts.pop().split(';').shift();
      }
    }
  </script>

        <div class="buttons">
            <h1 class="b"><a href="">Back</a></h1>
            <a href="receipt.php">
                <input type="submit" name="S-confirm" value="Confirm" id="S-Confirm" >
            </a>

        </div>
    </div>

</body>
</html>