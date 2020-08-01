<?php

require("../../controllers/JobController.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $job_id = $_POST['job_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $employeesNeeded = $_POST['employeesNeeded'];
    $category = $_POST['category'];

    $job = new JobController();
    $result = $job->updateJob($title, $description, $employeesNeeded, $category, $job_id);
    if ($result) {
        echo json_encode(array('result' => true));
    } else {
        echo json_encode(array('result' => false));
    }
}