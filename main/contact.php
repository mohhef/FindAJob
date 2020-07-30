<?php include "header.php" ?> 

</br></br>
</br>

<?php 

$contact=$_POST['contact'];
$id=$_POST['id'];

// if ($contact==true){
//     echo "$id";
// }


 echo ' 
               <div class="container-fluid" id="rcorners1">
                 <div class="table-responsive">
                  <table id="contact_data" class="display nowrap table table-borderless table-striped" style="" >
                   <thead>
                     <tr>
                      <th>Company name</th>
                      <th>Employer name</th>
                      <th>Telephone Number</th>         

                     </tr>';

 $query = "SELECT co.company_name, c.euser_name, co.telephone_number FROM contact_info co, contact c WHERE co.telephone_number = c.telephone_number and co.telephone_number in (SELECT c.telephone_number FROM contact c WHERE c.euser_name in (SELECT p.user_name FROM post p WHERE p.job_id =".$id."))";
      
 $mysqli = new mysqli("localhost", 'root', 'root', 'web_career');

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["company_name"];
        $field2name = $row["euser_name"];
        $field3name = $row["telephone_number"];
 

        echo '<tr style="background-color: coral;"> 
                   <td>'.$field1name.'</td> 
                    <td>'.$field2name.'</td> 
                    <td>'.$field3name.'</td> 
                </tr>
              </table>
            </div>
          </div>'
              ;
    }
    $result->free();
} 
        ?>


<?php include "footer.php"?>