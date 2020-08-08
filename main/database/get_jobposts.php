<?php
      require('config.php');
      $sqlQuery = "SELECT a.user_name FROM job j, applies a WHERE j.job_id=a.job_id and j.job_id='".$_POST["id"]."' and a.user_name='".$_POST["employee_name"]."'";
      echo($sqlQuery);
      $result = mysqli_query($conn, $sqlQuery);
      $row = mysqli_fetch_array($result);
      echo json_encode($row);
?>