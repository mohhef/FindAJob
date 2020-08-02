<?php
$action = $_POST['action'];
getCard();
function getCard(){
      require('config.php');
      if($_POST["card_number"]) {
        $sqlQuery = 
        "SELECT card_method.card_number, card_method.name, card_method.expiration_date, loyer_credit_pays.automatic_manual from loyer_credit_pays JOIN card_method ON loyer_credit_pays.card_number = card_method.card_number AND card_method.card_number = '$_POST[card_number]' AND loyer_credit_pays.user_name = '$_COOKIE[employer_username]'";
        $result = mysqli_query($conn, $sqlQuery);
        $row = mysqli_fetch_array($result);
        echo json_encode($row);
    }
}
?>