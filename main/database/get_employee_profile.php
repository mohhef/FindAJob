<?php

getProfile();
function getProfile(){
      require('config.php');
      if($_POST["id"]) {
      $sqlQuery = "SELECT a.user_name, a.email  FROM all_user a WHERE a.user_name = '".$_POST['id']."'";
      $result = mysqli_query($conn, $sqlQuery);
      $row = mysqli_fetch_array($result);
      echo json_encode($row);
    }
}
?>