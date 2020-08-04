<?php

$post_chequing=$_POST['post_chequing'];
$account_no=$_POST['account_no'];
$transit_no=$_POST['transit_no'];
$bank_no=$_POST['bank_no'];
$automatic_manual=$_POST['automatic_manual'];

if ($post_chequing==true){
    insertChequing($account_no,$transit_no,$bank_no, $automatic_manual);
}


function insertChequing($account_no,$transit_no,$bank_no, $automatic_manual){
    require('config.php');
    $user = '';
    if (isset($_COOKIE['employer_username'])) {
        $user = $_COOKIE['employer_username'];
        $type = "loyer_chequing";
    } else if (isset($_COOKIE['employee_username'])) {
        $user = $_COOKIE['employee_username'];
        $type = "loyee_chequing";
    }
    $query1 ="INSERT INTO chequing (account_no,transit_no,bank_no) VALUES ('$account_no','$transit_no','$bank_no')";
    $query2 ="INSERT INTO `$type` (`user_name`,account_no, `automatic_manual`) VALUES ('$user', $account_no, '$automatic_manual')";
    $result = mysqli_query($conn, $query1);
    $result = mysqli_query($conn, $query2);
    if(true)
    {
        echo 'Data Inserted';
    }
}
?>