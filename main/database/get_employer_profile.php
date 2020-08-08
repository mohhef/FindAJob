<?php

getProfile();
function getProfile(){
      require('config.php');
      if($_POST["id"]) {
      $sqlQuery = "SELECT e.user_name, e.company_name, e.telephone_number  FROM employer e WHERE e.user_name = '".$_POST["id"]."'";
      $result = mysqli_query($conn, $sqlQuery);
      $row = mysqli_fetch_array($result);
      echo json_encode($row);
    }
}
?>