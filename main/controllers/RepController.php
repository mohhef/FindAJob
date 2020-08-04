<?php

defined('__ROOT__') or define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__."/../helpers/config.php");

class RepController
{
    function getReps($employer_username){
        $conn = connDB();
        if($stmt = $conn->prepare("SELECT rep_user_name FROM representatives WHERE employer_user_name=?")){
            $stmt->bind_param("s", $employer_username);
            $stmt->execute();
            $result = $stmt->get_result();
            $arr = $result->fetch_all(MYSQLI_ASSOC);
            $arr = array_column($arr, "rep_user_name");
            $stmt->close();
            if(count($arr) > 0) {
                $in = str_repeat("?,", count($arr) - 1) . '?';
                if ($stmt = $conn->prepare("SELECT user_name, email, balance FROM all_user WHERE user_name in ($in)")) {
                    $types = str_repeat("s", count($arr));
                    $stmt->bind_param($types, ...$arr);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $arr = [];

                    while($row = $result->fetch_array(MYSQLI_NUM)){
                        $arr['data'][] = $row;
                    }

                    $stmt->close();
                    $conn->close();
                    return $arr;
                }
            }
        }
        return [];
    }

    function insertRep($username, $email, $password){
        $conn = connDB();
        if($stmt = $conn->prepare("INSERT INTO all_user(user_name, email, balance, password) VALUE (?, ?, 0, ?)")){
            $stmt->bind_param("sss", $username, $email, $password);
            $stmt->execute();
            if($stmt->affected_rows > 0){
                $stmt->close();
                if($stmt = $conn->prepare("INSERT INTO representatives(rep_user_name, employer_user_name) VALUE (?, ?)")){
                    $employer_username = $_COOKIE['employer_username'];
                    $stmt->bind_param("ss", $username, $employer_username);
                    $stmt->execute();
                    if($stmt->affected_rows > 0){
                        return true;
                    }
                }
            }
        }
        return false;
    }

    function updateRep($username, $password){
        $conn = connDB();
        if($stmt = $conn->prepare("SELECT rep_user_name FROM representatives WHERE employer_user_name = ?")){
            $employer_username = $_COOKIE['employer_username'];
            $stmt->bind_param("s", $employer_username);
            $stmt->execute();
            $res = $stmt->get_result();
            $arr = $res->fetch_all(MYSQLI_ASSOC);
            $arr = array_column($arr, "rep_user_name");
            $stmt->close();
            if(in_array($username, $arr)){
                if($stmt = $conn->prepare("UPDATE all_user SET password = ? WHERE user_name = ?")){
                    $stmt->bind_param("ss", $password, $username);
                    $stmt->execute();
                    $stmt->close();
                    $conn->close();
                    return true;
                }
            }
        }
        return false;
    }

    function deleteRep($username){
        $conn = connDB();
        if($stmt = $conn->prepare("DELETE FROM representatives WHERE rep_user_name=?")){
            $stmt->bind_param("s", $username);
            $stmt->execute();
            if($stmt->affected_rows > 0) {
                $stmt->close();
                if($stmt = $conn->prepare("DELETE FROM all_user WHERE user_name=?")) {
                    $stmt->bind_param("s", $username);
                    $stmt->execute();
                    if($stmt->affected_rows > 0){
                        $stmt->close();
                        $conn->close();
                        return true;
                    }
                }
            }
        }
        return false;
    }
}