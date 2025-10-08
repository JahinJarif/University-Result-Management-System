<?php
    session_start();
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
                            <img alt="Tailwind CSS Navbar component" src="images/<?php echo htmlspecialchars($_SESSION['reg'] . '.jpg'); ?>"  />
                        </div>
                    </div>
                    <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                        <li>
                            <span id="username" class="justify-between">
                                <?php echo $_SESSION['reg'];?>
                            </span>
                        </li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="flex">
            <div id="sidebar" class="mt-[80px] fixed top-[80px]flex w-[20%] justify-center bg-white h-full">
                <ul class="mt-10 flex flex-col items-center">
                    <li class="mb-10"><input id="add" type="radio" name="option" aria-label="Add Data" class="btn btn-outline btn-success opacity-100 sm:btn-sm md:btn-md lg:btn-lg xl:btn-xl" onclick="add1()" /></li>
                </ul>
            </div>
            <div id="form1" class="hidden mt-[80px] ml-[20%] main flex w-[80%] items-center justify-center">
                <form id="search" class="flex flex-col items-center justify-center gap-5">
                    <label class="input">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></g></svg>
                        <input type="search" name="search" placeholder="Search Roll" pattern="[0-9]+" required />
                    </label>
                    <input type="submit" value="Search" class="btn btn-success bg-[#32a856] text-white"/>
                </form>
                <form id="result" class="hidden flex flex-col items-center justify-center" action="result.php" method="post">
                    <div class="flex gap-25">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Name</legend>
                            <input type="text" name="name" id="name" class="input"/>
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Roll</legend>
                            <input type="text" name="roll" id="roll" class="input"/>
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Session</legend>
                            <input type="text" name="session" id="session" class="input"/>
                        </fieldset>
                    </div>
                    <div class="flex mt-5">
                        <select id="semester" name="semester" class="select select-success">
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
                    </div>
                    <div id="first" class="flex flex-col hidden">
                        <div class="flex w-full flex-col mt-7">
                            <div class="divider divider-neutral">Internal Mark</div>
                        </div>
                        <div class="row flex mt-5 gap-5">
                            <h3 class="font-bold">CSE-103(Discrete Mathematics):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse103_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse103_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse103_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse103_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-105(Structured Programming):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse105_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse105_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse105_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse105_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-106(Structured Programming Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="cse106_ce" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="cse106_lr" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse106_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">EEE-161(Basic Electrical Engineering):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="eee161_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="eee161_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="eee161_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="eee161_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">EEE-162(Basic Electrical Engineering Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="eee162_ce" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="eee162_lr" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="eee162_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">GED-163(Accounting):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="ged163_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="ged163_m-2" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="ged163_m-3" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="ged163_a" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">GED-165(English):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="ged165_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="ged165_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="ged165_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="ged165_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">MATH-167(Calculus and Differential Equation):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="math167_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="math167_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="math167_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="math167_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col mt-7 w-full">
                            <div class="divider divider-neutral">External Marks</div>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-103(Discrete Mathematics):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse103_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-105(Structured Programming):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse105_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-106(Structured Programming Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="cse106_v" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="cse106_lt" class="input validator" placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="cse106_as" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">EEE-161(Basic Electrical Engineering):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="eee161_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">EEE-162(Basic Electrical Engineering Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="eee162_v" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="eee162_lt" class="input validator"  placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="eee162_as" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">GED-163(Accounting):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="ged163_t" class="input validator"  placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">GED-165(English):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="ged165_t" class="input validator"  placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">MATH-167(Calculus and Differential Equation):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="math167_t" class="input validator"  placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                    </div>
                    <div id="second" class="flex flex-col hidden">
                        <div class="flex w-full flex-col mt-7">
                            <div class="divider divider-neutral">Internal Mark</div>
                        </div>
                        <div class="row flex mt-5 gap-5">
                            <h3 class="font-bold">CSE-123(Programming with Python):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse123_m-1" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse123_m-2" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse123_m-3" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse123_a" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-124(Programming with Python Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="cse124_ce" class="input validator"  placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="cse124_lr" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse124_a" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-127(Numerical Methods):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse127_m-1" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse127_m-2" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse127_m-3" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse127_a" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">MATH-171(Matrix and Vector Analysis):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="math171_m-1" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="math171_m-2" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="math171_m-3" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="math171_a" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">EEE-175(Electronics):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="eee175_m-1" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="eee175_m-2" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="eee175_m-3" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="eee175_a" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">EEE-176(Electronics Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="eee176_ce" class="input validator"  placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="eee176_lr" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="176_a" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">PHY-177(Physics):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="phy177_m-1" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="phy177_m-2" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="phy177_m-3" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="phy177_a" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">GED-179(Nazrul Studies):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="ged179_m-1" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="ged179_m-2" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="ged179_m-3" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="ged179_a" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-100(Software Development Project with C/Python):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous Assessment</legend>
                                <input type="number" name="cse100_ca" class="input validator" size="1" placeholder="Type here" min="0" max="40" title="Must be between be 0 to 40" />
                            </fieldset>
                        </div>
                        <div class="flex w-full flex-col mt-7">
                            <div class="divider divider-neutral">External Mark</div>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-123(Programming with Python):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse123_t" class="input validator"  placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-124(Programming with Python Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="cse124_v" class="input validator"  placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="cse124_lt" class="input validator"  placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="cse124_as" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-127(Numerical Methods):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse127_t" class="input validator"  placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">MATH-171(Matrix and Vector Analysis):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="math171_t" class="input validator"  placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">EEE-175(Electronics):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="eee175_t" class="input validator"  placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">EEE-176(Electronics Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="eee176_v" class="input validator"  placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="eee176_lt" class="input validator"  placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="eee176_as" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">PHY-177(Physics):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="phy177_t" class="input validator"  placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">GED-179(Nazrul Studies):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="ged179_t" class="input validator"  placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-100(Software Development Project with C/Python):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Report</legend>
                                <input type="number" name="cse100_r" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Demonstration</legend>
                                <input type="number" name="cse100_d" class="input validator"  placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Presentation/Viva-voce</legend>
                                <input type="number" name="cse100_pv" class="input validator"  placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                        </div>
                    </div>
                    <div id="third" class="flex flex-col hidden">
                        <div class="flex w-full flex-col mt-7">
                            <div class="divider divider-neutral">Internal Mark</div>
                        </div>
                        <div class="row flex mt-5 gap-5">
                            <h3 class="font-bold">CSE-201(Object Oriented Programming):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse201_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse201_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse201_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse201_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-202(Object Oriented Programming Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="cse202_ce" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="cse202_lr" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse202_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-203(Data Structures):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse203_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse203_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse203_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse203_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-204(Data Structures Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="cse204_ce" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="cse204_lr" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse204_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-205(Digital Logic Design):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse205_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse205_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse205_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse205_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-206(Digital Logic Design Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="cse206_ce" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="cse206_lr" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse206_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">MATH-261(Coordinate Geometry):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="math261_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="math261_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="math261_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="math261_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">GED-263(Bangladesh Studies):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="ged263_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="ged263_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="ged263_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="ged263_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">MATH-273(Statistics and Probability Theory):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="math273_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="math273_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="math273_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="math273_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="flex w-full flex-col mt-7">
                            <div class="divider divider-neutral">External Mark</div>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-201(Object Oriented Programming):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse201_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-202(Object Oriented Programming Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="cse202_v" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="cse202_lt" class="input validator" placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="cse202_as" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-203(Data Structures):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse203_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-204(Data Structures Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="cse204_v" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="cse204_lt" class="input validator" placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="cse204_as" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-205(Digital Logic Design):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse205_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-206(Digital Logic Design Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="cse206_v" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="cse206_lt" class="input validator" placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="cse206_as" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">MATH-261(Coordinate Geometry):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="math261_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">GED-263(Bangladesh Studies):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="ged263_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">MATH-273(Statistics and Probability Theory):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="math273_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                    </div>
                    <div id="fourth" class="flex flex-col hidden">
                        <div class="flex w-full flex-col mt-7">
                            <div class="divider divider-neutral">Internal Mark</div>
                        </div>
                        <div class="row flex mt-5 gap-5">
                            <h3 class="font-bold">CSE-221(Algorithms):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse221_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse221_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse221_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse221_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-222(Algorithms Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="cse222_ce" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="cse222_lr" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse222_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-223(Database Management System):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse223_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse223_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse223_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse223_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-224(Database Management System Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="cse224_ce" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="cse224_lr" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse224_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-225(Computer Architecture and Organization):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse225_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse225_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse225_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse225_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-229(Engineering Ethics and Cyber Law):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse229_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse229_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse229_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse229_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-231(Programming With C++):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="cse231_ce" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="cse231_lr" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse231_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">MATH-275(Complex variable,Laplace transformation and Fourier Analysis):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="math275_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="math275_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="math275_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="math275_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-200(Software Development Project with C++/Java):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous Assessment</legend>
                                <input type="number" name="cse200_ca" class="input validator" size="1" placeholder="Type here" min="0" max="40" title="Must be between be 0 to 40" />
                            </fieldset>
                        </div>
                        <div class="flex w-full flex-col mt-7">
                            <div class="divider divider-neutral">External Mark</div>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-221(Algorithms):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse221_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-222(Algorithms Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="cse222_v" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="cse222_lt" class="input validator" placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="cse222_as" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-223(Database Management System):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse223_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-224(Database Management System Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="cse224_v" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="cse224_lt" class="input validator" placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="cse224_as" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-225(Computer Architecture and Organization):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse225_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-229(Engineering Ethics and Cyber Law):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse229_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-231(Programming With C++):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="cse231_v" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="cse231_lt" class="input validator" placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="cse231_as" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">MATH-275(Complex variable,Laplace transformation and Fourier Analysis):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="math275_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-200(Software Development Project with C++/Java):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Report</legend>
                                <input type="number" name="cse200_r" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Demonstration</legend>
                                <input type="number" name="cse200_d" class="input validator"  placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Presentation/Viva-voce</legend>
                                <input type="number" name="cse200_pv" class="input validator"  placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                        </div>
                    </div>
                    <div id="fifth" class="flex flex-col hidden">
                        <div class="flex w-full flex-col mt-7">
                            <div class="divider divider-neutral">Internal Mark</div>
                        </div>
                        <div class="row flex mt-5 gap-5">
                            <h3 class="font-bold">CSE-301(Microprocessors):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse301_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse301_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse301_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse301_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-302(Microprocessors and Assembly Language Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="cse302_ce" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="cse302_lr" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse302_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-303(Operating Systems):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse303_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse303_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse303_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse303_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-304(Operating Systems Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="cse304_ce" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="cse304_lr" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse304_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-305(Theory of Computation):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse305_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse305_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse305_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse305_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-307(Internet and Web Programming):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse307_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse307_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse307_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse307_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-308(Internet and Web Programming Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="cse308_ce" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="cse308_lr" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse308_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-309(Data Communication):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse309_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse309_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse309_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse309_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="flex w-full flex-col mt-7">
                            <div class="divider divider-neutral">External Mark</div>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-301(Microprocessors):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse301_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-302(Microprocessors and Assembly Language Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="cse302_v" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="cse302_lt" class="input validator" placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="cse302_as" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-303(Operating Systems):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse303_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-304(Operating Systems Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="cse304_v" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="cse304_lt" class="input validator" placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="cse304_as" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-305(Theory of Computation):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse305_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-307(Internet and Web Programming):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse307_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-308(Internet and Web Programming Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="cse308_v" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="cse308_lt" class="input validator" placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="cse308_as" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-309(Data Communication):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse309_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                    </div>
                    <div id="sixth" class="flex flex-col hidden">
                        <div class="flex w-full flex-col mt-7">
                            <div class="divider divider-neutral">Internal Mark</div>
                        </div>
                        <div class="row flex mt-5 gap-5">
                            <h3 class="font-bold">CSE-321(Computer Networks):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="321_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="321_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="321_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="321_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-322(Computer Networks Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="cse322_ce" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="cse322_lr" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse322_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-323(Compiler Design):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse323_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse323_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse323_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse323_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-324(Compiler Design Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="cse324_ce" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="cse324_lr" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse324_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-325(Computer Peripherals and Interfacing):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse325_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse325_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse325_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse325_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-326(Computer Peripherals and Interfacing Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="cse326_ce" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="cse326_lr" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse326_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-327(System Analysis and Design):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse327_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse327_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse327_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse327_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">GED-371(Economics):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="ged371_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="ged371_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="ged371_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="ged371_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-300(Software Development Project):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous Assessment</legend>
                                <input type="number" name="cse300_ca" class="input validator" size="1" placeholder="Type here" min="0" max="40" title="Must be between be 0 to 40" />
                            </fieldset>
                        </div>
                        <div class="flex w-full flex-col mt-7">
                            <div class="divider divider-neutral">External Mark</div>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-321(Computer Networks):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse321_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-322(Computer Networks Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="cse322_v" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="cse322_lt" class="input validator" placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="cse322_as" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-323(Compiler Design):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse323_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-324(Compiler Design Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="cse324_v" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="cse324_lt" class="input validator" placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="cse324_as" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-325(Computer Peripherals and Interfacing):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse325_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-326(Computer Peripherals and Interfacing Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="cse326_v" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="cse326_lt" class="input validator" placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="cse326_as" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-327(System Analysis and Design):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse327_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">GED-371(Economics):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="ged371_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-300(Software Development Project):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Report</legend>
                                <input type="number" name="cse300_r" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Demonstration</legend>
                                <input type="number" name="cse300_d" class="input validator"  placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Presentation/Viva-voce</legend>
                                <input type="number" name="cse300_pv" class="input validator"  placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                        </div>
                    </div>
                    <div id="seventh" class="flex flex-col hidden">
                        <div class="flex w-full flex-col mt-7">
                            <div class="divider divider-neutral">Internal Mark</div>
                        </div>
                        <div class="row flex mt-5 gap-5">
                            <h3 class="font-bold">CSE-401(Software Engineering):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse401_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse401_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse401_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse401_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 gap-5">
                            <h3 class="font-bold">CSE-405(Artificial Intelligence):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse405_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse405_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse405_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse405_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-406(Artificial Intelligence Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="cse406_ce" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="cse406_lr" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse406_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-411(Data Science):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse411_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse411_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse411_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse411_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 gap-5">
                            <h3 class="font-bold">CSE-409(Digital Signal Processing):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse409_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse409_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse409_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse409_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-410(Digital Signal Processing Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="cse410_ce" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="cse410_lr" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse410_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-435(Network Security):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="435_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="435_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="435_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="435_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-436(Network Security Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="436_ce" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="436_lr" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="436_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-400(A)(Thesis / Project):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous Assessment</legend>
                                <input type="number" name="cse400(A)_ca" class="input validator" size="1" placeholder="Type here" min="0" max="40" title="Must be between be 0 to 40" />
                            </fieldset>
                        </div>
                        <div class="flex w-full flex-col mt-7">
                            <div class="divider divider-neutral">External Mark</div>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-401(Software Engineering):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse401_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-405(Artificial Intelligence):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse405_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-406(Artificial Intelligence Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="cse406_v" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="cse406_lt" class="input validator" placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="cse406_as" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-411(Data Science):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse411_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-409(Digital Signal Processing):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse409_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-410(Digital Signal Processing Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="cse410_v" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="cse410_lt" class="input validator" placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="cse410_as" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-435(Network Security):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse435_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-436(Network Security Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="cse436_v" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="cse436_lt" class="input validator" placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="cse436_as" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-400(A)(Thesis / Project):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Report</legend>
                                <input type="number" name="cse400(A)_r" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Demonstration</legend>
                                <input type="number" name="cse400(A)_d" class="input validator"  placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Presentation/Viva-voce</legend>
                                <input type="number" name="cse400(A)_pv" class="input validator"  placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                        </div>
                    </div>
                    <div id="eighth" class="flex flex-col hidden">
                        <div class="flex w-full flex-col mt-7">
                            <div class="divider divider-neutral">Internal Mark</div>
                        </div>
                        <div class="row flex mt-5 gap-5">
                            <h3 class="font-bold">CSE-425(Machine Learning):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse425_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse425_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse425_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse425_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-426(Machine Learning Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="cse426_ce" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="cse426_lr" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse426_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-439(Digital Image Processing):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-1</legend>
                                <input type="number" name="cse439_m-1" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-2</legend>
                                <input type="number" name="cse439_m-2" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Mid/Assignment-3</legend>
                                <input type="number" name="cse439_m-3" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse439_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-440(Digital Image Processing Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous evaluation</legend>
                                <input type="number" name="cse440_ce" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Report</legend>
                                <input type="number" name="cse440_lr" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Attendance</legend>
                                <input type="number" name="cse440_a" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-400(B)(Thesis/Project):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Continuous Assessment</legend>
                                <input type="number" name="cse400(B)_ca" class="input validator" size="1" placeholder="Type here" min="0" max="40" title="Must be between be 0 to 40" />
                            </fieldset>
                        </div>
                        <div class="flex w-full flex-col mt-7">
                            <div class="divider divider-neutral">External Mark</div>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-425(Machine Learning):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse425_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-426(Machine Learning Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="cse426_v" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="cse426_lt" class="input validator" placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="cse426_as" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-439(Digital Image Processing):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Theory</legend>
                                <input type="number" name="cse439_t" class="input validator" placeholder="Type here" min="0" max="60" title="Must be between be 0 to 60" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-440(Digital Image Processing Lab):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Viva</legend>
                                <input type="number" name="cse440_v" class="input validator" placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Lab Test</legend>
                                <input type="number" name="cse440_lt" class="input validator" placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Answer Script</legend>
                                <input type="number" name="cse440_as" class="input validator" placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                        </div>
                        <div class="row flex mt-5 items-baseline gap-5">
                            <h3 class="font-bold">CSE-400(B)(Thesis/Project):</h3>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Report</legend>
                                <input type="number" name="cse400(B)_r" class="input validator"  placeholder="Type here" min="0" max="10" title="Must be between be 0 to 10" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Demonstration</legend>
                                <input type="number" name="cse400(B)_d" class="input validator"  placeholder="Type here" min="0" max="30" title="Must be between be 0 to 30" />
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Presentation/Viva-voce</legend>
                                <input type="number" name="cse400(B)_pv" class="input validator"  placeholder="Type here" min="0" max="20" title="Must be between be 0 to 20" />
                            </fieldset>
                        </div>
                    </div>
                    <input type="submit" value="Submit" class="btn btn-success bg-[#32a856] mt-7 text-white mb-10"/>
                </form>
            </div>
        </div>
    </div>
    <script>
        function add1(){
            document.getElementById('form1').style.display = 'flex';
        }
        document.getElementById('search').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent form from reloading the page

        const formData = new FormData(this);

        fetch('search.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById('search').style.display = 'none';
            document.getElementById('result').style.display = 'flex';
            parts = data.split(",")
            document.getElementById('name').value = parts[0]; // Update the roll input with the response
            document.getElementById('roll').value = parts[1];
            document.getElementById('session').value = parts[2];

        })
        .catch(error => console.error('Error:', error));
        });
        
        document.getElementById("semester").addEventListener("change", function() {
            const selectedOption = this.options[this.selectedIndex];
            document.getElementById("first").style.display = "none";
            document.getElementById("second").style.display = "none";
            document.getElementById("third").style.display = "none";
            document.getElementById("fourth").style.display = "none";
            document.getElementById("fifth").style.display = "none";
            document.getElementById("sixth").style.display = "none";
            document.getElementById("seventh").style.display = "none";
            document.getElementById("eighth").style.display = "none";
            document.querySelector('input[type="number"]').required = false;
            if(selectedOption.text=='1st')
            {
                document.getElementById("first").style.display = "flex";
                document.getElementById("result").style.marginTop = "1500px";
                const section = document.getElementById("first");
                const input = section.querySelector('input[type="number"]');
                input.required = true;
            }
            else if(selectedOption.text=='2nd')
            {
                document.getElementById("second").style.display = "flex";
                document.getElementById("second").style.width = "106%";
                document.getElementById("result").style.marginTop = "1695px";
                const section = document.getElementById("second");
                const input = section.querySelector('input[type="number"]');
                input.required = true;
            }
            else if(selectedOption.text=='3rd')
            {
                document.getElementById("third").style.display = "flex";
                document.getElementById("third").style.width = "101%";
                document.getElementById("result").style.marginTop = "1700px";
                const section = document.getElementById("third");
                const input = section.querySelector('input[type="number"]');
                input.required = true;
            }
            else if(selectedOption.text=='4th')
            {
                document.getElementById("fourth").style.display = "flex";
                document.getElementById("fourth").style.width = "88%";
                document.getElementById("result").style.marginTop = "1700px";
                const section = document.getElementById("fourth");
                const input = section.querySelector('input[type="number"]');
                input.required = true;
            }
            else if(selectedOption.text=='5th')
            {
                document.getElementById("fifth").style.display = "flex";
                document.getElementById("fifth").style.width = "103.5%";
                document.getElementById("result").style.marginTop = "1500px";
                const section = document.getElementById("fifth");
                const input = section.querySelector('input[type="number"]');
                input.required = true;
            }
            else if(selectedOption.text=='6th')
            {
                document.getElementById("sixth").style.display = "flex";
                document.getElementById("sixth").style.width = "99%";
                document.getElementById("result").style.marginTop = "1700px";
                const section = document.getElementById("sixth");
                const input = section.querySelector('input[type="number"]');
                input.required = true;
            }
            else if(selectedOption.text=='7th')
            {
                document.getElementById("seventh").style.display = "flex";
                document.getElementById("seventh").style.width = "110%";
                document.getElementById("result").style.marginTop = "1700px";
                const section = document.getElementById("seventh");
                const input = section.querySelector('input[type="number"]');
                input.required = true;
            }
            else if(selectedOption.text=='8th')
            {
                document.getElementById("eighth").style.display = "flex";
                document.getElementById("eighth").style.width = "115%";
                document.getElementById("result").style.marginTop = "900px";
                const section = document.getElementById("eighth");
                const input = section.querySelector('input[type="number"]');
                input.required = true;
            }
            });
            //alert("You selected: " + selectedOption.text);
    </script>
</body>
</html>