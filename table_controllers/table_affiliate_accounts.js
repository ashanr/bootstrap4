function load_registered_affiliate_table(text, callBack) {
    var tableData = '';
    $.post("table_models/table_model_affiliate.php", {table: 'load_affiliate_customer_table', text: text}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr><th colspan="6" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
            $('.table_registered_clients tbody').html('').append(tableData);
        } else {
            $.each(e, function (index, qData) {
                index++;
                tableData += '<tr>';
                tableData += '<td>' + index + '</td>';
                tableData += '<td>' + qData.email + '</td>';
                tableData += '<td>' + qData.firstname + '</td>';
                tableData += '<td>' + (qData.parent ? qData.parent :'-')+ '</td>';
                tableData += '<td>' + qData.tree + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-oval btn-info  btn-sm sel_notification" value="' + qData.entity_id + '"><i class="fa fa-edit fa-lg"></i>&nbsp;Select</button>\n\
                             <button class="btn btn-oval btn-danger  btn-sm delete_notification" value="' + qData.entity_id + '"><i class="fa fa-times-circle fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';
            });

            $('.table_registered_clients tbody').html('').append(tableData);

            $('.sel_notification').click(function () {
                var id = $(this).val();
                $('#id').val($(this).val());
                select_notification(id);
                //  quotation_select_customer(cus_id);
                // chosenRefresh();
            });
            $('.delete_notification').click(function () {
                var id = $(this).val();
                $('#id').val($(this).val());
                delete_notification(id);


            });

        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, 'json');
}

function show_update_btn() {

    if ($('#btnUpdate').hasClass('d-none')) {
        $('#btnUpdate').removeClass('d-none');
    }

    if (!$('#btnSave').hasClass('d-none')) {
        $('#btnSave').addClass('d-none');
    }

    if ($('#btnReset').hasClass('d-none')) {
        $('#btnReset').removeClass('d-none');
    }
}
function hide_update_btn() {

    if ($('#btnSave').hasClass('d-none')) {
        $('#btnSave').removeClass('d-none');
    }
    if (!$('#btnUpdate').hasClass('d-none')) {
        $('#btnUpdate').addClass('d-none');
    }
    if (!$('#btnReset').hasClass('d-none')) {
        $('#btnReset').addClass('d-none');
    }
}

function load_quotation_edit(q_id) {
    var win = window.open('form_quotation.php?q_id=' + q_id, '_blank');
    win.focus();
}

function select_notification(id, callBack) {
    var tableData = '';
    show_update_btn();
    $.post("table_models/table_model_notification.php", {table: 'select_notification', id: id}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {


        } else {



            $.each(e, function (index, qData) {

                $('#title').val(qData.title);
                $('#message').val(qData.message);
                $('#pub_date').val(qData.publish_date);
                $('#exp_date').val(qData.expire_date);
                $('#datepicker').val(qData.added_date);

            });

        }

    }, 'json');
}

function search_notification(text, callBack) {
    var tableData = '';
    $.post("table_models/table_quotation.php", {table: 'customer_search_res', text: text}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr><th colspan="6" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
            $('.cus_search_result tbody').html('').append(tableData);
        } else {
            $.each(e, function (index, qData) {
                index++;
                tableData += '<tr>';
                tableData += '<td>' + qData.cus_inv_name + '</td>';
                tableData += '<td>' + qData.cus_address + '</td>';
                tableData += '<td>' + qData.cus_phone1 + '</td>';
                tableData += '<td>' + qData.cus_phone2 + '</td>';
                tableData += '<td>' + qData.cus_email1 + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-custom-save sel_found_cust" value="' + qData.cus_id + '"><i class="fa fa-hand-o-up fa-lg"></i>&nbsp;Select</button></div></td>';
                tableData += '</tr>';
            });
            $('.cus_search_result tbody').html('').append(tableData);
            $('.sel_found_cust').click(function () {
                $('.customer_ComboBox').val($(this).val());
                chosenRefresh();
            });
        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, 'json');
}



