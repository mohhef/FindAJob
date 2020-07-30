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
      url:"database/fetch_postings.php",
      type:"POST"
    }
  });
}
$(document).on('click', '.delete',function(){
  var id=$(this).attr("id");
  var action = 'getPipeline';
  $.ajax({
    url:'database/updatePipeline.php',
    method:"POST",
    data:{id:id, action:action},
    dataType:"json",
    success:function(data){
      var pipename =data.pipeline_name;
      var sysname = data.system_name;
      var osname = data.os_name;
      var jobname = data.job_name;

      bootbox.prompt({
        size: "large",
        title: "Delete",
        inputType: 'radio',
        inputOptions: [{
         text: "Delete the job '"+data.job_name+ "' from '"+data.system_name+"'",
         value: '1',
        },{
         text: "<span style=\"color:blue;\">For " + data.system_name + " only:</span> " + "Delete the pipeline '"+pipename+ "' and all associated jobs<br>",
         value: '2',
       }, {
         text: "<span style=\"color: blue;\">For all systems:</span> " + "Delete the pipeline '"+pipename+ "' and all associated jobs<br><p style='color:red;font-size:85%;margin-bottom:-20px;'>Warning: this will delete the pipeline from ALL systems</p>",
         value: '3',
       }],
       callback: function(result) {
          if (result == 1) {
            console.log(result);
            $.ajax({
              url:"database/delete.php",
              method: "POST",
              data: {id:id},
              success:function(data){
                $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                //  $('#user_data').DataTable().destroy();
                //fetch_data();
                $('#user_data').DataTable().ajax.reload(null,false);

                $.ajax({
                  type: "POST",
                  url: "database/job_deleted.php",
                  data: {systemname:sysname, osname:osname, pipename:pipename, jobname:jobname},
                  success: function() {
                    console.log("email sent successfully");
                  }
                });

              }
            });
            setInterval(function(){
              $('#alert_message').html('');
            }, 5000);
          }
          if(result == 2){
            $.ajax({
              url:"database/deletesomepipes.php",
              method: "POST",
              data: {id:id, pipename:pipename, sysname:sysname},
              success:function(data){
                $('#alert_message').html('<div class="alert alert-success">'+"All pipeline "+data+'</div>');
                //  $('#user_data').DataTable().destroy();
                //fetch_data();
                $('#user_data').DataTable().ajax.reload(null,false);

                $.ajax({
                  type: "POST",
                  url: "database/pipeline_deleted.php",
                  data: {systemname:sysname, osname:osname, pipename:pipename, jobname:jobname},
                  success: function() {
                    console.log("email sent successfully");
                  }
                });

              }
            });
            setInterval(function(){
              $('#alert_message').html('');
            }, 5000);
          }
          if(result == 3){
            $.ajax({
              url:"database/deleteallpipes.php",
              method: "POST",
              data: {id:id, pipename:pipename},
              success:function(data){
                $('#alert_message').html('<div class="alert alert-success">'+"All pipeline "+data+'</div>');
                //  $('#user_data').DataTable().destroy();
                //fetch_data();
                $('#user_data').DataTable().ajax.reload(null,false);

                $.ajax({
                  type: "POST",
                  url: "database/pipeline_deleted2.php",
                  data: {systemname:sysname, osname:osname, pipename:pipename, jobname:jobname},
                  success: function() {
                    console.log("email sent successfully");
                  }
                })

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
<?php include "footer.php"?>
