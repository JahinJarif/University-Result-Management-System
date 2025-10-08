<?php
require_once('tcpdf/tcpdf.php');
header('Content-Type: text/html; charset=UTF-8');

// Get form data
$fullNameB = $_POST['fullNameB'];
$fullNameE = $_POST['fullNameE'];
$fatherName = $_POST['fatherName'];
$motherName = $_POST['motherName'];
$dept = $_POST['dept'];
$hall = $_POST['hall'];
$session = $_POST['session'];
$reg = $_POST['reg'];
$roll = $_POST['roll'];
$sem = $_POST['sem'];
$readd_sem = $_POST['readd_sem'];
$cgpa = $_POST['cgpa'];
$date = $_POST['dateInput'];

// Create PDF
$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('freeserif', '', 14, '', true);

$html = "
<h2>Official Transcript Application</h2>
<p><strong style='font-family:freeserif;>তারিখ:</strong> $date</p>
<p><strong style='font-family:freeserif;>নাম (বাংলায়):</strong> $fullNameB</p>
<p><strong style='font-family:freeserif;>নাম (ইংরেজীতে):</strong> $fullNameE</p>
<p><strong>পিতার নাম:</strong> $fatherName</p>
<p><strong>মাতার নাম:</strong> $motherName</p>
<p><strong>বিভাগ:</strong> $dept</p>
<p><strong>হলের নাম:</strong> $hall</p>
<p><strong>শিক্ষাবর্ষ:</strong> $session</p>
<p><strong>রেজিঃ নম্বর:</strong> $reg</p>
<p><strong>রোল নম্বর:</strong> $roll</p>
<p><strong>সেমিস্টার:</strong> $sem</p>
<p><strong>পুনঃভর্তির শিক্ষাবর্ষ:</strong> $readd_sem</p>
<p><strong>CGPA:</strong> $cgpa</p>
";

$pdf->writeHTML($html, true, false, true, false, '');

// Save PDF to server
$filename = "transcript_" . $reg . "_" . time() . ".pdf";
$filepath = "uploads/" . $filename;
$pdf->Output(__DIR__ . '/uploads/transcript_9884_1744995864.pdf', 'F');

echo "PDF generated and saved as <a href='$filepath'>Download PDF</a>";
?>

<form action="next1.php" method="POST">
    <input type="hidden" name="semester" value="<?php echo htmlspecialchars($sem); ?>">
    <button type="submit">Submit</button>
</form>