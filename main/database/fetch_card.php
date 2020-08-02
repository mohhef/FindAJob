<?php

    require("config.php");

    $user_name=$_COOKIE['employer_username'];

    $columns = array('card_no','name', 'expiration_date', 'type');
    $query1= "SELECT card_method.card_number, card_method.name, card_method.expiration_date, loyer_credit_pays.automatic_manual from loyer_credit_pays JOIN card_method ON loyer_credit_pays.card_number = card_method.card_number AND loyer_credit_pays.user_name = '$user_name'";

    $result = mysqli_query($conn,  $query1) or die ("Error 1");

    function get_all_data($conn) {
        $query = "SELECT card_method.card_number, card_method.name, card_method.expiration_date, loyer_credit_pays.automatic_manual from loyer_credit_pays JOIN card_method ON loyer_credit_pays.card_number = card_method.card_number";
        $result = mysqli_query($conn, $query) or die ("Error 2");
        $row = mysqli_fetch_array($result);
        return mysqli_num_rows($result);
    }

    $number_filter_row = mysqli_num_rows(mysqli_query($conn, $query1));

    $preffered_method_query = "SELECT preferred_method FROM `employer` WHERE employer.user_name = '$user_name'";
    $preffered_method = mysqli_fetch_array(mysqli_query($conn,  $preffered_method_query));
    $data = array();

    while($row = mysqli_fetch_array($result))
    {
        $sub_array = array();
        if (count($preffered_method) > 0 && $preffered_method[0] == $row["card_number"]) {
            $sub_array[] = '<div class="radio"><label><input type="radio" name="optradio" value="'.$row["card_number"].'" checked></label></div>';
        } else {
            $sub_array[] = '<div class="radio"><label><input type="radio" name="optradio" value="'.$row["card_number"].'"></label></div>';
        }
        $sub_array[] = '<div contenteditable="false" data-id="'.$row["card_number"].'" data-column="card_no" id="card_no">' . $row["card_number"] . '</>';
        $sub_array[] = '<div contenteditable="false" data-id="'.$row["card_number"].'" data-column="name">' . $row["name"] . '</div>';
        $sub_array[] = '<div contenteditable="false" data-id="'.$row["card_number"].'" data-column="expiration_date">' . $row["expiration_date"] . '</div>';
        $sub_array[] = '<div contenteditable="false" data-id="'.$row["card_number"].'" data-column="automatic_manual">' . $row["automatic_manual"] . '</div>';
        $sub_array[] = '<button type="button" name="delete-card" class="btn btn-danger btn-xs delete-card" id="'.$row["card_number"].'">Delete</button>';
        $sub_array[] = '<button type="button" name="update-card" class="btn btn-primary btn-xs update-card" id="'.$row["card_number"].'">Update</button>';
        $data[] = $sub_array;
    }

    $output = array(
        "draw"=>intval($_POST["draw"]),
        "recordsTotal"=>get_all_data($conn),
        "recordsFiltered"=> $number_filter_row,
        "data"=> $data
    );

    echo json_encode($output);

?>