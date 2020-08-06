
<?php

require("config.php");
$loggedin_user = $_POST['id'];

$columns = array('auser_name', 'telephone');

$query1= "SELECT a.user_name, a.telephone FROM manages m, admin a WHERE m.auser_name = a.user_name and m.user_name = '".$loggedin_user."'";


$result = mysqli_query($conn, $query1); 

function get_all_data($conn)
{
   $query = "SELECT a.user_name, a.telephone FROM manages m, admin a WHERE m.auser_name = a.user_name and m.user_name ='".$_POST['id']."'";
  $result = mysqli_query($conn, $query);
  return mysqli_num_rows($result);
}

$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query1));


$data = array();

while($row = mysqli_fetch_array($result))
{
$sub_array = array();
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["user_name"].'" data-column="user_name">' . $row["user_name"] . '</div>';
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["user_name"].'" data-column="title">' . $row["telephone"] . '</div>';

$data[] = $sub_array;
}

$output = array(
  "draw"=>intval($_POST["draw"]),
  "recordsTotal"=>get_all_data($conn),
  "recordsFiltered"=> $number_filter_row,
  "data"=> $data
);



echo json_encode($output);


?>