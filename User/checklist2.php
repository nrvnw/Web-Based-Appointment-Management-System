<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cL2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;900&display=swap" rel="stylesheet">
    <title>A.Point</title>
</head>
<body>
<?php
      session_start();
      if(isset($_POST['requirements'])) {
        $_SESSION['requirements'] = $_POST['requirements'];
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

        <div class="cL1">
            <div class ="Q">
                <h1>What Do You Need?</h1>
                <h2>Put a Check on Needs</h2>
            </div>

             <div class="grid-container">
                <form class="ch-form" action="personalInfo.php" method="post" >
                    <div class="left-ch">
                        <ul class="cavp">
                            <p class="txt_cav">For CAV Request</p>
                            <li>
                                <input type="checkbox" value="CAV (3 sets per document)" id="ch-cav3" name="requirements2[]">
                                <label class="name" for="ch-cav3">&nbsp;&nbsp; CAV (3 sets per document) &nbsp;&nbsp;</label>
                                <label class="price" for="ch-cav3">PHP 80</label>
                            </li>
                            <p class="pp">Purpose:</p>
                            <li>
                                <input type="checkbox" value="For DFA" id="ch-dfa" name="requirements2[]">
                                <label class="name" for="ch-dfa">&nbsp;&nbsp; For DFA &nbsp;&nbsp;</label>
                            </li>
                            <li>
                                <input type="checkbox" value="For CHED" id="ch-ched" name="requirements2[]">
                                <label class="name" for="ch-ched">&nbsp;&nbsp; For CHED &nbsp;&nbsp;</label>
                            </li>
                            <li>
                                <input type="checkbox" value="For PNP" id="ch-pnp" name="requirements2[]">
                                <label class="name" for="ch-pnp">&nbsp;&nbsp; For PNP &nbsp;&nbsp;</label>
                            </li>
                            <li>
                                <input type="checkbox" value="For BOARD EXAM (PRC)" id="ch-BE" name="requirements2[]">
                                <label class="name" for="ch-BE">&nbsp;&nbsp; For BOARD EXAM (PRC) &nbsp;&nbsp;</label>
                            </li>
                            <li>
                                <input type="checkbox" value="For Scholarship" id="ch-scl" name="requirements2[]">
                                <label class="name" for="ch-scl">&nbsp;&nbsp; For Scholarship &nbsp;&nbsp;</label>
                            </li>
                        </ul>
                    </div>
                    <div class="right-ch">
                        <ul class="others">
                            <p class="othersF">Others</p>
                            <li>
                                <input type="checkbox" value="COM Reprint" id="ch-com" name="requirements2[]">
                                <label class="name" for="ch-com">&nbsp;&nbsp; COM Reprint &nbsp;&nbsp;</label>
                                <label class="price" for="ch-com">PHP 120</label>
                            </li>
                            <li>
                                <input type="checkbox" value="Diploma" id="ch-dpm" name="requirements2[]">
                                <label class="name" for="ch-dpm">&nbsp;&nbsp; Diploma &nbsp;&nbsp;</label>
                                <label class="price" for="ch-dpm">PHP 100</label>
                            </li>
                            <li>
                                <input type="checkbox" value="Cert. for Candidacy for Grad" id="ch-ccg" name="requirements2[]">
                                <label class="name" for="ch-ccg">&nbsp;&nbsp; Cert. for Candidacy for Grad &nbsp;&nbsp;</label>
                                <label class="price" for="ch-ccg">PHP 30</label>
                            </li>
                            <li>
                                <input type="checkbox" value="Medium of Instruction" id="ch-MI" name="requirements2[]">
                                <label class="name" for="ch-MI">&nbsp;&nbsp; Medium of Instruction &nbsp;&nbsp;</label>
                                <label class="price" for="ch-MI">PHP 30</label>
                            </li>
                        </ul>
                    </div>
                    <input type="submit" value="Next" id="ch-Next" name="ch-Next">
                </form>
            </div>
        </div>

        <div class="Stotal">
            <div class="st_txt">
                <p>Subtotal: </p>
            </div>
            <div class="st_T">
                <p id="subtotal">0</p>
            </div>
        </div>

        <script>
// Get the subtotal from the cookie
let subtotal = parseFloat(getCookie('subtotal'));

// If the subtotal cookie is not set, set it to zero
if (isNaN(subtotal)) {
  subtotal = 0;
  document.cookie = "subtotal=0";
}

// Update the subtotal displayed on the page
document.getElementById('subtotal').innerHTML = subtotal.toFixed(2);

// Add event listeners to the checkboxes
const checkboxes = document.querySelectorAll('input[type="checkbox"]');
checkboxes.forEach(function(checkbox) {
  checkbox.addEventListener('change', function() {
    let newSubtotal = subtotal;
    checkboxes.forEach(function(checkbox) {
      if (checkbox.checked) {
        if (checkbox.value === 'CAV (3 sets per document)') {
          newSubtotal += 80;
        } else if (checkbox.value === 'COM Reprint') {
          newSubtotal += 120;
        } else if (checkbox.value === 'Diploma') {
          newSubtotal += 100;
        } else if (checkbox.value === 'Cert. for Candidacy for Grad') {
          newSubtotal += 30;
        } else if (checkbox.value === 'Medium of Instruction') {
          newSubtotal += 30;
        }
      }
    });
    document.getElementById('subtotal').innerHTML = newSubtotal.toFixed(2);
    document.cookie = "subtotal=" + newSubtotal.toFixed(2);
  });
});

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
            <h1 class="b"><a href="checklist1.php">Back</a></h1>
        </div>    

</body>
</html>