<?php
$action = $_POST['action'];
getCard();
function getCard(){
      require('config.php');
      $user = '';
      if (isset($_COOKIE['employer_username'])) {
          $user = $_COOKIE['employer_username'];
          $type = "loyer_credit_pays";
      } else if (isset($_COOKIE['employee_username'])) {
          $user = $_COOKIE['employee_username'];
          $type = "loyee_credit_pays";
      }
      if($_POST["card_number"]) {
        $sqlQuery = 
        "SELECT card_method.card_number, card_method.name, card_method.expiration_date, t.automatic_manual from `$type` t JOIN card_method ON t.card_number = card_method.card_number AND card_method.card_number = '$_POST[card_number]' AND t.user_name = '$user'";
        $result = mysqli_query($conn, $sqlQuery);
        $row = mysqli_fetch_array($result);
        echo json_encode($row);
    }
}
?>