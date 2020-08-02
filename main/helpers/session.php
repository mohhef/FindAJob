<?php
session_start();
if(isset($_COOKIE['employee_username'])){

    header("Location: http://".$_SERVER['HTTP_HOST'].'/comp-353/main/employee/available_job.php');

}
if(isset($_COOKIE['employer_username'])){

    header("Location: http://".$_SERVER['HTTP_HOST'].'/comp-353/main/employer/post_job.php');
}
if(isset($_COOKIE['admin_username'])){
    header("Location: http://".$_SERVER['HTTP_HOST'].'/comp-353/main/admin/admin.php');
}

#TODO : add logic so that two cookies from different users can't coexist


//header("Location: http://".$_SERVER['HTTP_HOST'].'/main/index.php');
