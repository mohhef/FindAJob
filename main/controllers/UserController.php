<?php

defined('__ROOT__') or define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__."/../helpers/config.php");

class UserController
{
    function getSufferingUsers(){
        $conn = connDB();
        if($stmt = $conn->prepare("SELECT user_name, email, last_payment FROM all_user WHERE balance <= 0")){
            $stmt->execute();
            $result = $stmt->get_result();
            $arr = [];

            while($row = $result->fetch_array()){
                $arr[] = $row;
            }

            return $arr;
        }
    }

    function deleteUser($user_name){
        $counter = 0;
        $conn = connDB();
        if($stmt = $conn->prepare("DELETE FROM employer WHERE user_name=?")){
            $stmt->bind_param("s", $user_name);
            $stmt->execute();
            $counter += $stmt->affected_rows;
            $stmt->close();
            if($stmt = $conn->prepare("DELETE FROM employee WHERE user_name=?")){
                $stmt->bind_param("s", $user_name);
                $stmt->execute();
                $counter += $stmt->affected_rows;
                $stmt->close();
                if($counter > 0){
                    if($stmt = $conn->prepare("DELETE FROM all_user WHERE user_name=?")){

                        $stmt->bind_param("s", $user_name);
                        $stmt->execute();

                        if($stmt->affected_rows > 0){
                            $stmt->close();
                            $conn->close();
                            return true;
                        }
                    }
                    $stmt->close();
                    $conn->close();
                    return false;
                }
            }
        }



    }
}