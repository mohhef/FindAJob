<?php
require('config.php');

echo($_POST["telephoneNumber"]);
echo($_POST["companyName"]);
echo($_POST["empID"]);

 $updateTelphoneNumberQuery= "UPDATE `contact_info` SET telephone_number ='".$_POST["telephoneNumber"]."' WHERE user_name = '".$_POST["empID"]."'";
 $updateCompnayNameQuery = "UPDATE `employer` SET company_name='".$_POST["companyName"]."' WHERE user_name = '".$_POST["empID"]."'";

mysqli_query($conn,  $updateTelphoneNumberQuery);
mysqli_query($conn,   $updateCompnayNameQuery);

 ?>