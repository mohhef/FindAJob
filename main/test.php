<?php
require('database/config.php');
require('database/db_interface.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
</head>
<body>
<?php   
    $employees=getEmployeeTest();
?>
<div>
<?php
    foreach((array)$employees as $emp){
    echo $emp;
    }
?>
</div>
</body>
</html>
