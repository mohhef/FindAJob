<?php
session_start();
if(isset($_COOKIE['username_employee'])){
    #redirect to employee dashboard
}
if(isset($_COOKIE['username_employer'])){
    #redirect to employer dashboard
}
if(isset($_COOKIE['username_admin'])){
    #redirect to admin dashboard
}

#TODO : add logic so that two cookies from different users can't coexist


header("Location: http://".$_SERVER['HTTP_HOST'].'/main/index.php');
