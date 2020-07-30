<?php include "header.php" ?>

<h1>ROBERTTTT</h1>
<?php 
// session_start();
// $var_value = $_SESSION["id"];
// echo "$var_value";

$contact=$_POST['contact'];
$id=$_POST['id'];

if ($contact==true){
    echo "$id";
}
?>

<?php include "footer.php"?>