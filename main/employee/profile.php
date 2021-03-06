<?php include "header.php" ?>

</br></br>
</br>

<div class="container-fluid" id="rcorners1">
  <div class="table-responsive">
    <div id="alert_message"></div>
    <table id="profile_data" class="display nowrap table table-borderless table-striped" style="" >
      <thead>
        <tr>
          <th>Username</th>
          <th>Email</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
<div id="profileModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <form method="post" id="profileForm" autocomplete="off">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" align="left">Edit Profile</h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
      <div class="row">
        <div class="col-md-2 form-group">
          <label for="name" class="control-label">Employee Name</label>
          <input readonly type="text" class="form-control disabled" id="empID" name="empID" placeholder="employeeID">
        </div>


        <div class="col-2 form-group">
          <label for="description" class="control-label">Email</label>
          <textarea   class="form-control"  id="email" name="email"></textarea>
        </div>
      </div>
    </div>
      <div class="modal-footer">
        <input type="hidden" name="jobid" id="jobid" />
        <input type="hidden" name="action" id="action" value="" />
        <input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </form>
</div>
</div>

<nav id="nav" class="navbar navbar-expand-sm  navbar-dark">
</nav>
<?php include "footer.php" ?>

<script type="text/javascript">

var id = getCookie("employee_username");
console.log(id);

$(document).ready(function(){
  // document.body.style.zoom="100%"
  fetch_data();
  function fetch_data(){
    var dataTable = $('#profile_data').DataTable({
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
        "orderable": false,
        //  "width":"15%"
      }, {
        "orderable": false,
        //  "width":"15%"
      }
    ],
    "language": {
      "sSearch": "  ",
      "searchPlaceholder": "search"
    },
    "ajax" : {
      url:"../database/fetch_logged_in_employee.php",
      type:"POST",
      data:{id:id}
    }
  });
}

$("#profile_data").on('click', '.update', function(){
  var id = $(this).attr("id");
  var action = 'getPipeline';
  $.ajax({
    url:'../database/get_employee_profile.php',
    method:"POST",
    data:{id:id, action:action},
    dataType:"json",
    success:function(data){
      $('#profileModal').modal('show');
      $('#empID').val(data.user_name);
      $('#email').val(data.email);
       $('.modal-title').html("<i class='fa fa-plus'></i> Edit Profile Details");
       $('#action').val('updateJob');
       $('#save').val('Save');
    }
  });
});


$("#profileModal").on('submit','#profileForm', function(event){
  event.preventDefault();
  $('#save').attr('disabled','disabled');
  var formData = $(this).serialize();
  console.log(formData)
  var email = jQuery('input[name="email"]').val();
   $.ajax({
    url:"../database/update_profile_employee.php",
    method:"POST",
    data:formData,
    success:function(data){
      $('#profileForm')[0].reset();
      $('#profileModal').modal('hide');
      $('#save').attr('disabled', false);
      $('#profile_data').DataTable().ajax.reload(null,false);
      console.log(formData);
    }
  });
});

$(document).on('click', '.delete',function(){
  var id=$(this).attr("id");
      bootbox.prompt({
        size: "large",
        title: "Delete",
        inputType: 'radio',
        inputOptions: [{
         text: "Delete the Profile '"+id+ "'",
         value: '1',
        }],
       callback: function(result) {
          if (result == 1) {
            $.ajax({
              url:"../database/delete_profile.php",
              method: "POST",
              data: {id:id},
              success:function(data){
                cookieset_employee();
              }
            });
            setInterval(function(){
              $('#alert_message').html('');
            }, 5000);
          }
        }
      });
});

});

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

</script>
<?php include "footer.php"?>