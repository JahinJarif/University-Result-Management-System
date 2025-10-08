<?php
    $search = $_REQUEST['search'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "transcript";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_set_charset($conn, "utf8mb4");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM student_db WHERE roll = '$search'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $name= $row['name_E'];
            $roll= $row['roll'];
            $session= $row['session'];
            echo $name . "," . $roll . "," . $session;
        }
    }
    mysqli_close($conn);
?>