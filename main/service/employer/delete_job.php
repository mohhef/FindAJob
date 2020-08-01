<?php
require("../../controllers/JobController.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $job_id = $_POST['job_id'];

    $job = new JobController();
    $result = $job->deleteJob($job_id);
    if($result) {
        echo json_encode(array('result' => true));
    }else{
        echo json_encode(array('result' => false));
    }
}