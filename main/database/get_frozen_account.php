<?php

require("config.php");
$loggedin_user = $_POST['id'];

$query1= "SELECT e.user_name FROM all_user e WHERE e.balance < 0  ";

$result = mysqli_query($conn,  $query1);

while($row = mysqli_fetch_array($result)){
  if($loggedin_user == $row["user_name"]){
	 echo(1);
  }
}

?>