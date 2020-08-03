<?php
require('config.php');

if(isset($_POST["account_no"]))
{
    $user = '';
    if (isset($_COOKIE['employer_username'])) {
        $user = $_COOKIE['employer_username'];
        $type = "loyer_chequing";
    } else if (isset($_COOKIE['employee_username'])) {
        $user = $_COOKIE['employee_username'];
        $type = "loyee_chequing";
    }
    $query = "DELETE FROM `$type` WHERE account_no = '".$_POST["account_no"]."' AND user_name = '$user'";
    if(mysqli_query($conn, $query))
    {
    echo 'data deleted!';
    }
}

?>