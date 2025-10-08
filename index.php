<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .font-exo-2 {
            font-family: "Exo 2", sans-serif;
            font-optical-sizing: auto;
            font-weight: 700;
            font-style: normal;
        }
    </style>
    <title>Document</title>
</head>
<body class="font-exo-2">
    <div class="grid grid-cols-2">
        <img class="w-full h-full" src="images/65eff50c-03ec-4128-9067-ecdc5e38b42d1.jpeg" alt="">
        <div class="flex flex-col h-screen justify-center items-center bg-[#32a856]">
            <img class="mt-[-50px] w-[6rem] mb-5" src="images/jkkniu.png" alt="">
            <h1 class="font-exo-2 text-[#33573e] text-3xl text-center mb-10">JKKNIU Online Transcript Generator</h1>
            <div class="flex gap-5">
                <input type="radio" name="option" aria-label="Admin" class="btn btn-outline btn-accent" onclick="show2()">
                <input type="radio" name="option" aria-label="Office" class="btn btn-outline btn-accent" onclick="show1()">
                <input type="radio" name="option" aria-label="Student" class="btn btn-outline btn-accent" onclick="show()">
            </div><br>
            <form id="admin" class="hidden flex flex-col items-center" action="demo2.php" method="post">
                <label class="input validator">
                    <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></g></svg>
                    <input class="w-80 border-0" name="user" type="text" required name="username" placeholder="Username" pattern="[A-Za-z][A-Za-z0-9\-_ss]*" minlength="3" maxlength="30" title="Only letters, numbers or dash" />
                </label><br>
                <div class="flex items-center gap-5 justify-center">
                    <label class="input validator ml-11">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><path d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"></path><circle cx="16.5" cy="7.5" r=".5" fill="currentColor"></circle></g></svg>
                        <input id="passwordInput1" name="pass" type="password" size="40" required name="pass" placeholder="Password" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must be more than 8 characters, including number, lowercase letter, uppercase letter" />
                    </label>
                    <input id="togglePassword1" type="checkbox" class="checkbox border-black bg-[#FAF9F6] checked:bg-white checked:text-black checked:bg-[#FAF9F6] " />
                </div>
                <input type="submit" value="Submit" class="btn btn-success bg-[#32a856] mt-7 text-white" />
            </form>
            <form id="office" class="hidden flex flex-col items-center" action="demo.php" method="post">
                <label class="input validator">
                    <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></g></svg>
                    <input class="w-80 border-0" type="text" required name="username" placeholder="Username" pattern="[A-Za-z][A-Za-z0-9\-]*" minlength="3" maxlength="30" title="Only letters, numbers or dash" />
                </label><br>
                <div class="flex items-center gap-5 justify-center">
                    <label class="input validator ml-11">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><path d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"></path><circle cx="16.5" cy="7.5" r=".5" fill="currentColor"></circle></g></svg>
                        <input id="passwordInput2" type="password" size="40" required name="pass" placeholder="Password" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must be more than 8 characters, including number, lowercase letter, uppercase letter" />
                    </label>
                    <input id="togglePassword2" type="checkbox" class="checkbox border-black bg-[#FAF9F6] checked:bg-white checked:text-black checked:bg-[#FAF9F6] " />
                </div>
                <input type="submit" value="Submit" class="btn btn-success bg-[#32a856] mt-7 text-white" />
            </form>
            <form id="student" class="hidden flex flex-col items-center" action="demo1.php" method="post">
                <label class="input validator">
                    <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></g></svg>
                    <input type="text" required name="reg" placeholder="Reg. No." pattern="[0-9]+" minlength="3" maxlength="5" title="Only numbers" />
                </label><br>
                <div class="flex items-center gap-5 justify-center">
                    <label class="input validator ml-11">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><path d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"></path><circle cx="16.5" cy="7.5" r=".5" fill="currentColor"></circle></g></svg>
                        <input id="passwordInput" type="password" size="40" required name="pass" placeholder="Password" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must be more than 8 characters, including number, lowercase letter, uppercase letter" />
                    </label>
                    <input id="togglePassword" type="checkbox" class="checkbox border-black bg-[#FAF9F6] checked:bg-white checked:text-black checked:bg-[#FAF9F6] " />
                </div>
                <input type="submit" value="Submit" class="btn btn-success bg-[#32a856] mt-7 text-white w-20" />
            </form>
        </div>
    </div>
    <script>
        function show(){
            document.getElementById('admin').style.display = 'none';
            document.getElementById('office').style.display = 'none';
            document.getElementById('student').style.display = 'flex';
        }
        function show1(){
            document.getElementById('admin').style.display = 'none';
            document.getElementById('student').style.display = 'none';
            document.getElementById('office').style.display = 'contents';
        }
        function show2(){
            document.getElementById('office').style.display = 'none';
            document.getElementById('student').style.display = 'none';
            document.getElementById('admin').style.display = 'contents';
        }
        const passwordInput1 = document.getElementById('passwordInput1');
        const togglePassword1 = document.getElementById('togglePassword1');

        togglePassword1.addEventListener('change', function () {
            if (this.checked) {
            passwordInput1.type = 'text';
            } else {
            passwordInput1.type = 'password';
            }
        });
        const passwordInput2 = document.getElementById('passwordInput2');
        const togglePassword2 = document.getElementById('togglePassword2');

        togglePassword2.addEventListener('change', function () {
            if (this.checked) {
            passwordInput2.type = 'text';
            } else {
            passwordInput2.type = 'password';
            }
        });
        const passwordInput = document.getElementById('passwordInput');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('change', function () {
            if (this.checked) {
            passwordInput.type = 'text';
            } else {
            passwordInput.type = 'password';
            }
        });
    </script>
</body>
</html>