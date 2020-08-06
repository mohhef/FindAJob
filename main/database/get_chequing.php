<?php
$action = $_POST['action'];

getChequing();
function getChequing(){
      require('config.php');
      $user = '';
      if (isset($_COOKIE['employer_username'])) {
          $user = $_COOKIE['employer_username'];
          $type = "loyer_chequing";
      } else if (isset($_COOKIE['employee_username'])) {
          $user = $_COOKIE['employee_username'];
          $type = "loyee_chequing";
      }

      if($_POST["account_no"]) {
        $sqlQuery = "SELECT chequing.account_no, chequing.bank_no, chequing.transit_no, t.automatic_manual FROM `chequing` JOIN `$type` t WHERE t.account_no='".$_POST["account_no"]."' AND t.account_no = chequing.account_no AND t.user_name = '$user'";
        $result = mysqli_query($conn, $sqlQuery);
        $row = mysqli_fetch_array($result);
        echo json_encode($row);
    }
}
?>