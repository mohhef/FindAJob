<div class="container-fluid" id="rcorners1">
    <div id="alert_message"></div>

    <div class="d-flex flex-row justify-content-between">
        <strong>Card Table</strong>
        <button type="button" name="create" class="btn btn-primary btn-xs create" id="create">Add</button>
    </div>

    </br></br>

    <div class="table-responsive">
        <div id="alert_message"></div>
        <table id="card_data" class="display nowrap table table-borderless table-striped" style="">
            <thead>
                <tr>
                    <th></th>
                    <th>Card Number</th>
                    <th>Name</th>
                    <th>Expiration Date</th>
                    <th>Automatic/Manual</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
        </table>
        </br>
        <div class="d-flex flex-row-reverse">
            <button type="button" class="btn btn-primary verify" data-dismiss="modal">Submit</button>
        </div>
        </br>
    </div>

    <div id="cardModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <form method="post" id="cardForm" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" align="left">Edit Card Details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="card_no" class="control-label">Card Number</label>
                                    <div class="card-no"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="name" class="control-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="expiration_date" class="control-label">Expiration Date</label>
                                    <input type="text" class="form-control" id="expiration_date" name="expiration_date"
                                        placeholder="YYYY/MM/DD">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="automatic_manual" class="control-label">Automatic/Manual</label>
                                    <input type="text" class="form-control" id="automatic_manual"
                                        name="automatic_manual" placeholder="Automatic/Manual">
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
            var dataTable = $('#card_data').DataTable({
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
                }, {
                    "orderable": true,
                    // "width":"25px"
                }, {
                    "orderable": true,
                    //  "width":"15%"
                }, {
                    "orderable": true,
                    //    "width":"25%"
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
                    url: "../database/fetch_card.php",
                    type: "POST"
                }
            });
        }

        $(document).on('click', '.create', {
            type: 'Create'
        }, showCardModal);

        $("#card_data").on('click', '.update-card', {
            type: 'Update'
        }, showCardModal);

        function showCardModal(event) {
            var type = event.data.type;
            if (type == "Update") {
                updateCard($(this).attr("id"));
            } else if (type == "Create") {
                createCard();
            }
        };

        function updateCard(id) {
            var card_no = id;
            var action = 'getPipeline';
            $.ajax({
                url: '../database/get_card.php',
                method: "POST",
                data: {
                    card_number: card_no,
                    action: action
                },
                dataType: "json",
                success: function(data) {
                    $('#cardModal').modal('show');
                    $('#card_number').val(data.card_number);
                    $('#name').val(data.name);
                    $('#expiration_date').val(data.expiration_date);
                    $('#automatic_manual').val(data.automatic_manual);
                    $('.modal-title').html("<i class='fa fa-plus'></i> Update Card Details");
                    $('.submit').html(
                        "<input type='submit' name='save' class='btn btn-info modal-save submit-update-card' value='Save' />"
                    );
                    $('.card-no').html(
                        "<input disabled type='text' class='form-control' id='card_number' name='card_number' placeholder='Card Number' value=" +
                        data.card_number + ">"
                    );
                }
            });
        }

        function createCard() {
            $('#cardModal').modal('show');
            $('.modal-title').html("<i class='fa fa-plus'></i> Create Card Details");
            $('.submit').html(
                "<input type='submit' name='save' id='save' class='btn btn-info modal-save submit_create_card' value='Save' />"
            );
            $('.card-no').html(
                "<input type='text' class='form-control' id='card_number' name='card_number' placeholder='Card Number'>"
            );
        }

        $(document).on('click', '.verify', function(event) {
            event.preventDefault();
            var $id = $('input[name="optradio"]:checked').val();
            $.post("../database/update_payment.php", {
                id: $id
            }).done(function() {
                $('#alert_message').html(
                    '<div class="alert alert-success"> Data Updated Successfully</div>');
                setInterval(function() {
                    $('#alert_message').html('');
                }, 5000);
            })

        });

        $("#cardModal").on('click', '.submit_create_card', function(event) {
            event.preventDefault();
            $('#save').attr('disabled', 'disabled');
            var card_number = jQuery('input[name="card_number"]').val();
            var name = jQuery('input[name="name"]').val();
            var expiration_date = jQuery('input[name="expiration_date"]').val();
            var automatic_manual = jQuery('input[name="automatic_manual"]').val();
            $.post("../database/create_card.php", {
                post_card: true,
                card_number: card_number,
                name: name,
                expiration_date: expiration_date,
                automatic_manual: automatic_manual
            });
            $('#cardForm')[0].reset();
            $('#cardModal').modal('hide');
            $('#save').attr('disabled', false);
            $('#card_data').DataTable().ajax.reload(null, false);
        });

        $("#cardModal").on('click', '.submit-update-card', function(event) {
            event.preventDefault();
            $('#save').attr('disabled', 'disabled');
            var card_number = jQuery('input[name="card_number"]').val();
            var name = jQuery('input[name="name"]').val();
            var expiration_date = jQuery('input[name="expiration_date"]').val();
            var automatic_manual = jQuery('input[name="automatic_manual"]').val();
            var formData = {
                card_number: card_number,
                name: name,
                expiration_date: expiration_date,
                automatic_manual: automatic_manual
            };
            $.ajax({
                url: "../database/update_card.php",
                method: "POST",
                data: formData,
                success: function(data) {
                    $('#cardForm')[0].reset();
                    $('#cardModal').modal('hide');
                    $('#save').attr('disabled', false);
                    $('#card_data').DataTable().ajax.reload(null, false);
                }
            });
        });

        $(document).on('click', '.delete-card', function() {
            var card_no = $(this).attr("id");
            var action = 'get_card';
            $.ajax({
                url: '../database/get_card.php',
                method: "POST",
                data: {
                    card_number: card_no,
                    action: action
                },
                dataType: "json",
                error: function(xhr, error) {
                    console.log(xhr);
                    console.log(error);
                },
                success: function(data) {
                    bootbox.prompt({
                        size: "large",
                        title: "Delete",
                        inputType: 'radio',
                        inputOptions: [{
                            text: "Delete the card with card number: '" +
                                card_no + "'",
                            value: '1',
                        }],
                        callback: function(result) {
                            if (result == 1) {
                                $.ajax({
                                    url: "../database/delete_card.php",
                                    method: "POST",
                                    data: {
                                        card_number: card_no
                                    },
                                    success: function(data) {
                                        $('#alert_message').html(
                                            '<div class="alert alert-success">' +
                                            data + '</div>');
                                        $('#card_data').DataTable()
                                            .ajax.reload(null,
                                                false);
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