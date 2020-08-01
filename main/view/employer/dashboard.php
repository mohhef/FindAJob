<?php require("../../helpers/session.php")?>

<?
require("../../controllers/CategoryController.php");
require("../../controllers/JobController.php");
$category = new CategoryController();
$categories = $category->getCategories();

$job = new JobController();
$jobs = $job->getJobs();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("../../helpers/header.php"); ?>
    <title>Web Career</title>
    <link rel="stylesheet" href="../../css/index.css"/>
</head>
<body>
<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    View Your Jobs
                </button>
            </h2>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <table id="jobTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <th>Job ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Employees Needed</th>
                    <th>Category</th>
                    <th>Date Posted</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    Post a Job
                </button>
            </h2>
        </div>

        <div id="collapseTwo" class="collapse collapsed" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <form id="postJobForm">
                    <div class="container">
                        <label for="job_title"><b>Title</b></label>
                        <input type="text" placeholder="Enter Title" id="job_title" required /><br/><br/>

                        <label for="job_description"><b>Description</b></label><br />
                        <textarea id="job_description" rows="5" cols="120"></textarea><br/><br/>

                        <label for="job_employee_needed"><b>Employees Needed</b></label>
                        <input type="text" placeholder="Enter Employees Needed" id="job_employee_needed" required /><br/><br/>

                        <label for="dropdown"><b>Category</b></label>
                        <div class="dropdown" id="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" style="width: 15%;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Category
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <? foreach($categories as $c){
                                    echo '<a class="dropdown-item" id='.$c.'>'.$c.'</a>';
                                }
                                ?>
                            </div>
                        </div><br/>

                        <button type="button" onclick="postJob()">Submit</button>
                    </div>
                    <br />
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    Update a Job
                </button>
            </h2>
        </div>

        <div id="collapseThree" class="collapse collapsed" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <form id="postJobForm">
                    <div class="container">
                        <label for="update_job_id"><b>Title</b></label>
                        <input type="text" placeholder="Enter Job Id" id="update_job_id" required /><br/><br/>

                        <label for="update_job_title"><b>Title</b></label>
                        <input type="text" placeholder="Enter Title" id="update_job_title" required /><br/><br/>

                        <label for="update_job_description"><b>Description</b></label><br />
                        <textarea id="update_job_description" rows="5" cols="120"></textarea><br/><br/>

                        <label for="update_job_employee_needed"><b>Employees Needed</b></label>
                        <input type="text" placeholder="Enter Employees Needed" id="update_job_employee_needed" required /><br/><br/>

                        <label for="update_dropdown"><b>Category</b></label>
                        <div class="dropdown" id="dropdown2">
                            <button class="btn btn-secondary dropdown-toggle" style="width: 15%;" type="button" id="update_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Category
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <? foreach($categories as $c){
                                    echo '<a class="dropdown-item" id='.$c.'>'.$c.'</a>';
                                }
                                ?>
                            </div>
                        </div><br/>

                        <button type="button" onclick="updateJob()">Submit</button>
                    </div>
                    <br />
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseThree">
                        Delete a Job
                    </button>
                </h2>
            </div>

            <div id="collapseFour" class="collapse collapsed" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <form id="postJobForm">
                        <div class="container">
                            <label for="delete_job_id"><b>Title</b></label>
                            <input type="text" placeholder="Enter Job Id" id="delete_job_id" required /><br/><br/>

                            <button type="button" onclick="deleteJob()">Submit</button>
                        </div>
                        <br />
                    </form>
                </div>
            </div>


        </div>

</div>

<?php require("../../helpers/footer.php"); ?>
<script src="../../js/employer/dashboard.js"></script>
<script>
    // dropdown menu
    $(function(){
        $(".dropdown-menu a").click(function(){
            $("#dropdownMenuButton:first-child").text($(this).text());
            $("#dropdownMenuButton:first-child").val($(this).text());
        })
    })

    // dropdown menu update
    $(function(){
        $(".dropdown-menu a").click(function(){
            $("#update_dropdown:first-child").text($(this).text());
            $("#update_dropdown:first-child").val($(this).text());
        })
    })

    // table rendering
    const data = <?php echo json_encode($jobs);?>;
    $('#jobTable').DataTable({

        data: data.data
    })
</script>
</body>
</html>

