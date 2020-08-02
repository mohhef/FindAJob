<?php

updatePayment();
function updatePayment() {
    require('config.php');
    echo($_POST['category']);
    echo($_POST['id']);
    $query1 = "UPDATE `employer` SET preferred_method ='".$_POST['id']."' WHERE user_name = '$_COOKIE[employer_username]'";
    $result = mysqli_query($conn, $query1);
    if(true)
    {
        echo 'Data updated';
    }
}

?>