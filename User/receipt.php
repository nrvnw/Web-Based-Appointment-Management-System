<?php
  session_start();

  // check if the user has submitted the form
  if(isset($_SESSION['receipt_number'])) {
    // get the receipt number from the session
    $receipt_number = $_SESSION['receipt_number'];

    // display the receipt number
    echo "";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="receipt.css">
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
            <h1>Appointment Confirmation</h1>
            <div class="rNum">
                <p>Your Appointment is Complete</p>
                <h1>Receipt Number</h1>
                <h2><?php echo $receipt_number; ?></h2>
            </div>
            <div class="Reminders">
                <p>You will receive an appointment Confirmation by
                    email. If you do not receive an email in 5 minutes,
                    Check your junk mail or spam folder. to the Treasury Office: (1)Pay, (2)Present your receipt Number, (3)claim</p>
                
            </div>
        </div>
        <div class="buttons">
            <h1 class="b"><a href="personalInfo.php">Back</a></h1>
            <a href="LoggedInMainUser.php">
                <input type="submit" name="S-confirm" value="Confirm" id="S-Confirm">
            </a>
        </div>
    </div>

</body>
</html>