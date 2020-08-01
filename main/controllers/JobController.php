<?php

define('__ROOT__', dirname(__FILE__));
require(__ROOT__ . "/../helpers/config.php");

class JobController
{
    function getJob($job_id){
        $conn = connDB();
        if($stmt = $conn->prepare("SELECT * FROM job WHERE job_id = ?")){
            $stmt->bind_param("i", $job_id);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0) {
                $stmt->bind_result($job);
                $stmt->fetch();
                return $job;
            }
            return false;
        }
    }

    function insertJob($title, $description, $employee_needed, $category){
        $conn = connDB();
        if($stmt = $conn->prepare("INSERT INTO job(title, description, date_posted, employee_needed, category) value (?, ?, (SELECT NOW()), ?, ?)")){
            $stmt->bind_param("ssis", $title, $description, $employee_needed, $category);
            $stmt->execute();
            if($stmt->affected_rows > 0){
                return true;
            }
        }

        return false;
    }

    function updateJob($title, $description, $employee_needed, $category, $job_id){
        $conn = connDB();
        if($stmt = $conn->prepare("UPDATE job SET title = ?, employee_needed = ?, category = ?, description = ? WHERE job_id = ?")){
            $stmt->bind_param("sissi", $title, $description, $employee_needed, $category, $job_id);
            $stmt->execute();
            if($stmt->affected_rows > 0){
                return true;
            }
        }
        return false;
    }

    function deleteJob($job_id)
    {
        $conn = connDB();
        if($stmt = $conn->prepare("DELETE FROM job WHERE job_id = ?")){
            $stmt->bind_param("i", $job_id);
            $stmt->execute();
            if($stmt->affected_rows > 0){
                return true;
            }
        }
        return false;
    }
}