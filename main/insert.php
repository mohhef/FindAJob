<?php
require('database/config.php');
if(isset($_POST['submit']))
{    
     $title = $_POST['title'];
     $description = $_POST['description'];
     $date = $_POST['date'];
     $employees = $_POST['employees'];
     $category = $_POST['category'];
    
    //creates a longer unique id with the 'j' prefix 
    //@ added to remove warning message
     $id = @uniqid (J);
 
    //Populate Jobs table
     $sql = "INSERT INTO job (job_id, title, description, date_posted, employee_needed)
     VALUES ('$id', '$title', '$description', '$date', '$employees')";
 
     if (mysqli_query($conn, $sql)) {
     	// echo ($category);
      //   echo "New record has been added successfully in Jobs table!";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }

     //Populate belongs_to table
     $sql = "INSERT INTO belong_to (c_name,job_id)
     VALUES ('$category', '$id')";
 
     if (mysqli_query($conn, $sql)) {
     	// echo ($category);
      //   echo "New record has been added successfully in belong_to table!";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }


     mysqli_close($conn);
}


?>

<h1>Thanks for adding a Job posting</h1>

<input type="button" value="Home" onClick="document.location.href='index.php'" />

