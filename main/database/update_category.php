<?php
updateCategory();
function updateCategory() {
    require('config.php');
    $user = '';
    if ($_POST['user_type'] == "employer") {
        $user = $_COOKIE['employer_username'];
    } else {
        $user = $_COOKIE['employee_username'];
    }
    $query1 = "UPDATE `$_POST[user_type]` SET category='".$_POST['category']."' WHERE user_name = '$user'";
    echo $query1;
    $result = mysqli_query($conn, $query1);
    if(true)
    {
        echo 'Data updated';
    }
}

?>