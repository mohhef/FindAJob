<?php
session_start();
if(isset($_COOKIE['employee_username'])){

    header("Location: http://".$_SERVER['HTTP_HOST'].'/comp-353/main/employee/apply_job.php');

}
if(isset($_COOKIE['employer_username'])){

    header("Location: http://".$_SERVER['HTTP_HOST'].'/comp-353/main/employer/post_job.php');
}
if(isset($_COOKIE['username_admin'])){
    #redirect to admin dashboard
}

#TODO : add logic so that two cookies from different users can't coexist


//header("Location: http://".$_SERVER['HTTP_HOST'].'/main/index.php');