<?php

defined('__ROOT__') or define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__."/../helpers/config.php");

class AuthController
{
    function employeeLogin($username, $password){
        $conn = connDB();
        if ($stmt = $conn->prepare("SELECT au.password FROM all_user as au, employee as e WHERE au.user_name = ? AND  e.user_name = ?" )) {
            $stmt->bind_param('ss', $username, $username);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0){
                $stmt->bind_result($password);
                $stmt->fetch();
                if ($_POST['password'] == $password ){
                    return true;
                }else{
                    return false;
                }
            }
            return false;
        }


        return false;
    }
    function employerLogin($username, $password){
        $conn = connDB();
        if ($stmt = $conn->prepare("SELECT au.password FROM all_user as au, employer as e WHERE au.user_name = ? AND  e.user_name = ?" )) {
            $stmt->bind_param('ss', $username, $username);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0){
                $stmt->bind_result($password);
                $stmt->fetch();
                if ($_POST['password'] == $password ){
                    return true;
                }else{
                    return false;
                }
            }
            return false;
        }


        return false;
    }
    function adminLogin($username, $password){
        $conn = connDB();
        if ($stmt = $conn->prepare("SELECT a.password FROM admin as a WHERE a.user_name = ?" )) {
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0){
                $stmt->bind_result($password);
                $stmt->fetch();
                if ($_POST['password'] == $password ){
                    return true;
                }else{
                    return false;
                }
            }
            return false;
        }

        return false;
    }
    function employeeRegister($username, $email, $password){
        $conn = connDB();
        if($stmt = $conn->prepare("INSERT INTO all_user(user_name, email, balance, password) VALUE (?, ?, 0, ?)")){
            $stmt->bind_param("sss", $username, $email, $password);
            if($stmt->execute()){
                $stmt->close();
                if($stmt = $conn->prepare("INSERT INTO employee(user_name, category) VALUE (?, 'BASIC')")){
                    $stmt->bind_param("s", $username);
                    if($stmt->execute()){
                        $stmt->close();
                        return true;
                    }
                }
            }
        }
        $stmt->close();
        return false;
    }
    function employerRegister($username, $email, $password){
        $conn = connDB();
        if($stmt = $conn->prepare("INSERT INTO all_user(user_name, email, balance, password) VALUE (?, ?, 0, ?)")){
            $stmt->bind_param("sss", $username, $email, $password);
            if($stmt->execute()){
                $stmt->close();
                if($stmt = $conn->prepare("INSERT INTO employer(user_name, category) VALUE (?, 'basic')")){
                    $stmt->bind_param("s", $username);
                    if($stmt->execute()){
                        $stmt->close();
                        return true;
                    }
                }
            }
        }
        $stmt->close();
        return false;
    }
    function forgotPasswordEmployee($username, $password){
        $conn = connDB();
        if($stmt = $conn->prepare("SELECT * FROM employee WHERE user_name = ?")){
            $stmt->bind_param("s", $username);
            if($stmt->execute()){
                $stmt->store_result();
                if($stmt->num_rows > 0){
                    $stmt->close();
                    if($stmt = $conn->prepare("UPDATE all_user set password= ? WHERE user_name= ?")){
                        $stmt->bind_param("ss", $password, $username);
                        if($stmt->execute()){
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }
    function forgotPasswordEmployer($username, $password){
        $conn = connDB();
        if($stmt = $conn->prepare("SELECT * FROM employer WHERE user_name = ?")){
            $stmt->bind_param("s", $username);
            if($stmt->execute()){
                $stmt->store_result();
                if($stmt->num_rows > 0){
                    $stmt->close();
                    if($stmt = $conn->prepare("UPDATE all_user set password= ? WHERE user_name= ?")){
                        $stmt->bind_param("ss", $password, $username);
                        if($stmt->execute()){
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }
    function forgotPasswordAdmin($username, $password){
        $conn = connDB();
        if($stmt = $conn->prepare("SELECT * FROM admin WHERE user_name = ?")){
            $stmt->bind_param("s", $username);
            if($stmt->execute()){
                $stmt->store_result();
                if($stmt->num_rows > 0){
                    $stmt->close();
                    if($stmt = $conn->prepare("UPDATE admin set password= ? WHERE user_name= ?")){
                        $stmt->bind_param("ss", $password, $username);
                        if($stmt->execute()){
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }
}