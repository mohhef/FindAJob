<?php
require("../../controllers/AuthController.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $auth = new AuthController();
    $result = $auth->employeeLogin($username, $password);
    if($result) {
        $_SESSION['loggedin_employee'] = TRUE;
        $_SESSION['username'] = $username;
        echo json_encode(array('result' => true));
    }else{
        echo json_encode(array('result' => false));
    }
}

