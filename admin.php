<?php
    session_start();
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

    $sql = "SELECT * FROM application";
    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        .font-exo-2 {
            font-family: "Exo 2", sans-serif;
            font-optical-sizing: auto;
            font-weight: 700;
            font-style: normal;
        }
        #sidebar{
            height: calc(100vh - 80px);
        }
        .main{
           height: calc(100vh - 80px);
        }
        .main-1{
            height: calc(100vh - 350px); 
        }
        html{
            background-color:#45a863;
        }
        .row{
            display: flex;
            align-items: center; 
        }
        .row h3 {
            flex: 0 0 350px; /* Fixed width for headings */
            margin: 0;
            font-size: 16px;
        }
        .row input {
            flex: 1; /* Each input takes up equal space */
            padding: 8px;
            font-size: 14px;
            width:130px;
        }
    </style>
    <title>Document</title>
</head>
<body class="font-exo-2">
    <div class="flex flex-col">
        <div class="fixed h-20 navbar bg-[#32a856] shadow-sm z-10">
            <div class="flex-1">
                <div class="flex items-center gap-5 ml-5">
                    <img src="images/jkkniu.png">
                    <h1 class="font-exo-2 text-[8px] sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-white">Jatiya Kabi Kazi Nazrul Islam University</h1>
                </div>
            </div>
            <div class="flex gap-2">
                <div class="dropdown dropdown-end">
                    <div id="avatar" tabindex="0" role="button" class="btn btn-ghost btn-circle avatar mr-8">
                        <div class="w-10 rounded-full">
                            <img alt="Tailwind CSS Navbar component" src="images/<?php echo htmlspecialchars('sf61561' . '.jpg'); ?>"  />
                        </div>
                    </div>
                    <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                        <li>
                            <span id="username" class="justify-between">
                                <?php
                                echo $_SESSION["role"]?>
                            </span>
                        </li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
        <table class="table mt-[80px] text-center">
            <thead>
                <tr>
                    <th>Date & Time</th>
                    <th>Name</th>
                    <th>Registration_No.</th>
                    <th>Semester</th>
                    <th>Application Form</th>
                    <th>Payment Slip</th>
                    <th>Admit Card</th>
                    <th>Approval</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sql1 = "SELECT * FROM student_db WHERE reg = '" . $row['reg'] . "'";
                            $result1 = mysqli_query($conn, $sql1);
                            echo "<tr>";
                            echo "<td>" . $row["date_and_time"] . "</td>";
                            if (mysqli_num_rows($result1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    echo "<td>" . $row1['name_E'] . "</td>";
                                  }
                            }  // Assuming "name" is a column
                            echo "<td>" . $row["reg"] . "</td>";
                            echo "<td>" . $row["semester"] . "</td>";
                            echo "<td><a href='uploads/".$row["reg"]."/application_form.pdf' download='application_form.pdf'>Download</a></td>";
                            echo "<td><a href='uploads/".$row["reg"]."/payment_slip.pdf' download='payment_slip.pdf'>Download</a></td>";
                            echo "<td><a href='uploads/".$row["reg"]."/admit_card.pdf' download='admit_card.pdf'>Download</a></td>";
                            echo "<td><form class='flex flex-col' action='update_approval.php' method='post'>
                            <input type='hidden' name='reg' value='" . $row['reg'] . "'>
                            <input type='hidden' name='semester' value='" . $row['semester'] . "'>
                            <div><input type='checkbox' name='checkbox1' id='checkbox1_" . $row['reg'] . "_" . $row['semester'] . "'>Head of Department</div>
                            <div><input type='checkbox' name='checkbox2' id='checkbox2_" . $row['reg'] . "_" . $row['semester'] . "' onclick='toggleAccess2()'>Hall Provost</td><td>
                            <input type='submit' value='Submit' class='btn btn-success bg-[#32a856] mt-7 text-white mb-10'/></form></div></td>";
                            if ($_SESSION['role'] == 'head') {
                                $sql3 = "SELECT * FROM application WHERE reg = '" . $row['reg'] . "' AND semester = '" . $row['semester'] . "'";
                                $result3 = mysqli_query($conn, $sql3);
                                $_SESSION['check']='checkbox1';
                            
                                if (mysqli_num_rows($result3) > 0) {
                                    $row3 = mysqli_fetch_assoc($result3);
                                    if ($row3['approval_head'] == 1) {
                                        echo "<script>
                                                document.getElementById('checkbox1_" . $row['reg'] . "_" . $row['semester'] . "').checked = true;
                                                document.getElementById('checkbox1_" . $row['reg'] . "_" . $row['semester'] . "').disabled = true;
                                              </script>";
                                    }
                                    if ($row3['approval_hall_provost'] == 1) {
                                        echo "<script>
                                                document.getElementById('checkbox2_" . $row['reg'] . "_" . $row['semester'] . "').checked = true;
                                                document.getElementById('checkbox2_" . $row['reg'] . "_" . $row['semester'] . "').disabled = true;
                                              </script>";
                                    }
                                }
                                else
                                    echo "<script>document.getElementById('checkbox1_" . $row['reg'] . "_" . $row['semester'] . "').disabled = false;</script>";
                                echo "<script>document.getElementById('checkbox2_" . $row['reg'] . "_" . $row['semester'] . "').disabled = true;</script>";
                            }
                            else if($_SESSION['role'] == 'hall_provost')
                            {
                                $sql3 = "SELECT * FROM application WHERE reg = '" . $row['reg'] . "' AND semester = '" . $row['semester'] . "'";
                                $result3 = mysqli_query($conn, $sql3);
                                $_SESSION['check']='checkbox2';
                            
                                if (mysqli_num_rows($result3) > 0) {
                                    $row3 = mysqli_fetch_assoc($result3);
                                    if ($row3['approval_hall_provost'] == 1) {
                                        echo "<script>
                                                document.getElementById('checkbox2_" . $row['reg'] . "_" . $row['semester'] . "').checked = true;
                                                document.getElementById('checkbox2_" . $row['reg'] . "_" . $row['semester'] . "').disabled = true;
                                              </script>";
                                    }
                                    if ($row3['approval_head'] == 1) {
                                        echo "<script>
                                                document.getElementById('checkbox1_" . $row['reg'] . "_" . $row['semester'] . "').checked = true;
                                                document.getElementById('checkbox1_" . $row['reg'] . "_" . $row['semester'] . "').disabled = true;
                                              </script>";
                                    }
                                }
                                else
                                    echo "<script>document.getElementById('checkbox2_" . $row['reg'] . "_" . $row['semester'] . "').disabled = false;</script>";
                                echo "<script>document.getElementById('checkbox1_" . $row['reg'] . "_" . $row['semester'] . "').disabled=true;</script>";
                            }
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
        </div>
    </div>
    <script>
    
</script>
</body>
</html>