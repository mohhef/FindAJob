<?php
    if (isset($_COOKIE['employee_username'])) {
        include('../employee/header.php');
    } else if (isset($_COOKIE['employer_username'])){
        include('../employer/header.php'); 
    }
?>

</br></br>
</br>

<?php include "chequing_table.php" ?>

<?php include "card_table.php" ?>

<?php
    if (isset($_COOKIE['employee_username'])) {
        include('../employee/footer.php');
    } else if (isset($_COOKIE['employer_username'])){
        include('../employer/footer.php'); 
    }
?>