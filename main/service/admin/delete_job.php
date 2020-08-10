<?php
require("../../controllers/AdminController.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $job_id = $_POST['job_id'];
    $auth = new AdminController();
    $result = $auth->deleteJob($job_id);
    if($result) {
        echo json_encode(array('result' => true));
    }else{
        echo json_encode(array('result' => false));
    }
}
