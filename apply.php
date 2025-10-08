<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "transcript";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_set_charset($conn, "utf8mb4");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $reg = $_SESSION['reg'];
    $sql = "SELECT * FROM student_db WHERE reg = '$reg'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/html2pdf.js@0.10.1/dist/html2pdf.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Official Application Form</title>
    <style>
        .font-exo-2 {
            font-family: "Exo 2", sans-serif;
            font-optical-sizing: auto;
            font-weight: 700;
            font-style: normal;
        }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            background-color: #f5f5f5;
        }
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        .letterhead {
            width: 60%;
        }
        .stamp-area {
            border: 2px solid #ccc;
            border-radius: 5px;
            width: 240px;
            height: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
        }
        .form-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .form-table td {
            border: 2px solid black;
        }
        .form-table input, .form-table select {
            width: 100%;
            padding: 6px;
            border: 0px solid #ddd;
            border-radius: 3px;
            box-sizing: border-box;
        }
        .form-row {
            display: flex;
            margin-bottom: 10px;
        }
        .form-row .number {
            width: 30px;
        }
        .form-row .label {
            width: 30%;
        }
        .form-row .input {
            flex-grow: 1;
            border-bottom: 1px solid #ccc;
        }
        .remark {
            width: 25%;
        }
        .instructions {
            border-top: 1px dashed #ccc;
            margin-top: 20px;
            padding-top: 10px;
            font-size: 0.9em;
        }
        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .signature-box {
            width: 45%;
        }
        .signature-line {
            border-bottom: 1px solid #000;
            padding-top: 40px;
            margin-bottom: 5px;
        }
        .seal {
            border: 2px solid #000;
            border-radius: 50%;
            width: 100px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-size: 12px;
            margin-left: auto;
        }
        .verification-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .verification-table th, .verification-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .verification-table th {
            background-color: #f2f2f2;
        }
        .declaration {
            margin: 20px 0;
        }
        .submit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
        .arrow{
            width:25px;
            height:25px;
        }
        button:active .arrow {
            transform: scale(1.2);
        }
        button[disabled] {
            opacity: 0.5;
            cursor: not-allowed;
        }
        @media print {
            .navbar {
                display: none !important;
            }

            .submit-btn {
                display: none !important;
            }

            #avatar {
                display: none !important;
            }
            .mt-\[80px\] {
                margin-top: 0 !important;
            }
        }
    </style>
</head>
<body>
    <div class="flex flex-col">
        <div class="font-exo-2 fixed h-20 navbar bg-[#32a856] shadow-sm z-10">
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
                            <img alt="Tailwind CSS Navbar component" src="images/sf61561.jpg" />
                        </div>
                    </div>
                    <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                        <li>
                            <span id="username" class="justify-between">
                                User Name
                            </span>
                        </li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="form-container">
            <form class="mt-[80px]" method="post">
                <div id="pdfContent">
                    <div class="header">
                        <div class="letterhead">
                                তারিখঃ<div id="dateInput" class="inline"></div><br>
                                বরাবর<br>
                                পরীক্ষা নিয়ন্ত্রক<br>
                                জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়<br>
                                ত্রিশাল,ময়মনসিংহ-২২২০<br>
                                বিষয়ঃ ট্রান্সক্রিপ্ট এর জন্য আবেদনপত্র<br>
                                মাধ্যমঃ যথাযথ কর্তৃপক্ষ<br>
                                মহোদয়,<br>
                                বিনয় নিবেদন এই যে,ট্রান্সক্রিপ্ট প্রদানের জন্য নিম্নে আমার একাডেমিক তথ্যাদি সন্নিবেশিত হলোঃ<br>
                        </div>
                        <div class="flex flex-col">
                            <div class="stamp-area">
                                <p>ট্রান্সক্রিপ্ট নম্বরঃ<br>(পরীক্ষা নিয়ন্ত্রক দপ্তর কর্তৃক পূরণীয়)</p>
                            </div>
                            <div class="seal mt-10">
                                <p>পরীক্ষা নিয়ন্ত্রক<br>দপ্তরের<br>সিল ও তারিখ</p>
                            </div>
                        </div>
                    </div>
                    <table class="form-table">
                        <tr>
                            <td class="text-center" rowspan="2">১.</td>
                            <td style="white-space: pre;">নাম         ক. বাংলায়</td>
                            <td class="text-center w-[5%] font-bold">:</td>
                            <td class="pl-2"><?php echo $row["name_B"]?></td>
                        </tr>
                        <tr>
                            <td style="white-space: pre;">               খ. ইংরেজীতে (বড় অক্ষরে)</td>
                            <td class="text-center w-[5%] font-bold">:</td>
                            <td class="pl-2"><?php
                                    $text = $row["name_E"];
                                    $uppercase = strtoupper($text);
                                    echo $uppercase; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center">২.</td>
                            <td>পিতার নাম (ইংরেজীতে বড় অক্ষরে)</td>
                            <td class="text-center w-[5%] font-bold">:</td>
                            <td class="pl-2"><?php
                                    $text = $row["f_name"];
                                    $uppercase = strtoupper($text);
                                    echo $uppercase; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center">৩.</td>
                            <td>মাতার নাম (ইংরেজীতে বড় অক্ষরে)</td>
                            <td class="text-center w-[5%] font-bold">:</td>
                            <td class="pl-2"><?php
                                    $text = $row["m_name"];
                                    $uppercase = strtoupper($text);
                                    echo $uppercase; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center">৪.</td>
                            <td>বিভাগ</td>
                            <td class="text-center w-[5%] font-bold">:</td>
                            <td class="pl-2"><?php echo $row['dept']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center">৫.</td>
                            <td>হলের নাম</td>
                            <td class="text-center w-[5%] font-bold">:</td>
                            <td class="pl-2"><?php echo $row['hall']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center">৬.</td>
                            <td>শিক্ষাবর্ষ</td>
                            <td class="text-center w-[5%] font-bold">:</td>
                            <td class="pl-2"><?php echo $row['session']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center">৭.</td>
                            <td>রেজিস্ট্রেশন নম্বর</td>
                            <td class="text-center w-[5%] font-bold">:</td>
                            <td class="pl-2"><?php echo $row['reg']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center">৮.</td>
                            <td>পরিক্ষার রোল নম্বর</td>
                            <td class="text-center w-[5%] font-bold">:</td>
                            <td class="pl-2"><?php echo $row['roll']; ?></td>
                        </tr>
                    <?php
        }
    }   
    ?>                    <tr>
                            <td class="text-center">৯.</td>
                            <td>যে সেমিস্টার এর জন্য ট্রান্সক্রিপ্ট</td>
                            <td class="text-center w-[5%] font-bold">:</td>
                            <td><div id="semester1" class="pl-2 hidden"></div>
                                <form id="semform" action="next.php" method="post"><select id="semester" name="semester" class="select select-success"  onchange="first()">
                                    <option disabled selected>Semester</option>
                                    <option>1st</option>
                                    <option>2nd</option>
                                    <option>3rd</option>
                                    <option>4th</option>
                                    <option>5th</option>
                                    <option>6th</option>
                                    <option>7th</option>
                                    <option>8th</option>
                                </select>
                                <input type="hidden" name="hsem" value="" id="hsem">
                            </form>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">১০.</td>
                            <td>পূনঃভর্তির ক্ষেত্রে চলমান শিক্ষাবর্ষ</td>
                            <td class="text-center w-[5%] font-bold">:</td>
                            <td><input type="text" name="readd_sem"></td>
                        </tr>
                        <tr>
                            <td class="text-center">১১.</td>
                            <td>অর্জিত জিপিএ/সিজিপিএ</td>
                            <td class="text-center w-[5%] font-bold">:</td>
                            <td><input type="text" name="cgpa" required></td>
                        </tr>
                    </table>
                    <p>অতএব,আমাকে ট্রান্সক্রিপ্ট প্রদান করে বাধিত করবেন।</p>
                    <div class="signature-section text-center">
                        <div class="signature-box">
                            <img src="signature/<?php echo $_SESSION['reg']; ?>.jpg" class="mx-auto block mb-[-25px]" style="width:150px; height:50px;" alt="Signature">
                            <div class="signature-line"></div>
                            <p>আবেদনকারীর স্বাক্ষর</p>
                        </div>
                    </div>
                </div>
                <center class="flex items-center justify-center gap-10">
                    <button type="button" class="submit-btn bg-blue-500 hover:bg-blue-600" onclick="printForm()">Print Form</button>
                    <button id="next" type="button" class="flex items-center gap-1 submit-btn bg-blue-500 hover:bg-blue-600 group" disabled onclick="window.location.href='next.php'">
                    Next
                    <img src="images/arrow-next.png" class="arrow transition-transform duration-150 group-hover:scale-125" />
                    </button>
                </center>
            </form>
        </div>
    </div>
    <script>
        document.getElementById("semester").addEventListener("change", function() {
            const selectedOption = this.options[this.selectedIndex].text;
            const hiddenInput = document.getElementById('hsem');

            hiddenInput.value = selectedOption;
            
            document.getElementById("semester1").style.display = "inline";
            document.getElementById("semester1").innerHTML = selectedOption;

            document.getElementById("semester").style.display = "none";
        });
        function toBengaliDigits(str) {
            const map = { '0':'০','1':'১','2':'২','3':'৩','4':'৪','5':'৫','6':'৬','7':'৭','8':'৮','9':'৯' };
            return str.replace(/\d/g, d => map[d]);
        }
         window.onload = () => {
            const dateInput = document.getElementById('dateInput');
            const today = new Date();
            let dd = String(today.getDate()).padStart(2, '0');
            let mm = String(today.getMonth() + 1).padStart(2, '0');
            const yyyy = today.getFullYear();

            const formattedDate = `${dd}/${mm}/${yyyy}`;
            dateInput.innerHTML = toBengaliDigits(formattedDate);
        };
        function printForm() {
            // Attach afterprint handler before printing
            window.onafterprint = () => {
                const nextBtn = document.getElementById('next');
                let selectedValue = document.getElementById("semester").value;

                // Show the replacement span and hide the select
                

                // Re-enable the Next button
                nextBtn.disabled = false;
                nextBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            };

            // Trigger the print dialog
            window.print();
        }
        document.getElementById("next").addEventListener("click", function(e) {
            e.preventDefault(); // Prevent any default form behavior
            document.getElementById("semform").submit();
        });
    </script>
</body>
</html>
