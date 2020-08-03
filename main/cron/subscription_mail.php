<?php

// assumes that a cron job runs every week
require('../controllers/UserController.php');
$userController = new UserController();
$users = $userController->getSufferingUsers();

foreach($users as $user){
    $name = $user['user_name'];
    if (strtotime($user['last_payment'])<strtotime('-1 year')){
        $userController->deleteUser($name);
    }
    mail($user["email"], "Web Career Account Balance is Suffering",
        "Hello, $name. \n This is a message to remind you that your account balance on web career is suffering.
                Please remedy this situation as quickly as possible.");
}