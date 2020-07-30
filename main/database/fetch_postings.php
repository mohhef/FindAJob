<?php

require("config.php");
//$query =mysqli_query($conn,"SELECT * FROM `automation_data`");
$columns = array('job_id','title','description','date_posted','category','employee_needed');

$query1= "SELECT * FROM `job`";

if(isset($_POST["search"]["value"])){
$query1.=' WHERE job_id LIKE "%'.$_POST["search"]["value"].'%"
 OR title LIKE "%'.$_POST["search"]["value"].'%"
 OR description LIKE "%'.$_POST["search"]["value"].'%"
 OR category LIKE "%'.$_POST["search"]["value"].'%"
 OR date_posted LIKE "%'.$_POST["search"]["value"].'%"
 OR employee_needed LIKE "%'.$_POST["search"]["value"].'%"
 ';
}
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
  $query = "SELECT * FROM `job`";
  $result = mysqli_query($conn, $query);
  return mysqli_num_rows($result);
}

$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query1));


$data = array();

while($row = mysqli_fetch_array($result))
{
$sub_array = array();
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["job_id"].'" data-column="job_id">' . $row["job_id"] . '</div>';
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["job_id"].'" data-column="title">' . $row["title"] . '</div>';
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["job_id"].'" data-column="employee_needed">' . $row["employee_needed"] . '</div>';
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["job_id"].'" data-column="date_posted">' . $row["date_posted"] . '</div>';
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["job_id"].'" data-column="date_posted">' . $row["category"] . '</div>';
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["job_id"].'" data-column="description">' . $row["description"] . '</div>';
$sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["job_id"].'">Delete</button>';
$sub_array[] = '<button type="button" name="update" class="btn btn-primary btn-xs update" id="'.$row["job_id"].'">Update</button>';
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
