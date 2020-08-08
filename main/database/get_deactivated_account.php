<?php

require("config.php");
$loggedin_user = $_POST['id'];

$query1= "SELECT m.user_name FROM manages m WHERE m.activate_deactivate='disactive'";

$result = mysqli_query($conn,  $query1);

while($row = mysqli_fetch_array($result)){
  if($loggedin_user == $row["user_name"]){
	 echo(2);
  }
}

?>