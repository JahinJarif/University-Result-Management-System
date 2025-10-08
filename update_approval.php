<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "transcript";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $reg=$_REQUEST['reg'];
    $semester=$_REQUEST['semester'];

    if($_SESSION['role']=='head'){
        $a = $_SESSION['check'];
        $check = 0; // Default: checkbox is not checked
        if (isset($_REQUEST[$a]) && $_REQUEST[$a] == "on") {
            $check = 1;
        }
        $sql = "UPDATE application SET approval_head='$check' WHERE reg='$reg' AND semester='$semester'";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        echo "<script>window.location.href = 'admin.php';</script>";
    }
    else if($_SESSION['role']=='hall_provost'){
        $a = $_SESSION['check'];
        $check = 0; // Default: checkbox is not checked
        if (isset($_REQUEST[$a]) && $_REQUEST[$a] == "on") {
            $check = 1;
        }
        $sql = "UPDATE application SET approval_hall_provost='$check' WHERE reg='$reg' AND semester='$semester'";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        echo "<script>window.location.href = 'admin.php';</script>";
    }
?>