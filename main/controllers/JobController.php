<?php

defined('__ROOT__') or define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__."/../helpers/config.php");

class JobController
{
    function getJob($job_id)
    {
        $conn = connDB();
        if ($stmt = $conn->prepare("SELECT * FROM job WHERE job_id = ?")) {
            $stmt->bind_param("i", $job_id);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($job);
                $stmt->fetch();
                return $job;
            }
            return false;
        }
    }

    function getJobs()
    {
        $conn = connDB();
        if ($stmt = $conn->prepare("SELECT j.job_id, j.title, j.description, j.employee_needed, j.category, j.date_posted FROM job as j, post as p WHERE j.job_id = p.job_id AND p.user_name = ?")) {
            $stmt->bind_param("s",$_COOKIE['employer_username']);
            $stmt->execute();

            $result = $stmt->get_result();
            $arr = [];

            while($row = $result->fetch_array(MYSQLI_NUM)){
                $arr['data'][] = $row;
            }
            return $arr;

        }
    }

    function insertJob($title, $description, $employee_needed, $category)
    {
        $conn = connDB();
        if ($stmt = $conn->prepare("INSERT INTO job(title, description, date_posted, employee_needed, category) value (?, ?, (SELECT NOW()), ?, ?)")) {
            $stmt->bind_param("ssis", $title, $description, $employee_needed, $category);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                $stmt->close();
                if ($stmt = $conn->prepare("SELECT LAST_INSERT_ID()")) {
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $job_id = $result->fetch_array();
                    $stmt->close();
                    if ($stmt = $conn->prepare("INSERT INTO post(job_id, user_name) value (?, ?)")) {
                        $stmt->bind_param("is", $job_id[0], $_COOKIE['employer_username']);
                        if($stmt->execute()) {
                            return true;
                        }
                    }
                }


            }
        }

        return false;
    }

    function updateJob($title, $description, $employee_needed, $category, $job_id)
    {
        $conn = connDB();
        if ($stmt = $conn->prepare("UPDATE job SET title = ?, description = ?, employee_needed = ?, category = ? WHERE job_id = ?")) {
            $stmt->bind_param("ssisi", $title, $description, $employee_needed, $category, $job_id);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                return true;
            }
        }
        return false;
    }

    function deleteJob($job_id)
    {
        $conn = connDB();
        if($stmt = $conn->prepare("DELETE FROM post WHERE job_id = ?")){
            $stmt->bind_param("i", $job_id);
            $stmt->execute();
            if($stmt->affected_rows > 0){
                $stmt->close();
                if ($stmt = $conn->prepare("DELETE FROM job WHERE job_id = ?")) {
                    $stmt->bind_param("i", $job_id);
                    $stmt->execute();
                    if ($stmt->affected_rows > 0) {
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