<?php
require('config.php');

$updateEmail = "UPDATE `all_user` SET email='".$_POST["email"]."' WHERE user_name = '".$_POST["empID"]."'";

mysqli_query($conn,    $updateEmail);

 ?>