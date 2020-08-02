<?php

getCurrentInfo();
    function getCurrentInfo(){
        require('config.php');
        $user_name = '';
        if (isset($_COOKIE['employee_username'])) {
            $user_name = $_COOKIE['employee_username'];
            $type = 'employee';
        } else if (isset($_COOKIE['employer_username'])){
            $user_name = $_COOKIE['employer_username'];
            $type = 'employer';
        }
        $sqlQuery = 
        "SELECT category, preferred_method from `$type` WHERE user_name = '$user_name'";
        $result = mysqli_query($conn, $sqlQuery);
        $row = mysqli_fetch_array($result);
        echo json_encode($row);
    }

?>