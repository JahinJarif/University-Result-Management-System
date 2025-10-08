<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"="width=device-width, initial-scale=1.0">
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
        html{
            background-color:#45a863;
        }
        .main{
            height: calc(100vh - 80px);
        }
        .line {
            position: relative;
            width: 60px;
            height: 2px;
            background: black;
        }
        .line::after {
            content: attr(data-label);
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding: 0 4px;
            font-size: 14px;
        }
    </style>
    <title>Document</title>
</head>
<body class="font-exo-2">
    <div class="flex flex-col">
        <div class="h-20 navbar bg-[#32a856] shadow-sm z-10">
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
                                session_start();
                                echo $_SESSION['reg']?>
                            </span>
                        </li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="w-screen main flex flex-col justify-center items-center gap-10">
            <button class="font-exo-2 btn hover:btn-outline hover:bg-[#198754] hover:text-white btn-xs sm:btn-sm md:btn-md lg:btn-lg xl:btn-xl"><a href="https://billpay.sonalibank.com.bd/JKKNIU/OthersFee/"  target="_blank">Payment</a></button>
            <button class="font-exo-2 btn hover:btn-outline hover:bg-[#198754] hover:text-white btn-xs sm:btn-sm md:btn-md lg:btn-lg xl:btn-xl"><a href="apply.php">Apply</a></button>
            <button id="dwnld" class="font-exo-2 btn bg-white text-black hover:bg-white hover:text-black border-0 shadow-md w-60 h-24 flex flex-col items-center justify-center rounded-md" disabled>
                <a href="transcript_pdf.php" class="flex flex-col items-center justify-center w-full h-full">
                    <img src="images/download logo.png" class="w-12 h-12 mb-1">
                    <div class="text-lg font-bold mt-1">Download Transcript</div>
                    
                </a>
            </button>
        </div>
    </div>
    <?php
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

        $sql = "SELECT * FROM application WHERE reg = '" . $_SESSION['reg'] . "'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $approval_head = $row['approval_head'];
            $approval_hall_provost = $row['approval_hall_provost'];
            if ($approval_head == 1 && $approval_hall_provost == 1) {
                echo "<script>document.getElementById('dwnld').disabled = false;</script>";
            }
        } else {
            echo "No results found.";
        }
    ?>
</body>
</html>