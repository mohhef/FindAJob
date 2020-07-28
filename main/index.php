<?php
require('database/config.php');
require('database/db_interface.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
</head>
<body>
<!-- <?php   
    $employees=getEmployeeTest();
?>
<div>
<?php
    foreach((array)$employees as $emp){
    echo $emp;
    }
?> -->

  <link href = "css/style.css" type = "text/css" rel = "stylesheet" />    
        <h2>Post a Job</h2>    
        <form name = "form1" action="insert.php" method = "post" enctype = "multipart/form-data" >    
            <div class = "container">    
                <div class = "form_group">    
                    <label>Title:</label>    
                    <input type = "text" name = "title" value = "" required/>    
                </div>    
                <div class = "form_group">    
                    <label>Description: </label>    
                    <input type = "text" name = "description" value = "" required />    
                </div> 
                 <div class = "form_group">    
                    <label>Date(YYYY-MM-DD): </label>    
                    <input type = "text" name = "date" value = "" required />    
                </div> 
                 <div class = "form_group">    
                    <label>Nb of Employees: </label>    
                    <input type = "text" name = "employees" value = "" required />    
                </div> 
                Category :  
                <select name="category">  
                  <option value="Full-time" >Full-time</option>  
                  <option value="Part-time" >Part-time</option>  
                  <option value="Internship" >Internship</option>  
                </select>       
            </div>  
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">  
        </form> 
 
     <div>
     	<br>
     	<br>
     	<?php

        echo '<table border="1" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">Job_id</font> </td> 
          <td> <font face="Arial">Title</font> </td> 
          <td> <font face="Arial">Description</font> </td> 
          <td> <font face="Arial">Date_posted</font> </td> 
          <td> <font face="Arial">Employee_needed</font> </td> 
      </tr>';

      $query = "SELECT * FROM job";
      $mysqli = new mysqli("localhost", 'root', '', 'web_career');

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["job_id"];
        $field2name = $row["title"];
        $field3name = $row["description"];
        $field4name = $row["date_posted"];
        $field5name = $row["employee_needed"]; 

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
              </tr>';
    }
    $result->free();
} 
        ?>
    </div>


</div>
</body>
</html>
