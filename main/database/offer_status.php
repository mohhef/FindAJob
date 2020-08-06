<?php
require('config.php');
$id=$_POST["id"];
$loyee_username=$_COOKIE['employee_username'];
$status = $_POST["status"];

if($status == "accept"){
    $updateQuery= "UPDATE `offer` SET accept_deny ='accept' WHERE job_id = '".$_POST["id"]."' and user_name_loyee='$loyee_username'";  
}elseif($status == "deny"){
   $updateQuery= "UPDATE `offer` SET accept_deny ='deny' WHERE job_id = '".$_POST["id"]."' and user_name_loyee='$loyee_username'"; 
}
echo($updateQuery);
mysqli_query($conn, $updateQuery);

?>