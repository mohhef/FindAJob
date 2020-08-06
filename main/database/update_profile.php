<?php
require('config.php');

echo($_POST["telephoneNumber"]);
echo($_POST["companyName"]);
echo($_POST["empID"]);


// $updateContactInfoTable = "UPDATE `contact_info` SET telephone_number ='".$_POST["telephoneNumber"]."' WHERE telephone_number= '".$_POST["empID"]."'";
// $removeKeyConstraints = "ALTER  TABLE `contact` WITH NOCHECK CONSTRAINT ALL"
 $updateTelphoneNumberQuery= "UPDATE `contact_info` SET telephone_number ='".$_POST["telephoneNumber"]."' WHERE user_name = '".$_POST["empID"]."'";
 $updateCompnayNameQuery = "UPDATE `employer` SET company_name='".$_POST["companyName"]."' WHERE user_name = '".$_POST["empID"]."'";
 //ask should we delete the contact info table 
 // $updateContactInfoTable = "UPDATE `contact_info` SET telephone_number ='".$_POST["telephoneNumber"]."' WHERE telephone_number= '".$_POST["empID"]."'";

// mysqli_query($conn,  $removeKeyConstraints);
mysqli_query($conn,  $updateTelphoneNumberQuery);
mysqli_query($conn,   $updateCompnayNameQuery);

 ?>