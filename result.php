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

    $name=$_REQUEST['name'];
    $roll=$_REQUEST['roll'];
    $session=$_REQUEST['session'];
    function convertToGPA($marks) {
        switch (true) {
            case ($marks >= 80): return 4.00;
            case ($marks >= 75): return 3.75;
            case ($marks >= 70): return 3.50;
            case ($marks >= 65): return 3.25;
            case ($marks >= 60): return 3.00;
            case ($marks >= 55): return 2.75;
            case ($marks >= 50): return 2.50;
            case ($marks >= 45): return 2.25;
            case ($marks >= 40): return 2.00;
            default: return 0.00;
        }
    }
    if($_REQUEST['semester']=="1st")
    {
        $subjects = [
            // Theory subjects: attendance, m1, m2, m3, term
            'cse103' => ['type' => 'theory', 'credit' => 3.0],
            'cse105' => ['type' => 'theory', 'credit' => 3.0],
            'eee161' => ['type' => 'theory', 'credit' => 3.0],
            'ged163' => ['type' => 'theory', 'credit' => 3.0],
            'ged165' => ['type' => 'theory', 'credit' => 3.0],
            'math167' => ['type' => 'theory', 'credit' => 3.0],
            
            // Lab subjects: attendance, lr, ce, v, lt, as
            'cse106' => ['type' => 'lab', 'credit' => 1.5],
            'eee162' => ['type' => 'lab', 'credit' => 1.5],
        ];
        $totalCredits = 0;
        $totalGradePoints = 0;
        foreach ($subjects as $subj => $info) {
            if ($info['type'] === 'theory') {
                $marks = $_REQUEST["{$subj}_a"] + $_REQUEST["{$subj}_m-1"] + $_REQUEST["{$subj}_m-2"] + $_REQUEST["{$subj}_m-3"] + $_REQUEST["{$subj}_t"];
            } else {
                $marks = $_REQUEST["{$subj}_a"] + $_REQUEST["{$subj}_lr"] + $_REQUEST["{$subj}_ce"] + $_REQUEST["{$subj}_v"] + $_REQUEST["{$subj}_lt"] + $_REQUEST["{$subj}_as"];
            }
            $gpa = convertToGPA($marks);
            $credit = $info['credit'];
            $gradePoint = $gpa * $credit;
            $totalCredits += $credit;
            $totalGradePoints += $gradePoint;
            $gpas[$subj] = $gpa;
        }
        $cgpa = round($totalGradePoints / $totalCredits, 2);
        $gpa_cse103 = $gpas['cse103'];
        $gpa_cse105 = $gpas['cse105'];
        $gpa_cse106 = $gpas['cse106'];
        $gpa_eee161 = $gpas['eee161'];
        $gpa_eee162 = $gpas['eee162'];
        $gpa_ged163 = $gpas['ged163'];
        $gpa_ged165 = $gpas['ged165'];
        $gpa_math167 = $gpas['math167'];
        $insert_query = "INSERT INTO `1st_sem` (`name`, `roll`, `session`, `cse103`, `cse105`, `cse106`, `eee161`, `eee162`, `ged163`, `ged165`, `math167`, `CGPA`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        echo "hh";


        // Prepare statement
        $stmt = mysqli_prepare($conn, $insert_query);

        // Fix: Make sure all parameters match the number and order in the VALUES clause
        // "sssddddddddd" specifies 3 strings followed by 9 doubles, but we have 12 parameters
        mysqli_stmt_bind_param($stmt, "sssddddddddd", 
            $name,
            $roll, 
            $session,
            $gpa_cse103, 
            $gpa_cse105, 
            $gpa_cse106, 
            $gpa_eee161, 
            $gpa_eee162, 
            $gpa_ged163, 
            $gpa_ged165, 
            $gpa_math167, 
            $cgpa);
        mysqli_stmt_execute($stmt);

    }
    else if($_REQUEST['semester']=="2nd")
    {
        $subjects = [
            // theory: attendance, 3 mids, term
            'cse123' => ['type' => 'theory', 'credit' => 3.0],
            'cse127' => ['type' => 'theory', 'credit' => 3.0],
            'eee175' => ['type' => 'theory', 'credit' => 3.0],
            'phy177' => ['type' => 'theory', 'credit' => 3.0],
            'ged179' => ['type' => 'theory', 'credit' => 3.0],
            'math171' => ['type' => 'theory', 'credit' => 3.0],
            
            // lab: attendance, lr, ce, v, lt, as
            'cse124' => ['type' => 'lab', 'credit' => 1.5],
            'eee176' => ['type' => 'lab', 'credit' => 1.5],
            
            // special case: project
            'cse100' => ['type' => 'project', 'credit' => 1.5],
        ];
        
        $totalCredits = 0;
        $totalGradePoints = 0;
        
        // Prepare the SQL insert query
        $insert_query = "INSERT INTO `2nd_sem` (`name`, `roll`, `session`, `cse123`, `cse124`, `cse127`, `eee175`, `eee176`, `phy177`, `ged179`, `math171`, `cse100`, `CGPA`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Prepare statement
        $stmt = mysqli_prepare($conn, $insert_query);
        
        // Loop through the subjects and calculate GPA and grade points
        $marks = [];
        foreach ($subjects as $code => $info) {
            $credit = $info['credit'];
            $type = $info['type'];
            
            switch ($type) {
                case 'theory':
                    $marks[$code] = $_REQUEST["{$code}_a"] + $_REQUEST["{$code}_m-1"] + $_REQUEST["{$code}_m-2"] + $_REQUEST["{$code}_m-3"] + $_REQUEST["{$code}_t"];
                    break;
                case 'lab':
                    $marks[$code] = $_REQUEST["{$code}_a"] + $_REQUEST["{$code}_lr"] + $_REQUEST["{$code}_ce"] + $_REQUEST["{$code}_v"] + $_REQUEST["{$code}_lt"] + $_REQUEST["{$code}_as"];
                    break;
                case 'project':
                    $marks[$code] = $_REQUEST["{$code}_ca"] + $_REQUEST["{$code}_r"] + $_REQUEST["{$code}_d"] + $_REQUEST["{$code}_pv"];
                    break;
                default:
                    $marks[$code] = 0;
            }
            
            $gpa = convertToGPA($marks[$code]); // Assume this function converts marks to GPA
            $gradePoint = $gpa * $credit;
            
            $totalCredits += $credit;
            $totalGradePoints += $gradePoint;
        }
        
        // Assign GPA values for each subject dynamically
        $gpa_cse123 = convertToGPA($marks['cse123']);
        $gpa_cse124 = convertToGPA($marks['cse124']);
        $gpa_cse127 = convertToGPA($marks['cse127']);
        $gpa_eee175 = convertToGPA($marks['eee175']);
        $gpa_eee176 = convertToGPA($marks['eee176']);
        $gpa_phy177 = convertToGPA($marks['phy177']);
        $gpa_ged179 = convertToGPA($marks['ged179']);
        $gpa_math171 = convertToGPA($marks['math171']);
        $gpa_cse100 = convertToGPA($marks['cse100']);
        
        // Bind the parameters (all FLOAT values, so 'd' for double)
        mysqli_stmt_bind_param($stmt, "sssfffffffff", $name, $reg, $session, $semester, 
            $gpa_cse123, $gpa_cse124, $gpa_cse127, $gpa_eee175, $gpa_eee176, $gpa_phy177, $gpa_ged179, $gpa_math171, $gpa_cse100,$cgpa);
        
        // Execute the query
        mysqli_stmt_execute($stmt);
    }
    else if($_REQUEST['semester']=="3rd")
    {
        $subjects = [
            // Theory subjects: attendance, m1, m2, m3, term
            'cse201' => ['type' => 'theory', 'credit' => 3.0],
            'cse203' => ['type' => 'theory', 'credit' => 3.0],
            'eee205' => ['type' => 'theory', 'credit' => 3.0],
            'ged263' => ['type' => 'theory', 'credit' => 3.0],
            'math273' => ['type' => 'theory', 'credit' => 3.0],
            
            // Lab subjects: attendance, lr, ce, v, lt, as
            'cse202' => ['type' => 'lab', 'credit' => 1.5],
            'cse204' => ['type' => 'lab', 'credit' => 1.5],
            'cse206' => ['type' => 'lab', 'credit' => 1.5]            

        ];
        $totalCredits = 0;
        $totalGradePoints = 0;
        echo "<h1>Result of 3rd Semester</h1><hr>";
        foreach ($subjects as $subj => $info) {
            if ($info['type'] === 'theory') {
                $marks = $_REQUEST["{$subj}_a"] + $_REQUEST["{$subj}_m-1"] + $_REQUEST["{$subj}_m-2"] + $_REQUEST["{$subj}_m-3"] + $_REQUEST["{$subj}_t"];
            } else {
                $marks = $_REQUEST["{$subj}_a"] + $_REQUEST["{$subj}_lr"] + $_REQUEST["{$subj}_ce"] + $_REQUEST["{$subj}_v"] + $_REQUEST["{$subj}_lt"] + $_REQUEST["{$subj}_as"];
            }
            $gpa = convertToGPA($marks);
            $credit = $info['credit'];
            $gradePoint = $gpa * $credit;
            $totalCredits += $credit;
            $totalGradePoints += $gradePoint;
        }
        $cgpa = round($totalGradePoints / $totalCredits, 2);
    }
    else if($_REQUEST['semester']=="4th")
    {
        $subjects = [
            // theory: attendance, 3 mids, term
            'cse221' => ['type' => 'theory', 'credit' => 3.0],
            'cse223' => ['type' => 'theory', 'credit' => 3.0],
            'cse225' => ['type' => 'theory', 'credit' => 3.0],
            'cse229' => ['type' => 'theory', 'credit' => 3.0],
            'math275' => ['type' => 'theory', 'credit' => 3.0],
        
            // lab: attendance, lr, ce, v, lt, as
            'cse222' => ['type' => 'lab', 'credit' => 1.5],
            'cse224' => ['type' => 'lab', 'credit' => 1.5],
            'cse231' => ['type' => 'lab', 'credit' => 1.5],
        
            // special case: project
            'cse200' => ['type' => 'project', 'credit' => 1.5],
        ];
        
        $totalCredits = 0;
        $totalGradePoints = 0;
        
        echo "<h1>Result of 4th Semester</h1><hr>";
        
        foreach ($subjects as $code => $info) {
            $credit = $info['credit'];
            $type = $info['type'];
        
            switch ($type) {
                case 'theory':
                    $marks = $_REQUEST["{$code}_a"] + $_REQUEST["{$code}_m-1"] + $_REQUEST["{$code}_m-2"] + $_REQUEST["{$code}_m-3"] + $_REQUEST["{$code}_t"];
                    break;
                case 'lab':
                    $marks = $_REQUEST["{$code}_a"] + $_REQUEST["{$code}_lr"] + $_REQUEST["{$code}_ce"] + $_REQUEST["{$code}_v"] + $_REQUEST["{$code}_lt"] + $_REQUEST["{$code}_as"];
                    break;
                case 'project':
                    $marks = $_REQUEST["{$code}_ca"] + $_REQUEST["{$code}_r"] + $_REQUEST["{$code}_d"] + $_REQUEST["{$code}_pv"];
                    break;
                default:
                    $marks = 0;
            }
        
            $gpa = convertToGPA($marks);
            $gradePoint = $gpa * $credit;
        
            $totalCredits += $credit;
            $totalGradePoints += $gradePoint;
        
            echo "<h2>Course Code: " . strtoupper($code) . "</h2>";
            echo "Marks: $marks<br>GPA: $gpa<br><br>";
        }
        
        $cgpa = round($totalGradePoints / $totalCredits, 2);
        echo "<hr><h2 style='color:green;'>Overall CGPA: $cgpa</h2>";
    }
    else if($_REQUEST['semester']=="5th")
    {
        $subjects = [
            // Theory subjects: attendance, m1, m2, m3, term
            'cse301' => ['type' => 'theory', 'credit' => 3.0],
            'cse303' => ['type' => 'theory', 'credit' => 3.0],
            'cse305' => ['type' => 'theory', 'credit' => 3.0],
            'cse307' => ['type' => 'theory', 'credit' => 3.0],
            'cse309' => ['type' => 'theory', 'credit' => 3.0],
            
            // Lab subjects: attendance, lr, ce, v, lt, as
            'cse302' => ['type' => 'lab', 'credit' => 1.5],
            'cse304' => ['type' => 'lab', 'credit' => 1.5],
            'cse308' => ['type' => 'lab', 'credit' => 1.5],
            
        ];
        $totalCredits = 0;
        $totalGradePoints = 0;
        echo "<h1>Result of 5th Semester</h1><hr>";
        foreach ($subjects as $subj => $info) {
            if ($info['type'] === 'theory') {
                $marks = $_REQUEST["{$subj}_a"] + $_REQUEST["{$subj}_m-1"] + $_REQUEST["{$subj}_m-2"] + $_REQUEST["{$subj}_m-3"] + $_REQUEST["{$subj}_t"];
            } else {
                $marks = $_REQUEST["{$subj}_a"] + $_REQUEST["{$subj}_lr"] + $_REQUEST["{$subj}_ce"] + $_REQUEST["{$subj}_v"] + $_REQUEST["{$subj}_lt"] + $_REQUEST["{$subj}_as"];
            }
            $gpa = convertToGPA($marks);
            $credit = $info['credit'];
            $gradePoint = $gpa * $credit;
            $totalCredits += $credit;
            $totalGradePoints += $gradePoint;
            echo "<li><strong>$subj</strong>: GPA = $gpa</li>";
        }
        $cgpa = round($totalGradePoints / $totalCredits, 2);
        echo "</ul><h3>Your CGPA is: <span style='color: green;'>$cgpa</span></h3>";
    }
    else if($_REQUEST['semester']=="6th")
    {
        $subjects = [
            // theory: attendance, 3 mids, term
            'cse321' => ['type' => 'theory', 'credit' => 3.0],
            'cse323' => ['type' => 'theory', 'credit' => 3.0],
            'cse325' => ['type' => 'theory', 'credit' => 3.0],
            'cse327' => ['type' => 'theory', 'credit' => 3.0],
            'ged371' => ['type' => 'theory', 'credit' => 3.0],
        
            // lab: attendance, lr, ce, v, lt, as
            'cse322' => ['type' => 'lab', 'credit' => 1.5],
            'cse324' => ['type' => 'lab', 'credit' => 1.5],
            'cse326' => ['type' => 'lab', 'credit' => 1.5],
            
            // special case: project
            'cse300' => ['type' => 'project', 'credit' => 1.5],
        ];
        
        $totalCredits = 0;
        $totalGradePoints = 0;
        
        echo "<h1>Result of 6th Semester</h1><hr>";
        
        foreach ($subjects as $code => $info) {
            $credit = $info['credit'];
            $type = $info['type'];
        
            switch ($type) {
                case 'theory':
                    $marks = $_REQUEST["{$code}_a"] + $_REQUEST["{$code}_m-1"] + $_REQUEST["{$code}_m-2"] + $_REQUEST["{$code}_m-3"] + $_REQUEST["{$code}_t"];
                    break;
                case 'lab':
                    $marks = $_REQUEST["{$code}_a"] + $_REQUEST["{$code}_lr"] + $_REQUEST["{$code}_ce"] + $_REQUEST["{$code}_v"] + $_REQUEST["{$code}_lt"] + $_REQUEST["{$code}_as"];
                    break;
                default:
                    $marks = 0;
            }
        
            $gpa = convertToGPA($marks);
            $gradePoint = $gpa * $credit;
        
            $totalCredits += $credit;
            $totalGradePoints += $gradePoint;
        
            echo "<h2>Course Code: " . strtoupper($code) . "</h2>";
            echo "Marks: $marks<br>GPA: $gpa<br><br>";
        }
        
        $cgpa = round($totalGradePoints / $totalCredits, 2);
        echo "<hr><h2 style='color:green;'>Overall CGPA: $cgpa</h2>";
    }
    else if($_REQUEST['semester']=="7th")
    {
        $subjects = [
            // Theory subjects: attendance, m1, m2, m3, term
            'cse401' => ['type' => 'theory', 'credit' => 3.0],
            'cse405' => ['type' => 'theory', 'credit' => 3.0],
            'cse409' => ['type' => 'theory', 'credit' => 3.0],
            'cse411' => ['type' => 'theory', 'credit' => 3.0],
            'cse435' => ['type' => 'theory', 'credit' => 3.0],
            
            // Lab subjects: attendance, lr, ce, v, lt, as
            'cse406' => ['type' => 'lab', 'credit' => 1.5],
            'cse410' => ['type' => 'lab', 'credit' => 1.5],
            'cse436' => ['type' => 'lab', 'credit' => 1.5],
            
            // special case: project
            'cse400(A)' => ['type' => 'project', 'credit' => 1.5],
        ];
        $totalCredits = 0;
        $totalGradePoints = 0;
        echo "<h1>Result of 7th Semester</h1><hr>";
        foreach ($subjects as $subj => $info) {
            if ($info['type'] === 'theory') {
                $marks = $_REQUEST["{$subj}_a"] + $_REQUEST["{$subj}_m-1"] + $_REQUEST["{$subj}_m-2"] + $_REQUEST["{$subj}_m-3"] + $_REQUEST["{$subj}_t"];
            } else {
                $marks = $_REQUEST["{$subj}_a"] + $_REQUEST["{$subj}_lr"] + $_REQUEST["{$subj}_ce"] + $_REQUEST["{$subj}_v"] + $_REQUEST["{$subj}_lt"] + $_REQUEST["{$subj}_as"];
            }
            $gpa = convertToGPA($marks);
            $credit = $info['credit'];
            $gradePoint = $gpa * $credit;
            $totalCredits += $credit;
            $totalGradePoints += $gradePoint;
            echo "<li><strong>$subj</strong>: GPA = $gpa</li>";
        }
        $cgpa = round($totalGradePoints / $totalCredits, 2);
        echo "<hr><h2 style='color:green;'>Overall CGPA: $cgpa</h2>";
    }
    else if($_REQUEST['semester']=="8th")
    {
        $subjects = [
            // theory: attendance, 3 mids, term
            'cse425' => ['type' => 'theory', 'credit' => 3.0],
            'cse439' => ['type' => 'theory', 'credit' => 3.0],
            
            // lab: attendance, lr, ce, v, lt, as
            'cse426' => ['type' => 'lab', 'credit' => 1.5],
            'cse440' => ['type' => 'lab', 'credit' => 1.5],
        
            // special case: project
            'cse400(B)' => ['type' => 'project', 'credit' => 1.5],
        ];
        
        $totalCredits = 0;
        $totalGradePoints = 0;
        
        echo "<h1>Result of 8th Semester</h1><hr>";
        
        foreach ($subjects as $code => $info) {
            $credit = $info['credit'];
            $type = $info['type'];
        
            switch ($type) {
                case 'theory':
                    $marks = $_REQUEST["{$code}_a"] + $_REQUEST["{$code}_m-1"] + $_REQUEST["{$code}_m-2"] + $_REQUEST["{$code}_m-3"] + $_REQUEST["{$code}_t"];
                    break;
                case 'lab':
                    $marks = $_REQUEST["{$code}_a"] + $_REQUEST["{$code}_lr"] + $_REQUEST["{$code}_ce"] + $_REQUEST["{$code}_v"] + $_REQUEST["{$code}_lt"] + $_REQUEST["{$code}_as"];
                    break;
                case 'project':
                    $marks = $_REQUEST["{$code}_ca"] + $_REQUEST["{$code}_r"] + $_REQUEST["{$code}_d"] + $_REQUEST["{$code}_pv"];
                    break;
                default:
                    $marks = 0;
            }
        
            $gpa = convertToGPA($marks);
            $gradePoint = $gpa * $credit;
        
            $totalCredits += $credit;
            $totalGradePoints += $gradePoint;
        
            echo "<h2>Course Code: " . strtoupper($code) . "</h2>";
            echo "Marks: $marks<br>GPA: $gpa<br><br>";
        }
        
        $cgpa = round($totalGradePoints / $totalCredits, 2);
        echo "<hr><h2 style='color:green;'>Overall CGPA: $cgpa</h2>";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>