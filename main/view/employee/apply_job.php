<?php include "header.php" ?>

<div class="container-fluid" id="rcorners1">
  <div class="table-responsive">
    <div id="alert_message"></div>
    <table id="user_data" class="display nowrap table table-borderless table-striped" style="" >
      <thead>
        <tr>
          <th>Title</th>
          <th>Employees Needed</th>
          <th>Date Posted</th>
          <th>Category</th>
          <th>Description</th>
          <th>Status</th>
          <th></th>
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
      "scrollY": "660px",
      "scrollX": true,
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
      }, {
        "orderable": false,
        //  "width":"10%"

      }
    ],
    "language": {
      "sSearch": "  ",
      "searchPlaceholder": "search"
    },
    "ajax" : {
      url:"../database/fetch_applications.php",
      type:"POST"
    }
  });
}

$("#user_data").on('click', '.apply', function(){
  var id = $(this).attr("id");
    $.ajax({
    url:'../database/update_applies.php',
    method:"POST",
    data:{id:id},
    error: function(xhr, error){
        console.log(xhr); console.log(error);
    },
    success:function(){
      console.log('it')
      $('#user_data').DataTable().ajax.reload(null,false);
       }
  });
    });
$("#user_data").on('click', '.withdraw', function(){
  var id = $(this).attr("id");
    $.ajax({
    url:'../database/update_applies_withdraws.php',
    method:"POST",
    data:{id:id},
    error: function(xhr, error){
        console.log(xhr); console.log(error);
    },
    success:function(){
      console.log('it')
      $('#user_data').DataTable().ajax.reload(null,false);
       }
  });
    });
  });

</script>
<?php include "footer.php" ?>
