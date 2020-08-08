<?php
    defined('__ROOT__') or define('__ROOT__', dirname(__FILE__));
    require_once(__ROOT__."/../helpers/config.php");
    require_once(__ROOT__ . "/../helpers/mail.php");
    require_once(__ROOT__ . "/../vendor/autoload.php");

    $conn = connDB();
    if($stmt = $conn->prepare("SELECT * FROM all_user")){
        $stmt->execute();
        $res = $stmt->get_result();
        $arr = $res->fetch_all(MYSQLI_NUM);
        $stmt->close();
        foreach($arr as $val){
            // check whether employee or employer, and get subscription
            $isEmployee = false;
            $isEmployer = false;
            $user_info = null;
            if($stmt = $conn->prepare("SELECT * FROM employee WHERE user_name = ?")){
                $stmt->bind_param("s", $val[0]);
                $stmt->execute();
                $res = $stmt->get_result();
                $user_info = $res->fetch_all();
                if($user_info != null){
                    $user_info = $user_info[0];
                    $stmt->close();
                    $isEmployee = true;
                }else{
                    $stmt->close();
                    if($stmt = $conn->prepare("SELECT * FROM employer WHERE user_name = ?")){
                        $stmt->bind_param("s", $val[0]);
                        $stmt->execute();
                        $res = $stmt->get_result();
                        $user_info = $res->fetch_all();
                        if($user_info != null){
                            $user_info = $user_info[0];
                            $stmt->close();
                            $isEmployer = true;
                        }

                    }
                }
            }
            if($isEmployee){
                $price = null;
                if($stmt = $conn->prepare("SELECT price FROM subscription_category_loyee WHERE category = ?")){
                    $stmt->bind_param("s", $user_info[1]);
                    $stmt->execute();
                    $res = $stmt->get_result();
                    $price = $res->fetch_all();
                    if($price != null){
                        $price = str_replace("$", "", $price[0][0]);
                        $stmt->close();
                    }
                }
            }
            if($isEmployer){
                if($stmt = $conn->prepare("SELECT price FROM subscription_category_loyer WHERE category = ?")){
                    $stmt->bind_param("s", $user_info[1]);
                    $stmt->execute();
                    $res = $stmt->get_result();
                    $price = $res->fetch_all();
                    if($price != null){
                        $price = str_replace("$", "", $price[0][0]);
                        $stmt->close();
                    }
                }
            }

            if($stmt = $conn->prepare("UPDATE all_user SET balance = balance - ? WHERE user_name = ?")){
                $stmt->bind_param("is", $price, $val[0]);
                if($stmt->execute()){
                    $mail = connMail();
                    $email = $val[1];
                    try {
                        $mail->From = "webcareer353@gmail.com";
                        $mail->FromName = "Web Career";
                        $mail->addAddress($email);
                        $mail->Subject = "Web Career Charged Your Account";
                        $mail->Body = "Your account subscription is " . $user_info[1] . " and has been charged " . $price . ". Your remaining balance " . ($val[2] - $price);
                        $mail->send();
                        $mail->smtpClose();
                    } catch (Exception $e) {
                        echo "Mailer Error : " . $mail->ErrorInfo;
                    }
                }
            }

        }
    }

    ?>
