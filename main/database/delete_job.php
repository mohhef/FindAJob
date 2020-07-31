<?php
require('config.php');

if(isset($_POST["id"]))
{
 $query = "DELETE FROM job WHERE job_id = '".$_POST["id"]."'";
 if(mysqli_query($conn, $query))
 {
  echo 'data deleted!';
 }
}

?>
