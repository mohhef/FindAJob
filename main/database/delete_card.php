<?php
require('config.php');

if(isset($_POST["card_number"]))
{
 $query = "DELETE FROM loyer_credit_pays WHERE card_number = '".$_POST["card_number"]."'";
 if(mysqli_query($conn, $query))
 {
  echo 'data deleted!';
 }
}

?>
