<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="MainUser.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;900&display=swap" rel="stylesheet">
    <title>A.Point</title>
</head>
<body>
    <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "school_appointments";

        // Create connection
        $conn = mysqli_connect($host, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        
        // get the number of rows in the table
        $tables = array("appointments", "filecheck", "completed");
        
        foreach ($tables as $table) {
            $stmt = $pdo->query("SELECT COUNT(*) FROM $table");
            $count = $stmt->fetchColumn();
            echo str_pad($count, 4, "0", STR_PAD_LEFT) . "\n";
        }

        // Count the number of rows in the "appointments" table
        $stmt = $pdo->query("SELECT COUNT(*) FROM appointments");
        $pendingCount = $stmt->fetchColumn();

        // Count the number of rows in the "file_check" table
        $stmt = $pdo->query("SELECT COUNT(*) FROM filecheck");
        $fileCheckCount = $stmt->fetchColumn();

        // Count the number of rows in the "completed" table
        $stmt = $pdo->query("SELECT COUNT(*) FROM completed");
        $completedCount = $stmt->fetchColumn();

        // Close connection
        mysqli_close($conn);
    ?>

    <div class="container">
        <div class="nav">
            <h1 class="admin">Appointments</h1>
            <div class="Profile"></div>
            <h1 class="name">ADMIN</h1>
            <h2 class="aNum"></h2>

            <a href="" class="db">Dashboard</a>

            <a href="../LogIn/LoginPageAdmin.php" class="lo">Log Out</a>
        </div>
        <div class="Pending">
            <h1  class="pnd"> <?php echo sprintf("%04d", $pendingCount); ?> </h1>
            <a href="Pending.php">Pending</a>
        </div>
        <div class="File_Checking">
            <h1> <?php echo sprintf("%04d", $fileCheckCount); ?> </h1>
            <a href="FileChecking.php">File Checking</a>
        </div>
        <div class="Completed">
            <h1> <?php echo sprintf("%04d", $completedCount); ?> </h1>
            <a href="Completed.php">Completed</a>
        </div>
    </div>
</body>
</html>
