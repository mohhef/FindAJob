<?php

require("config.php");
$loggedin_user = $_POST['id'];
#echo($_POST['id']);

$query1= "SELECT e.user_name FROM all_user e WHERE e.balance < 0  ";

$result = mysqli_query($conn,  $query1);

// $number_filter_row = mysqli_num_rows(mysqli_query($conn, $query1));

// $data = array();
// $i = 0
while($row = mysqli_fetch_array($result))
{
// $sub_array = array();
// $data[$i] = 
if($loggedin_user == $row["user_name"]){
	echo(1);
}
// echo ($row["user_name"]);
// $data[] = $sub_array;
// $i = $i + 1;
}

// $result1 = mysqli_fetch_array($result);

// foreach($result1["user_name"] as $result) {
//     echo $result, '<br>';
//}


?>