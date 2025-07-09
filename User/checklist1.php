<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cL1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;900&display=swap" rel="stylesheet">
    <title>A.Point</title>
</head>
<body>
<?php
      session_start();
      if(isset($_POST['date']) && isset($_POST['time'])) {
        $_SESSION['date'] = $_POST['date'];
        $_SESSION['time'] = $_POST['time'];
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
            <form class="ch-form" action="checklist2.php" method="post">
                <div class="left-ch">
                    <ul class="cert">
                        <p class="txt_cert">Cerfiticate</p>
                        <li>
                            <input type="checkbox" value="Certificate of Grades (COG)" id="ch-cog" name="requirements[]">
                            <label class="name" for="ch-cog">&nbsp;&nbsp; Certificate of Grades (COG) &nbsp;&nbsp;</label>
                            <label class="price" for="ch-cog">PHP 30</label>
                        </li>

                        <li>
                            <input type="checkbox" value="Certificate of Graduation" id="ch-cograd" name="requirements[]">
                            <label class="name" for="ch-cograd">&nbsp;&nbsp; Certificate of Graduation&nbsp;&nbsp;  </label>
                            <label class="price" for="ch-cograd">PHP 30</label>
                        </li>
    
                        <li>
                            <input type="checkbox" value="Certificate of Enrollment" id="ch-coe" name="requirements[]">
                            <label class="name" for="ch-cograd">&nbsp;&nbsp; Certificate of Enrollment&nbsp;&nbsp;  </label>
                            <label class="price" for="ch-coe">PHP 30</label>
                        </li>
    
                        <li>
                            <input type="checkbox" value="CAV S.O Cert." id="ch-CAV" name="requirements[]">
                            <label class="name" for="ch-CAV">&nbsp;&nbsp; CAV S.O Cert.&nbsp;&nbsp;  </label>
                            <label class="price" for="ch-CAV">PHP 30</label>
                        </li>

                        <li>
                            <input type="checkbox" value="Certificate of Earned Units" id="ch-ceu" name="requirements[]">
                            <label class="name" for="ch-ceu">&nbsp;&nbsp; Certificate of Earned Units&nbsp;&nbsp;  </label>
                            <label class="price" for="ch-ceu">PHP 30</label>
                        </li>
    
                        <li>
                            <input type="checkbox" value="CHED Endorsement" id="ch-cEnd" name="requirements[]">
                            <label class="name" for="ch-cEnd">&nbsp;&nbsp; CHED Endorsement&nbsp;&nbsp; </label>
                            <label class="price" for="ch-cEnd">PHP 30</label>
                        </li>
                        
                        <li>
                            <input type="checkbox" value="Certificate of Incumbent" id="ch-cIncum" name="requirements[]">
                            <label class="name" for="ch-cIncum">&nbsp;&nbsp; Certificate of Incumbent&nbsp;&nbsp; </label>
                            <label class="price" for="ch-cIncum">PHP 30</label>
                        </li>
    
                        <li>
                            <input type="checkbox" value="GWA Certification" id="ch-GWA" name="requirements[]">
                            <label class="name" for="ch-GWA">&nbsp;&nbsp; GWA Certification&nbsp;&nbsp; </label>
                            <label class="price" for="ch-GWA">PHP 30</label>
                        </li>
                    </ul>
                </div>
               <div class="right-ch">
                <ul class="forms">
                    <p class="txt_form">Form</p>
                    <li> 
                        <input type="checkbox" value="Evaluation Form" id="ch-EvalF" name="requirements[]">
                        <label class="name" for="ch-EvalF">&nbsp;&nbsp; Evaluation Form&nbsp;&nbsp; </label>
                        <label class="price" for="ch-EvalF">PHP 30</label>
                    </li>

                    <li>
                        <input type="checkbox" value="Subject Credit Form" id="ch-SubCred" name="requirements[]">
                        <label class="name" for="ch-SubCred">&nbsp;&nbsp; Subject Credit Form&nbsp;&nbsp; </label>
                        <label class="price" for="ch-SubCred">PHP 30</label>
                    </li>

                    <li>
                        <input type="checkbox" value="Shifting Form" id="ch-ShiftF" name="requirements[]">
                        <label class="name" for="ch-ShiftF">&nbsp;&nbsp; Shifting Form&nbsp;&nbsp; </label>
                        <label class="price" for="ch-ShiftF">PHP 30</label>
                    </li>

                    <li>
                        <input type="checkbox" value="Completion Form" id="ch-ComF" name="requirements[]">
                        <label class="name" for="ch-ComF"> &nbsp;&nbsp;  Completion Form &nbsp;&nbsp;   </label>
                        <label class="price" for="ch-ComF">PHP 30</label>
                    </li>

                    <li>
                        <input type="checkbox" value="AW/Adding/Dropping Form" id="ch-AW-Add-Drop" name="requirements[]">
                        <label class="name" for="ch-AW-Add-Drop"> &nbsp;&nbsp; AW/Adding/Dropping Form &nbsp;&nbsp; </label>
                        <label class="price" for="ch-AW-Add-Drop">PHP 30</label>
                    </li>
                </ul>
               </div>
                
                <input type="submit" value="Next" id="ch-Next" name="ch-Next" >
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
            // Get all the checkboxes
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');

            // Add event listeners to each checkbox
            checkboxes.forEach(function(checkbox) {
              checkbox.addEventListener('change', function() {
                let subtotal = 0;
                checkboxes.forEach(function(checkbox) {
                  if (checkbox.checked) {
                    // Add the price of the checked vegetable to the subtotal
                    if (checkbox.value === 'Certificate of Grades (COG)') {
                      subtotal += 30;
                    } else if (checkbox.value === 'Certificate of Graduation') {
                      subtotal += 30;
                    } else if (checkbox.value === 'Certificate of Enrollment') {
                      subtotal += 30;
                    } else if (checkbox.value === 'CAV S.O Cert.') {
                      subtotal += 30;
                    } else if (checkbox.value === 'Certificate of Earned Units') {
                      subtotal += 30;
                    } else if (checkbox.value === 'CHED Endorsement') {
                      subtotal += 30;
                    } else if (checkbox.value === 'Certificate of Incumbent') {
                      subtotal += 30;
                    }else if (checkbox.value === 'GWA Certification') {
                      subtotal += 30;
                    ///////left-ch//////

                    } else if (checkbox.value === 'Evaluation Form') {
                      subtotal += 30;
                    } else if (checkbox.value === 'Subject Credit Form') {
                      subtotal += 30;
                    } else if (checkbox.value === 'Shifting Form') {
                      subtotal += 30;
                    } else if (checkbox.value === 'Completion Form') {
                      subtotal += 30;
                    } else if (checkbox.value === 'AW/Adding/Dropping Form') {
                      subtotal += 30;
                    ///////right-ch//////
                  }
                }
                });
                // Update the subtotal displayed on the page
                document.getElementById('subtotal').innerHTML = subtotal.toFixed(2);

                // Store the subtotal value in a cookie
                document.cookie = `subtotal=${subtotal.toFixed(2)}`;
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
            <h1 class="b"><a href="SDate_Time.php">Back</a></h1>
        </div>
    </div>

    
</body>
</html>