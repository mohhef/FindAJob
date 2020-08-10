<?php
require('config.php');
$user_name=$_COOKIE['employee_username'];
$date_applied = date("Y-m-d");
$id=$_POST["id"];


validateUser($id,$user_name,$date_applied);

function validateUser($id, $user_name, $date_applied) {
    require('config.php');
    $valid = true;
    $user_category_query = "SELECT `category` FROM `employee` WHERE user_name='$user_name'";
    $user_category_result = mysqli_fetch_array(mysqli_query($conn, $user_category_query)); 
    echo($user_category_result[0]);
    if (isset($user_category_result) && $user_category_result[0] == "basic") {
        echo 'ERROR: Cannot apply to job..user is basic and should upgrade';
        $valid = false;

    } else if (isset($user_category_result) && $user_category_result[0] == "prime") {
        $jobs_count_query = "SELECT count(*) FROM `applies` GROUP BY user_name HAVING user_name='$user_name'";
        $jobs_count_result = mysqli_fetch_array(mysqli_query($conn, $jobs_count_query));
        if (isset($jobs_count_result) && $jobs_count_result[0] > 4) {
            echo 'ERROR: Cannot apply to job..user is prime and already applied to 5 jobs';
            $valid = false;
        }
    }
    if($valid == true) {
        insertApply($id, $user_name, $date_applied);
    }
}

function insertApply($id, $user_name, $date_applied) {
    require('config.php');
    $updateQuery= "INSERT INTO applies(job_id,user_name,application_status,date_applied) values ($id,'$user_name','applied','$date_applied')";
    mysqli_query($conn, $updateQuery);
}



 ?>