<?php
session_start();
$path = explode("/", $_SERVER["REQUEST_URI"]);
$domain = $path[count($path)-2];
$count = 0;
if(isset($_COOKIE['employee_username']) ){
    $count += 1;
}
if(isset($_COOKIE['employer_username']) ){
    $count += 1;
}
if(isset($_COOKIE['admin_username'])){
    $count += 1;
}
if($count > 1){
    $_COOKIE['employee_username'] = $_COOKIE['employer_username'] = $_COOKIE['admin_username'] = null;
}

if(isset($_COOKIE['employee_username']) && $domain!="employee" ){
    header("Location: http://".$_SERVER['HTTP_HOST'].'/comp-353/main/employee/available_job.php');
}
if(isset($_COOKIE['employer_username']) && $domain!="employer" ){
    header("Location: http://".$_SERVER['HTTP_HOST'].'/comp-353/main/employer/post_job.php');
}
if(isset($_COOKIE['admin_username'])  && $domain!="admin" ){
    header("Location: http://".$_SERVER['HTTP_HOST'].'/comp-353/main/admin/admin.php');
}

if($count == 0) {
header("Location: http://".$_SERVER['HTTP_HOST'].'/comp-353/main/index.php');
}
