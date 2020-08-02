<?php
require('config.php');

if(isset($_POST["account_no"]))
{
 $query = "DELETE FROM loyer_chequing WHERE account_no = '".$_POST["account_no"]."'";
 if(mysqli_query($conn, $query))
 {
  echo 'data deleted!';
 }
}

?>
