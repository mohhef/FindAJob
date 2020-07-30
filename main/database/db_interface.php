<?php
$post_job=$_POST['post_job'];
$job_title=$_POST['job_title'];
$emp_no=$_POST['emp_no'];
$category_sel=$_POST['category_sel'];
$description_box=$_POST['description_box'];
$date_posted = date("Y-m-d");

$update_category=$_POST['update_category'];
$category=$_POST['category'];
$user_name=$_POST['user_name'];

if ($post_job==true){
    insertJob($job_title,$emp_no,$description_box,$date_posted,$category_sel);
}
if ($update_category == true) {
    updateCategory($user_name, $category);
}
echo($date_posted);

function insertJob($job_title,$emp_no,$description_box,$date_posted,$category_sel){
    require('config.php');
    $query1 ="INSERT INTO job (title,employee_needed,description,date_posted,category) VALUES ('$job_title','$emp_no','$description_box','$date_posted','$category_sel')";
    $result = mysqli_query($conn, $query1);
    if(true)
    {
        echo 'Data Inserted';
    }
}

function updateCategory($user_name, $category) {
    require('config.php');
    echo $category;
    $query1 = "UPDATE `employer` SET `user_name`= '$user_name',`category`='$category'";
    $result = mysqli_query($conn, $query1);
    if(true)
    {
        echo 'Data updated';
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