<?php
    require('config.php');
    $user = '';
      if (isset($_COOKIE['employer_username'])) {
          $type = "loyer_chequing";
      } else if (isset($_COOKIE['employee_username'])) {
          $type = "loyer_chequing";
      }

    $updateQuery1= "UPDATE `chequing` SET bank_no = '".$_POST["bank_no"]."',
    transit_no =  '".$_POST["transit_no"]."' WHERE account_no = '".$_POST["account_no"]."'";

    $updateQuery2 = "UPDATE `$type` SET `automatic_manual`='".$_POST["automatic_manual"]."' WHERE account_no = '".$_POST["account_no"]."'";
    
    echo($updateQuery2);
    mysqli_query($conn, $updateQuery1);
     mysqli_query($conn, $updateQuery2);
    if(true) {
        echo 'Data Updated';
    }


?>