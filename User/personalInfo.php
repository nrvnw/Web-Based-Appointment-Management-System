<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pInfo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;900&display=swap" rel="stylesheet">
    <title>A.Point</title>
</head>
<body>
<?php
  session_start();
  if(isset($_POST['requirements2'])) {
    $_SESSION['requirements2'] = $_POST['requirements2'];
  }
  else {
    $_SESSION['requirements2'] = null;
    
  }
?>

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
                    <li><a href="">Home</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contacts</a></li>
                    <button class="button1" ><a href="../LogIn/loginPage.php">Log out</a></button>
                </ul>
            </nav>
        </div>

        <div class="title">
            <h1>Appointment Form</h1>
            <div class="line"></div>
        </div>

        <div class="Info">
            <h1>Please fill out the form to confirm:</h1>
            <form method= "post" class="infoF" action="confirmation.php">
                <div class="name">
                    <label>Name</label>
                    <input type="text" name="name" id="name" placeholder="Last Name, First Name M.I">
                </div>
                <div class="IE">
                    <label>Institutional Email</label>
                    <input type="email" name="email" id="email" placeholder="@plmun.edu.ph">
                </div>
                <div class="mNum">
                    <label>Mobile Number</label>
                    <input type="tel" id="phone" name="phone"
                        pattern="[0-9]{11}"
                        required placeholder="09XXXXXXXX">
                </div>
                    <input type="submit" name="In-Next" value="Next" id="In-Next">

            </form>
        </div>

        <div class="buttons">
            <h1 class="b"><a href="checklist2.php">Back</a></h1>

        </div>
    </div>
</body>
</html>