
<?php
//create connection
$username = 'root';
$password = 'root';
$hostname = '127.0.0.1';
$database =  'web_career';


$conn = mysqli_connect($hostname, $username, $password, $database);

//check connection
if(mysqli_connect_errno()){
	//connection Failed
	echo 'Failed to connect'.mysqli_connect_errno();

}

?>
