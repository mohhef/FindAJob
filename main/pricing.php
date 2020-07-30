
<?php include "header.php" ?>

</br></br>
</br>

<div class="container bg-white" id="rcorners1">
  
    <div id="alert_message"></div>

    <div>Please choose your category: </div>
    </br>
    <form name="myForm" id="formid" onsubmit="return validateForm()" method="POST">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="prime" value="prime" checked>
            <label class="form-check-label" for="prime">
                Prime -- 50$/Month
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="gold" value="gold">
            <label class="form-check-label" for="gold">
                Gold -- 100$/Month
            </label>
        </div>

        </br>
        <input type="submit" id="sub" value="Submit" class="col-sm-1 ml-2 mt-3 btn btn-primary" style="margin-bottom:20px;">
    </form>
</div>

<script>
    // TODO: Check if employer or user side
    function validateForm() {
        event.preventDefault();
        var category_list = document.getElementsByName('category');
        for (i = 0; i < category_list.length; i++) { 
            if(category_list[i].checked) 
            var category = category_list[i].value
        } 
            
        $(document).ready(function () {
            bootbox.confirm("Category: " + category,

            // TODO: fix username when aloys is done with his task
            function(result) {
                if(result == true){
                    $.post("database/db_interface.php",{
                        update_category: true,
                        user_name: 'caren',
                        category: category
                    });
                }
            })
        })
    }
</script>
<?php include "footer.php"?>

