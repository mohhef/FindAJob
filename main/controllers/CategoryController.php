<?php

defined('__ROOT__') or define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__."/../helpers/config.php");

class CategoryController
{
    function getCategories(){
        $conn = connDB();
        if($stmt = $conn->prepare("SELECT * FROM category")) {
            $stmt->execute();
            $result = $stmt->get_result();
            $arr = [];

            while($row = $result->fetch_array()){
                $arr[] = $row[0];
            }

            $stmt->close();
            $conn->close();
            return $arr;
        }
    }
}