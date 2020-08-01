<?php
require("../../controllers/JobController.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $employeesNeeded = $_POST['employeesNeeded'];
    $category = $_POST['category'];

    $job = new JobController();
    $result = $job->insertJob($title, $description, $employeesNeeded, $category);
    if($result) {
        echo json_encode(array('result' => true));
    }else{
        echo json_encode(array('result' => false));
    }
}