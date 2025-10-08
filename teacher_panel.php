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
            font-weight: <weight>;
            font-style: normal;
        }
        #sidebar{
            height: calc(100vh - 86px);
        }
        .main{
            width: calc(100vw - 256px);
            height: calc(100vh - 86px);
            margin-left:256px;
            margin-top:86px;
        }
        html{
            height:100%;
            background-color:#45a863;
            margin: 0 auto;
            overflow-x:hidden;
        }
        #row{
            display: flex;
            align-items: center; 
        }
        #row h3 {
            flex: 0 0 350px; /* Fixed width for headings */
            margin: 0;
            font-size: 16px;
        }
        #row input {
            flex: 1; /* Each input takes up equal space */
            padding: 8px;
            font-size: 14px;
            width:130px;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="fixed navbar bg-[#32a856] shadow-sm z-10">
        <div class="flex-1">
            <div class="flex items-center gap-5 ml-5"><img src="images/jkkniu.png">
            <h1 class="font-exo-2 text-3xl text-white font-bold">Jatiya Kabi Kazi Nazrul Islam University</h1></div>
        </div>
        <div class="flex gap-2">
            <div class="dropdown dropdown-end">
                <div id="avatar" tabindex="0" role="button" class="btn btn-ghost btn-circle avatar mr-8">
                    <div class="w-10 rounded-full">
                        <img
                            alt="Tailwind CSS Navbar component"
                            src="images/<?php echo htmlspecialchars($_SESSION['username'] . '.jpg'); ?>"  />
                    </div>
                </div>
                <ul
                    tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                    <li>
                        <span id="username" class="justify-between">
                            <?php echo $_SESSION['username']?>
                        </span>
                    </li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="form2" class="flex z-0">
        <div id="sidebar" class="mt-[86px] fixed flex justify-center bg-white w-3xs h-full">
            <ul class="mt-10">
                <li class="mb-10"><input type="radio" name="option" aria-label="Add Data" class="btn btn-outline btn-success w-[10rem]" /></li>
                <li class="mb-10"><input type="radio" name="option" aria-label="Update Data" class="btn btn-outline btn-success w-[10rem]" /></li>
                <li><input type="radio" name="option" aria-label="Delete Data" class="btn btn-outline btn-success w-[10rem]" /></li>
            </ul>
        </div>
        <div id="form1">
            <form id="search" class="main flex flex-col items-center justify-center">
                <label class="input">
                    <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></g></svg>
                        <input type="search" name="search" placeholder="Search Roll" pattern="[0-9]+" required />
                </label>
                <input type="submit" value="Search" class="btn btn-success bg-[#32a856] mt-7 text-white"/>
            </form>
            <form id="result" class="hidden main flex flex-col items-center justify-center mt-100">
                <div class="flex gap-25">
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Name</legend>
                        <input type="text" id="name" class="input"/>
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Roll</legend>
                        <input type="text" id="roll" class="input"/>
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Session</legend>
                        <input type="text" id="session" class="input"/>
                    </fieldset>
                </div>
                <div class="flex mt-5">
                    <select id="semester" class="select select-success"  onchange="first()">
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
                <div id="internal" class="flex w-screen flex-col mt-7 hidden">
                    <div class="divider">Internal Marks</div>
                </div>
                <div id="first" class="main flex flex-col items-baseline hidden">
                    <div id="row" class="flex mt-5 items-baseline gap-5">
                        <h3 class="font-bold">CSE-103(Discrete Mathematics):</h3>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Mid/Assignment-1</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Mid/Assignment-2</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Mid/Assignment-3</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Attendance</legend>
                            <input type="text" class="input" size="7" placeholder="Type here" />
                        </fieldset>
                    </div>
                    <div id="row" class="flex mt-5 items-baseline gap-5">
                        <h3 class="font-bold">CSE-105(Structured Programming):</h3>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Mid/Assignment-1</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Mid/Assignment-2</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Mid/Assignment-3</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Attendance</legend>
                            <input type="text" class="input" size="7" placeholder="Type here" />
                        </fieldset>
                    </div>
                    <div id="row" class="flex mt-5 items-baseline gap-5">
                        <h3 class="font-bold">CSE-106(Structured Programming Lab):</h3>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Continuous evaluation</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Lab Report</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Attendance</legend>
                            <input type="text" class="input" size="7" placeholder="Type here" />
                        </fieldset>
                    </div>
                    <div id="row" class="flex mt-5 items-baseline gap-5">
                        <h3 class="font-bold">EEE-161(Basic Electrical Engineering):</h3>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Mid/Assignment-1</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Mid/Assignment-2</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Mid/Assignment-3</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Attendance</legend>
                            <input type="text" class="input" size="7" placeholder="Type here" />
                        </fieldset>
                    </div>
                    <div id="row" class="flex mt-5 items-baseline gap-5">
                        <h3 class="font-bold">EEE-162(Basic Electrical Engineering Lab):</h3>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Continuous evaluation</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Lab Report</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Attendance</legend>
                            <input type="text" class="input" size="7" placeholder="Type here" />
                        </fieldset>
                    </div>
                    <div id="row" class="flex mt-5 items-baseline gap-5">
                        <h3 class="font-bold">GED-163(Accounting):</h3>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Mid/Assignment-1</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Mid/Assignment-2</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Mid/Assignment-3</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Attendance</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                    </div>
                    <div id="row" class="flex mt-5 items-baseline gap-5">
                        <h3 class="font-bold">GED-165(English):</h3>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Mid/Assignment-1</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Mid/Assignment-2</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Mid/Assignment-3</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Attendance</legend>
                            <input type="text" class="input" size="7" placeholder="Type here" />
                        </fieldset>
                    </div>
                    <div id="row" class="flex mt-5 items-baseline gap-5">
                        <h3 class="font-bold">MATH-167(Calculus and Differential Equation):</h3>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Mid/Assignment-1</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Mid/Assignment-2</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Mid/Assignment-3</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Attendance</legend>
                            <input type="text" class="input" size="7" placeholder="Type here" />
                        </fieldset>
                    </div>
                <div>
                <div id="internal1" class="flex flex-col mt-7 hidden w-screen">
                    <div class="divider">External Marks</div>
                </div>
                <div id="first1" class="flex flex-col items-baseline hidden">
                    <div id="row" class="flex mt-5 items-baseline gap-5">
                        <h3 class="font-bold">CSE-103(Discrete Mathematics):</h3>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Theory</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                    </div>
                    <div id="row" class="flex mt-5 items-baseline gap-5">
                        <h3 class="font-bold">CSE-105(Structured Programming):</h3>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Theory</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                    </div>
                    <div id="row" class="flex mt-5 items-baseline gap-5">
                        <h3 class="font-bold">CSE-106(Structured Programming Lab):</h3>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Theory</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                    </div>
                    <div id="row" class="flex mt-5 items-baseline gap-5">
                        <h3 class="font-bold">EEE-161(Basic Electrical Engineering):</h3>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Theory</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                    </div>
                    <div id="row" class="flex mt-5 items-baseline gap-5">
                        <h3 class="font-bold">EEE-162(Basic Electrical Engineering Lab):</h3>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Theory</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                    </div>
                    <div id="row" class="flex mt-5 items-baseline gap-5">
                        <h3 class="font-bold">GED-163(Accounting):</h3>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Theory</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                    </div>
                    <div id="row" class="flex mt-5 items-baseline gap-5">
                        <h3 class="font-bold">GED-165(English):</h3>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Theory</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                    </div>
                    <div id="row" class="flex mt-5 items-baseline gap-5">
                        <h3 class="font-bold">MATH-167(Calculus and Differential Equation):</h3>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Theory</legend>
                            <input type="text" class="input" size="1" placeholder="Type here" />
                        </fieldset>
                    </div>
                <div>
                <input type="submit" value="Submit" class="btn btn-success bg-[#32a856] mt-7 text-white ml-100 mb-10"/>
            </form>
        </div>
    </div>
    <script>
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
        document.getElementById('roll').value = parts[0]; // Update the roll input with the response
        document.getElementById('name').value = parts[1];
        document.getElementById('session').value = parts[2];

      })
      .catch(error => console.error('Error:', error));
    });
    document.getElementById("semester").addEventListener("change", function() {
        const selectedOption = this.options[this.selectedIndex];
        if(selectedOption.text=='1st')
        {
            document.getElementById("first").style.display = "flex";
            document.getElementById("form1").style.marginTop ="150px";
            document.getElementById("first").style.height = "100%";
            document.getElementById("first1").style.display = "flex";
        }
        document.getElementById("internal").style.display = "flex";
        document.getElementById("internal1").style.display = "flex";
        });
        //alert("You selected: " + selectedOption.text);
  </script>
</body>
</html>