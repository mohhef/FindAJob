<?php

updatePayment();
function updatePayment() {
    require('config.php');
    $user = '';
    $type = '';
    if (isset($_COOKIE['employer_username'])) {
        $type = "employer";
        $user = $_COOKIE['employer_username'];
    } else if (isset($_COOKIE['employee_username'])) {
        $user = $_COOKIE['employee_username'];
        $type = "employee";
    }
    $query1 = "UPDATE `$type` SET preferred_method ='".$_POST['id']."' WHERE user_name = '$user'";
    $result = mysqli_query($conn, $query1);
    if(true)
    {
        echo 'Data updated';
    }
}

?>