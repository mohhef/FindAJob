<?php
require('config.php');

$status = $_POST["status"];
$updateQuery = "";


if($status == "disactive"){
    $updateQuery= "UPDATE `manages` SET activate_deactivate ='active' WHERE user_name = '".$_POST["id"]."'";  
}elseif($status == "active"){
   $updateQuery= "UPDATE `manages` SET activate_deactivate ='disactive' WHERE user_name = '".$_POST["id"]."'";
}

mysqli_query($conn, $updateQuery);
