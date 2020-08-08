<?php

require("config.php");
$loggedin_user = $_POST['id'];

$columns = array('user_name', 'company_name', 'telephone_number');

$query1= "SELECT e.user_name, e.company_name, e.telephone_number  FROM employer e WHERE e.user_name = '".$loggedin_user."'";

if(isset($_POST["order"])){
  $query1.=' ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'
';
}
else
{
 $query1   .= ' ORDER BY job_id DESC ';
}
$query2 = '';

if($_POST["length"] != -1)
{
 $query2 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$result = mysqli_query($conn,  $query1 . $query2);

function get_all_data($conn)
{
  $query = " SELECT e.user_name, e.company_name, e.telephone_number  FROM employer e WHERE  e.user_name = '".$_POST['id']."'";
  $result = mysqli_query($conn, $query);
  return mysqli_num_rows($result);
}

$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query1));


$data = array();

while($row = mysqli_fetch_array($result))
{
$sub_array = array();
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["user_name"].'" data-column="user_name">' . $row["user_name"] . '</div>';
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["user_name"].'" data-column="title">' . $row["company_name"] . '</div>';
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["user_name"].'" data-column="employee_needed">' . $row["telephone_number"] . '</div>';
$sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["user_name"].'" >Delete</button>';
$sub_array[] = '<button type="button" name="update" class="btn btn-primary btn-xs update" id="'.$row["user_name"].'" >Update</button>';
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