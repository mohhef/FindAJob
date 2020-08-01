<?php require("../../helpers/session.php")?>

<?
require("../../controllers/CategoryController.php");
$category = new CategoryController();
$categories = $category->getCategories();
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
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Post a Job
                </button>
            </h2>
        </div>

        <div id="collapseOne" class="collapse collapsed" aria-labelledby="headingOne" data-parent="#accordionExample">
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
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Employer
                </button>
            </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <form id="employerLoginForm">
                    <div class="container">
                        <label for="uname"><b>User</b></label>
                        <input type="text" placeholder="Enter Username" id="employer_username" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" id="employer_password" required>

                        <button type="button" onclick="employerLogin()">Login</button>
                    </div>
                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" class="registerbtn" onclick="window.location.href='employer_register.php'">Register</button>
                        <span class="psw"><a href="view/auth/employer_forgot_password.php">Forgot password?</a></span>
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
    $(function(){
        $(".dropdown-menu a").click(function(){
            $("#dropdownMenuButton:first-child").text($(this).text());
            $("#dropdownMenuButton:first-child").val($(this).text());
        })
    })
</script>
</body>
</html>

