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
<div id="jobModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <form method="post" id="jobForm" autocomplete="off">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" align="left">Edit Job</h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
          <div class="col-md-2 form-group">
          <label for="name" class="control-label">Job ID</label>
          <input readonly type="text" class="form-control disabled" id="jobID" name="jobID" placeholder="Job ID">
        </div>
        <div class="col-md-2 form-group">
          <label for="age" class="control-label">Date Posted</label>
          <input readonly type="text" class="form-control disabled" id="datePosted" name="datePosted" placeholder="Date Posted">
        </div>
      </div>
      <div class="row">


        <div class="col-md-2 form-group">
          <label for="lastname" class="control-label">Job Title</label>
          <input type="text" class="form-control"  id="jobTitle" name="jobTitle" placeholder="Job Title" required>
        </div>
        <div class="col-md-2 form-group">
          <label for="jobName" class="control-label">Employees Needed</label>
          <input type="text" class="form-control"id="empNeeded" name="empNeeded"></textarea>
        </div>

        <div class=" col-md-1 form-group">
          <label for="jobName" class="control-label">Category</label>
          <input type="text" class="form-control"id="category" name="category"></textarea>
        </div>
      </div>

        <div class="col-4 form-group">
          <label for="description" class="control-label">Description</label>
          <textarea   class="form-control"  id="description" name="description"></textarea>
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
      }, {
        "orderable": true,
        //  "width":"10%"

      }, {
        "orderable": true,
        //    "width":"5%"
      },{
        "orderable": true,
        //    "width":"5%"
      }
    ],
    "language": {
      "sSearch": "  ",
      "searchPlaceholder": "search"
    },
    "ajax" : {
      url:"../database/fetch_postings.php",
      type:"POST"
    }
  });
}

function update_data(id, column_name, value)
{
  $.ajax({
    url:"../database/update.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
    }
  });
  setInterval(function(){
    $('#alert_message').html('');
  }, 5000);
}

$("#user_data").on('click', '.update', function(){
  var id = $(this).attr("id");
  var action = 'getPipeline';
  $.ajax({
    url:'../database/get_job.php',
    method:"POST",
    data:{id:id, action:action},
    dataType:"json",
    success:function(data){
      $('#jobModal').modal('show');
      $('#jobID').val(data.job_id);
      $('#jobTitle').val(data.title);
      $('#datePosted').val(data.date_posted);
      $('#empNeeded').val(data.employee_needed);
      $('#category').val(data.category);
      $('#description').val(data.description);
       $('.modal-title').html("<i class='fa fa-plus'></i> Edit Job Details");
       $('#action').val('updateJob');
       $('#save').val('Save');
    }
  });
});

$("#jobModal").on('submit','#jobForm', function(event){
  event.preventDefault();
  $('#save').attr('disabled','disabled');
  var formData = $(this).serialize();
  console.log(formData)
  var jobTitle = jQuery('input[name="jobTitle"]').val();
  var empNeeded = jQuery('input[name="empNeeded"]').val();
  var category = jQuery('input[name="category"]').val();
  var description = jQuery('input[name="description"]').val();
  console.log(jobTitle);
   $.ajax({
    url:"../database/update_job.php",
    method:"POST",
    data:formData,
    success:function(data){
      $('#jobForm')[0].reset();
      $('#jobModal').modal('hide');
      $('#save').attr('disabled', false);
      $('#user_data').DataTable().ajax.reload(null,false);
      console.log(formData);
    }
  });
});

$(document).on('click', '.delete',function(){
  var id=$(this).attr("id");
  var action = 'get_job';
  $.ajax({
    url:'../database/get_job.php',
    method:"POST",
    data:{id:id, action:action},
    dataType:"json",
    error: function(xhr, error){
        console.log(xhr); console.log(error);
    },
    success:function(data){
      var job_title =data.title;
      bootbox.prompt({
        size: "large",
        title: "Delete",
        inputType: 'radio',
        inputOptions: [{
         text: "Delete the job '"+job_title+ "'",
         value: '1',
        }],
       callback: function(result) {
          if (result == 1) {
            $.ajax({
              url:"../database/delete_job.php",
              method: "POST",
              data: {id:id},
              success:function(data){
                $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                //  $('#user_data').DataTable().destroy();
                //fetch_data();
                $('#user_data').DataTable().ajax.reload(null,false);
              }
            });
            setInterval(function(){
              $('#alert_message').html('');
            }, 5000);
          }
        }
      });
    }
  });
});
});
</script>
<?php include "footer.php" ?>
