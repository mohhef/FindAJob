<?php
$post_card=$_POST['post_card'];
$card_no=$_POST['card_number'];
$name=$_POST['name'];
$expiration_date=$_POST['expiration_date'];
$automatic_manual=$_POST['automatic_manual'];

if ($post_card==true){
    insertChequing($card_no,$name,$expiration_date,$automatic_manual);
}


function insertChequing($card_no,$name,$expiration_date, $automatic_manual){
    require('config.php');
    $user = '';
    if (isset($_COOKIE['employer_username'])) {
        $user = $_COOKIE['employer_username'];
        $type = "loyer_credit_pays";
    } else if (isset($_COOKIE['employee_username'])) {
        $user = $_COOKIE['employee_username'];
        $type = "loyee_credit_pays";
    }
    $query1 ="INSERT INTO card_method (card_number,name,expiration_date) VALUES ('$card_no','$name','$expiration_date')";
    $query2 ="INSERT INTO `$type` (`user_name`,card_number, `automatic_manual`) VALUES ('$user', $card_no, '$automatic_manual')";
    $result = mysqli_query($conn, $query1);
    $result = mysqli_query($conn, $query2);
    if(true)
    {
        echo 'Data Inserted';
    }
}
?>