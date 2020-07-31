<?php
updateCategory();
function updateCategory() {
    require('config.php');
    echo($_POST['category']);
    $query1 = "UPDATE `employer` SET category='".$_POST['category']."' WHERE user_name = '".$_POST['user_name']."'";
    $result = mysqli_query($conn, $query1);
    if(true)
    {
        echo 'Data updated';
    }
}

?>