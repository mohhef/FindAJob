<?php
session_start();
$token = $_GET['token'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("./helpers/header.php"); ?>
    <link rel="stylesheet" href="css/register.css"/>
    <title>Web Career</title>
</head>
<body>
<div class="container top-margin">
    <h3 class="text_center">Admin Forgot Password</h3>
    <form>
        <div class="form-group">
            <label for="admin_reset_password">Password</label>
            <input type="password" class="form-control" id="admin_reset_password" aria-describedby="emailHelp" placeholder="Enter Password">
        </div>
        <button type="button" class="btn btn-primary right-align-btn" onclick="adminResetPassword()">Submit</button>
    </form>
</div>
<?php require("./helpers/footer.php"); ?>
<script src="js/resetPassword.js"></script>
</body>
</html>

