<?php
require("../../controllers/AuthController.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $uuid = $_POST['token'];
    $password = $_POST['password'];
    $auth = new AuthController();
    $result = $auth->employeeResetPassword($uuid, $password);
    if($result) {
        echo json_encode(array('result' => true));
    }else{
        echo json_encode(array('result' => false));
    }
}