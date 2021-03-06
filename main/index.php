<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("./helpers/header.php"); ?>
    <title>Web Career</title>
    <link rel="stylesheet" href="css/index.css"/>
</head>

<body>
<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Employee
                </button>
            </h2>
        </div>

        <div id="collapseOne" class="collapse collapsed" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <form id="employeeLoginForm">
                    <div class="container">
                        <label for="uname"><b>User</b></label>
                        <input type="text" placeholder="Enter User" id="employee_username" required />

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" id="employee_password" required />

                        <button type="button" onclick="employeeLogin()">Login</button>
                    </div>
                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" class="registerbtn" onclick="window.location.href='employee_register.php'">Register</button>
                        <span class="psw"><a href="employee_forgot_password.php">Forgot password?</a></span>
                    </div>
                    <br />
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Employer
                </button>
            </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <form id="employerLoginForm">
                    <div class="container">
                        <label for="uname"><b>User</b></label>
                        <input type="text" placeholder="Enter Username" id="employer_username" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" id="employer_password" required>

                        <button type="button" onclick="employerLogin()">Login</button>
                    </div>
                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" class="registerbtn" onclick="window.location.href='employer_register.php'">Register</button>
                        <span class="psw"><a href="employer_forgot_password.php">Forgot password?</a></span>
                    </div>
                    <br />
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Administrator
                </button>
            </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <form action="" method="post">
                    <div class="container">
                        <label for="uname"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" id="admin_username" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" id="admin_password" required>

                        <button type="button" onclick="adminLogin()">Login</button>
                    </div>
                    <div class="container" >
                        <span class="psw"><a href="admin_forgot_password.php">Forgot password?</a></span>
                    </div>
                    <br />
                </form>
            </div>
        </div>
    </div>
</div>
<script src="js/util.js"></script>
<script src="js/login.js"></script>
<script>
    if(getCookie("employee_username")){
        location.replace("/comp-353/main/employee/available_job.php");
    }
    if(getCookie("employer_username")){
        location.replace('/comp-353/main/employer/post_job.php');
    }
    if(getCookie("admin_username")){
        location.replace("/comp-353/main/admin/admin.php");
    }
</script>

<?php require("./helpers/footer.php"); ?>
</body>
</html>
