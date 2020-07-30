<?php include "header.php" ?> 

</br></br>
</br>

<h1 style="color: white;"> Employers</h1>

</br>
</br>
<?php 



 echo ' 
               <div class="container-fluid" id="rcorners1">
                 <div class="table-responsive">
                  <table id="contact_data" class="display nowrap table table-borderless table-striped" style="" >
                   <thead>
                     <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Category</th> 
                      <th>Balance</th>
                       <th>Status</th>
                         


                     </tr>';

 $query = "SELECT e.user_name, a.email, e.category, s.price, m.activate_deactivate FROM employer e, all_user a, manages m, subscription_category_loyer s  WHERE e.user_name = a.user_name and a.user_name = m.user_name and e.category = s.category";
      
 $mysqli = new mysqli("localhost", 'root', 'root', 'web_career');

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["user_name"];
        $field2name = $row["email"];
        $field3name = $row["category"];
        $field4name = $row["price"];
        $field5name = $row["activate_deactivate"];
 

        echo '<tr style="background-color: coral;"> 
                   <td>'.$field1name.'</td> 
                    <td>'.$field2name.'</td> 
                    <td>'.$field3name.'</td> 
                    <td>'.$field4name.'</td> 
                    <td>'.$field5name.'</td> 
                </tr>
              </table>
            </div>
          </div>'
              ;
    }
    $result->free();
} 
        ?>


</br></br>
</br>

<h1 style="color: white;"> Employees</h1>

</br>
</br>
<?php 



 echo ' 
               <div class="container-fluid" id="rcorners1">
                 <div class="table-responsive">
                  <table id="contact_data" class="display nowrap table table-borderless table-striped" style="" >
                   <thead>
                     <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Category</th> 
                      <th>Balance</th>
                       <th>Status</th>
                         


                     </tr>';

 $query = "SELECT e.user_name, a.email, e.category, s.price, m.activate_deactivate FROM employee e, all_user a, manages m, subscription_category_loyee s  WHERE e.user_name = a.user_name and a.user_name = m.user_name and e.category = s.category";
      
 $mysqli = new mysqli("localhost", 'root', 'root', 'web_career');

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["user_name"];
        $field2name = $row["email"];
        $field3name = $row["category"];
        $field4name = $row["price"];
        $field5name = $row["activate_deactivate"];
 

        echo '<tr style="background-color: coral;"> 
                   <td>'.$field1name.'</td> 
                    <td>'.$field2name.'</td> 
                    <td>'.$field3name.'</td> 
                    <td>'.$field4name.'</td> 
                    <td>'.$field5name.'</td> 
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