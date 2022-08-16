$(document).ready(function() {
    load_product_data();
    load_admin_product_data();
    load_showroom_data();
    load_faq_data();
});

function load_product_data(division_id = "") {
    var dataTable = $('#product_data').DataTable({
        "createdRow": function(row, data, dataIndex) {
            if (data[3] == 1) {
                $(row).find('td:eq(2) button').addClass('existing_class_btn');
            } else if (data[3] == 2) {
                $(row).find('td:eq(2) button').addClass('upcoming_class_btn');
            } else if (data[3] == 3) {
                $(row).find('td:eq(2) button').addClass('archive_class_btn');
            }
        },
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "admin/function/product_process.php?process_type=getFrontendProducts",
            type: "POST",
            dataType: 'json',
            data: {
                division_id: division_id
            }
        },
        "columnDefs": [{
            "targets": [0, 1],
            "orderable": false,
        }, ],
        "lengthMenu": [
            [10, 250, 500, -1],
            [10, 250, 500, "All"]
        ]
    });
}

function get_division_wise_product_data(division_id) {
    $('#product_data').DataTable().destroy();
    if (division_id) {
        load_product_data(division_id);
    } else {
        load_product_data();
    }
}

function load_showroom_data(division_id = "") {
    var dataTable = $('#showroom_list').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "admin/function/showroom_process.php?process_type=getFrontendShowrooms",
            type: "POST",
            dataType: 'json',
            data: {
                division_id: division_id
            }
        },
        "columnDefs": [{
            "targets": [0, 1],
            "orderable": false,
        }, ],
        "lengthMenu": [
            [10, 250, 500, -1],
            [10, 250, 500, "All"]
        ]
    });
}

function get_division_wise_showroom_data(division_id) {
    $('#showroom_list').DataTable().destroy();
    if (division_id) {
        load_showroom_data(division_id);
    } else {
        load_showroom_data();
    }
}

function load_faq_data(division_id = "", is_status = "") {
    var dataTable = $('#faq_list_data').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "function/faq_process.php?process_type=getAllFAQData",
            type: "POST",
            dataType: 'json',
            data: {
                division_id: division_id,
                is_status: is_status
            }
        },
        "columnDefs": [{
            "targets": [0, 1, 2],
            "orderable": false,
        }, ],
        "lengthMenu": [
            [10, 250, 500, -1],
            [10, 250, 500, "All"]
        ]
    });
}

function get_division_wise_faq_data(division_id) {
    $('#faq_list_data').DataTable().destroy();
    if (division_id) {
        load_faq_data(division_id);
    } else {
        load_faq_data();
    }
}

function get_dropdown_wise_faq_data() {
    $('#faq_list_data').DataTable().destroy();
    var division_id = $("#division_id").val();
    var is_status = $("#is_status").val();
    load_faq_data(division_id, is_status);
}

function load_admin_product_data(division_id = "") {
    var dataTable = $('#product_list_data').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "function/product_process.php?process_type=getAdminProductsList",
            type: "POST",
            dataType: 'json',
            data: {
                division_id: division_id
            }
        },
        "columnDefs": [{
            "targets": [0, 1],
            "orderable": false,
        }, ],
        "lengthMenu": [
            [10, 250, 500, -1],
            [10, 250, 500, "All"]
        ]
    });
}

function get_division_wise_admin_product_data(division_id) {
    $('#product_list_data').DataTable().destroy();
    if (division_id) {
        load_admin_product_data(division_id);
    } else {
        load_admin_product_data();
    }
}

function saveNewQueryData() {
    var url = baseUrl + "admin/function/faq_process.php?process_type=save_new_query_data";
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        data: $("#new_quires_entry_form").serialize(),
        success: function(response) {
            if (response.status == "success") {
                swal("Success", response.message, "success");
                setTimeout(function() {
                    location.reload();
                }, 2000);
            } else {
                swal("Error", response.message, "error");
            }
        }
    });
}