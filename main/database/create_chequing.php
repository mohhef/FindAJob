<?php

$post_chequing=$_POST['post_chequing'];
$account_no=$_POST['account_no'];
$transit_no=$_POST['transit_no'];
$bank_no=$_POST['bank_no'];

if ($post_chequing==true){
    insertChequing($account_no,$transit_no,$bank_no);
}


function insertChequing($account_no,$transit_no,$bank_no){
    require('config.php');
    $query1 ="INSERT INTO chequing (account_no,transit_no,bank_no) VALUES ('$account_no','$transit_no','$bank_no')";
    $query2 ="INSERT INTO loyer_chequing (`user_name`,account_no) VALUES ('$_COOKIE[employer_username]', $account_no)";
    $result = mysqli_query($conn, $query1);
    $result = mysqli_query($conn, $query2);
    if(true)
    {
        echo 'Data Inserted';
    }
}
?>