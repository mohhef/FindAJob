<?php
require('config.php');
$user_name=$_COOKIE['employee_username'];
$date_applied = date("Y-m-d");
$id=$_POST["id"];

$updateQuery= "INSERT INTO applies(job_id,user_name,application_status,date_applied) values ($id,'$user_name','applied','$date_applied')";

mysqli_query($conn, $updateQuery);


 ?>
