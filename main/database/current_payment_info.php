<?php

getCurrentInfo();
    function getCurrentInfo(){
        require('config.php');
        $sqlQuery = 
        "SELECT category, preferred_method from `employee` WHERE user_name = '$_COOKIE[employee_username]'";
        $result = mysqli_query($conn, $sqlQuery);
        $row = mysqli_fetch_array($result);
        echo json_encode($row);
    }

?>