<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("./helpers/header.php"); ?>
    <link rel="stylesheet" href="../../css/register.css"/>
    <title>Web Career</title>
</head>
<body>
<div class="container top-margin">
    <h3 class="text_center">Employee Forgot Password</h3>
    <form>
        <div class="form-group">
            <label for="employee_username_register">Username</label>
            <input type="text" class="form-control" id="employee_username_forgot" aria-describedby="emailHelp" placeholder="Enter Username">
        </div>
        <div class="form-group">
            <label for="employee_password_register">Password</label>
            <input type="password" class="form-control" id="employee_password_forgot" aria-describedby="passwordHelp" placeholder="Enter Password">
        </div>
        <button type="button" class="btn btn-primary right-align-btn" onclick="employeeForgotPassword()">Submit</button>
    </form>
</div>
<?php require("./helpers/footer.php"); ?>
<script src="../../js/auth/forgot.js"></script>
<script src="../../js/util.js"></script>
</body>
</html>