<?php

require("config.php");
//$query =mysqli_query($conn,"SELECT * FROM `automation_data`");
$columns = array('user_name', 'email','balance', 'since');

$query1= "SELECT e.user_name, e.email, e.balance  FROM all_user e WHERE e.balance < 0  ";

// if(isset($_POST["search"]["value"])){
// $query1.='  and job_id LIKE "%'.$_POST["search"]["value"].'%"
//  OR title LIKE "%'.$_POST["search"]["value"].'%"
//  OR description LIKE "%'.$_POST["search"]["value"].'%"
//  OR category LIKE "%'.$_POST["search"]["value"].'%"
//  OR date_posted LIKE "%'.$_POST["search"]["value"].'%"
//  OR employee_needed LIKE "%'.$_POST["search"]["value"].'%"
//  ';
// }

if(isset($_POST["order"])){
  $query1.='ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'
';
}
else
{
 $query1   .= 'ORDER BY job_id DESC ';
}
$query2 = '';

if($_POST["length"] != -1)
{
 $query2 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$result = mysqli_query($conn,  $query1 . $query2);


function get_all_data($conn)
{
  $query = "SELECT e.user_name, e.email, e.balance  FROM all_user e WHERE e.balance < 0 ";
  $result = mysqli_query($conn, $query);
  return mysqli_num_rows($result);
}

$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query1));


$data = array();

while($row = mysqli_fetch_array($result))
{
$sub_array = array();
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["user_name"].'" data-column="user_name">' . $row["user_name"] . '</div>';
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["user_name"].'" data-column="title">' . $row["email"] . '</div>';
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["user_name"].'" data-column="employee_needed">' . $row["balance"] . '</div>';
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["user_name"].'" data-column="date_posted">' . "N/A" . '</div>';

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