<?php session_start();
?>
<?php include "header.php" ?>
</br></br>
</br>

<div class="container bg-white" id="rcorners1">
  <!-- <button type="button" id="buttonmodal" class="btn btn-default float-sm-right" data-toggle="modal" data-target="#exampleModalLong">
    <a class="fa fa-question float-right" data-toggle="modal" style="font-size:20px"></a>
  </button> -->
  <div id="alert_message"></div>
  <form name="myForm"  id="formid" onsubmit="return validateForm()" method="POST">
    <div class="form-row">
      <label class="my-1 mr-2 font-weight-bold" for="inlineFormCustomSelectPref">Job Title</label>
      <input id="job_title" class="form-control" autoComplete="off" list="suggestions"/>
    </div>
  </br>

  <div class="form-row">
    <div class="col-md-3 mb-3" >
    </div>
    <div class="col-md-3 mb-3">
    </div>
    <div class="wraps col-md-3 mb-6">
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label class="mr-2 font-weight-bold" for="inlineFormCustomSelectO">Number of employees needed</label>
      <input id="emp_no" class="form-control" autoComplete="off" list="suggestions"/>
      <div class="w-auto pt-2">
        <div class="dropdown">
            <label class="mr-2 font-weight-bold" for="inlineFormCustomSelectO">Category</label>
            <select class="form-control" id="category_sel">
                <option>Full-time</option>
                <option>Part-time</option>
                <option>Intern</option>
            </select>
        </div>
        </div>
    </div>
    <div class="col-md-9 mb-3">
     <label class="mr-2 font-weight-bold" for="inlineFormCustomSelectO">Description</label>
     <textarea class="form-control" id="description_box" name="fname" rows="7"></textarea>
    </div>
  </div>
</br>

<input type="submit" id="sub" value="Submit" class="col-sm-1 ml-2 mt-3 btn btn-primary" style="margin-bottom:20px;">
</form>
</div>
<script>
    function validateForm(){
        event.preventDefault();
        var job_title = document.getElementById("job_title").value;
        var emp_no = document.getElementById("emp_no").value;
        console.log(emp_no);
        var category_sel = document.getElementById("category_sel").value;
        var description_box = document.getElementById("description_box").value;
        // if (x == "" || y== "" || z=="" || g=="") {
        //     bootbox.alert("Fields Missing!");
        //     return false;
        // }
        //else{
            
      $(document).ready(function () {
        bootbox.confirm("Job Title: "+ job_title
        + "<br>"+
        "Employee numbers: " +emp_no
        + "<br>"+
        "Category: " +category_sel
        + "<br>"+
        "Description: "+description_box,

        function(result){
            if(result==true){
                console.log(job_title)
                $.post("../database/insert_job.php",{
                post_job: true,
                job_title: job_title,
                emp_no:emp_no,
                category_sel: category_sel,
                description_box: description_box
              });
            }
        })
    //}
})
    }
</script>
<?php include "footer.php"?>

