<?php
require('config.php');

if(isset($_POST["chequng_no"]))
{
 $query = "DELETE FROM loyer_chequing WHERE account_no = '".$_POST["chequng_no"]."'";
 if(mysqli_query($conn, $query))
 {
  echo 'data deleted!';
 }
}

?>
