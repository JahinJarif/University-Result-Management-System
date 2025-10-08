<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body>
<?php
    session_start();

    $user = $_REQUEST['reg'];
    $pass = $_REQUEST['pass'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "transcript";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM student_credential";
    $result = mysqli_query($conn, $sql);

    $login_success = false;

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["registration_no."] == $user && $row["password"] == $pass) {
                $_SESSION['reg'] = $row["registration_no."];
                $login_success = true;
                break;
            }
        }
    }

    mysqli_close($conn);

    if ($login_success) {
        echo "<script>window.location.href = 'student_panel.php';</script>";
    } else {
        echo "<script>window.location.href = 'index.php';</script>";
    }
?>   
    </body>
</html> 