<?php
    require('config.php');

    $updateQuery= "UPDATE `chequing` SET bank_no = '".$_POST["bank_no"]."',
    transit_no =  '".$_POST["transit_no"]."' WHERE account_no = '".$_POST["account_no"]."'";

    mysqli_query($conn, $updateQuery);
    // mysqli_query($conn, $updateQuery2);
    if(true) {
        echo 'Data Updated';
    }


?>
