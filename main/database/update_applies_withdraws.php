<?php
require('config.php');
$user_name=$_COOKIE['employee_username'];

$updateQuery= "DELETE FROM `applies` WHERE job_id = '".$_POST["id"]."' AND user_name='$user_name'";

mysqli_query($conn, $updateQuery);


 ?>
