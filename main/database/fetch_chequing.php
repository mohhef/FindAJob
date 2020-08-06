<?php
    require("config.php");
    $user_name = '';
    if (isset($_COOKIE['employee_username'])) {
        $user_name = $_COOKIE['employee_username'];
        $payment_type = "loyee_chequing";
        $type = "employee";
    } else if (isset($_COOKIE['employer_username'])){
        $user_name = $_COOKIE['employer_username'];
        $payment_type = "loyee_chequing";
        $type = "employer";
    }
    $columns = array('account_no','bank_no', 'transit_no');
    $query1= "SELECT chequing.account_no, chequing.bank_no, chequing.transit_no, t.automatic_manual from `$payment_type` t JOIN chequing ON t.account_no = chequing.account_no AND t.user_name = '$user_name'";

    $result = mysqli_query($conn,  $query1) or die ("Error 1");

    function get_all_data($conn, $payment_type) {
        $query = "SELECT chequing.account_no, chequing.bank_no, chequing.transit_no, t.automatic_manual from `$payment_type` t JOIN chequing ON t.account_no = chequing.account_no";
        $result = mysqli_query($conn, $query) or die ("Error 2");
        $row = mysqli_fetch_array($result);
        return mysqli_num_rows($result);
    }

    $number_filter_row = mysqli_num_rows(mysqli_query($conn, $query1));

    $data = array();

    $preffered_method_query = "SELECT preferred_method FROM `$type` t WHERE t.user_name = '$user_name'";
    $preffered_method = mysqli_fetch_array(mysqli_query($conn,  $preffered_method_query));
    while($row = mysqli_fetch_array($result))
    {
        $sub_array = array();
        if(isset($preffered_method) && count($preffered_method) > 0 && $preffered_method[0] == $row["account_no"]) {
            $sub_array[] = '<div class="radio"><label><input type="radio" name="optradio" value="'.$row["account_no"].'" checked></label></div>';
        } else {
            $sub_array[] = '<div class="radio"><label><input type="radio" name="optradio" value="'.$row["account_no"].'"></label></div>';
        }
        $sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["account_no"].'" data-column="account_no" id="account_no">' . $row["account_no"] . '</div>';
        $sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["account_no"].'" data-column="bank_no">' . $row["bank_no"] . '</div>';
        $sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["account_no"].'" data-column="transit_no">' . $row["transit_no"] . '</div>';
        $sub_array[] = '<div contenteditable="false" data-id="'.$row["account_no"].'" data-column="automatic_manual">' . $row["automatic_manual"] . '</div>';
        $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["account_no"].'">Delete</button>';
        $sub_array[] = '<button type="button" name="update" class="btn btn-primary btn-xs update" id="'.$row["account_no"].'">Update</button>';
        $data[] = $sub_array;
    }

    $output = array(
        "draw"=>intval($_POST["draw"]),
        "recordsTotal"=>get_all_data($conn, $payment_type),
        "recordsFiltered"=> $number_filter_row,
        "data"=> $data
    );

    echo json_encode($output);

?>