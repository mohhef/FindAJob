<?php
$user_name=$_COOKIE['employer_username'];
require("config.php");
//$query =mysqli_query($conn,"SELECT * FROM `automation_data`");
$columns = array('job_id','title','description','date_posted','category','employee_needed','application_status');

$query1= "SELECT j.job_id, j.title, j.employee_needed, j.date_posted, j.category, j.description FROM job j, post t
WHERE t.job_id=j.job_id and t.user_name='$user_name'";

if(isset($_POST["search"]["value"])){
$query1.=' and (j.job_id LIKE "%'.$_POST["search"]["value"].'%"
 OR j.title LIKE "%'.$_POST["search"]["value"].'%"
 OR j.description LIKE "%'.$_POST["search"]["value"].'%"
 OR j.category LIKE "%'.$_POST["search"]["value"].'%"
 OR j.date_posted LIKE "%'.$_POST["search"]["value"].'%"
 OR j.employee_needed LIKE "%'.$_POST["search"]["value"].'%"
 )';
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
  $query = "SELECT j.job_id, j.title, j.employee_needed, j.date_posted, j.category, j.description FROM job j, post t
  WHERE t.job_id=j.job_id and t.user_name='".$_COOKIE['employer_username']."'";
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
