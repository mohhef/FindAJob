<?php include "../helpers/session.php" ?>
<?php
require_once("../controllers/AuthController.php");
require_once("../controllers/AdminController.php");
$auth = new AuthController();
$admin = new AdminController();
$employees = $auth->getEmployees();
$employers = $auth->getEmployers();
$jobs = $admin->getJobs();
$offers = $admin->getOffers();
$apps = $admin->getApplications();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("../helpers/header.php"); ?>
    <title>Web Career</title>
    <link rel="stylesheet" href="../css/index.css"/>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="justify-content: space-between;">
    <a class="navbar-brand" href="#">Admin Dashboard</a>
    <form class="form-inline my-2 my-lg-0">
        <button class="btn btn-outline-success my-2 my-sm-0" type="button" onclick="logout()">Log Out</button>
    </form>
</nav>
<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                    Employee Table
                </button>
            </h2>
        </div>

        <div id="collapseOne" class="collapse collapsed" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                    <div class="container">
                      <table id="employee-table" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                          <tr>
                              <th>Username</th>
                              <th>Category</th>
                              <th>Prefered Method of Payment</th>
                              <th>Email</th>
                              <th>Balance</th>
                              <th>Last Payment</th>
                              <th>Status</th>
                          </tr>
                          </thead>
                      </table>
                    </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseOne">
                    Employer Table
                </button>
            </h2>
        </div>

        <div id="collapseTwo" class="collapse collapsed" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                    <div class="container">
                        <table id="employer-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Category</th>
                                <th>Telephone Number</th>
                                <th>Company Name</th>
                                <th>Prefered Method of Payment</th>
                                <th>Email</th>
                                <th>Balance</th>
                                <th>Last Payment</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree"
                        aria-expanded="true" aria-controls="collapseThree">
                    Activate/Deactivate a User
                </button>
            </h2>
        </div>

        <div id="collapseThree" class="collapse collapsed" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <form id="employeeLoginForm">
                    <div class="container">
                        <label for="admin_username"><b>Username</b></label>
                        <input id="admin_username" type="text" placeholder="Enter Username" />

                        <button type="button" onclick="activateUser()">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingFour">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour"
                        aria-expanded="true" aria-controls="collapseFour">
                    Jobs Table
                </button>
            </h2>
        </div>

        <div id="collapseFour" class="collapse collapsed" aria-labelledby="headingFour" data-parent="#accordionExample">
            <div class="card-body">
                <div class="container">
                    <table id="jobs-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Job ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date Posted</th>
                            <th>Employees Needed</th>
                            <th>Category</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingFive">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive"
                        aria-expanded="true" aria-controls="collapseFive">
                    Delete a Job
                </button>
            </h2>
        </div>

        <div id="collapseFive" class="collapse collapsed" aria-labelledby="headingFive" data-parent="#accordionExample">
            <div class="card-body">
                <div class="container">
                    <label for="job_id"><b>Job ID</b></label>
                    <input id="job_id" type="text" placeholder="Enter Job ID" />

                    <button type="button" onclick="deleteJob()">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingSix">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSix"
                        aria-expanded="true" aria-controls="collapseFive">
                    Offers Table
                </button>
            </h2>
        </div>

        <div id="collapseSix" class="collapse collapsed" aria-labelledby="headingSix" data-parent="#accordionExample">
            <div class="card-body">
                <div class="container">
                    <table id="offers-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Job ID</th>
                            <th>Title</th>
                            <th>Employee</th>
                            <th>Employer</th>
                            <th>Offer Status</th>
                            <th>Accepted?</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingSeven">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSeven"
                        aria-expanded="true" aria-controls="collapseSeven">
                    Applications Table
                </button>
            </h2>
        </div>

        <div id="collapseSeven" class="collapse collapsed" aria-labelledby="headingSeven" data-parent="#accordionExample">
            <div class="card-body">
                <div class="container">
                    <table id="application-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Job ID</th>
                            <th>Title</th>
                            <th>User Name</th>
                            <th>Application Status</th>
                            <th>Date Applied</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php include "../helpers/footer.php" ?>
<script>
    const employees = <?php echo json_encode($employees); ?>;
    $(document).ready(function() {
        $('#employee-table').DataTable(
            {data: employees,
                select: {
                    style:    'os',
                    selector: 'td:first-child'
                }}
        );
    })
    const employers = <?php echo json_encode($employers)?>;
    $(document).ready(function() {
        $('#employer-table').DataTable(
            {data: employers}
        );
    })
    const jobs = <?php echo json_encode($jobs) ?>;
    $(document).ready(function() {
        $('#jobs-table').DataTable(
            {data: jobs}
        );
    });
    const offers = <?php echo json_encode($offers) ?>;
    $(document).ready(function() {
        $('#offers-table').DataTable(
            {data: offers}
        );
    });
    const applications = <?php echo json_encode($apps) ?>;
    $(document).ready(function() {
        $('#application-table').DataTable(
            {data: applications}
        );
    });

    function activateUser(){
        const username = $('input[id=admin_username]').val();
        const json = {
            "username": username,
        }
        $.post('../service/admin/activate_deactivate_user.php', json, function(data){
            if(!data){
                alert("could not fulfill request.");
                return;
            }
            const res = JSON.parse(data);
            if(res.result){
                location.reload();
            }else{
                alert("Username or Password is incorrect.");
            }
        })
    }

    function deleteJob(){
        const jobid = $('input[id=job_id]').val();
        const json = {
            "job_id": jobid,
        }
        $.post('../service/admin/delete_job.php', json, function(data){
            if(!data){
                alert("could not fulfill request.");
                return;
            }
            const res = JSON.parse(data);
            if(res.result){
                location.reload();
            }else{
                alert("Username or Password is incorrect.");
            }
        })
    }

    function logout(){
        setCookie("admin_username", null, -1);
        location.reload();
    }
</script>

<script src="../js/util.js"></script>
