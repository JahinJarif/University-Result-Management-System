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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                          <?php echo $_SESSION['reg']?>
                      </span>
                    </li>
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </div>
            </div>
        </div>
<?php
  session_start();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $reg = $_SESSION['reg'];
  }
  $target_dir = "uploads/";
  $target_file = $target_dir. $_SESSION['reg']. "/" . "application_form.pdf";
  $target_file1 = $target_dir. $_SESSION['reg']. "/" . "payment_slip.pdf";  
  $target_file2 = $target_dir. $_SESSION['reg']. "/" . basename($_FILES["file3"]["name"]);
  $imageFileType1 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
  if($imageFileType1=="pdf")
  {
    $target_file2 = $target_dir. $_SESSION['reg']. "/" . "admit_card.pdf";
  }
  else if($imageFileType1=="jpg" || $imageFileType1=="jpeg")
  {
    $target_file2 = $target_dir. $_SESSION['reg']. "/" . "admit_card.jpg";
  }
  else
  {
    echo "Sorry, only JPG, JPEG & PDF files are allowed.";
  }
  $folderPath =  $target_dir. $_SESSION['reg'];
  if (!file_exists($folderPath)) {
    mkdir($folderPath, 0777, true); // 'true' allows nested folder creation
    if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file)) {
      ?>
    <?php
    }
    else {
      ?>
      <script>alert("Sorry, there was an error uploading your file.");</script>
      <?php
    }
    if (move_uploaded_file($_FILES["file2"]["tmp_name"], $target_file1)) {
      
    }
    else {
      ?>
      <script>
        Swal.fire({
          icon: 'error',
          title: 'Sorry!',
          text: 'There was an error uploading your file.'
        }).then(() => {
          window.location.href = "next.php";
        });
      </script>
    <?php
    }
    if (move_uploaded_file($_FILES["file3"]["tmp_name"], $target_file2)) {
      
    }
    else {
      ?>
      <script>alert("Sorry, there was an error uploading your file.");</script>
      <?php
    }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "transcript";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $target_dir="uploads/" . $reg;
    // $sem=$_REQUEST['semester'];
    $sem = $_POST['semester'];
    if (empty($sem)) {
        die("Semester value is empty.");
    }
    $sql = "INSERT INTO application ( reg,  semester, date_and_time, application_files) VALUES (?, ?, NOW(), ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $reg, $sem ,$target_dir);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    ?>
    <script>Swal.fire("Success!", "Applied successfully.", "success").then(() => {
    window.location.href = "student_panel.php";
    });</script>
    <?php
  }
  else {
    ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'File already exists.',
      }).then(() => {
        window.location.href = "student_panel.php";
      });
    </script>
    <?php
  }
?>
<?php
if (!isset($_REQUEST['semester'])) {
    die("Semester value is missing.");
}
echo "Semester: " . htmlspecialchars($_REQUEST['semester']) . "<br>";
?>
</body>
</html>