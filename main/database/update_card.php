<?php
    require('config.php');

    $updateQuery1= "UPDATE `card_method` SET name = '".$_POST["name"]."',
    expiration_date = '".$_POST["expiration_date"]."' WHERE card_number = '".$_POST["card_number"]."'";

    $updateQuery2 = "UPDATE `loyer_credit_pays` SET `automatic_manual`='".$_POST["automatic_manual"]."' WHERE `card_number`= '".$_POST["card_number"]."'";
    
    mysqli_query($conn, $updateQuery1);
    mysqli_query($conn, $updateQuery2);
    if(true) {
        echo 'Data Updated';
    }


?>