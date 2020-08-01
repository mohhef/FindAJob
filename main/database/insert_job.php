<?php
$post_job=$_POST['post_job'];
$job_title=$_POST['job_title'];
$emp_no=$_POST['emp_no'];
$category_sel=$_POST['category_sel'];
$description_box=$_POST['description_box'];
$date_posted = date("Y-m-d");

if ($post_job==true){
    insertJob($job_title,$emp_no,$description_box,$date_posted,$category_sel);
}


function insertJob($job_title,$emp_no,$description_box,$date_posted,$category_sel){
    require('config.php');
    $query1 ="INSERT INTO job (title,employee_needed,description,date_posted,category) VALUES ('$job_title','$emp_no','$description_box','$date_posted','$category_sel')";
    $query2 ="INSERT INTO applies (date_applied,application_status) VALUES ('','')";
    $result = mysqli_query($conn, $query1);
    $result = mysqli_query($conn, $query2);
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