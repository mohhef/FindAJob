<?php include "header.php" ?>

</br></br>
</br>

<div class="container-fluid" id="rcorners1">
  <div class="table-responsive">
    <div id="alert_message"></div>
    <table id="user_data" class="display nowrap table table-borderless table-striped" style="" >
      <thead>
        <tr>
          <th>Job ID</th>
          <th>Title</th>
          <th>Date Applied</th>
          <th>Category</th>
          <th>Description</th>
          <th>User Name</th>
          <th>Offer</th>
          <th></th>
        </tr>
      </thead>
    </table>
  </div>
</div>

<nav id="nav" class="navbar navbar-expand-sm  navbar-dark">
</nav>
<?php include "footer.php" ?>

<script type="text/javascript">

$(document).ready(function(){
  // document.body.style.zoom="100%"
  fetch_data();
  function fetch_data(){
    var dataTable = $('#user_data').DataTable({
        "bootstrap": true,
      "sDom": "Rlfrtip",
      "bAutoWidth":false,
      "responsive":true,

      "scrollCollapse": true,
      "processing":true,
      "serverSide":true,
      "aLengthMenu": [[10, 25, 30, -1], [10, 25, 30, "All"]],
      "pageLength": 25,
      "bInfo":false,
      //    "order" : [],
      "columns": [{
        "orderable": true,
        // "width":"25px"

      }, {
        "orderable": true,
        //  "width":"15%"
      }, {
        "orderable": true,
        //  "width":"15%"
      }, {
        "orderable": true,
        //    "width":"21%"
      }, {
        "orderable": true,
        //    "width":"25%"
      },{
        "orderable": true,
        //    "width":"25%"
      },{
        "orderable": false,
        //    "width":"25%"
      }
    ],
    "language": {
      "sSearch": "  ",
      "searchPlaceholder": "search"
    },
    "ajax" : {
      url:"../database/fetch_job_applications.php",
      type:"POST"
    }
  });
}
$("#user_data").on('click', '.offer', function(){
  var id = $(this).attr("id").split(" ")[0];
  var employee_name = $(this).attr("id").split(" ")[1];
      bootbox.confirm("Offer this job "+id, function(result){
        if(result==true){
        console.log(result);
          $.ajax({
            url:'../database/offer_job.php',
            method: "POST",
            data:{id:id,loyee_username:employee_name},
            success: function(data){
              $('#alert_message').html('<div class="alert alert-success">'+'Job offered'+'</div>');
              $('#user_data').DataTable().ajax.reload(null,false);
            },
            error: function(xhr, error){
                console.log(xhr); console.log(error);
            },
          });
          setInterval(function(){
                  $('#alert_message').html('');
                }, 5000);
              }
        });
      });
      });
</script>
<?php include "footer.php"?>