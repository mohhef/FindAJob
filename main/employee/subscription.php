<?php include "header.php" ?>

</br></br>
</br>

<div class="container bg-white" id="rcorners1">

    <div id="alert_message"></div>

    <div class="current-info"></div>

    <label class="mr-2 font-weight-bold" for="inlineFormCustomSelectO">Choose a Category</label>
    </br>
    <form name="myForm" id="formid" onsubmit="return validateForm()" method="POST">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="basic" value="basic" checked>
            <label class="form-check-label" for="prime">
                Basic -- Free
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="prime" value="prime">
            <label class="form-check-label" for="prime">
                Prime -- 10$/Month
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="gold" value="gold">
            <label class="form-check-label" for="gold">
                Gold -- 20$/Month
            </label>
        </div>
        </br>
        <input type="submit" id="sub" value="Submit and continue to payment" class="btn btn-primary"
            style="margin-bottom:20px;">
    </form>
</div>

<script>
$(document).ready(function() {
        $.post("../database/current_payment_info.php", {}).done(function(data) {
            $result = $.parseJSON(data);
            console.log($result);
            $('.current-info').html(
                "<div>Your current subscription is:  <strong>" + $result.category + "</strong></div></br><div>Your current Payment ID is:  <strong>" + $result["preferred_method"] + "</strong></div></br>"
            );
        });
});

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
                        user_type: "employee",
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