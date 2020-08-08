<?php 


require('config.php');

$profile = '';
if (isset($_COOKIE['employer_username'])) {
    $profile = $_COOKIE['employer_username'];
} else if (isset($_COOKIE['employee_username'])) {
    $profile = $_COOKIE['employee_username'];
}

$sqlQuery = "DELETE from all_user where user_name='$profile'";

echo($sqlQuery);
$result = mysqli_query($conn, $sqlQuery);

?>