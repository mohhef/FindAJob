<div class="container-fluid" id="rcorners1">

    <div class="d-flex flex-row justify-content-between">
        <strong>Chequing Table</strong>
        <button type="button" name="add" class="btn btn-primary btn-xs add" id="add">Add</button>
    </div>
    </br>
    </br>
    <div class="table-responsive">
        <div id="alert_message"></div>
        <table id="chequing_data" class="display nowrap table table-borderless table-striped" style="">
            <thead>
                <tr>
                    <th></th>
                    <th>Account Number</th>
                    <th>Bank Number</th>
                    <th>Transit Number</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div id="chequingUpdateModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form method="post" id="chequingForm" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" align="left">Edit Chequing</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2 form-group">
                                <label for="accountNo" class="control-label">Account Number</label>
                                <div class="account-no"></div>
                            </div>
                            <div class="col-md-2 form-group">
                                <label for="bankNo" class="control-label">Bank Number</label>
                                <input type="text" class="form-control" id="bankNo" name="bankNo"
                                    placeholder="Bank Number">
                            </div>
                            <div class="col-md-1 form-group">
                                <label for="transitNo" class="control-label">Transit Number</label>
                                <input type="text" class="form-control" id="transitNo" name="transitNo"
                                    placeholder="Transit Number">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="submit"></div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
$(document).ready(function() {
    // document.body.style.zoom="100%"
    fetch_data();

    function fetch_data() {
        var dataTable = $('#chequing_data').DataTable({
            "bootstrap": true,
            "sDom": "Rlfrtip",
            "bAutoWidth": false,
            "responsive": true,
            "scrollY": "660px",
            "scrollX": true,
            "scrollCollapse": true,
            "processing": true,
            "serverSide": true,
            "aLengthMenu": [
                [10, 25, 30, -1],
                [10, 25, 30, "All"]
            ],
            "pageLength": 25,
            "bInfo": false,
            //    "order" : [],
            "columns": [{
                "orderable": false,
                // "width":"25px"
            },{
                "orderable": true,
                // "width":"25px"
            }, {
                "orderable": true,
                //  "width":"15%"
            }, {
                "orderable": false,
                //  "width":"15%"
            }, {
                "orderable": false,
                //    "width":"21%"
            }, {
                "orderable": false,
                //    "width":"25%"
            }],
            "language": {
                "sSearch": "  ",
                "searchPlaceholder": "search"
            },
            "ajax": {
                url: "../database/fetch_chequing.php",
                type: "POST"
            }
        });
    }

    $(document).on('click', '.add', {
        type: 'Create'
    }, showChequingModal);
    $("#chequing_data").on('click', '.update', {
        type: 'Update'
    }, showChequingModal);

    function showChequingModal(event) {
        var type = event.data.type;
        if (type == "Update") {
            updateChequing($(this))
        } else {
            createChequing()
        }

    };

    function updateChequing(th) {
        var account_no = th.attr("id");
        var action = 'getPipeline';
        $.ajax({
            url: '../database/get_chequing.php',
            method: "POST",
            data: {
                account_no: account_no,
                action: action
            },
            dataType: "json",
            success: function(data) {
                $('#chequingUpdateModal').modal('show');
                $('#accountNo').val(data.account_no);
                $('#bankNo').val(data.bank_no);
                $('#transitNo').val(data.transit_no);
                $('.modal-title').html("<i class='fa fa-plus'></i> Update Chequing Details");
                $('.submit').html(
                    "<input type='submit' name='save' id='save' class='btn btn-info modal-save submit_update' value='Save' />"
                );
                $('.account-no').html(
                    "<input disabled type='text' class='form-control' id='accountNo' name='accountNo' placeholder='Account Number' value=" + account_no + ">"
                );
                $('#action').val('update_data');
                $('#save').val('Save');
            }
        });
    }

    function createChequing() {
        $('#chequingUpdateModal').modal('show');
        $('.modal-title').html("<i class='fa fa-plus'></i> Create Chequing Details");
        $('.submit').html(
            "<input type='submit' name='save' id='save' class='btn btn-info modal-save submit_create' value='Save' />"
        );
        $('.account-no').html(
            "<input type='text' class='form-control' id='accountNo' name='accountNo' placeholder='Account Number'>"
        );
    }

    $("#chequingUpdateModal").on('click', '.submit_update', function(event) {
        event.preventDefault();
        $('#save').attr('disabled', 'disabled');
        var accountNo = jQuery('input[name="accountNo"]').val();
        var bankNo = jQuery('input[name="bankNo"]').val();
        var transitNo = jQuery('input[name="transitNo"]').val();
        var formData = {
            account_no: accountNo,
            bank_no: bankNo,
            transit_no: transitNo
        }
        $.ajax({
            url: "../database/update_chequing.php",
            method: "POST",
            data: formData,
            success: function(data) {
                $('#chequingForm')[0].reset();
                $('#chequingUpdateModal').modal('hide');
                $('#save').attr('disabled', false);
                $('#chequing_data').DataTable().ajax.reload(null, false);
            }
        });
    });

    $("#chequingUpdateModal").on('click', '.submit_create', function(event) {
        event.preventDefault();
        $('#save').attr('disabled', 'disabled');
        var accountNo = jQuery('input[name="accountNo"]').val();
        var bankNo = jQuery('input[name="bankNo"]').val();
        var transitNo = jQuery('input[name="transitNo"]').val();
        $.post("../database/create_chequing.php", {
            post_chequing: true,
            account_no: accountNo,
            bank_no: bankNo,
            transit_no: transitNo,
        });
        $('#chequingForm')[0].reset();
        $('#chequingUpdateModal').modal('hide');
        $('#save').attr('disabled', false);
        $('#chequing_data').DataTable().ajax.reload(null, false);
    });

    $(document).on('click', '.delete', function() {
        var account_no = $(this).attr("id");
        var action = 'get_chequing';
        $.ajax({
            url: '../database/get_chequing.php',
            method: "POST",
            data: {
                account_no: account_no,
                action: action
            },
            dataType: "json",
            error: function(xhr, error) {
                console.log(xhr);
                console.log(error);
            },
            success: function(data) {
                var $account_no = data.account_no;
                bootbox.prompt({
                    size: "large",
                    title: "Delete",
                    inputType: 'radio',
                    inputOptions: [{
                        text: "Delete the chequing with account number: '" +
                        $account_no + "'",
                        value: '1',
                    }],
                    callback: function(result) {
                        if (result == 1) {
                            $.ajax({
                                url: "../database/delete_chequing.php",
                                method: "POST",
                                data: {
                                    account_no: $account_no
                                },
                                success: function(data) {
                                    $('#alert_message').html(
                                        '<div class="alert alert-success"> Deleted Successfully the Following: ' +
                                        data.account_no + '</div>');
                                    $('#chequing_data').DataTable()
                                        .ajax.reload(null, false);
                                }
                            });
                            setInterval(function() {
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