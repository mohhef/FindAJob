<?php
    require('config.php');
    $user = '';
    if (isset($_COOKIE['employer_username'])) {
        $user = $_COOKIE['employer_username'];
        $type = "employer";
        $subscription_type="subscription_category_loyee";
    } else if (isset($_COOKIE['employee_username'])) {
        $user = $_COOKIE['employee_username'];
        $type = "employee";
        $subscription_type="subscription_category_loyer";
    }

    $query_user_category = "SELECT category FROM `$type` where user_name='$user'";
    $category = mysqli_fetch_array(mysqli_query($conn, $query_user_category));

    $query_user_deduction = "SELECT `price` FROM `$subscription_type` WHERE category='$category[0]'";
    $deduction = mysqli_fetch_array(mysqli_query($conn, $query_user_deduction));

    $query_user_balance = "SELECT `balance` FROM `all_user` WHERE user_name='$user'";
    $current_balance = mysqli_fetch_array(mysqli_query($conn, $query_user_balance));

    $new_balance = ltrim($current_balance[0],"$") - ltrim($deduction[0],"$");
    
    $query_update_balance = "UPDATE `all_user` SET `balance`='$new_balance' WHERE user_name='$user'";

    if(mysqli_query($conn, $query_update_balance)) {
        echo 'data deleted!';
    }

?>
