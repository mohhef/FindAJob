<?php
session_start();

$path = explode("/", $_SERVER["REQUEST_URI"]);
$domain = $path[count($path)-2];

if(isset($_COOKIE['employee_username']) && $domain!="employer"){
    #redirect to employer dashboard
}
if(isset($_COOKIE['employer_username']) && $domain!="employer"){
    header("Location: view/employer/dashboard.php");
}
if(isset($_COOKIE['admin_username']) && $domain!="admin"){
    #redirect to admin dashboard
}

#TODO : add logic so that two cookies from different users can't coexist

if(!isset($_COOKIE['employee_username']) && !isset($_COOKIE['employer_username']) && !isset($_COOKIE['admin_username'])){
    header("Location: http://".$_SERVER['HTTP_HOST'].'/comp-353/main/index.php');
}
