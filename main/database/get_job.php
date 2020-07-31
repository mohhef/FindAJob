<?php
$action = $_POST['action'];

getjob();
function getJob(){
      require('config.php');
      if($_POST["id"]) {
      $sqlQuery = "SELECT * FROM `job` WHERE `job_id`='".$_POST["id"]."'";
      $result = mysqli_query($conn, $sqlQuery);
      $row = mysqli_fetch_array($result);
      echo json_encode($row);
    }
}
?>