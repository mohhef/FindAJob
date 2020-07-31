<?php
require('config.php');


$updateQuery= "UPDATE `job` SET title ='".$_POST["jobTitle"]."', employee_needed = '".$_POST["empNeeded"]."',
 category =  '".$_POST["category"]."', description =  '".$_POST["description"]."' WHERE job_id = '".$_POST["jobID"]."'";

// $updateQuery = "UPDATE automation_data SET system_name = \"$_POST[\"systemName\"]\", os_name = \"$_POST[\"osName\"]\", pipeline_name = \"$_POST[\"pipelineName\"]\", job_name = \"$_POST[\"jobName\"]\", description = \"$_POST[\"description\"]\" WHERE id = \"$_POST[\"pipeid\"]\";";

// $updateQuery= "UPDATE `automation_data` SET system_name ='".$_POST["systemName"]."', os_name = '".$_POST["osName"]."', pipeline_name ='".$_POST["pipelineName"]."',
//  job_name =  '".$_POST["jobName"]."' , description =  '".$_POST["description"]."'
// WHERE id = '".$_POST["pipeid"]."'";

// $updateQuery2 = "UPDATE `automation_data` SET pipeline_name = replace(pipeline_name, \"$pipe\", \"$_POST[\"pipelineName\"]\") WHERE system_name = $_POST[\"systemName\"];";

mysqli_query($conn, $updateQuery);
// mysqli_query($conn, $updateQuery2);


 ?>
