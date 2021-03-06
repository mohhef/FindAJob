<?php

require("config.php");
//$query =mysqli_query($conn,"SELECT * FROM `automation_data`");
$columns = array('job_id','title','employee','offer_status','accept_deny');

$query1= "SELECT j.job_id, j.title, o.offer_status,o.user_name_loyee, o.accept_deny FROM job j, offer o where o.job_id=j.job_id and o.user_name_loyer='".$_COOKIE['employer_username']."'";

if(isset($_POST["search"]["value"])){
$query1.=' and (j.title LIKE "%'.$_POST["search"]["value"].'%"
 OR j.title LIKE "%'.$_POST["search"]["value"].'%"
 OR o.offer_status LIKE "%'.$_POST["search"]["value"].'%"
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
  $query = "SELECT j.job_id, j.title, o.offer_status,o.user_name_loyee, o.accept_deny FROM job j, offer o where o.job_id=j.job_id and o.user_name_loyer='".$_COOKIE['employer_username']."'";
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
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["job_id"].'" data-column="user_name_loyee">' . $row["user_name_loyee"] . '</div>';
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["job_id"].'" data-column="offer_status">' . $row["offer_status"] . '</div>';
$sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["job_id"].'" data-column="accept_deny">' . $row["accept_deny"] . '</div>';
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
