<?php
$action = $_POST['action'];

getChequing();
function getChequing(){
      require('config.php');
      if($_POST["account_no"]) {
        $sqlQuery = "SELECT * FROM `chequing` WHERE `account_no`='".$_POST["account_no"]."'";
        $result = mysqli_query($conn, $sqlQuery);
        $row = mysqli_fetch_array($result);
        echo json_encode($row);
    }
}
?>