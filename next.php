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
        html{
            background-color:#45a863;
        }
        .main{
            height: calc(100vh - 80px);
        }
    </style>
    <title>Apply</title>
</head>
<body  class="font-exo-2">
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
                            <img alt="Tailwind CSS Navbar component" src="images/Jarif.png" />
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
        <form class="w-screen main flex flex-col justify-center items-center gap-5" action="next1.php" method="post" enctype="multipart/form-data">
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Upload The Application Form</legend>
                <input type="file" name="file1" class="file-input" accept=".pdf" required />
            </fieldset>
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Upload The Payment Slip</legend>
                <input type="file" name="file2" class="file-input" accept=".pdf" required />
            </fieldset>
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Upload The admit card</legend>
                <input type="file" name="file3" class="file-input" accept=".pdf,.jpg,.jpeg" required />
            </fieldset>
            <input type="submit" id="submit" value="Submit" class="btn btn-success bg-[#32a856] mt-3 text-white"/>
        </form>
    </div>
</body>
</html>