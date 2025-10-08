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
    $sql = "SELECT * FROM application where reg = '" . $_SESSION['reg'] . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $sem=$row["semester"];
            $sql1 = "SELECT * FROM student_db where reg = '" . $_SESSION['reg'] . "'";
            $result1 = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($result1) > 0) {
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    $sql2 = "SELECT * FROM ". $sem ."_sem where roll = '" . $row1['roll'] . "'";
                    $result2 = mysqli_query($conn, $sql2);
                    if (mysqli_num_rows($result2) > 0) {
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            require_once('tcpdf/tcpdf.php'); // Adjust path if needed

                            $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
                            $pdf->SetCreator('TCPDF');
                            $pdf->SetTitle('Academic Transcript');
                            $pdf->AddPage();

                            // University Header
                            $html = '
                            <h3 style="text-align:center; font-family: Times New Roman, Times, serif; font-size:18px;">JATIYA KABI KAZI NAZRUL ISLAM UNIVERSITY</h3>
                            <h3 style="text-align:center; font-family: Times New Roman, Times, serif; font-size:18px;">Trishal, Mymensingh</h3>
                            <img src="images/jkkniu.png" style="text-align:center; width: 50px; height: 50px; display:block; margin:auto;" alt="University Logo">
                            <h4 style="text-align:center; font-family: Times New Roman, Times, serif;">Academic Transcript</h4>
                            <p style="text-align:center;font-family: Times New Roman, Times, serif;">Bachelor of Science and Engineering</p>
                            <table border="0" cellpadding="2"  style="font-family: Times New Roman, Times, serif;">
                            <tr><td><b>Subject</b>:'. $row1['dept'] .'</td><td><b>Semester</b>:'. $sem .'</td></tr>
                            <tr><td><b>Name</b>:'. $row1['name_E'] .'</td><td><b>Roll No</b>:'. $row1['roll'] .'</td></tr>
                            <tr><td><b>Session</b>:'. $row1['session'] .'</td></tr>
                            </table>
                            <br><br>
                            ';

                            // Transcript Table
                            $html .= '
                            <table border="1" cellpadding="3" style="font-size:10px;">
                            <tr style="font-weight:bold; background-color:#f0f0f0;">
                                <td style="width:50px;">Course No</td><td style="width:230px;">Course Title</td><td style="width:40px;">Credit Hours</td><td style="width:40px;">Grade (LG)</td>
                                <td style="width:40px;">CGP</td><td style="width:40px;">Credits Earned</td><td style="width:40px;">GPA Point Earned</td><td style="width:40px;">GPA & LG</td>
                            </tr>
                            <tr><td style="width:50px;">CSE-301</td><td style="width:230px;">Microprocessors</td><td style="width:40px;">3.00</td><td style="width:40px;">C+</td><td style="width:40px;">2.50</td><td style="width:40px;">3.00</td><td style="width:40px;">7.50</td>
                            <td rowspan="9" style="width:40px; vertical-align: middle;">3.00</td></tr>
                            <tr><td style="width:50px;">CSE-302</td><td style="width:230px;">Microprocessors and Assembly Language Lab</td><td style="width:40px;">1.50</td><td style="width:40px;">B+</td><td style="width:40px;">3.25</td><td style="width:40px;">1.50</td><td style="width:40px;">4.88</td></tr>
                            <tr><td style="width:50px;">CSE-303</td><td style="width:230px;">Operating System</td><td style="width:40px;">3.00</td><td style="width:40px;">A-</td><td style="width:40px;">3.50</td><td style="width:40px;">3.00</td><td style="width:40px;">10.50</td></tr>
                            <tr><td style="width:50px;">CSE-304</td><td style="width:230px;">Operating System Lab</td><td style="width:40px;">1.50</td><td style="width:40px;">A</td><td style="width:40px;">3.75</td><td style="width:40px;">1.50</td><td style="width:40px;">5.63</td></tr>
                            <tr><td style="width:50px;">CSE-305</td><td style="width:230px;">Theory of Computation</td><td style="width:40px;">3.00</td><td style="width:40px;">B</td><td style="width:40px;">2.75</td><td style="width:40px;">3.00</td><td style="width:40px;">8.25</td></tr>
                            <tr><td style="width:50px;">CSE-307</td><td style="width:230px;">Internet and Web Programming</td><td style="width:40px;">3.00</td><td style="width:40px;">B</td><td style="width:40px;">3.00</td><td style="width:40px;">3.00</td><td style="width:40px;">9.00</td></tr>
                            <tr><td style="width:50px;">CSE-308</td><td style="width:230px;">Internet and Web Programming Lab</td><td style="width:40px;">1.50</td><td style="width:40px;">B</td><td style="width:40px;">3.00</td><td style="width:40px;">1.50</td><td style="width:40px;">4.50</td></tr>
                            <tr><td style="width:50px;">CSE-309</td><td style="width:230px;">Data Communication</td><td style="width:40px;">3.00</td><td style="width:40px;">B-</td><td style="width:40px;">2.75</td><td style="width:40px;">3.00</td><td style="width:40px;">8.25</td></tr>
                            <tr><td colspan="6" align="right"><b>Semester Total</b></td><td style="width:40px;"><b>58.50</b></td></tr>
                            </table>
                            <p>The authority deserves the right of correcting the incidental errors in the transcript.</p>
                            <br><br>
                            <table cellpadding="4">
                            <tr>
                                <td>Prepared by:<br><br><br><br>Checked by:</td>
                                <td align="right">Additional Controller of Examinations</td>
                            </tr>
                            </table>
                            <p>Date: 18/03/2025<br>Date of Result Publication: 19/02/2025</p>
                            ';

                            $pdf->writeHTML($html, true, false, true, false, '');
                            $pdf->Output('transcript.pdf', 'I'); // Output the PDF to browser
                        }
                    }
                }
            }
        }
    }
?>