<?php

function getEmployeeTest()
{
    require('config.php');
    $query1 ="SELECT * FROM test_employer";
    $result = mysqli_query($conn, $query1);
    $employer = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $stack=array();

    foreach($employer as $emp){
        foreach($emp as $empo){
            array_push($stack,$empo);
        }
    }
    $result= array_filter($stack);
    mysqli_close($conn);
    return $stack;
}
?>