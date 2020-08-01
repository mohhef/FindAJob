<?php include "header.php" ?>

</br></br>
</br>

<div class="container-fluid" id="rcorners1">
  <div class="table-responsive">
    <div id="alert_message"></div>
    <table id="employer_data" class="display nowrap table table-borderless table-striped" style="" >
    <h2 class="text-center">Employer data</h2> 
    <thead>
        <tr>
          <th>user_name</th>
          <th>email</th>
          <th>category</th>
          <th>balance</th>
          <th>status</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
    </table>
  </div>
</div>

<div class="container-fluid" id="rcorners1">
  <div class="table-responsive">
    <div id="alert_message"></div>
    <table id="employee_data" class="display nowrap table table-borderless table-striped" style="" >
    <h2 class="text-center">Employee data</h2> 
    <thead>
        <tr>
          <th>user_name</th>
          <th>email</th>
          <th>category</th>
          <th>balance</th>
          <th>status</th>
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
    var dataTable = $('#employer_data').DataTable({
        "bootstrap": true,
      "sDom": "Rlfrtip",
      "bAutoWidth":false,
      "responsive":true,
      "scrollCollapse": true,
              "searching": false,

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
      }, {
        "orderable": false,
        //    "width":"5%"
      }
    ],
    "language": {
      "sSearch": "  ",
      "searchPlaceholder": "search"
    },
    "ajax" : {
      url:"database/fetch_employer.php",
      type:"POST"
    }
  });
    var dataTable = $('#employee_data').DataTable({
        "bootstrap": true,
      "sDom": "Rlfrtip",
      "bAutoWidth":false,
      "responsive":true,
      "scrollCollapse": true,
              "searching": false,

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
      }, {
        "orderable": false,
        //    "width":"5%"
      }
    ],
    "language": {
      "sSearch": "  ",
      "searchPlaceholder": "search"
    },
    "ajax" : {
      url:"database/fetch_employee.php",
      type:"POST"
    }
  });
}
});
</script>
<?php include "footer.php"?>
