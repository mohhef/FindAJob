<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

defined('__ROOT__') or define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__."/../vendor/autoload.php");

function connMail()
{
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "webcareer353";
    $mail->Password = "comp-353";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    return $mail;
}