
<?php
//create connection

$servername = "localhost";
$username = "root";
$password = "root";
$database = "web_career";

$servername = "vxc353.encs.concordia.ca";
$username = "vxc353_1";
$password = "m1h2c3r4";
$database = "vxc353_1";

$conn = mysqli_connect($servername, $username, $password, $database);

//check connection
if(mysqli_connect_errno()){
	//connection Failed
	echo 'Failed to connect'.mysqli_connect_errno();

}

?>
