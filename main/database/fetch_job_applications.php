<?php

require("config.php");
//$query =mysqli_query($conn,"SELECT * FROM `automation_data`");
$columns = array('title','employee_needed','date_posted','category','description','application_status');

$query1= "SELECT j.job_id, j.title, j.employee_needed, j.date_posted, j.category, j.description, p.application_status,p.user_name, p.date_applied FROM 
job j, applies p, post t where p.job_id=j.job_id and t.job_id=j.job_id and t.user_name='".$_COOKIE['employer_username']."' AND p.application_status like '%applied%'"
;

if(isset($_POST["search"]["value"])){
$query1.='and (j.title LIKE "%'.$_POST["search"]["value"].'%"
 OR j.description LIKE "%'.$_POST["search"]["value"].'%"
 OR p.user_name LIKE "%'.$_POST["search"]["value"].'%"
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
  $query = "SELECT j.job_id, j.title, j.employee_needed, j.date_posted, j.category, j.description, p.application_status,p.user_name, p.date_applied FROM 
  job j, applies p, post t where p.job_id=j.job_id and t.job_id=j.job_id and t.user_name='".$_COOKIE['employer_username']."' AND p.application_status like '%applied%'"
  ;
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
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["job_id"].'" data-column="application_date">' . $row["date_applied"] . '</div>';
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["job_id"].'" data-column="category">' . $row["category"] . '</div>';
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["job_id"].'" data-column="description">' . $row["description"] . '</div>';
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["job_id"].'" data-column="user_name">' . $row["user_name"] . '</div>';
$sub_array[] = '<button type="button" name="apply" class="btn btn-primary btn-xs offer" id="'.$row["job_id"].' '.$row["user_name"].'">Offer</button>';
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
