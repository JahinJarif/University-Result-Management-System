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
        $user=$_REQUEST['user'];
        $pass=$_REQUEST['pass'];
        $servername = "localhost";
        $username = 'root';
        $password = '';
        $dbname = "transcript";

    // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM admin";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result)) {
                if ($row["password"] == $pass) { // Replace with password_verify if passwords are hashed
                    $_SESSION["role"] = $row["username"];
                    header("Location: admin.php");
                } else {
                    echo "<script>window.location.href = 'index.php';</script>";
                }
            }
        }
        else
        {
            echo "0 results";
        }
        mysqli_close($conn);
    ?>   
    </body>
</html> 