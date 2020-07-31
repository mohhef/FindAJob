<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("./helpers/header.php"); ?>
    <link rel="stylesheet" href="css/register.css"/>
    <title>Web Career</title>
</head>
<body>
<div class="container top-margin">
    <h3 class="text_center">Employer Register</h3>

    <form>
        <div class="form-group">
            <label for="employer_email_register">Email</label>
            <input type="email" class="form-control" id="employer_email_register" placeholder="Enter Email">
        </div>
        <div class="form-group">
            <label for="employer_username_register">Username</label>
            <input type="text" class="form-control" id="employer_username_register" aria-describedby="emailHelp" placeholder="Enter Username">
        </div>
        <div class="form-group">
            <label for="employer_password_register">Password</label>
            <input type="password" class="form-control" id="employer_password_register" placeholder="Enter Password">
        </div>

        <button type="button" class="btn btn-primary right-align-btn" onclick="registerEmployer()">Submit</button>
    </form>
</div>
<?php require("./helpers/footer.php"); ?>
<script src="js/register.js"></script>
<script src="js/util.js"></script>
</body>
</html>

