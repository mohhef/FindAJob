<?php
$post_job=$_POST['post_job'];
$job_title=$_POST['job_title'];
$emp_no=$_POST['emp_no'];
$category_sel=$_POST['category_sel'];
$description_box=$_POST['description_box'];
$date_posted = date("Y-m-d");
$user_name=$_COOKIE['employer_username'];

if ($post_job==true) {
    validateUser($job_title,$emp_no,$description_box,$date_posted,$category_sel,$user_name);
}

function validateUser($job_title,$emp_no,$description_box,$date_posted,$category_sel,$user_name) {
    require('config.php');
    $valid = true;
    $user_category_query = "SELECT `category` FROM `employer` WHERE user_name='$user_name'";
    $user_category_result = mysqli_fetch_array(mysqli_query($conn, $user_category_query))[0]; 
    if ($user_category_result == "prime") {
        $jobs_count_query = "SELECT count(*) FROM `post` GROUP BY user_name HAVING user_name='$user_name'";
        $jobs_count_result = mysqli_fetch_array(mysqli_query($conn, $jobs_count_query));
        if (isset($jobs_count_result) && $jobs_count_result[0] > 4) {
            echo 'ERROR: Cannot post job..user is prime and already posted 5 jobs';
            $valid = false;
        }
    }
    if($valid == true) {
        insertJob($job_title,$emp_no,$description_box,$date_posted,$category_sel,$user_name);
    }
}

function insertJob($job_title,$emp_no,$description_box,$date_posted,$category_sel,$user_name){
    require('config.php');
    $query1 ="INSERT INTO job (title,employee_needed,description,date_posted,category) VALUES ('$job_title','$emp_no','$description_box','$date_posted','$category_sel')";
    $query3 ="INSERT INTO post (user_name) VALUES ('$user_name')";
    echo($query1);
    echo($query3);
    $result = mysqli_query($conn, $query1);
    $result3 = mysqli_query($conn, $query3);
    if(true)
    {
        echo 'Data Inserted';
    }
}


function getEmployeeTest()
{
    require('config.php');
    $query1 ="SELECT * FROM test_employer";
    $result = mysqli_query($conn, $query1);
    $employer = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $stack=array();

    foreach($employer as $emp){
        foreach($emp as $empo){
            array_push($stack,$empo);
        }
    }
    $result= array_filter($stack);
    mysqli_close($conn);
    return $stack;
}
?>