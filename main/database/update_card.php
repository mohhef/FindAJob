<?php
    require('config.php');
    $user = '';
    if (isset($_COOKIE['employer_username'])) {
        $type = "loyer_credit_pays";
    } else if (isset($_COOKIE['employee_username'])) {
        $type = "loyee_credit_pays";
    }

    $updateQuery1= "UPDATE `card_method` SET name = '".$_POST["name"]."',
    expiration_date = '".$_POST["expiration_date"]."' WHERE card_number = '".$_POST["card_number"]."'";

    $updateQuery2 = "UPDATE `$type` SET `automatic_manual`='".$_POST["automatic_manual"]."' WHERE `card_number`= '".$_POST["card_number"]."'";
    
    mysqli_query($conn, $updateQuery1);
    mysqli_query($conn, $updateQuery2);
    if(true) {
        echo 'Data Updated';
    }


?>