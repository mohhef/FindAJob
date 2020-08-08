<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


defined('__ROOT__') or define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__ . "/../helpers/config.php");
require_once(__ROOT__ . "/../helpers/mail.php");
require_once(__ROOT__ . "/../vendor/autoload.php");


class AuthController
{
    function employeeLogin($username, $password)
    {
        $conn = connDB();
        if ($stmt = $conn->prepare("SELECT au.password FROM all_user as au, employee as e WHERE au.user_name = ? AND  e.user_name = ?")) {
            $stmt->bind_param('ss', $username, $username);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($password);
                $stmt->fetch();
                if ($_POST['password'] == $password) {
                    return true;
                } else {
                    return false;
                }
            }
            return false;
        }


        return false;
    }

    function employerLogin($username, $password)
    {
        $conn = connDB();
        if ($stmt = $conn->prepare("SELECT au.password FROM all_user as au, employer as e WHERE au.user_name = ? AND  e.user_name = ?")) {
            $stmt->bind_param('ss', $username, $username);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($password);
                $stmt->fetch();
                if ($_POST['password'] == $password) {
                    return true;
                } else {
                    return false;
                }
            }
            return false;
        }


        return false;
    }

    function adminLogin($username, $password)
    {
        $conn = connDB();
        if ($stmt = $conn->prepare("SELECT a.password FROM admin as a WHERE a.user_name = ?")) {
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($password);
                $stmt->fetch();
                if ($_POST['password'] == $password) {
                    return true;
                } else {
                    return false;
                }
            }
            return false;
        }

        return false;
    }

    function employeeRegister($username, $email, $password)
    {
        $conn = connDB();
        if ($stmt = $conn->prepare("INSERT INTO all_user(user_name, email, balance, password) VALUE (?, ?, 0, ?)")) {
            $stmt->bind_param("sss", $username, $email, $password);
            if ($stmt->execute()) {
                $stmt->close();
                if ($stmt = $conn->prepare("INSERT INTO employee(user_name, category) VALUE (?, 'BASIC')")) {
                    $stmt->bind_param("s", $username);
                    if ($stmt->execute()) {
                        $stmt->close();
                        return true;
                    }
                }
            }
        }
        $stmt->close();
        return false;
    }

    function employerRegister($username, $email, $password)
    {
        $conn = connDB();
        if ($stmt = $conn->prepare("INSERT INTO all_user(user_name, email, balance, password) VALUE (?, ?, 0, ?)")) {
            $stmt->bind_param("sss", $username, $email, $password);
            if ($stmt->execute()) {
                $stmt->close();
                if ($stmt = $conn->prepare("INSERT INTO employer(user_name, category) VALUE (?, 'basic')")) {
                    $stmt->bind_param("s", $username);
                    if ($stmt->execute()) {
                        $stmt->close();
                        return true;
                    }
                }
            }
        }
        $stmt->close();
        return false;
    }

    function forgotPasswordEmployee($username)
    {
        $conn = connDB();
        if ($stmt = $conn->prepare("SELECT * FROM employee WHERE user_name = ?")) {
            $stmt->bind_param("s", $username);
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->close();
                    $uuid = uniqid("", true);
                    if ($stmt = $conn->prepare("INSERT INTO temp_password(user_name, temp_uuid) VALUE (?, ?)")) {
                        $stmt->bind_param("ss", $username, $uuid);
                        if ($stmt->execute()) {
                            $stmt->close();
                            if ($stmt = $conn->prepare("SELECT email FROM all_user WHERE user_name = ?")) {
                                $stmt->bind_param("s", $username);
                                $stmt->execute();
                                $res = $stmt->get_result();
                                $email = $res->fetch_all(MYSQLI_NUM)[0][0];
                                $mail = connMail();
                                try {
                                    $mail->From = "webcareer353@gmail.com";
                                    $mail->FromName = "Web Career";
                                    $mail->addAddress($email);
                                    $mail->Subject = "Web Career Reset Password";
                                    $mail->Body = "To change password, press on link : " . $_SERVER['HTTP_HOST'] . "/comp-353/main/reset_password_employee.php?token=" . $uuid;
                                    $mail->send();
                                    $mail->smtpClose();
                                    return true;
                                } catch (Exception $e) {
                                    echo "Mailer Error : " . $mail->ErrorInfo;
                                }
                            }
                        }
                    }
                }
            }
        }
        return false;
    }

    function forgotPasswordEmployer($username)
    {
        $conn = connDB();
        if ($stmt = $conn->prepare("SELECT * FROM employer WHERE user_name = ?")) {
            $stmt->bind_param("s", $username);
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->close();
                    $uuid = uniqid("", true);
                    if ($stmt = $conn->prepare("INSERT INTO temp_password(user_name, temp_uuid) VALUE (?, ?)")) {
                        $stmt->bind_param("ss", $username, $uuid);
                        if ($stmt->execute()) {
                            $stmt->close();
                            if ($stmt = $conn->prepare("SELECT email FROM all_user WHERE user_name = ?")) {
                                $stmt->bind_param("s", $username);
                                $stmt->execute();
                                $res = $stmt->get_result();
                                $email = $res->fetch_all(MYSQLI_NUM)[0][0];
                                $mail = connMail();
                                try {
                                    $mail->From = "webcareer353@gmail.com";
                                    $mail->FromName = "Web Career";
                                    $mail->addAddress($email);
                                    $mail->Subject = "Web Career Reset Password";
                                    $mail->Body = "To change password, press on link : " . $_SERVER['HTTP_HOST'] . "/comp-353/main/reset_password_employer.php?token=" . $uuid;
                                    $mail->send();
                                    $mail->smtpClose();
                                    return true;
                                } catch (Exception $e) {
                                    echo "Mailer Error : " . $mail->ErrorInfo;
                                }
                            }
                        }
                    }
                }
            }
        }
        return false;
    }

    function forgotPasswordAdmin($username)
    {
        $conn = connDB();
        if ($stmt = $conn->prepare("SELECT * FROM admin WHERE user_name = ?")) {
            $stmt->bind_param("s", $username);
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->close();
                    $uuid = uniqid("", true);
                    if ($stmt = $conn->prepare("INSERT INTO temp_admin_password(user_name, temp_uuid) VALUE (?, ?)")) {
                        $stmt->bind_param("ss", $username, $uuid);
                        if ($stmt->execute()) {
                            $stmt->close();
                                $email = "webcareer353@gmail.com";
                                $mail = connMail();
                                try {
                                    $mail->From = "webcareer353@gmail.com";
                                    $mail->FromName = "Web Career";
                                    $mail->addAddress($email);
                                    $mail->Subject = "Web Career Reset Password";
                                    $mail->Body = "To change password, press on link : " . $_SERVER['HTTP_HOST'] . "/comp-353/main/reset_password_admin.php?token=" . $uuid;
                                    $mail->send();
                                    $mail->smtpClose();
                                    return true;
                                } catch (Exception $e) {
                                    echo "Mailer Error : " . $mail->ErrorInfo;
                                }
                            }
                        }
                    }
                }
        }
        return false;
    }

    function resetPassword($uuid, $password)
    {
        $conn = connDB();
        if ($stmt = $conn->prepare("SELECT user_name FROM temp_password WHERE temp_uuid = ?")) {
            $stmt->bind_param("s", $uuid);
            if ($stmt->execute()) {
                $res = $stmt->get_result();
                $username = $res->fetch_all()[0][0];
                $stmt->close();
                if ($stmt = $conn->prepare("UPDATE all_user SET password = ? WHERE user_name = ?")) {
                    $stmt->bind_param("ss", $password, $username);
                    if ($stmt->execute()) {
                        $stmt->close();
                        if ($stmt = $conn->prepare("DELETE FROM temp_password WHERE user_name = ?")) {
                            $stmt->bind_param("s", $username);
                            if ($stmt->execute()) {
                                return true;
                            }
                        }
                    }
                }
            }
        }
        return false;
    }

    function resetAdminPassword($uuid, $password) {
        $conn = connDB();
        if ($stmt = $conn->prepare("SELECT user_name FROM temp_admin_password WHERE temp_uuid = ?")) {
            $stmt->bind_param("s", $uuid);
            if ($stmt->execute()) {
                $res = $stmt->get_result();
                $username = $res->fetch_all()[0][0];
                $stmt->close();
                if ($stmt = $conn->prepare("UPDATE admin SET password = ? WHERE user_name = ?")) {
                    $stmt->bind_param("ss", $password, $username);
                    if ($stmt->execute()) {
                        $stmt->close();
                        if ($stmt = $conn->prepare("DELETE FROM temp_admin_password WHERE user_name = ?")) {
                            $stmt->bind_param("s", $username);
                            if ($stmt->execute()) {
                                return true;
                            }
                        }
                    }
                }
            }
        }
        return false;
    }

}