<?php
require('config.php');
$user_name=$_COOKIE['employer_username'];
$id=$_POST["id"];
$loyee_username=$_POST['loyee_username'];


$updateQuery= "INSERT INTO offer(job_id,user_name_loyer,user_name_loyee,offer_status) VALUES ($id,'$user_name','$loyee_username','Offered')";
mysqli_query($conn, $updateQuery);

?>
