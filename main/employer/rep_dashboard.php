<?php require("../helpers/session.php")?>

<?
require("../controllers/RepController.php");
$repsController = new RepController();
$user_name = $_COOKIE['employer_username'];
$reps = $repsController->getReps($user_name);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("../helpers/header.php"); ?>
    <title>Web Career</title>
    <link rel="stylesheet" href="../css/index.css"/>
</head>
<body>
<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    View Your Representatives
                </button>
            </h2>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <table id="jobTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Balance</th>
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
                    Create a Representative
                </button>
            </h2>
        </div>

        <div id="collapseTwo" class="collapse collapsed" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <form id="postJobForm">
                    <div class="container">
                        <label for="insert_rep_username"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" id="insert_rep_username" required /><br/><br/>

                        <label for="insert_rep_email"><b>Email</b></label><br />
                        <input type="text" placeholder="Enter Email" id="insert_rep_email" required /><br/><br/>

                        <label for="insert_rep_password"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" id="insert_rep_password" required /><br/><br/>

                        <label for="insert_rep_confirm_password"><b>Confirm Password</b></label>
                        <input type="password" placeholder="Enter Password" id="insert_rep_confirm_password" required /><br/><br/>

                        <button type="button" onclick="createRep()">Submit</button>
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
                    Update a Representative's Password
                </button>
            </h2>
        </div>

        <div id="collapseThree" class="collapse collapsed" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <form id="postJobForm">
                    <div class="container">
                        <label for="update_username"><b>Representative's Username</b></label>
                        <input type="text" placeholder="Enter Username" id="update_username" required /><br/><br/>

                        <label for="update_password"><b>New Password</b></label>
                        <input type="password" placeholder="Enter New Password" id="update_password" required /><br/><br/>

                        <button type="button" onclick="updateRep()">Submit</button>
                    </div>
                    <br />
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseThree">
                        Delete a Representative
                    </button>
                </h2>
            </div>

            <div id="collapseFour" class="collapse collapsed" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <form id="postJobForm">
                        <div class="container">
                            <label for="delete_username"><b>Username</b></label>
                            <input type="text" placeholder="Enter Username" id="delete_username" required /><br/><br/>

                            <button type="button" onclick="deleteRep()">Submit</button>
                        </div>
                        <br />
                    </form>
                </div>
            </div>
        </div
    </div>

    <?php require("../helpers/footer.php"); ?>
    <script src="../js/employer/rep_dashboard.js"></script>
    <script>
        // table rendering
        const data = <?php echo json_encode($reps);?>;
        $('#jobTable').DataTable({
            data: data.data
        })
    </script>
</body>
</html>

