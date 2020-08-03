<?php
require('config.php');

if(isset($_POST["card_number"]))
{
    $user = '';
    if (isset($_COOKIE['employer_username'])) {
        $user = $_COOKIE['employer_username'];
        $type = "loyer_credit_pays";
    } else if (isset($_COOKIE['employee_username'])) {
        $user = $_COOKIE['employee_username'];
        $type = "loyee_credit_pays";
    }
    $query = "DELETE FROM `$type` WHERE card_number = '".$_POST["card_number"]."' AND user_name='$user'";
    if(mysqli_query($conn, $query))
    {
    echo 'data deleted!';
    }
}

?>
