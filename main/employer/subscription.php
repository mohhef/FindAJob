<?php include "header.php" ?>

</br></br>
</br>

<div class="container bg-white" id="rcorners1">

    <div id="alert_message"></div>

    <label class="mr-2 font-weight-bold" for="inlineFormCustomSelectO">Choose a Category</label>
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
        <input type="submit" id="sub" value="Submit and continue to payment" class="btn btn-primary"
            style="margin-bottom:20px;">
    </form>
</div>

<script>
function validateForm() {
    event.preventDefault();
    var category_list = document.getElementsByName('category');
    for (i = 0; i < category_list.length; i++) {
        if (category_list[i].checked)
            var category = category_list[i].value
    }
    $(document).ready(function() {
        bootbox.confirm("Category: " + category,
            function(result) {
                if (result == true) {
                    $.post("../database/update_category.php", {
                        user_type: "employer",
                        category: category
                    });
                }
                var url = "../shared/payment.php";
                window.location = url;
            });
    });

}
</script>
<?php include "footer.php"?>