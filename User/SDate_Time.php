<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Sdate_Time.css">
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

        <div class="Sched">
            <h1>When do you want to come?</h1>
            <form method="POST" action="checklist1.php">
                <div class="date">
                    <label>Select a Date</label>
                    <input type="date" name="date" id="date">
                </div>
                <div class="hour">
                    <label>Select an Hour</label>
                    <input type="time" name="time" id="time">
                </div>
                <input type="submit" value="Next" id="DT-Next" >
            </form>
        </div>

        <div class="buttons">
            <h1 class="b"><a href="MainUser.html">Back</a></h1>
        </div>
    </div>


</body>
</html>