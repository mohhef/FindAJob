<?php
require('config.php');

$updateQuery= "UPDATE `applies` SET application_status ='applied' WHERE job_id = '".$_POST["id"]."'";

mysqli_query($conn, $updateQuery);


 ?>
