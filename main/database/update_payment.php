<?php

updatePayment();
function updatePayment() {
    require('config.php');
    $user = '';
    if (isset($_COOKIE['employer_username'])) {
        $user = $_COOKIE['employer_username'];
    } else if (isset($_COOKIE['employee_username'])) {
        $user = $_COOKIE['employee_username'];
    }
    $query1 = "UPDATE `employer` SET preferred_method ='".$_POST['id']."' WHERE user_name = '$user'";
    $result = mysqli_query($conn, $query1);
    if(true)
    {
        echo 'Data updated';
    }
}

?>