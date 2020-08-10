<?php

defined('__ROOT__') or define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__ . "/../helpers/config.php");


class AdminController
{
    function changeUserStatus($username){
        $conn = connDB();
        if($stmt = $conn->prepare("SELECT activate_deactivate FROM manages WHERE user_name=?")){
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $res = $stmt->get_result();
            $status = $res->fetch_all(MYSQLI_NUM)[0][0];
            if($status == "active"){
                $status = "deactive";
            }else{
                $status = "active";
            }
            $stmt->close();
            if($stmt = $conn->prepare("UPDATE manages SET activate_deactivate=? WHERE user_name=?")){
                $stmt->bind_param("ss", $status, $username);
                if($stmt->execute()){
                    $stmt->close();
                    $conn->close();
                    return true;
                }
            }

        }
        return false;
    }

    function getJobs(){
        $conn = connDB();
        if($stmt = $conn->prepare("SELECT * FROM job")){
            $stmt->execute();
            $res = $stmt->get_result();
            return $res->fetch_all(MYSQLI_NUM);
        }
    }

    function deleteJob($job_id){
        $conn = connDB();
        if($stmt = $conn->prepare("DELETE FROM applies WHERE job_id = ?")){
            $stmt->bind_param("i", $job_id);
            if($stmt->execute()) {
                $stmt->close();
                if ($stmt = $conn->prepare("DELETE FROM post WHERE job_id = ?")) {
                    $stmt->bind_param("i", $job_id);
                    if ($stmt->execute()) {
                        $stmt->close();
                        if ($stmt = $conn->prepare("DELETE FROM offer WHERE job_id = ?")) {
                            $stmt->bind_param("i", $job_id);
                            if ($stmt->execute()) {
                                $stmt->close();
                                if ($stmt = $conn->prepare("DELETE FROM job WHERE job_id = ?")) {
                                    $stmt->bind_param("i", $job_id);
                                    if ($stmt->execute()) {
                                        $stmt->close();
                                        $conn->close();
                                        return true;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return false;
    }

    function getOffers(){
        $conn = connDB();
        if($stmt = $conn->prepare("SELECT job_id, title, user_name_loyee, user_name_loyer, offer_status, accept_deny FROM offer NATURAL JOIN job")){
            $stmt->execute();
            $res = $stmt->get_result();
            return $res->fetch_all(MYSQLI_NUM);
        }
    }

    function getApplications(){
        $conn = connDB();
        if($stmt = $conn->prepare("SELECT job_id, title, user_name, application_status, date_applied FROM applies NATURAL JOIN job")){
            $stmt->execute();
            $res = $stmt->get_result();
            return $res->fetch_all(MYSQLI_NUM);
        }
    }

}