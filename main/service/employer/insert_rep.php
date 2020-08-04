<?php
require("../../controllers/RepController.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $rep = new RepController();
    $result = $rep->insertRep($username, $email, $password);
    if($result) {
        echo json_encode(array('result' => true));
    }else{
        echo json_encode(array('result' => false));
    }
}
