<?php

defined('__ROOT__') or define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__."/../helpers/config.php");
require_once(__ROOT__ . "/../helpers/mail.php");
require_once(__ROOT__ . "/../vendor/autoload.php");
$conn = connDB();
$arr = [];
if($stmt = $conn->prepare("SELECT * FROM all_user WHERE balance < 0")){
    $stmt->execute();
    $res = $stmt->get_result();
    $arr = $res->fetch_all();
    if(count($arr) != 0){
        foreach($arr as $val){
            $mail = connMail();
            $email = $val[1];
            try {
                $mail->From = "webcareer353@gmail.com";
                $mail->FromName = "Web Career";
                $mail->addAddress($email);
                $mail->Subject = "Web Career Balance Information";
                $mail->Body = "Your account balance is " . $val[2] . ". Please update your payment information or your account will be deactivated.";
                $mail->send();
                $mail->smtpClose();
            } catch (Exception $e) {
                echo "Mailer Error : " . $mail->ErrorInfo;
            }
        }
    }
    $stmt->close();
    if($stmt = $conn->prepare("SELECT * FROM all_user WHERE last_payment < DATE_SUB(NOW(), INTERVAL 1 YEAR)")){
        $stmt->execute();
        $res = $stmt->get_result();
        $temp = $res->fetch_all(MYSQLI_ASSOC);
        $vals = array_column($temp, "user_name");
        $stmt->close();
        $in = str_repeat("?, ", count($vals) - 1) . '?';
        if($stmt = $conn->prepare("UPDATE manages SET activate_deactivate='deactive' WHERE user_name in ($in)")){
            $types = str_repeat("s", count($vals));
            $stmt->bind_param("s", ...$vals);
            $stmt->execute();
            $stmt->close();
        }
    }
}