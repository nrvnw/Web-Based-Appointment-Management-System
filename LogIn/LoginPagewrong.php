<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="LoginPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;900&display=swap" rel="stylesheet">
    <title>Login</title>
    <script>
    function showPopUpMessage() {
      alert("If you have forgotten your password, please coordinate with the University MIS for assistance.");
    }
  </script>
</head>
<body>
    <div class="Container">
    <?php if(isset($error_msg)) { ?>
				<p class="error-msg"><?php echo $error_msg; ?></p>
			<?php } ?>
        <span class="dotB"></span>
        <span class="dotY"></span>
        <span class="dotP"></span>
        <div class="Plog">
            <img src="img/Login.png" class="p1">
        </div>
        <div class="Name">
            <p>A.POINT</p>
        </div>

        <div class="nav">
            <nav>
                <ul>
                    <li><a href="../User/MainUser.php">Home</a></li>
                    <li><a href="../User/MainUser.php#AU">About Us</a></li>
                    <li><a href="../User/MainUser.php#contacts">Contacts</a></li>
                    <button class="button1" ><a href="">Log In</a></button>
                </ul>
            </nav>
        </div>


        <div class="box">
            <div class="wlcm">
                <h1>WELCOME</h1>
            </div>

            <form action="login_process.php" method="post">
                <input type="text" name="studentID" id="studentID" placeholder="Enter your Student ID">
                <input type="password" name="Password" id="Password" placeholder="Enter your Password">
                <input type="submit" id="login" value="Login">
                <div class="invalid">
                    <label>Invalid Credentials</label>
            </div>
            </form>

            <button onclick="showPopUpMessage()" type="submit" name="login_btn" class="FPass" ><a href="">Forgot Password?</a></button>
        </div>
    </div> 

</body>
</html>
