function madeCheckBoxString(chkClassName, stringStoreID) {
    var ar = [];
    var es;
    var v;
    if ($(this).is(':checked')) {
        es = $(chkClassName + ':checked');
        es.each(function (index) {
            ar.push($(this).val());
        });
    } else {
        es = $(chkClassName + ':checked');
        es.each(function (index) {
            ar.push($(this).val());
        });
    }
    v = ar.join(',');
    $(stringStoreID).val(v);
}

function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode != 46 && charCode > 31
            && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function getBaseURL() {
    var url = location.href; // entire url including querystring - also: window.location.href;
    var baseURL = url.substring(0, url.indexOf('/', 14));
    if (baseURL.indexOf('http://localhost') != -1) {
// Base Url for localhost
        var url = location.href; // window.location.href;
        var pathname = location.pathname; // window.location.pathname;
        var index1 = url.indexOf(pathname);
        var index2 = url.indexOf("/", index1 + 1);
        var baseLocalUrl = url.substr(0, index2);
        return baseLocalUrl + "/";
    } else {
// Root Url for domain name
        return baseURL + "/";
    }

}

function tableSorter(tableName) {
    $(tableName).tablesorter();
}

function delayLoading(callBack, waitingTime) {
    setTimeout(function () {
        callBack();
    }, waitingTime);
}

function submitBulkDataByPost(submitPage, submitData) {
    $('<form action="' + submitPage + '" method="POST"/>')
            .append($(submitData))
            .appendTo($(document.body))
            .submit();
}

function submitSingleDataByPost(submitPage, submitDataName, submitDataValue) {
    $('<form action="' + submitPage + '" method="POST"/>')
            .append($('<input type="hidden" name="' + submitDataName + '" value ="' + submitDataValue + '">'))
            .appendTo($(document.body))
            .submit();
}

function submitSingleDataByPostSpecial(submitPage, submitDataName1, submitDataValue1, submitDataName2, submitDataValue2) {
    $('<form action="' + submitPage + '" method="POST"/>')
            .append($('<input type="hidden" name="' + submitDataName1 + '" value ="' + submitDataValue1 + '">'))
            .append($('<input type="hidden" name="' + submitDataName2 + '" value ="' + submitDataValue2 + '">'))
            .appendTo($(document.body))
            .submit();
}

function submitMultipleDataByPostSpecial(submitPage, submitDataName1, submitDataValue1, submitDataName2, submitDataValue2, submitDataName3, submitDataValue3) {
    $('<form action="' + submitPage + '" method="POST"/>')
            .append($('<input type="hidden" name="' + submitDataName1 + '" value ="' + submitDataValue1 + '">'))
            .append($('<input type="hidden" name="' + submitDataName2 + '" value ="' + submitDataValue2 + '">'))
            .append($('<input type="hidden" name="' + submitDataName3 + '" value ="' + submitDataValue3 + '">'))
            .appendTo($(document.body))
            .submit();
}

function submitMultipleDataByPostSpecial_ii(submitPage, submitDataName1, submitDataValue1, submitDataName2, submitDataValue2, submitDataName3, submitDataValue3) {
    $('<form action="' + submitPage + '" method="POST"/>')
            .append($('<input type="hidden" name="' + submitDataName1 + '" value ="' + submitDataValue1 + '">'))
            .append($('<input type="hidden" name="' + submitDataName2 + '" value ="' + submitDataValue2 + '">'))
            .append($('<input type="hidden" name="' + submitDataName3 + '" value ="' + submitDataValue3 + '">'))
            .appendTo($(document.body))
            .submit();
}


function submitSingleDataByPostNewTab(submitPage, submitDataName, submitDataValue, submitDataName2, submitDataValue2) {
    $('<form action="' + submitPage + '" method="POST"/>')
            .append($('<input type="hidden" name="' + submitDataName + '" value ="' + submitDataValue + '">'))
            .append($('<input type="hidden" name="' + submitDataName2 + '" value ="' + submitDataValue2 + '">'))
            .appendTo($(document.body))
            .submit();
}

function alertFadeOut() {
    $(".alert").delay(200).fadeOut(2000);
}

function chosenRefresh() {
    $("select").trigger("chosen:updated");
}

function timelyRedirect(url, delay) {
    setTimeout(function () {
        window.location = url;
    }, delay);
}

function refreshBootstrapSwitch() {
    $('.switch')['bootstrapSwitch']();
}

function modalShowEventCallBack(modalData, callback) {
    modalData.modal("show").on('shown.bs.modal', function () {
        callback();
    });
}

function confirmSepecial(heading, question, cancelButtonTxt, okButtonTxt, callback1, callback2) {
    var confirmModal = $('<div class="modal fade">' +
            '<div class="modal-dialog">' +
            '<div class="modal-content">' +
            '<div class="modal-header">' +
            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
            '<h4 class="modal-title">' + heading + '</h4>' +
            '</div>' +
            '<div class="modal-body">' +
            '<p>' + question + '</p>' +
            '</div>' +
            '<div class="modal-footer">' +
            '<button type="button" class="btn btn-default" data-dismiss="modal" id="cancelbtn">' + cancelButtonTxt + '</button>' +
            '<button type="button" class="btn btn-primary" id="okButton">' + okButtonTxt + '</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>');
    confirmModal.find('#okButton').click(function (event) {
        callback1();
        confirmModal.modal('hide');
    });
    confirmModal.find('#cancelbtn').click(function (event) {
        callback2();
        confirmModal.modal('hide');
    });
    confirmModal.modal('show');
}

function confirm(heading, question, cancelButtonTxt, okButtonTxt, callback) {
    var confirmModal = $('<div class="modal fade">' +
            '<div class="modal-dialog">' +
            '<div class="modal-content">' +
            '<div class="modal-header">' +
            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
            '<h4 class="modal-title">' + heading + '</h4>' +
            '</div>' +
            '<div class="modal-body">' +
            '<p>' + question + '</p>' +
            '</div>' +
            '<div class="modal-footer">' +
            '<button type="button" class="btn btn-default" data-dismiss="modal">' + cancelButtonTxt + '</button>' +
            '<button type="button" class="btn btn-primary" id="OkButton">' + okButtonTxt + '</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>');
    confirmModal.find('#OkButton').click(function (event) {
        callback();
        confirmModal.modal('hide');
    });
    confirmModal.modal('show');
}

function logout() {
    alertify.confirm("Are you sure want to log out the system", function (e) {
        if (e) {
            $.post("views/databaseViews.php", {proccess: 'logout'}, function (e) {
                timelyRedirect("dashboard.php", 0);
            });
        }
    });
}


function alertifyMsgDisplay(jsonArray, msgTime, sucess, fail) {
    $.each(jsonArray, function (index, msgData) {
        if (msgData.msgType === 1) {
            alertify.success(msgData.msg, msgTime);
            if (sucess !== undefined) {
                if (typeof sucess === 'function') {
                    sucess();
                }
            }
        } else if (msgData.msgType === 2) {
            alertify.error(msgData.msg, msgTime);
            if (fail !== undefined) {
                if (typeof sucess === 'function') {
                    fail();
                }
            }
        }
    });
}

function starterBgSlideTransition() {
    $('body').backstretch([
        "img/starterSlides/slide_04.jpg"
    ], {
        duration: 3000, fade: 1000
    });
}

// ************************** END OF SYSTEM CONFIG FUNCTIONS ********************************** //

function maker_save() {
//   @Sachith
    var maker_name = $('#maker_name').val();
    var maker_desc = $('#maker_desc').val();
    if (maker_name.length !== 0) {
        $.post("views/commenSettingView.php", {action: 'maker_save', maker_name: maker_name, maker_desc: maker_desc}, function (e) {
            alertifyMsgDisplay(e, 2000);
            load_maker_table();
            reset_maker();
        }, "json");
    } else {
        alertify.error("Enter valid Maker Name", 2500)
    }
}

function maker_update() {
    var maker_id = $('#maker_id').val();
    var maker_name = $('#maker_name').val();
    var form_data = {
        maker_id: maker_id,
        maker_name: $('#maker_name').val(),
        maker_desc: $('#maker_desc').val()
    };
    if (maker_name.length !== 0 && maker_id.length !== 0) {
        $.post('views/commenSettingView.php', {action: 'maker_update', form_data: form_data}, function (e) {
            alertifyMsgDisplay(e, 2000);
            load_maker_table();
            reset_maker();
        }, 'json');
    } else {
        alertify.error("Enter valid Data", 2500)
    }
}

function select_maker(maker_id) {
//@Sachith 
    if (parseInt(maker_id) !== 0) {
        $.post("views/commenSettingView.php", {action: 'maker_select', maker_id: maker_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                alertify.error("No Data Found", 1000);
            } else {
                show_maker_btn();
                $.each(e, function (index, qData) {
                    $('#maker_id').val(qData.maker_id);
                    $('#maker_name').val(qData.maker_name);
                    $('#maker_desc').val(qData.desc);
                });
            }
        }, "json");
    } else {
        alertify.error("Invalid Sub category selection", 1000);
    }
}

function kitz_customer_save() {
    var c_name = $('#c_name').val();
    var form_data = {
        c_name: c_name,
        c_inv_name: $('#c_inv_name').val(),
        c_addr: $('#c_addr').val(),
        c_inv_addr: $('#c_inv_addr').val(),
        c_phone1: $('#c_phone1').val(),
        c_phone2: $('#c_phone2').val(),
        c_email1: $('#c_email1').val(),
        c_email2: $('#c_email2').val(),
        c_other: $('#c_other').val(),
        c_comments: $('#c_comments').val(),
        c_lease: $('#leaseCo_id').val()
    };
    if (c_name.length !== 0) {
        $.post('views/commenSettingView.php', {action: 'kitz_customer_save', form_data: form_data}, function (e) {
            alertifyMsgDisplay(e, 2000);
            kitz_load_customers();
            reset_customer();
        }, 'json');
    } else {
        alertify.error('Enter a valid customer Name', 2000);
    }
}

function kitz_select_costomer(cus_id) {
    $.post('views/commenSettingView.php', {action: 'kitz_select_costomer', cus_id: cus_id}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            alertify.error('Error in customer selection.', 2000);
        } else {
            $('#cus_id').val(e.cus_id);
            $('#c_name').val(e.cus_name);
            $('#c_inv_name').val(e.cus_inv_name);
            $('#c_addr').val(e.cus_address);
            $('#c_inv_addr').val(e.cus_inv_address);
            $('#c_phone1').val(e.cus_phone1);
            $('#c_phone2').val(e.cus_phone2);
            $('#c_email1').val(e.cus_email1)
            $('#c_email2').val(e.cus_email2)
            $('#c_other').val(e.other_contact);
            $('#c_comments').val(e.comments);
            $('#leaseCo_name').val(e.ls_name);
            $('#leaseCo_id').val(e.ls_id);
            show_customer_btn();
        }
    }, 'json');
}

function sam_select_costomer_local(cus_id) {
    $.post('views/commenSettingView.php', {action: 'kitz_select_costomer', cus_id: cus_id}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            alertify.error('Error in customer selection.', 2000);
        } else {
            $('#cust_id').val(e.cus_id);
            $('#cus_name').val(e.cus_name);
            $('#c_inv_name').val(e.cus_inv_name);
            $('#c_addr').val(e.cus_address);
            $('#c_inv_addr').val(e.cus_inv_address);
            $('#c_phone1').val(e.cus_phone1);
            $('#c_phone2').val(e.cus_phone2);
            $('#c_email1').val(e.cus_email1)
            $('#c_email2').val(e.cus_email2)
            $('#c_other').val(e.other_contact);
            $('#c_comments').val(e.comments);
            $('#leaseCo_name').val(e.ls_name);
            $('#leaseCo_id').val(e.ls_id);
            show_customer_btn();
        }
    }, 'json');
}
function select_customer_consignee(cus_id) {
    $.post('views/commenSettingView.php', {action: 'kitz_select_costomer', cus_id: cus_id}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            alertify.error('Error in customer selection.', 2000);
        } else {
            $('#cus_id').val(e.cus_id);
            $('#c_inv_name').val(e.cus_inv_name);
            $('#c_inv_addr').val(e.cus_inv_address);
            $('#consignee_name').val(e.ls_name);
            $('#consignee_address').val(e.ls_address);
//            show_customer_btn();
        }
    }, 'json');
}

function customer_update() {
    var c_id = $('#cus_id').val();
    var c_name = $('#c_name').val();
    var form_data = {
        c_id: c_id,
        c_name: $('#c_name').val(),
        c_inv_name: $('#c_inv_name').val(),
        c_addr: $('#c_addr').val(),
        c_inv_addr: $('#c_inv_addr').val(),
        c_phone1: $('#c_phone1').val(),
        c_phone2: $('#c_phone2').val(),
        c_email1: $('#c_email1').val(),
        c_email2: $('#c_email2').val(),
        c_other: $('#c_other').val(),
        c_comments: $('#c_comments').val(),
        c_lease: $('#leaseCo_id').val()
    };
    if (parseInt(c_id) > 0 && c_name.length !== 0) {
        $.post('views/commenSettingView.php', {action: 'kitz_customer_update', form_data: form_data}, function (e) {
            alertifyMsgDisplay(e, 2000);
            kitz_load_customers();
            reset_customer();
        }, 'json');
    } else {
        alertify.error('Enter a valid customer Name', 2000);
    }

}

function kitz_delete_customer(cus_id) {
    confirm("Delete Customer", "Are you sure you want to delete this customer?", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'kitz_delete_customer', cus_id: cus_id}, function (e) {
            alertifyMsgDisplay(e, 2000);
            kitz_load_customers();
            reset_customer();
        }, "json");
    });
}

function reset_customer() {
    $('#cus_id').val('');
    $('#c_name').val('');
    $('#c_inv_name').val('');
    $('#c_addr').val('');
    $('#c_inv_addr').val('');
    $('#c_phone1').val('');
    $('#c_phone2').val('');
    $('#c_email1').val('');
    $('#c_email2').val('');
    $('#c_other').val('');
    $('#c_comments').val('');
    $('#leaseCo_name').val('');
    $('#leaseCo_id').val('');
    reset_customer_btn();
}

function show_customer_btn() {
//   @Sachith
    if ($('#c_update_btn').hasClass('hidden')) {
        $('#c_update_btn').removeClass('hidden');
    }
    if (!$('#c_add_btn').hasClass('hidden')) {
        $('#c_add_btn').addClass('hidden');
    }
}
function reset_customer_btn() {
//   @Sachith
    if (!$('#c_update_btn').hasClass('hidden')) {
        $('#c_update_btn').addClass('hidden');
    }
    if ($('#c_add_btn').hasClass('hidden')) {
        $('#c_add_btn').removeClass('hidden');
    }
}

function show_maker_btn() {
//   @Sachith
    if ($('#maker_update_btn').hasClass('hidden')) {
        $('#maker_update_btn').removeClass('hidden');
    }
    if (!$('#maker_save_btn').hasClass('hidden')) {
        $('#maker_save_btn').addClass('hidden');
    }
}
function hide_maker_btn() {
//   @Sachith
    if (!$('#maker_update_btn').hasClass('hidden')) {
        $('#maker_update_btn').addClass('hidden');
    }
    if ($('#maker_save_btn').hasClass('hidden')) {
        $('#maker_save_btn').removeClass('hidden');
    }
}

function delete_maker(maker_id) {
//@Sachith 
    confirm("Delete Vehicle maker", "Are You Sure Want To Delete This record", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_maker', maker_id: maker_id}, function (e) {
            alertifyMsgDisplay(e, 2000);
            load_maker_table();
        }, "json");
    });
}


function reset_maker() {
    $('#maker_id').val('');
    $('#maker_name').val('');
    $('#maker_desc').val('');
    hide_maker_btn();
}

function vehicle_model_save() {
    var form_data = {
        maker_id: $('.maker_ComboBox').val(),
        model: $('#model_name').val(),
        desc: $('#model_desc').val(),
        web_oview: $('#web_ov').val()
    };
    $.post('views/commenSettingView.php', {action: 'add_vh_model', form_data: form_data}, function (e) {
        alertifyMsgDisplay(e, 2000);
        load_model_table($('.maker_ComboBox').val());
        reset_model();
    }, 'json');
}

function select_model(model_id) {
//@Sachith 
    if (parseInt(model_id) !== 0) {
        $.post("views/commenSettingView.php", {action: 'model_select', model_id: model_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                alertify.error("No Data Found", 1000);
            } else {
                $.each(e, function (index, qData) {
                    $('#model_id').val(qData.mod_id);
                    $('#model_name').val(qData.mod_name);
                    $('#model_desc').val(qData.mod_desc);
                    $('#web_ov').val(qData.mod_overview);
                });
                show_model_btn();
            }
        }, "json");
    } else {
        alertify.error("Invalid Sub category selection", 1000);
    }
}

function show_model_btn() {
//   @Sachith
    if ($('#model_updateDiv').hasClass('hidden')) {
        $('#model_updateDiv').removeClass('hidden');
    }
    if (!$('#model_save_btn').hasClass('hidden')) {
        $('#model_save_btn').addClass('hidden');
    }
}
function hide_model_btn() {
//   @Sachith
    if (!$('#model_updateDiv').hasClass('hidden')) {
        $('#model_updateDiv').addClass('hidden');
    }
    if ($('#model_save_btn').hasClass('hidden')) {
        $('#model_save_btn').removeClass('hidden');
    }
}

function delete_model(model_id) {
//@Sachith 
    confirm("Delete Vehicle Model", "Are You Sure Want To Delete This record", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_model', model_id: model_id}, function (e) {
            alertifyMsgDisplay(e, 2000);
            load_model_table($('.maker_ComboBox').val());
            reset_model();
        }, "json");
    });
}


function reset_model() {
    $('#model_id').val('');
    $('#model_name').val('');
    $('#model_desc').val('');
    $('#web_ov').val('');
    hide_model_btn();
}

function vehicle_model_update() {
    var form_data = {
        maker_id: $('.maker_ComboBox').val(),
        modle_id: $('#model_id').val(),
        model: $('#model_name').val(),
        desc: $('#model_desc').val(),
        web_oview: $('#web_ov').val()
    };
    $.post('views/commenSettingView.php', {action: 'model_update', form_data: form_data}, function (e) {
        alertifyMsgDisplay(e, 2000);
        load_model_table($('.maker_ComboBox').val());
        reset_model();
    }, 'json');
}
function save_supp() {
    var sup_code = $('#sup_code').val();
    var sup_name = $('#sup_name').val();
    var sup_name_for_invo = $('#sup_name_for_invo').val();
    var address = $('#address').val();
    var address_for_invo = $('#address_for_invo').val();
    var phone_no = $('#phone_no').val();
    var phone_no_for_invo = $('#phone_no_for_invo').val();
    var fax = $('#fax').val();
    var email = $('#email').val();
    var web = $('#web').val();
    var currency = $('#sup_currency').val();
    var suppbank_id = $('#suppbank_id').val();
    if (sup_code.length !== 0 && sup_name.length !== 0) {
        var data_array = {sup_code: sup_code,
            sup_name: sup_name,
            sup_name_for_invo: sup_name_for_invo,
            address: address,
            address_for_invo: address_for_invo,
            phone_no: phone_no,
            phone_no_for_invo: phone_no_for_invo,
            fax: fax,
            email: email,
            web: web,
            suppbank_id: suppbank_id,
            currency: currency}

        $.post("views/commenSettingView.php", {action: 'save_supp', form_data: data_array}, function (reply) {
            alertifyMsgDisplay(reply, 2000, function () {
                clear_sup_form();
                load_sup_reg_tbl();
            });
        }, 'json');
    } else {
        alertify.error("Enter valid Supplier Code & name", 2500);
    }
}

function clear_sup_form() {
    $('#supp_id').val("");
    $('#sup_code').val("");
    $('#sup_name').val("");
    $('#sup_name_for_invo').val("");
    $('#address').val("");
    $('#address_for_invo').val("");
    $('#phone_no').val("");
    $('#phone_no_for_invo').val("");
    $('#fax').val("");
    $('#email').val("");
    $('#web').val("");
    $('#suppbank_name').val("");
    $('#suppbank_id').val("");
}


function clear_clr_entry_form() {
//@AShan
    $('#vh_id').val("");
    $('#shipped_date').val("");
    $('#driver_name').val("");
    $('#vessel').val("");
    $('#refund').val("");
    $('#clearing_status').val("");
    $('#arrival_date').val("");
    $('#document_status').val("");
    $('#to_clearing_agent').val("");
    $('#duty').val("");
    $('#clearing_date').val("");
    $('#carrier_by').val("");
    $('#lc_no').val("");
    hide_supp_btn();
}

function show_supp_btn() {
//   @Sachith
    if ($('#btn_update_supp').hasClass('hidden')) {
        $('#btn_update_supp').removeClass('hidden');
    }
    if (!$('#btn_supp_add').hasClass('hidden')) {
        $('#btn_supp_add').addClass('hidden');
    }
}
function hide_supp_btn() {
//   @Sachith
    if (!$('#btn_update_supp').hasClass('hidden')) {
        $('#btn_update_supp').addClass('hidden');
    }
    if ($('#btn_supp_add').hasClass('hidden')) {
        $('#btn_supp_add').removeClass('hidden');
    }
}

function get_selected_supp_data(sup_id) {
    $.post("views/commenSettingView.php", {action: 'get_selected_supp_data', sup_id: sup_id}, function (reply) {
        if (reply === undefined || reply.length === 0 || reply === null) {
            alertify.error("No Data Found", 1000);
        } else {
            $.each(reply, function (index, data) {
                $('#supp_id').val(data.supp_id);
                $('#sup_code').val(data.supp_code);
                $('#sup_name').val(data.supp_name);
                $('#sup_name_for_invo').val(data.inv_name);
                $('#address').val(data.supp_address);
                $('#address_for_invo').val(data.inv_address);
                $('#phone_no').val(data.phone);
                $('#phone_no_for_invo').val(data.inv_phone);
                $('#fax').val(data.supp_fax);
                $('#email').val(data.supp_email);
                $('#web').val(data.web);
                $('#suppbank_id').val(data.bank_id);
                $('#suppbank_name').val(data.bank_name);
                $('#sup_currency').val(data.supp_currency);
                chosenRefresh();
            });
            show_supp_btn();
        }

    }, 'json');
}

function update_supp() {
    var sup_id = $('#supp_id').val();
    var sup_code = $('#sup_code').val();
    var sup_name = $('#sup_name').val();
    var sup_name_for_invo = $('#sup_name_for_invo').val();
    var address = $('#address').val();
    var address_for_invo = $('#address_for_invo').val();
    var phone_no = $('#phone_no').val();
    var phone_no_for_invo = $('#phone_no_for_invo').val();
    var fax = $('#fax').val();
    var email = $('#email').val();
    var web = $('#web').val();
    var currency = $('#sup_currency').val();
    var suppbank_id = $('#suppbank_id').val();
    if (sup_code.length !== 0 && sup_name.length !== 0 && parseInt(sup_id) > 0) {
        var data_array = {sup_id: sup_id,
            sup_code: sup_code,
            sup_name: sup_name,
            sup_name_for_invo: sup_name_for_invo,
            address: address,
            address_for_invo: address_for_invo,
            phone_no: phone_no,
            phone_no_for_invo: phone_no_for_invo,
            fax: fax,
            email: email,
            web: web,
            suppbank_id: suppbank_id,
            currency: currency
        }

        $.post("views/commenSettingView.php", {action: 'update_supp', form_data: data_array}, function (reply) {
            alertifyMsgDisplay(reply, 2000, function () {
                clear_sup_form();
                load_sup_reg_tbl();
            });
        }, 'json');
    } else {
        alertify.error("Enter valid Supplier Code & name", 2500);
    }
}

function delete_supplier(supp_id) {
//@Sachith 
    confirm("Delete Supplier", "Are You Sure Want To Delete This record", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_supplier', supp_id: supp_id}, function (e) {
            alertifyMsgDisplay(e, 2000);
            load_sup_reg_tbl();
        }, "json");
    });
}


function save_clearing_balance() {
//@Ashan

    var data_array = {
        cb_id: $('#cb_id').val(),
        agent_id: $('#agent_id').val(),
        agpay_date: $('#agpay_date').val(),
        ag_charge: $('#ag_charge').val(),
        ag_paid: $('#ag_paid').val(),
        pay_type: $('input:radio[name=rbt_itemType]:checked').val(),
        vh_id: $('#clearing_vehicle').val(),
        cus_id: $('#modi_custmr').val(),
        list: $('#list').val(),
        agpay_desc: $('#agpay_desc').val(),
        agpay_confirmed: $('input:radio[name=rbt_confirmStatus]:checked').val(),
        cb_model: $('#cb_model').val(),
        coordinator: $('#cb_coordinator').val(),
        cb_chassis_no: $('#cb_chassis_no').val(),
        cb_color: $('#cb_color').val(),
        cb_balance: $('#cb_last_balance').val(),
        cb_last_balance: $('#cb_last_balance').val()

    }

    $.post("views/commenSettingView.php", {action: 'save_clrBalance_entry', form_data: data_array}, function (reply) {
        alertifyMsgDisplay(reply, 2000, function () {
            clear_clrBalance_entry_form();
            load_clearBalance();
            window.location.href = 'view_clearing_balance_list.php';
            //load_clrBalance_textBox($('#ag_name').val());

        });
    }, 'json');
}

function update_cb() {
//@AShan

    var data_array = {
        cb_id: $('#cb_id').val(),
        agent_id: $('#agent_id').val(),
        agpay_date: $('#agpay_date').val(),
        ag_charge: $('#ag_charge').val(),
        ag_paid: $('#ag_paid').val(),
        pay_type: $('input:radio[name=rbt_itemType]:checked').val(),
        vh_id: $('#vh_id').val(),
        cus_id: $('#modi_custmr').val(),
        list: $('#list').val(),
        agpay_desc: $('#agpay_desc').val(),
        agpay_confirmed: $('input:radio[name=rbt_confirmStatus]:checked').val(),
        cb_model: $('#cb_model').val(),
        coordinator: $('#cb_coordinator').val(),
        cb_chassis_no: $('#cb_chassis_no').val(),
        cb_color: $('#cb_color').val(),
        cb_balance: $('#cb_balance').val(),
        cb_last_balance: $('#cb_last_balance').val()
    }
    $.post("views/commenSettingView.php", {action: 'update_clrBalance_entry', form_data: data_array}, function (reply) {
        alertifyMsgDisplay(reply, 2000, function () {
            $('#btn_clearing_balance_add').removeClass('hidden');
            $('#btn_clearing_balance_update').addClass('hidden');
            $('#btn_clearing_balance_reset').removeClass('hidden');
            // load_clrBalance_textBox($('#ag_name').val());
            clear_clrBalance_entry_form();
            show_cb_update_btn();
            load_clearBalance();
        });
    }, 'json');
}

function clear_clrBalance_entry_form() {
//@AShan
    $('#agpay_id').val("");
    $('#agpay_name').val("");
    $('#agpay_date').val("");
    $('#ag_charge').val("");
    $('#ag_paid').val("");
    $('#agpay_desc').val("");
    $('#cb_color').val("");
    $('#cb_balance').val("");
    hide_supp_btn();
}

function coordinator_add() {
    var co_sh_name = $('#co_short_name').val();
    var co_cat = $('.coord_category').val();
    if (co_sh_name.length > 0 && co_cat.length > 0) {
        var form_data = {
            co_name: $('#co_name').val(),
            co_short_name: co_sh_name,
            co_phone1: $('#co_phone1').val(),
            co_phone2: $('#co_phone2').val(),
            co_email1: $('#co_email1').val(),
            co_email2: $('#co_email2').val(),
            co_address: $('#co_address').val(),
            co_category: co_cat
        };
        $.post('views/commenSettingView.php', {action: 'add_coordinator', form_data: form_data}, function (e) {
            alertifyMsgDisplay(e, 2000);
            load_coordinator_table();
            reset_coordinator();
        }, 'json');
    } else {
        alertify.error('Enter a Short name and category');
    }
}

function reset_coordinator() {
    $('#coord_id').val('');
    $('#co_short_name').val('');
    $('#co_name').val('');
    $('#co_phone1').val('');
    $('#co_phone2').val('');
    $('#co_email1').val('');
    $('#co_email2').val('');
    $('#co_address').val('');
    $('#coord_uname').val('');
    $('#coord_password').val('');
    hide_coord_btn();
}

function show_coord_btn() {
//   @Sachith
    if ($('#co_updateDiv').hasClass('hidden')) {
        $('#co_updateDiv').removeClass('hidden');
    }
    if (!$('#co_save_btn').hasClass('hidden')) {
        $('#co_save_btn').addClass('hidden');
    }
}
function hide_coord_btn() {
//   @Sachith
    if (!$('#co_updateDiv').hasClass('hidden')) {
        $('#co_updateDiv').addClass('hidden');
    }
    if ($('#co_save_btn').hasClass('hidden')) {
        $('#co_save_btn').removeClass('hidden');
    }
}
function show_order_btn() {
//   @Sachith
    if ($('#order_update').hasClass('hidden')) {
        $('#order_update').removeClass('hidden');
    }
    if (!$('#order_save_btn').hasClass('hidden')) {
        $('#order_save_btn').addClass('hidden');
    }
    $('#vh_reserve_update').removeClass('hidden');
    $('#order_reserve_btn').addClass('hidden');
}
function hide_order_btn() {
//   @Sachith
    if (!$('#order_update').hasClass('hidden')) {
        $('#order_update').addClass('hidden');
    }
    $('#vh_reserve_update').addClass('hidden');
    $('#order_reserve_btn').removeClass('hidden');
    if ($('#order_save_btn').hasClass('hidden')) {
        $('#order_save_btn').removeClass('hidden');
    }
}

function select_coordinator(coord_id) {
//@Sachith 
    if (parseInt(coord_id) !== 0) {
        $.post("views/commenSettingView.php", {action: 'coord_select', coord_id: coord_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                alertify.error("No Data Found", 1000);
            } else {
                $.each(e, function (index, qData) {
                    $('#coord_id').val(qData.coordinator_id);
                    $('#co_short_name').val(qData.short_name);
                    $('#co_name').val(qData.coordinator_name);
                    $('#co_phone1').val(qData.phone);
                    $('#co_phone2').val(qData.phone2);
                    $('#co_email1').val(qData.email1);
                    $('#co_email2').val(qData.email2);
                    $('#co_address').val(qData.address);
                    $('.coord_category').val(qData.category);
                    $('#coord_uname').val(qData.username);
                });
                show_coord_btn();
                chosenRefresh();
            }
        }, "json");
    } else {
        alertify.error("Invalid selection", 1000);
    }
}

function delete_coordinator(coord_id) {
//@Sachith 
    confirm("Delete coordinator", "Are You Sure Want To Delete This record", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_coordintor', coord_id: coord_id}, function (e) {
            alertifyMsgDisplay(e, 2000);
            load_coordinator_table();
        }, "json");
    });
}
function delete_imageFrom_galary(pic_Id, vehicle_id) {
//** V!raj**/
    confirm("Delete coordinator", "Are You Sure Want To Delete This Picture", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_imageFrom_galary', pic_Id: pic_Id}, function (e) {
            veh_imageload_galary(vehicle_id);
            alertifyMsgDisplay(e, 2000);
        }, "json");
    });
}

function update_coordinator() {
    var coord_id = $('#coord_id').val();
    var co_short_name = $('#co_short_name').val();
    var co_name = $('#co_name').val();
    var co_phone1 = $('#co_phone1').val();
    var co_phone2 = $('#co_phone2').val();
    var co_email1 = $('#co_email1').val();
    var co_email2 = $('#co_email2').val();
    var co_address = $('#co_address').val();
    var coord_category = $('.coord_category').val();
    if (co_short_name.length !== 0 && co_name.length !== 0 && parseInt(coord_id) > 0) {
        var form_data = {
            coord_id: coord_id,
            co_name: co_name,
            co_short_name: co_short_name,
            co_phone: co_phone1,
            co_phone2: co_phone2,
            co_email1: co_email1,
            co_email2: co_email2,
            co_address: co_address,
            co_category: coord_category
        };
        $.post("views/commenSettingView.php", {action: 'update_coordinator', form_data: form_data}, function (reply) {
            alertifyMsgDisplay(reply, 2000, function () {
                reset_coordinator();
                load_coordinator_table();
            });
        }, 'json');
    } else {
        alertify.error("Enter valid Names", 2500);
    }
}

function save_coordinator_login() {
    var coord_id = $('#coord_id').val();
    var co_username = $('#coord_uname').val();
    var co_password = $('#coord_password').val();
    if (co_username.length !== 0 && co_password.length !== 0 && parseInt(coord_id) > 0) {
        var form_data = {
            coord_id: coord_id,
            co_username: co_username,
            co_password: co_password
        };
        $.post("views/commenSettingView.php", {action: 'save_coordinator_login', form_data: form_data}, function (reply) {
            alertifyMsgDisplay(reply, 2000, function () {
                $('#coord_loginModal').modal('hide');
                reset_coordinator();
                load_coordinator_table();
            });
        }, 'json');
    } else {
        alertify.error("Enter valid User Name and Password", 2500);
    }
}

function delete_coordinator_login(coord_id) {
//@Sachith 
    confirm("Delete coordinator", "Are you sure you want to remove this user account", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_coordintor_login', coord_id: coord_id}, function (e) {
            alertifyMsgDisplay(e, 2000);
            $('#coord_loginModal').modal('hide');
            reset_coordinator();
        }, "json");
    });
}

// developed by viraj
// developed by Sam_Rulz
function vehicleModification_save() {
    var modi_date = $('#modi_date').val();
    var modi_desc = $('#modi_desc').val();
    var modi_vehicle = $('#modi_vehicle').val();
    var modi_custmr = $('#modi_custmr').val();
    var modi_status = $('#modi_status').val();
    var modi_options = $('#modi_options').val();
    var modi_other_opt = $('#modi_other_options').val();
    if (modi_desc.length !== 0) {
        var form_data = {
            modi_date: modi_date,
            modi_desc: modi_desc,
            modi_vehicle: modi_vehicle,
            modi_custmr: modi_custmr,
            modi_status: modi_status,
            modi_options: modi_options,
            modi_other_opt: modi_other_opt
        };
        $.post("views/commenSettingView.php", {action: 'vehicleModification_save', data_arr: form_data}, function (reply) {
            alertifyMsgDisplay(reply, 2000);
            vehModification_reset();
            vehicleModiTable($('.vahicle_code_combo').val());
        }, 'json');
    } else {
        alert("Please Add Description");
    }
}
function image_vicible_statusChange(img_id, vi_status) {
    $.post("views/commenSettingView.php", {action: 'image_vicible_statusChange', img_id: img_id, vi_status: vi_status}, function (reply) {
        alertifyMsgDisplay(reply, 2000);
    }, 'json');
}
function vehModification_reset() {
    $('#modi_desc').val('');
    $('#modi_options').val('');
    $('#modi_other_options').val('');
    $('#mod_save_div').removeClass('hidden');
    $('#mod_update_div').addClass('hidden');
    $('#mod_reset_div').removeClass('hidden');
}

function order_save() {
    var order_data = {
        customer_ComboBox: $('.customer_ComboBox').val(),
        maker_ComboBox: $('.maker_ComboBox').val(),
        model_ComboBox: $('.model_ComboBox').val(),
        vehicle_year: $('#vehicle_year').val(),
        vehicle_colour: $('#vehicle_colour').val(),
        vehicle_milage: $('#vehicle_milage').val(),
        vehicle_options: $('#vehicle_options').val(),
        vehicle_cus_con: $('#vehicle_cus_con').val(),
        vehicle_action: $('#vehicle_action').val(),
        vehicle_price: $('#vehicle_price').val(),
        vehicle_advance: $('#vehicle_advance').val(),
        vehicle_gb: $('#vehicle_gb').val(),
        vehicle_desc: $('#vehicle_desc').val(),
        vehicle_pay_op: $('#vehicle_pay_op').val(),
        coordinator_ComboBox: $('.coordinator_ComboBox').val(),
        vehicle_ord_date: $('#vehicle_ord_date').val(),
        manual_bill_num: $('#manual_bill_num').val()
    };
    $.post('views/commenSettingView.php', {action: 'order_save', order_data: order_data}, function (e) {
        alertifyMsgDisplay(e, 2000);
        reset_order();
    }, 'json');
}

function order_reserve_save() {
    var order_data = {
        customer_ComboBox: $('.customer_ComboBox').val(),
        reserve_vh: $('.vahicle_code_combo_filtered').val(),
        maker_ComboBox: $('.maker_ComboBox').val(),
        model_ComboBox: $('.model_ComboBox').val(),
        vehicle_year: $('#vehicle_year').val(),
        vehicle_colour: $('#vehicle_colour').val(),
        vehicle_milage: $('#vehicle_milage').val(),
        vehicle_options: $('#vehicle_options').val(),
        vehicle_cus_con: $('#vehicle_cus_con').val(),
        vehicle_action: $('#vehicle_action').val(),
        vehicle_price: $('#vehicle_price').val(),
        vehicle_advance: $('#vehicle_advance').val(),
        vehicle_gb: $('#vehicle_gb').val(),
        vehicle_desc: $('#vehicle_desc').val(),
        vehicle_pay_op: $('#vehicle_pay_op').val(),
        coordinator_ComboBox: $('.coordinator_ComboBox').val(),
        vehicle_ord_date: $('#vehicle_ord_date').val(),
        manual_bill_num: $('#manual_bill_num').val()
    };
    $.post('views/commenSettingView.php', {action: 'order_reserve_save', order_data: order_data}, function (e) {
        alertifyMsgDisplay(e, 2000);
        $('#vh_reserveModal').modal('hide');
        reset_order();
    }, 'json');
}

function order_reserve_update() {
    var order_data = {
        customer_ComboBox: $('.customer_ComboBox').val(),
        reserve_vh: $('.vahicle_code_combo_filtered').val(),
        maker_ComboBox: $('.maker_ComboBox').val(),
        model_ComboBox: $('.model_ComboBox').val(),
        vehicle_year: $('#vehicle_year').val(),
        vehicle_colour: $('#vehicle_colour').val(),
        vehicle_milage: $('#vehicle_milage').val(),
        vehicle_options: $('#vehicle_options').val(),
        vehicle_cus_con: $('#vehicle_cus_con').val(),
        vehicle_action: $('#vehicle_action').val(),
        vehicle_price: $('#vehicle_price').val(),
        vehicle_advance: $('#vehicle_advance').val(),
        vehicle_gb: $('#vehicle_gb').val(),
        vehicle_desc: $('#vehicle_desc').val(),
        vehicle_pay_op: $('#vehicle_pay_op').val(),
        coordinator_ComboBox: $('.coordinator_ComboBox').val(),
        vehicle_ord_date: $('#vehicle_ord_date').val(),
        ord_id: $('#order_id').val(),
        manual_bill_num: $('#manual_bill_num').val()
    };
    $.post('views/commenSettingView.php', {action: 'order_reserve_update', order_data: order_data}, function (e) {
        alertifyMsgDisplay(e, 2000);
        $('#vh_reserveModal').modal('hide');
        reset_order();
    }, 'json');
}

function reset_order() {
    $('#vehicle_year').val('');
    $('#vehicle_colour').val('');
    $('#vehicle_milage').val('');
    $('#vehicle_options').val('');
    $('#vehicle_cus_con').val('');
    $('#vehicle_action').val('');
    $('#vehicle_price').val('');
    $('#vehicle_advance').val('');
    $('#vehicle_gb').val('');
    $('#vehicle_desc').val('');
    $('#vehicle_pay_op').val('');
//    $('#vehicle_ord_date').val('');
    $('#manual_bill_num').val('');
    hide_order_btn();
}


function select_order_details(oorder_id) {
//@Sachith 
    if (parseInt(oorder_id) !== '') {
        $.post("views/commenSettingView.php", {action: 'oorder_select', oorder_id: oorder_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                alertify.error("No Data Found", 1000);
            } else {
                var res_vh = 0;
                $.each(e, function (index, qData) {
                    load_makers_cmb(qData.maker_id, function () {
                        load_model_cmb($('.maker_ComboBox').val(), qData.model_id);
                    });
                    load_coordinator_cmb(qData.coordinator_id);
                    load_customer_cmb(qData.cus_id);
                    $('#vehicle_year').val(qData.vh_year);
                    $('#vehicle_colour').val(qData.vh_color);
                    $('#vehicle_milage').val(qData.milage_max);
                    $('#vehicle_options').val(qData.vh_options);
                    $('#vehicle_cus_con').val(qData.cus_conditions);
                    $('#vehicle_action').val(qData.order_actions);
                    $('#vehicle_price').val(qData.max_price);
                    $('#vehicle_advance').val(qData.pay_advance);
                    $('#vehicle_gb').val(qData.gb);
                    $('#vehicle_desc').val(qData.description);
                    $('#vehicle_pay_op').val(qData.pay_comments);
                    $('#vehicle_ord_date').val(qData.order_date);
                    var res_vh = qData.vh_reserved;
                });
                show_order_btn();
                chosenRefresh();
            }
        }, "json");
    } else {
        alertify.error("Invalid selection", 1000);
    }
}

function order_update() {
    var order_update = {
        customer_ComboBox: $('.customer_ComboBox').val(),
        maker_ComboBox: $('.maker_ComboBox').val(),
        model_ComboBox: $('.model_ComboBox').val(),
        vehicle_year: $('#vehicle_year').val(),
        vehicle_colour: $('#vehicle_colour').val(),
        vehicle_milage: $('#vehicle_milage').val(),
        vehicle_options: $('#vehicle_options').val(),
        vehicle_cus_con: $('#vehicle_cus_con').val(),
        vehicle_action: $('#vehicle_action').val(),
        vehicle_price: $('#vehicle_price').val(),
        vehicle_advance: $('#vehicle_advance').val(),
        vehicle_gb: $('#vehicle_gb').val(),
        vehicle_desc: $('#vehicle_desc').val(),
        vehicle_pay_op: $('#vehicle_pay_op').val(),
        coordinator_ComboBox: $('.coordinator_ComboBox').val(),
        vehicle_ord_date: $('#vehicle_ord_date').val(),
        order_id: $('#order_id').val()
    };
    $.post('views/commenSettingView.php', {action: 'order_updates', order_update: order_update}, function (e) {
        alertifyMsgDisplay(e, 2000);
        reset_order();
        load_view_orders_table();
    }, 'json');
}

function order_cancel(order_id) {
    confirm("Cancel Order", "Are You Sure You ant To Cancel This record", "No", "Yes", function () {
        $.post('views/commenSettingView.php', {action: 'order_cancel', order_id: order_id}, function (e) {
            alertifyMsgDisplay(e, 2000);
//        reset_order();
            load_view_orders_table($('#cmb_inv_status').val());
        }, 'json');
    });
}


function drch_remove(drch_id) {
    confirm("Cancel Order", "Are You Sure You ant To Cancel This record", "No", "Yes", function () {
        $.post('views/commenSettingView.php', {action: 'drch_cancel', drch_id: drch_id}, function (e) {
            alertifyMsgDisplay(e, 2000);
            //location.reload();
            load_view_driver_balance_table();
        }, 'json');
    });
}

function vehicle_add(uploadImage) {
    var isreg = parseInt($("input[type='radio'][name='rbt_itemType']:checked").val());
    var form_data = {
        supp_id: $('.v_supplier').val(),
        supp_code: $('.v_supplier option:selected').text(),
        model_combo: $('.model_ComboBox').val(),
        coord_id: $('.coordinator_ComboBox').val(),
        v_ch_code: $('#v_ch_code').val().toUpperCase(),
        v_ch_num: $('#v_ch_num').val().toUpperCase(),
        v_eng_cc: $('#v_eng_cc').val(),
        v_eng_code: $('#v_eng_code').val().toUpperCase(),
        v_eng_num: $('#v_eng_num').val().toUpperCase(),
        v_year: $('#v_year').val(),
        v_pckg: $('#v_pckg').val(),
        v_color: $('#v_color').val(),
        v_fuel: $('#v_fuel').val(),
        v_trans: $('#v_trans').val(),
        v_seats: $('#v_seats').val(),
        v_doors: $('#v_doors').val(),
//        v_eval: $('#v_eval').val(),
        v_eval: '-',
        v_drive: $('#v_drive').val(),
        model_no: $('#model_no').val(),
        hs_code: $('#hs_code').val(),
        v_milage: $('#v_milage').val(),
        v_opt: $('#v_opt').val(),
        v_other: $('#v_other').val(),
        v_bid: $('#v_bid').val(),
        v_auct: $('#v_auct').val().toUpperCase(),
        v_lot: $('#v_lot').val().toUpperCase(),
        v_auct_grade: $('#v_auct_grade').val().toUpperCase(),
        v_auct_price: $('#v_auct_price').val(),
        v_disp_price: $('#v_disp_price').val(),
        v_supp_country: $('.location_ComboBox').val(),
        v_currency: $('.cmb_currency').val(),
        vh_is_reg: isreg
    };
    $('#vh_confirm').modal('hide');
    $.post('views/commenSettingView.php', {action: 'add_vehicle', form_data: form_data}, function (e) {
        if (e.msgType === 1) {
            alertify.success(e.msg, 1000);
            if (uploadImage === 1 && parseInt(e.resp) > 0) {
//                submitSingleDataByPost("image_upload.php", "vh_id", e.resp);
                submitSingleDataByPostSpecial("vehicle_reg.php", "vh_id", e.resp, "tab", "2");
            }
        } else {
            alertify.error(e.msg, 2000);
        }
        reset_vehicleReg();
        vahicle_code_combo();
    }, 'json');
}

function vehicle_add_local(uploadImage) {
    var isreg = parseInt($("input[type='radio'][name='rbt_itemType']:checked").val());
    var isexch = parseInt($("input[type='radio'][name='rbt_pType']:checked").val());
    var form_data = {
        supp_id: $('.v_supplier').val(),
        supp_code: $('.v_supplier option:selected').text(),
        model_combo: $('.model_ComboBox').val(),
        coord_id: $('.coordinator_ComboBox').val(),
        v_ch_code: $('#v_ch_code').val().toUpperCase(),
        v_ch_num: $('#v_ch_num').val().toUpperCase(),
        v_eng_cc: $('#v_eng_cc').val(),
        v_year: $('#v_year').val(),
        v_pckg: $('#v_pckg').val(),
        v_color: $('#v_color').val(),
        v_fuel: $('#v_fuel').val(),
        v_trans: $('#v_trans').val(),
        v_seats: $('#v_seats').val(),
        v_doors: $('#v_doors').val(),
        v_eval: $('#vh_model_num').val(),
        v_drive: $('#v_drive').val(),
        v_milage: $('#v_milage').val(),
        v_opt: $('#v_opt').val(),
        v_supp_country: $('.location_ComboBox').val(),
        v_currency: $('.cmb_currency').val(),
        v_cif: $('#v_cif').val(),
        yen_rate: $('#yen_rate').val(),
        v_lkr_val: $('#v_lkr_val').val(),
        duty: $('#duty').val(),
        vh_clearing: $('#vh_clearing').val(),
        nbt_rate: $('#nbt_rate').val(),
        v_cost: $('#v_cost').val(),
        import_date: $('#import_date').val(),
        vh_is_reg: isreg,
        isexch: isexch
    };
    $('#vh_confirm').modal('hide');
    $.post('views/commenSettingView.php', {action: 'add_vehicle_local', form_data: form_data}, function (e) {
        if (e.msgType === 1) {
            alertify.success(e.msg, 1000);
            if (uploadImage === 1 && parseInt(e.resp) > 0) {
//                submitSingleDataByPost("image_upload.php", "vh_id", e.resp);
                submitSingleDataByPostSpecial("vehicle_reg.php", "vh_id", e.resp, "tab", "2");
            }
        } else {
            alertify.error(e.msg, 2000);
        }
        reset_vehicleReg();
        vahicle_code_combo();
    }, 'json');
}


/// image upload by viraj

/// END image upload by viraj

function reset_vehicleReg() {
    $('#v_code_num').val('');
    $('#vh_reg_id').val('');
    $('#v_ch_code').val('');
    $('#v_ch_num').val('');
    $('#v_eng_cc').val('');
    $('#v_ch_num').val('');
    $('#v_eng_code').val('');
    $('#v_eng_num').val('');
    $('#v_year').val('');
    $('#v_pckg').val('');
    $('#v_color').val('');
//    $('#v_fuel').val('');
//    $('#v_trans').val('');
    $('#v_seats').val('');
    $('#v_doors').val('');
    $('#v_eval').val('');
//    $('#v_drive').val('');
    $('#v_milage').val('');
    $('#v_opt').val('');
    $('#v_other').val('');
    $('#v_bid').val('');
    $('#v_auct').val('');
    $('#v_lot').val('');
    $('#v_auct_grade').val('');
    $('#v_auct_price').val('');
    $('#v_disp_price').val('');
    //local vh_fields
    $('#v_cif').val(''),
            $('#yen_rate').val(''),
            $('#v_lkr_val').val(''),
            $('#duty').val(''),
            $('#vh_clearing').val(''),
            $('#nbt_rate').val(''),
            $('#v_cost').val(''),
            $('#import_date').val(''),
            reset_vehicle_btn('');
}

function delete_order() {
//@Sam
    var delid = $('#order_id').val();
    confirm("Delete This Order", "Are You Sure Want To Delete This record", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_order', delid: delid}, function (e) {
            alertifyMsgDisplay(e, 2000);
            load_coordinator_table();
        }, "json");
    });
}

function load_vh_modinfo(vh_id) {
    if (parseInt(vh_id) !== '') {
        $.post("views/commenSettingView.php", {action: 'get_vh_mod_info', vh_id: vh_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                alertify.error("No Data Found", 1000);
            } else {
                $.each(e, function (index, qData) {
                    $('#modi_options').val(qData.vh_options);
                    $('#modi_other_options').val(qData.additional_options);
                });
            }
        }, "json");
    } else {
        alertify.error("Invalid selection", 1000);
    }
}

function load_vh_info(vh_id, callBack) {
    if (parseInt(vh_id) !== '') {
        $.post("views/commenSettingView.php", {action: 'get_vh_info', vh_id: vh_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                alertify.error("No Data Found", 1000);
            } else {
                $.each(e, function (index, qData) {
                    load_suppliers_cmb(qData.supp_id);
                    load_coordinator_jp_cmb(qData.coordinator_id);
                    load_makers_cmb(qData.maker_id, function () {
                        load_model_cmb($('.maker_ComboBox').val(), qData.vh_maker_model);
                    });
                    if (parseInt(qData.vh_is_reg) === 1) {
                        $('#rbt_reg').prop('checked', true);
                        $('#rbt_unreg').prop('checked', false);
                    } else {
                        $('#rbt_reg').prop('checked', false);
                        $('#rbt_unreg').prop('checked', true);
                    }
                    $('.coordinator_ComboBox').val(qData.coordinator_id);
                    $('#v_code_num').val(qData.vh_code);
                    $('#v_ch_code').val(qData.vh_chassis_code);
                    $('#v_ch_num').val(qData.vh_chassis_num);
                    $('#v_eng_cc').val(qData.engine_cc);
                    $('#v_eng_code').val(qData.engine_code);
                    $('#v_eng_num').val(qData.engine_num);
                    $('#v_year').val(qData.vh_year);
                    $('#v_pckg').val(qData.package);
                    $('#v_color').val(qData.vh_color);
                    $('#v_fuel').val(qData.fuel_type);
                    $('#v_trans').val(qData.transmission);
                    $('#v_seats').val(qData.seats);
                    $('#v_doors').val(qData.doors);
                    $('#v_eval').val(qData.eval_grade);
                    $('#v_drive').val(qData.drive_wheels);
                    $('#v_milage').val(qData.vh_milage);
                    $('#v_opt').val(qData.vh_options);
                    $('#v_other').val(qData.additional_options);
                    $('#v_bid').val(qData.bid_date);
                    $('#v_auct').val(qData.auction_name);
                    $('#v_lot').val(qData.lot_no);
                    $('#model_no').val(qData.model_no);
                    $('#hs_code').val(qData.hs_code);
                    $('#v_auct_grade').val(qData.auction_grade);
                    $('#v_auct_price').val(qData.auc_real_price);
                    $('#v_disp_price').val(qData.auc_display_price);
                    $('.location_ComboBox').val(qData.stock_location);
                    $('.cmb_currency').val(qData.currency_type);
                    $('.currency').html(qData.currency_type);
                });
                chosenRefresh();
                show_vehicle_btn();
                if (callBack !== undefined) {
                    if (typeof callBack === 'function') {
                        callBack();
                    }
                }
            }
        }, "json");
    } else {
        alertify.error("Invalid selection", 1000);
    }
}



function load_vh_info_local(vh_id, callBack) {
    if (parseInt(vh_id) !== '') {
        $.post("views/commenSettingView.php", {action: 'get_vh_info_local', vh_id: vh_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                alertify.error("No Data Found", 1000);
            } else {
                $.each(e, function (index, qData) {
                    load_suppliers_cmb(qData.supp_id);
                    load_coordinator_jp_cmb(qData.coordinator_id);
                    load_makers_cmb(qData.maker_id, function () {
                        load_model_cmb($('.maker_ComboBox').val(), qData.vh_maker_model);
                    });
                    if (parseInt(qData.vh_is_reg) === 1) {
                        $('#rbt_reg').prop('checked', true);
                        $('#rbt_unreg').prop('checked', false);
                    } else {
                        $('#rbt_reg').prop('checked', false);
                        $('#rbt_unreg').prop('checked', true);
                    }
                    $('.coordinator_ComboBox').val(qData.coordinator_id);
                    $('#v_code_num').val(qData.vh_code);
                    $('#v_ch_code').val(qData.vh_chassis_code);
                    $('#v_ch_num').val(qData.vh_chassis_num);
                    $('#v_eng_cc').val(qData.engine_cc);
                    $('#v_year').val(qData.vh_year);
                    $('#v_pckg').val(qData.package);
                    $('#v_color').val(qData.vh_color);
                    $('#v_fuel').val(qData.fuel_type);
                    $('#vh_model_num').val(qData.eval_grade);
                    $('#v_drive').val(qData.drive_wheels);
                    $('#v_milage').val(qData.vh_milage);
                    $('#v_opt').val(qData.vh_options);
                    $('#v_other').val(qData.additional_options);
                    $('#v_bid').val(qData.bid_date);
                    $('#v_auct').val(qData.auction_name);
                    $('#v_lot').val(qData.lot_no);
                    $('#v_auct_grade').val(qData.auction_grade);
                    $('#v_auct_price').val(qData.auc_real_price);
                    $('#v_disp_price').val(qData.auc_display_price);
                    $('.location_ComboBox').val(qData.stock_location);
                    $('.cmb_currency').val(qData.currency_type);
                    $('.currency').html(qData.currency_type);
                    //
                    $('#v_cif').val(qData.vh_cif_val);
                    $('#yen_rate').val(qData.foreign_rate);
                    $('#v_lkr_val').val(qData.lkr_val);
                    $('#duty').val(qData.vh_import_duty);
                    $('#vh_clearing').val(qData.vh_clearing_charge);
                    $('#nbt_rate').val(qData.tax_nbt);
                    $('#v_cost').val(qData.tot_cost);
                    if (parseInt(qData.vh_purchase_type) === 1) {
                        $('#rbt_exchange').prop('checked', true);
                        $('#rbt_purchase').prop('checked', false);
                    } else {
                        $('#rbt_exchange').prop('checked', false);
                        $('#rbt_purchase').prop('checked', true);
                    }
//                    var calc_nbt=(parseFloat(qData.tax_nbt)*100)/parseFloat(qData.lkr_val);
//                    $('#lbl_nbt').html('NBT (' +calc_nbt.toFixed(2) + '%)');
                });
                chosenRefresh();
                show_vehicle_btn();
                if (callBack !== undefined) {
                    if (typeof callBack === 'function') {
                        callBack();
                    }
                }
            }
        }, "json");
    } else {
        alertify.error("Invalid selection", 1000);
    }
}

function load_vh_info_sales(vh_id, callBack) {
    if (parseInt(vh_id) !== '') {
        $.post("views/commenSettingView.php", {action: 'get_vh_info', vh_id: vh_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                alertify.error("No Data Found", 1000);
            } else {

                $.each(e, function (index, qData) {

                });
//                chosenRefresh();
//                show_vehicle_btn();
//                if (callBack !== undefined) {
//                    if (typeof callBack === 'function') {
//                        callBack();
//                    }
//                }
            }
        }, "json");
    } else {
        alertify.error("Invalid selection", 1000);
    }
}

function load_basic_vh_info(vh_id) {
    if (parseInt(vh_id) !== '') {
        $.post("views/commenSettingView.php", {action: 'get_vh_info', vh_id: vh_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
//                alertify.error("No Data Found", 1000);
            } else {
                $.each(e, function (index, qData) {
                    $('#vh_info').val(qData.maker_name + " - " + qData.mod_name + " - " + qData.vh_color);
                    $('#vh_id').val(qData.vh_id);
                });
            }
        }, "json");
    } else {
        alertify.error("Invalid selection", 1000);
    }
}

function show_vehicle_btn() {
//   @Sachith
    if ($('#v_update_btn').hasClass('hidden')) {
        $('#v_update_btn').removeClass('hidden');
    }
    if (!$('#v_save_btn').hasClass('hidden')) {
        $('#v_save_btn').addClass('hidden');
    }
}
function reset_vehicle_btn() {
//   @Sachith
    if (!$('#v_update_btn').hasClass('hidden')) {
        $('#v_update_btn').addClass('hidden');
    }
    if ($('#v_save_btn').hasClass('hidden')) {
        $('#v_save_btn').removeClass('hidden');
    }
}


function vehicle_update() {
    var isreg = parseInt($("input[type='radio'][name='rbt_itemType']:checked").val());
    var form_data = {
        vh_id: $('#vh_reg_id').val(),
        supp_id: $('.v_supplier').val(),
        supp_code: $('.v_supplier option:selected').text(),
        model_combo: $('.model_ComboBox').val(),
        coord_id: $('.coordinator_ComboBox').val(),
        st_location: $('.location_ComboBox').val(),
        v_ch_code: $('#v_ch_code').val().toUpperCase(),
        v_ch_num: $('#v_ch_num').val().toUpperCase(),
        v_eng_cc: $('#v_eng_cc').val(),
        v_eng_code: $('#v_eng_code').val().toUpperCase(),
        v_eng_num: $('#v_eng_num').val().toUpperCase(),
        v_year: $('#v_year').val(),
        v_pckg: $('#v_pckg').val(),
        v_color: $('#v_color').val(),
        v_fuel: $('#v_fuel').val(),
        v_trans: $('#v_trans').val(),
        v_seats: $('#v_seats').val(),
        v_doors: $('#v_doors').val(),
//        v_eval: $('#v_eval').val(),
        v_eval: '-',
        v_drive: $('#v_drive').val(),
        v_milage: $('#v_milage').val(),
        model_no: $('#model_no').val(),
        hs_code: $('#hs_code').val(),
        v_opt: $('#v_opt').val(),
        v_other: $('#v_other').val(),
        v_bid: $('#v_bid').val(),
        v_auct: $('#v_auct').val().toUpperCase(),
        v_lot: $('#v_lot').val().toUpperCase(),
        v_auct_grade: $('#v_auct_grade').val().toUpperCase(),
        v_auct_price: $('#v_auct_price').val(),
        v_disp_price: $('#v_disp_price').val(),
//        v_supp_country: $('#v_supp_country').val(),
        v_currency: $('.cmb_currency').val(),
        vh_is_reg: isreg
    };
    $.post('views/commenSettingView.php', {action: 'update_vehicle', form_data: form_data}, function (e) {
        alertifyMsgDisplay(e, 2000);
        if (parseInt(e[0].msgType) === 1) {
            setTimeout(function () {
                reset_vehicleReg();
                window.close();
            }, 1800);
        }
    }, 'json');
}

function vehicle_update_local() {
    var isreg = parseInt($("input[type='radio'][name='rbt_itemType']:checked").val());
    var isexch = parseInt($("input[type='radio'][name='rbt_pType']:checked").val());
    var form_data = {
        vh_id: $('#vh_reg_id').val(),
        supp_id: $('.v_supplier').val(),
        supp_code: $('.v_supplier option:selected').text(),
        model_combo: $('.model_ComboBox').val(),
        coord_id: $('.coordinator_ComboBox').val(),
        st_location: $('.location_ComboBox').val(),
        v_ch_code: $('#v_ch_code').val().toUpperCase(),
        v_ch_num: $('#v_ch_num').val().toUpperCase(),
        v_eng_cc: $('#v_eng_cc').val(),
        v_year: $('#v_year').val(),
        v_pckg: $('#v_pckg').val(),
        v_color: $('#v_color').val(),
        v_fuel: $('#v_fuel').val(),
        v_trans: $('#v_trans').val(),
        v_seats: $('#v_seats').val(),
        v_doors: $('#v_doors').val(),
        v_eval: $('#vh_model_num').val(),
        v_drive: $('#v_drive').val(),
        v_milage: $('#v_milage').val(),
        v_opt: $('#v_opt').val(),
        v_supp_country: $('.location_ComboBox').val(),
        v_currency: $('.cmb_currency').val(),
        v_cif: $('#v_cif').val(),
        yen_rate: $('#yen_rate').val(),
        v_lkr_val: $('#v_lkr_val').val(),
        duty: $('#duty').val(),
        vh_clearing: $('#vh_clearing').val(),
        nbt_rate: $('#nbt_rate').val(),
        v_cost: $('#v_cost').val(),
        import_date: $('#import_date').val(),
        vh_is_reg: isreg,
        isexch: isexch
    };
    $.post('views/commenSettingView.php', {action: 'update_vehicle_local', form_data: form_data}, function (e) {
        alertifyMsgDisplay(e, 2000);
        if (parseInt(e[0].msgType) === 1) {
            setTimeout(function () {
                reset_vehicleReg();
                window.close();
            }, 1800);
        }
    }, 'json');
}

function get_selected_modd_data(modd_id) {
    $.post("views/commenSettingView.php", {action: 'get_selected_modd_data', modd_id: modd_id}, function (reply) {
        if (reply === undefined || reply.length === 0 || reply === null) {
            alertify.error("No Data Found", 1000);
        } else {
            $.each(reply, function (index, data) {
                $('#modd_id').val(data.mod_id);
                $('#modi_date').val(data.request_date);
                $('#modi_desc').val(data.ddsc);
                vahicle_code_combo(data.vh_id);
                load_customer_cmb(data.cus_id);
                $('#modi_options').val(data.opp);
                $('#modi_other_options').val(data.other_opt);
            });
        }

    }, 'json');
}

function vehModification_update() {
    var modi_date = $('#modi_date').val();
    var modi_desc = $('#modi_desc').val();
    var modi_vehicle = $('#modi_vehicle').val();
    var modi_custmr = $('#modi_custmr').val();
    var modi_status = $('#modi_status').val();
    var modi_options = $('#modi_options').val();
    var modi_other_opt = $('#modi_other_options').val();
    var modd_id = $('#modd_id').val();
    if ((modi_desc.length) !== 0) {
        var forms_data = {
            modd_id: modd_id,
            modi_date: modi_date,
            modi_desc: modi_desc,
            modi_vehicle: modi_vehicle,
            modi_custmr: modi_custmr,
            modi_status: modi_status,
            modi_options: modi_options,
            modi_other_opt: modi_other_opt
        };
        $.post("views/commenSettingView.php", {action: 'vehModification_update', forms_data: forms_data}, function (reply) {
            alertifyMsgDisplay(reply, 2000);
            vehModification_reset();
            vehicleModiTable($('.vahicle_code_combo').val());
        }, 'json');
    } else {
        alert("Please Add Description");
    }
}

function delete_modific(moddi_id) {
//@Sam_Rulz
    confirm("Delete Supplier", "Are You Sure Want To Delete This record", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_modific', moddi_id: moddi_id}, function (e) {
            alertifyMsgDisplay(e, 2000);
            vehicleModiTable($('.vahicle_code_combo').val());
        }, "json");
    });
}

function load_image_count(vh_id) {
//@Sam_Rulz
    $.post("views/commenSettingView.php", {action: 'get_photo_count', vh_id: vh_id}, function (e) {
        $('#img_count_div').html("Total images for vehicle: " + e.ph_count);
    }, "json");
}

function set_vhInfo_cusOrder(vh_id) {
    if (parseInt(vh_id) !== '') {
        $.post("views/commenSettingView.php", {action: 'get_vh_info', vh_id: vh_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
            } else {
                var a = '';
                $.each(e, function (index, data) {
                    a += data.maker_name + ' ';
                    a += data.mod_name + ', ';
                    a += 'Color: ' + data.vh_color;
                });
                $('#cOrder_txtMaker').val(a);
            }
        }, "json");
    }
}

function selected_cars_temp_save(arr_vh_id) {
    var vh_data = arr_vh_id;
    $.post('views/commenSettingView.php', {action: 'add_temp_entry', vh_data: vh_data}, function (e) {
        if (parseInt(e) > 0) {
            submitSingleDataByPost("pro_forma_inv.php", "ref_id", e);
        } else {
            alertify.error('Could not process the request', 2000);
        }
    }, 'json');
}

function selected_cars_clearing_add(arr_vh_id) {
//@Ashan
    var vh_data = arr_vh_id;
    $.post('views/commenSettingView.php', {action: 'add_clear_entry', vh_data: vh_data}, function (e) {
        if (parseInt(e) > 0) {
            submitSingleDataByPost("vehicle_clearing_entry.php", "ref_id", e);
        } else {
            alertify.error('Could not process the request', 2000);
        }
    }, 'json');
}
function add_colors_for_trs(arr_vh_id, clr_code) {
// viraj
    var vh_data = arr_vh_id;
    $.post('views/commenSettingView.php', {action: 'add_colors_for_trs', vh_data: vh_data, clr_code: clr_code}, function (e) {
        alertifyMsgDisplay(e, 4000);
        load_vehicle_table();
    }, 'json');
}

function add_colors_for_clr(arr_vh_id, clr_code) {
// viraj
    var vh_data = arr_vh_id;
    $.post('views/commenSettingView.php', {action: 'add_colors_for_trs', vh_data: vh_data, clr_code: clr_code}, function (e) {
        alertifyMsgDisplay(e, 4000);
        load_clearing_table();
    }, 'json');
}
function add_clear_data(arr_vh_id, clearing_item, item_value) {
// @Ashan
    var vh_data = arr_vh_id;
    var clearing_item = clearing_item;
    var item_value = item_value;
    $.post('views/commenSettingView.php', {action: 'add_clearing_item', vh_data: vh_data, clearing_item: clearing_item, item_value: item_value}, function (e) {
        alertifyMsgDisplay(e, 4000);
        load_clearing_table();
    }, 'json');
}


function bank_save() {
    var bank_name = $('#bank_name').val();
    var bank_swift = $('#bank_swift').val();
    var branch = $('#branch').val();
    var bank_account = $('#bank_account').val();
    if (bank_name.length !== 0) {
        var form_data = {
            bank_name: bank_name,
            bank_swift: bank_swift,
            branch: branch,
            bank_account: bank_account
        };
        $.post("views/commenSettingView.php", {action: 'add_bank', form_data: form_data}, function (e) {
            alertifyMsgDisplay(e, 2000);
            bank_form_reset();
            bankTable();
        }, 'json');
    } else {
        alert("Please Add Bank Name");
    }
}

function bank_form_reset() {
    $('#bank_name').val('');
    $('#bank_swift').val('');
    $('#branch').val('');
    $('#bank_account').val('');
    reset_bank_btn();
}

function reset_bank_btn() {
//   @Sachith
    if (!$('#bank_updtBtn').hasClass('hidden')) {
        $('#bank_updtBtn').addClass('hidden');
    }
    if ($('#bank_saveBtn').hasClass('hidden')) {
        $('#bank_saveBtn').removeClass('hidden');
    }
}

function show_bank_btn() {
//   @Sachith
    if ($('#bank_updtBtn').hasClass('hidden')) {
        $('#bank_updtBtn').removeClass('hidden');
    }
    if (!$('#bank_saveBtn').hasClass('hidden')) {
        $('#bank_saveBtn').addClass('hidden');
    }
}


function get_selected_bank(bank_id) {
    $.post("views/commenSettingView.php", {action: 'suppbank_select', bank_id: bank_id}, function (reply) {
        if (reply === undefined || reply.length === 0 || reply === null) {
            alertify.error("No Data Found", 1000);
        } else {
            $.each(reply, function (index, data) {
                $('#suppbank_name').val(data.bank_name);
                $('#suppbank_id').val(data.bank_id);
                $('#sup_bankswift').val(data.swift);
            });
        }
        $('#bank_searchModal').modal('hide');
    }, 'json');
}
function select_bank_update(bank_id) {
    $.post("views/commenSettingView.php", {action: 'suppbank_select', bank_id: bank_id}, function (reply) {
        if (reply === undefined || reply.length === 0 || reply === null) {
            alertify.error("No Data Found", 1000);
        } else {
            $.each(reply, function (index, data) {
                $('#bank_id').val(data.bank_id);
                $('#bank_name').val(data.bank_name);
                $('#bank_swift').val(data.swift);
                $('#branch').val(data.branch);
                $('#bank_account').val(data.ac_num);
            });
        }
    }, 'json');
}

function bank_update() {
    var bank_id = $('#bank_id').val();
    var bank_name = $('#bank_name').val();
    var bank_swift = $('#bank_swift').val();
    var branch = $('#branch').val();
    var bank_account = $('#bank_account').val();
    if (bank_name.length !== 0) {
        var form_data = {
            bank_id: bank_id,
            bank_name: bank_name,
            bank_swift: bank_swift,
            branch: branch,
            bank_account: bank_account
        };
        $.post("views/commenSettingView.php", {action: 'bank_update', form_data: form_data}, function (e) {
            alertifyMsgDisplay(e, 2000);
            bank_form_reset();
            bankTable();
        }, 'json');
    } else {
        alert("Add Bank Name");
    }
}
function update_proinv_cif(ref_id, callBack) {
    var vh_freight = $('#vh_freight').val();
    var vh_ins = $('#vh_ins').val();
    if (parseInt(ref_id) > 0) {
        var form_data = {
            vh_freight: vh_freight,
            vh_ins: vh_ins,
            ref_id: ref_id
        };
        $.post("views/commenSettingView.php", {action: 'vh_cif_update', form_data: form_data}, function (e) {
            alertifyMsgDisplay(e, 2000);
            if (callBack !== undefined) {
                if (typeof callBack === 'function') {
                    callBack();
                }
            }
            $('#vh_chargesModal').modal('hide');
        }, 'json');
    } else {
        alertify.error("Invalid invoice");
    }
}
function update_proinv_fob(ref_id, callBack) {
    var vh_fob = $('#vh_fob').val();
    if (parseInt(ref_id) > 0) {
        var form_data = {
            vh_fob: vh_fob,
            ref_id: ref_id
        };
        $.post("views/commenSettingView.php", {action: 'vh_fob_update', form_data: form_data}, function (e) {
            alertifyMsgDisplay(e, 2000);
            if (callBack !== undefined) {
                if (typeof callBack === 'function') {
                    callBack();
                }
            }
            $('#vh_amount').modal('hide');
        }, 'json');
    } else {
        alertify.error("Invalid invoice");
    }
}

function delete_supp_bank(bank_id) {
    confirm("Delete Bank", "Are You Sure Want To Delete This record", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_supp_bank', bank_id: bank_id}, function (e) {
            alertifyMsgDisplay(e, 2000);
            bankTable();
        }, "json");
    });
}

function proinv_add() {
    var ref_id = $('#ref_id').val();
    var proinv_num = $('#proinv_num').val();
    var inv_date = $('#inv_date').val();
    var inv_currency = $('#inv_currency').val();
    var consignee_name = $('#consignee_name').val();
    var consignee_address = $('#consignee_address').val();
    var cus_id = $('#cus_id').val();
    var port_loading = $('#port_loading').val();
    var port_discharge = $('#port_discharge').val();
    var ship_time = $('#ship_time').val();
    var pay_term = $('#pay_term').val();
    var validity_time = $('#validity_time').val();
    var suppbank_id = $('#suppbank_id').val();
    var inv_partial_ship = $('#inv_partial_ship').val();
    var inv_transship = $('#inv_transship').val();
    var presentaion_period = $('#presentaion_period').val();
    var last_ship_date = $('#last_ship_date').val();
    var lc_charges = $('#lc_charges').val();
    var hs_code = $('#hs_code').val();
    var confirm = $('#confirm').val();
    var advice_lc = $('#advice_lc').val();
    var tot_cif = $('#tot_cif').val();
    var supp_id = $('#supp_id').val();
    var units = parseInt($('#is_one_vh').val());
    var inv_type = $("input[type='radio'][name='rbt_invType']:checked").val();
    if (inv_type === 'L' && consignee_name.length <= 0) {
        alertify.error("Consignee Name required for selected invoice type", 2500);
        return;
    }
    if (parseInt(cus_id) > 0 && parseInt(suppbank_id) > 0 && parseInt(supp_id) > 0) {
        if (proinv_num.length !== 0) {
            var form_data = {
                ref_id: ref_id,
                proinv_num: proinv_num,
                inv_date: inv_date,
                inv_currency: inv_currency,
                consignee_name: consignee_name,
                consignee_address: consignee_address,
                cus_id: cus_id,
                port_loading: port_loading,
                port_discharge: port_discharge,
                ship_time: ship_time,
                pay_term: pay_term,
                validity_time: validity_time,
                inv_partial_ship: inv_partial_ship,
                inv_transship: inv_transship,
                presentaion_period: presentaion_period,
                last_ship_date: last_ship_date,
                lc_charges: lc_charges,
                hs_code: hs_code,
                confirm: confirm,
                suppbank_id: suppbank_id,
                advice_lc: advice_lc,
                tot_cif: tot_cif,
                supp_id: supp_id,
                inv_type: inv_type
            };
            $.post("views/commenSettingView.php", {action: 'add_proinv', form_data: form_data}, function (e) {
                //            alertifyMsgDisplay(e, 2000);
                if (inv_type === 'L') {
                    submitSingleDataByPost("pro_invoicePrint2.php", "pi_id", ref_id);
                } else {
                    submitSingleDataByPost("pro_invoicePrint.php", "pi_id", ref_id);
                }
            }, 'json');
        } else {
            alert("Invalid invoice number, Refresh ");
        }
    } else {
        alertify.error("One of more required field are empty", 2500);
    }

}

function get_inv_suppid(ref_id, callBack) {
    $.post("views/commenSettingView.php", {action: 'get_inv_suppid', ref_id: ref_id}, function (reply) {
        if (reply === undefined || reply.length === 0 || reply === null) {
            $('#supp_id').val(0);
        } else {
            $.each(reply, function (index, data) {
                $('#supp_id').val(data.supp_id);
            });
        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, 'json');
}

function load_inv_forEdit(ref_id) {
    $.post("views/commenSettingView.php", {action: 'load_inv_foredit', ref_id: ref_id}, function (reply) {
        if (reply === undefined || reply.length === 0 || reply === null) {

        } else {
            $.each(reply, function (index, data) {
                $('#inv_date').val(data.pi_date);
                $('#cus_id').val(data.cus_id);
                $('#c_inv_name').val(data.cus_inv_name);
                $('#consignee_name').val(data.consignee_name);
                $('#consignee_address').val(data.consignee_address);
                $('#port_loading').val(data.port_loading);
                $('#port_discharge').val(data.port_discharge);
                $('#ship_time').val(data.shipment_time);
                $('#pay_term').val(data.payment_term);
                $('#validity_time').val(data.validity);
                $('#inv_partial_ship').val(data.partial_shipment);
                $('#inv_transship').val(data.transshipment);
                $('#presentaion_period').val(data.presentation_period);
                $('#lc_charges').val(data.lc_charges);
                $('#hs_code').val(data.hs_code);
                $('#confirm').val(data.confirmation);
                $('#advice_lc').val(data.lc_advice);
                $('#inv_currency').val(data.currency);
            });
            chosenRefresh();
        }
    }, 'json');
}

function load_supp_bank(supp_id) {
    $.post("views/commenSettingView.php", {action: 'load_supp_bank', supp_id: supp_id}, function (reply) {
        if (reply === undefined || reply.length === 0 || reply === null) {

        } else {
            $.each(reply, function (index, data) {
                $('#suppbank_id').val(data.bank_id);
                $('#suppbank_name').val(data.bank_name);
                $('#sup_bankswift').val(data.swift);
            });
        }
    }, 'json');
}
function load_supp_currency(supp_id) {
    $.post("views/commenSettingView.php", {action: 'load_supp_currency', supp_id: supp_id}, function (reply) {
        if (reply === undefined || reply.length === 0 || reply === null) {

        } else {
            $.each(reply, function (index, data) {
                $('.currency').html(data.supp_currency);
                $('.location_ComboBox').val(data.supp_currency);
                $('.cmb_currency').val(data.supp_currency);
                $('#v_supp_country').val(data.supp_currency);
                chosenRefresh();
            });
        }
    }, 'json');
}
function load_supp_currency_local(supp_id) {
    $.post("views/commenSettingView.php", {action: 'load_supp_currency', supp_id: supp_id}, function (reply) {
        if (reply === undefined || reply.length === 0 || reply === null) {

        } else {
            $.each(reply, function (index, data) {
//                $('.currency').html(data.supp_currency);
//                $('.location_ComboBox').val(data.supp_currency);
                $('.cmb_currency').val(data.supp_currency);
                $('#v_supp_country').val(data.supp_currency);
                chosenRefresh();
            });
        }
    }, 'json');
}
function getInv_cif_values(ref_id, callBack) {
    $.post("views/commenSettingView.php", {action: 'getInv_cif_values', ref_id: ref_id}, function (reply) {
        if (reply === undefined || reply.length === 0 || reply === null) {
            $('#insurance_disp').val(0);
            $('#freight_disp').val(0);
        } else {
            $.each(reply, function (index, data) {
                $('#insurance_disp').val(data.insuarance);
                $('#freight_disp').val(data.freight);
            });
        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, 'json');
}

function cancel_proForma_invoice(pi_id) {
//@Sachith 
    confirm("Cancel Pro-Forma Invoice", "Are You Sure Want To cancel this invoice", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'cancel_proforma_inv', pi_id: pi_id}, function (e) {
//            alertifyMsgDisplay(e, 2000);
            submitSingleDataByPost("view_vehicle_list.php", "a", "a");
        }, "json");
    });
}


function cancel_clearing_entry(pi_id) {
//@Ashan 
    confirm("Cancel Pro-Forma Invoice", "Are You Sure Want To cancel this invoice", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'cancel_clearing_entry', pi_id: pi_id}, function (e) {
//            alertifyMsgDisplay(e, 2000);
            submitSingleDataByPost("view_clearing_list.php", "a", "a");
        }, "json");
    });
}


function cb_cancel(cb_id) {
    confirm("Cancel Clearing Balances", "Are You Sure You ant To Cancel Changes to this Clearing Balanece record", "No", "Yes", function () {
        submitSingleDataByPost("view_clearing_balance_list.php");
    });
}


function cancel_credit_transfer(pi_id) {
//@Sachith 
    confirm("Cancel Pro-Forma Invoice", "Are You Sure Want To cancel this invoice", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'cancel_proforma_inv', pi_id: pi_id}, function (e) {
//            alertifyMsgDisplay(e, 2000);
            submitSingleDataByPost("view_ctposd_list.php", "a", "a");
        }, "json");
    });
}

function leasingCo_save() {
    var co_name = $('#co_name').val();
    var co_address = $('#co_address').val();
    if (co_name.length !== 0) {
        var form_data = {
            co_name: co_name,
            co_address: co_address
        };
        $.post("views/commenSettingView.php", {action: 'add_lease_co', form_data: form_data}, function (e) {
            alertifyMsgDisplay(e, 2000);
            lease_form_reset();
            leaseCoTable();
        }, 'json');
    } else {
        alert("Enter a Name");
    }
}

function lease_form_reset() {
    $('#co_name').val('');
    $('#co_address').val('');
    reset_lease_btn();
}

function reset_lease_btn() {
//   @Sachith
    if (!$('#co_updtBtn').hasClass('hidden')) {
        $('#co_updtBtn').addClass('hidden');
    }
    if ($('#co_saveBtn').hasClass('hidden')) {
        $('#co_saveBtn').removeClass('hidden');
    }
}

function show_lease_btn() {
//   @Sachith
    if ($('#co_updtBtn').hasClass('hidden')) {
        $('#co_updtBtn').removeClass('hidden');
    }
    if (!$('#co_saveBtn').hasClass('hidden')) {
        $('#co_saveBtn').addClass('hidden');
    }
}


function get_selected_lease(co_id) {
    $.post("views/commenSettingView.php", {action: 'lease_co_select', co_id: co_id}, function (reply) {
        if (reply === undefined || reply.length === 0 || reply === null) {
            alertify.error("No Data Found", 1000);
        } else {
            $.each(reply, function (index, data) {
                $('#leaseCo_id').val(data.ls_id);
                $('#leaseCo_name').val(data.ls_name);
            });
            $('#lease_searchModal').modal('hide');
        }
    }, 'json');
}
function select_leaseCo_update(co_id) {
    $.post("views/commenSettingView.php", {action: 'lease_co_select', co_id: co_id}, function (reply) {
        if (reply === undefined || reply.length === 0 || reply === null) {
            alertify.error("No Data Found", 1000);
        } else {
            $.each(reply, function (index, data) {
                $('#co_id').val(data.ls_id);
                $('#co_name').val(data.ls_name);
                $('#co_address').val(data.ls_address);
            });
        }
    }, 'json');
}

function leaseCo_update() {
    var co_name = $('#co_name').val();
    var co_address = $('#co_address').val();
    var co_id = $('#co_id').val();
    if (co_name.length !== 0) {
        var form_data = {
            co_name: co_name,
            co_address: co_address,
            co_id: co_id
        };
        $.post("views/commenSettingView.php", {action: 'lease_co_update', form_data: form_data}, function (e) {
            alertifyMsgDisplay(e, 2000);
            lease_form_reset();
            leaseCoTable();
        }, 'json');
    } else {
        alert("Enter Name");
    }
}

function delete_leaseCo(lease_id) {
    confirm("Delete Leasing Company", "Are You Sure Want To Delete This record", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_lease_co', lease_id: lease_id}, function (e) {
            alertifyMsgDisplay(e, 2000);
            leaseCoTable();
        }, "json");
    });
}

function syscode_save() {
    var form_data = {
        code_type: $('.codeType_ComboBox').val(),
        syscode_desc: $('#syscode_desc').val(),
        syscode_remarks: $('#syscode_remarks').val(),
    };
    $.post('views/commenSettingView.php', {action: 'add_syscode', form_data: form_data}, function (e) {
        alertifyMsgDisplay(e, 2000);
        load_syscode_table($('.codeType_ComboBox').val());
        reset_syscode();
    }, 'json');
}


function show_syscode_btn() {
//   @Sachith
    if ($('#syscode_updateDiv').hasClass('hidden')) {
        $('#syscode_updateDiv').removeClass('hidden');
    }
    if (!$('#syscode_save_btn').hasClass('hidden')) {
        $('#syscode_save_btn').addClass('hidden');
    }
}
function hide_syscode_btn() {
//   @Sachith
    if (!$('#syscode_updateDiv').hasClass('hidden')) {
        $('#syscode_updateDiv').addClass('hidden');
    }
    if ($('#syscode_save_btn').hasClass('hidden')) {
        $('#syscode_save_btn').removeClass('hidden');
    }
}

function reset_syscode() {
    $('#sys_id').val('');
    $('#syscode_desc').val('');
    $('#syscode_remarks').val('');
    hide_syscode_btn();
}

function select_syscode(sys_id) {
//@Sachith 
    if (parseInt(sys_id) !== 0) {
        $.post("views/commenSettingView.php", {action: 'syscode_select', sys_id: sys_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                alertify.error("No Data Found", 1000);
            } else {
                $.each(e, function (index, qData) {
                    $('#sys_id').val(qData.sys_id);
                    $('#syscode_desc').val(qData.description);
                    $('#syscode_remarks').val(qData.remarks);
                });
                show_syscode_btn();
            }
        }, "json");
    } else {
        alertify.error("Invalid Sub category selection", 1000);
    }
}

function select_syscode_local(sys_code, callback) {
//@Sachith 
    var sys_type = '';
    var desc = '';
    var remarks = '';
    if (parseInt(sys_code) !== 0) {
        $.post("views/commenSettingView.php", {action: 'syscode_select', sys_code: sys_code}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {

            } else {
                $.each(e, function (index, qData) {
                    sys_type = qData.type;
                    desc = qData.description;
                    remarks = qData.remarks;
                });
//                show_syscode_btn();
            }
            if (typeof callback === 'function') {
                var obj = {sys_type: sys_type, description: desc, remarks: remarks};
                callback(obj);
            }
        }, "json");
    } else {
        alertify.error("Requested system property not found", 1000);
    }
}

function cancel_proFormaInvoice(inv_id) {
//@Viraj
    confirm("Cancel Pro-forma Invoice", "Are You Sure You Want To Cancel This record", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'cancel_proFormaInvoice', inv_id: inv_id}, function (e) {
            alertifyMsgDisplay(e, 2000);
            load_proInvoiceView_table(function () {
                $('.load_proInvoiceView_table').DataTable();
            });
        }, "json");
    });
}

function syscode_update() {
    var sys_id = $('#sys_id').val();
    if (sys_id.length !== 0) {
        var form_data = {
            sys_id: sys_id,
            code_type: $('.codeType_ComboBox').val(),
            syscode_desc: $('#syscode_desc').val(),
            syscode_remarks: $('#syscode_remarks').val(),
        };
        $.post("views/commenSettingView.php", {action: 'syscode_update', form_data: form_data}, function (e) {
            alertifyMsgDisplay(e, 2000);
            load_syscode_table($('.codeType_ComboBox').val());
            reset_syscode();
        }, 'json');
    } else {
        alert("Select category");
    }
}

function delete_syscode(sys_id) {
//@Sachith 
    confirm("Delete System Code", "Are You Sure Want To Delete This record", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_syscode', sys_id: sys_id}, function (e) {
            alertifyMsgDisplay(e, 2000);
            load_syscode_table($('.codeType_ComboBox').val());
            reset_syscode();
        }, "json");
    });
}

function select_homepg_content(wh_id) {
//@Sachith 
    if (parseInt(wh_id) !== 0) {
        $.post("views/commenSettingView.php", {action: 'select_homepg_content', wh_id: wh_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                alertify.error("No Data Found", 1000);
            } else {
                $.each(e, function (index, qData) {
                    $('#wh_id').val(qData.wh_id);
                    $('#heading_1').val(qData.wh_head1);
                    $('#heading_2').val(qData.wh_head2);
                    $('.content_order').val(qData.order);
                    $('#description').val(qData.wh_content);
                });
                web_homepg_show_btn();
                chosenRefresh();
            }
        }, "json");
    } else {
        alertify.error("Select a valid content", 1000);
    }
}

function homepg_content_update() {
    var wh_id = $('#wh_id').val();
    if (wh_id.length !== 0) {
        var form_data = {
            wh_id: wh_id,
            heading_1: $('#heading_1').val(),
            heading_2: $('#heading_2').val(),
            content_order: $('.content_order').val(),
            description: $('#description').val(),
        };
        $.post("views/commenSettingView.php", {action: 'homepg_content_update', form_data: form_data}, function (e) {
            alertifyMsgDisplay(e, 2000);
            load_web_homepg_data($('.page_section').val());
            web_homepg_reset();
        }, 'json');
    } else {
        alert("Select category");
    }
}

function web_homepg_reset() {
    $('#heading_1').val('');
    $('#heading_2').val('');
    $('#description').val('');
    $('#image_file').val('');
    chosenRefresh();
    web_homepg_hide_btn();
}

function delete_web_homepg(wh_id, imgfile) {
//@Sachith 
    confirm("Remove Page Content", "Are you sure you want to remove this record", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_web_homepg', wh_id: wh_id, imgfile: imgfile}, function (e) {
            alertifyMsgDisplay(e, 2000);
            load_web_homepg_data($('.page_section').val());
            web_homepg_reset();
        }, "json");
    });
}
function web_homepg_hide_btn() {
//   @Sachith
    if (!$('#content_update_btn').hasClass('hidden')) {
        $('#content_update_btn').addClass('hidden');
    }
    if ($('#content_save_btn').hasClass('hidden')) {
        $('#content_save_btn').removeClass('hidden');
    }
}

function web_homepg_show_btn() {
//   @Sachith
    if ($('#content_update_btn').hasClass('hidden')) {
        $('#content_update_btn').removeClass('hidden');
    }
    if (!$('#content_save_btn').hasClass('hidden')) {
        $('#content_save_btn').addClass('hidden');
    }
}

function vehicle_spec_save() {
    var form_data = {
        spec_title: $('#spec_title').val(),
        spec_model: $('.model_ComboBox').val(),
        eng_cylinder: $('#eng_cylinder').val(),
        eng_cc: $('#eng_cc').val(),
        eng_layout: $('#eng_layout').val(),
        eng_hpower: $('#eng_hpower').val(),
        eng_rpm: $('#eng_rpm').val(),
        eng_torque: $('#eng_torque').val(),
        eng_comp_ratio: $('#eng_comp_ratio').val(),
        perf_max_speed: $('#perf_max_speed').val(),
        perf_accelration: $('#perf_accelration').val(),
        trans_type: $('#trans_type').val(),
        trans_desc: $('#trans_desc').val(),
        fuel_cons_city: $('#fuel_cons_city').val(),
        fuel_cons_highway: $('#fuel_cons_highway').val(),
        bd_len: $('#bd_len').val(),
        bd_wid: $('#bd_wid').val(),
        bd_hei: $('#bd_hei').val(),
        bd_wheelbase: $('#bd_wheelbase').val(),
        bd_maxpayload: $('#bd_maxpayload').val(),
        bd_curb_weight: $('#bd_curb_weight').val(),
        cap_fuel_tank: $('#cap_fuel_tank').val(),
        cap_luggage: $('#cap_luggage').val()
    };
    $.post('views/commenSettingView.php', {action: 'add_spec', form_data: form_data}, function (e) {
        alertifyMsgDisplay(e, 2000);
        spec_table();
        reset_spec();
    }, 'json');
}

function select_spec(spec_id) {
//@Sachith 
    if (parseInt(spec_id) !== 0) {
        $.post("views/commenSettingView.php", {action: 'spec_select', spec_id: spec_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                alertify.error("No Data Found", 1000);
            } else {
                $.each(e, function (index, qData) {
                    $('#spec_id').val(qData.spec_id);
                    $('.model_ComboBox').val(qData.mod_id);
                    $('#spec_title').val(qData.spec_title);
                    $('#eng_cylinder').val(qData.eng_cylinder);
                    $('#eng_cc').val(qData.eng_cc);
                    $('#eng_layout').val(qData.eng_layout);
                    $('#eng_hpower').val(qData.eng_hpower);
                    $('#eng_rpm').val(qData.eng_rpm);
                    $('#eng_torque').val(qData.eng_torque);
                    $('#eng_comp_ratio').val(qData.eng_comp_ratio);
                    $('#perf_max_speed').val(qData.perf_max_speed);
                    $('#perf_accelration').val(qData.perf_accelration);
                    $('#trans_type').val(qData.trans_type);
                    $('#trans_desc').val(qData.trans_desc);
                    $('#fuel_cons_city').val(qData.fuel_cons_city);
                    $('#fuel_cons_highway').val(qData.fuel_cons_highway);
                    $('#bd_len').val(qData.bd_len);
                    $('#bd_wid').val(qData.bd_wid);
                    $('#bd_hei').val(qData.bd_hei);
                    $('#bd_wheelbase').val(qData.bd_wheelbase);
                    $('#bd_maxpayload').val(qData.bd_maxpayload);
                    $('#bd_curb_weight').val(qData.bd_curb_weight);
                    $('#cap_fuel_tank').val(qData.cap_fuel_tank);
                    $('#cap_luggage').val(qData.cap_luggage);
                });
                show_spec_btn();
            }
        }, "json");
    } else {
        alertify.error("Invalid record selection", 1500);
    }
}

function show_spec_btn() {
//   @Sachith
    if ($('#spec_updateDiv').hasClass('hidden')) {
        $('#spec_updateDiv').removeClass('hidden');
    }
    if (!$('#spec_save_div').hasClass('hidden')) {
        $('#spec_save_div').addClass('hidden');
    }
}
function hide_spec_btn() {
//   @Sachith
    if (!$('#spec_updateDiv').hasClass('hidden')) {
        $('#spec_updateDiv').addClass('hidden');
    }
    if ($('#spec_save_div').hasClass('hidden')) {
        $('#spec_save_div').removeClass('hidden');
    }
}

function vehicle_spec_update() {
    var form_data = {
        spec_id: $('#spec_id').val(),
        spec_model: $('.model_ComboBox').val(),
        spec_title: $('#spec_title').val(),
        eng_cylinder: $('#eng_cylinder').val(),
        eng_cc: $('#eng_cc').val(),
        eng_layout: $('#eng_layout').val(),
        eng_hpower: $('#eng_hpower').val(),
        eng_rpm: $('#eng_rpm').val(),
        eng_torque: $('#eng_torque').val(),
        eng_comp_ratio: $('#eng_comp_ratio').val(),
        perf_max_speed: $('#perf_max_speed').val(),
        perf_accelration: $('#perf_accelration').val(),
        trans_type: $('#trans_type').val(),
        trans_desc: $('#trans_desc').val(),
        fuel_cons_city: $('#fuel_cons_city').val(),
        fuel_cons_highway: $('#fuel_cons_highway').val(),
        bd_len: $('#bd_len').val(),
        bd_wid: $('#bd_wid').val(),
        bd_hei: $('#bd_hei').val(),
        bd_wheelbase: $('#bd_wheelbase').val(),
        bd_maxpayload: $('#bd_maxpayload').val(),
        bd_curb_weight: $('#bd_curb_weight').val(),
        cap_fuel_tank: $('#cap_fuel_tank').val(),
        cap_luggage: $('#cap_luggage').val()
    };
    $.post('views/commenSettingView.php', {action: 'update_spec', form_data: form_data}, function (e) {
        alertifyMsgDisplay(e, 2000);
        spec_table();
        reset_spec();
    }, 'json');
}
function delete_spec(spec_id) {
//@Sachith 
    confirm("Delete Vehicle Specification", "Are You Sure Want To Delete This record", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_spec', spec_id: spec_id}, function (e) {
            alertifyMsgDisplay(e, 2000);
            spec_table();
            reset_spec();
        }, "json");
    });
}


function reset_spec() {
    $('#spec_id').val('');
    $('#spec_title').val('');
    $('#eng_cylinder').val('');
    $('#eng_cc').val('');
    $('#eng_layout').val('');
    $('#eng_hpower').val('');
    $('#eng_rpm').val('');
    $('#eng_torque').val('');
    $('#eng_comp_ratio').val('');
    $('#perf_max_speed').val('');
    $('#perf_accelration').val('');
    $('#trans_type').val('');
    $('#trans_desc').val('');
    $('#fuel_cons_city').val('');
    $('#fuel_cons_highway').val('');
    $('#bd_len').val('');
    $('#bd_wid').val('');
    $('#bd_hei').val('');
    $('#bd_wheelbase').val('');
    $('#bd_maxpayload').val('');
    $('#bd_curb_weight').val('');
    $('#cap_fuel_tank').val('');
    $('#cap_luggage').val('');
    hide_spec_btn();
}

function spec_showTabOne(callback) {
    $('#link_two').removeClass('active');
    $('#link_one').addClass('active');
    $('#spec_view_tab').removeClass('active');
    $('#spec_data_tab').addClass('active');
    if (typeof callback === 'function') {
        callback();
    }
}

function vehicle_webdata_save() {
//get selected features
    var featureIDs = $(".features_table input:checkbox:checked").map(function () {
        return $(this).val();
    }).get(); //
    //get selected visibility options
    var show_price = $("input[type='radio'][name='rbt_price_visible']:checked").val();
    var show_data = $("input[type='radio'][name='rbt_data_visible']:checked").val();
    //other
    var display_price = $('#vh_disp_price').val();
    var currency = $('.cmb_currency').val();
    var vh_code = $('#v_code_num').val();
    var vh_id = $('#vh_id').val();
    var spec_id = $('.spec_ComboBox').val();
    var stock_status = $('#cmb_stock_status').val();
    if (isNaN(parseInt($('.spec_ComboBox').val()))) {
        spec_id = 0;
    }
    var vh_list_str = $('#vh_list').val();
    vh_list_str = vh_list_str.replace(vh_id, "0");
    var form_data = {
        vh_id: vh_id,
        vh_code: vh_code,
        display_price: display_price,
        show_data: show_data,
        show_price: show_price,
        spec_id: spec_id,
        featureIDs: featureIDs,
        currency: currency,
        stock_status: stock_status
    };
    $.post('views/commenSettingView.php', {action: 'add_vh_webdata', form_data: form_data}, function (e) {
        $.each(e, function (index, qData) {
            if (qData.msgType === 1) {
                submitSingleDataByPost('web_setvh_data.php', 'vh_id_list', vh_list_str);
//                reset_web_vhdata_form();
            } else {
                alertifyMsgDisplay(e, 2000);
            }
        });
    }, 'json');
}

function reset_web_vhdata_form() {
    $('#vh_disp_price').val('');
    $('#vh_id').val('');
    $('.spec_ComboBox').val('');
    $('#v_code_num').val('');
    $('#rbt_data_hidden').prop('checked', true);
    $('#rbt_price_hidden').prop('checked', true);
    $(".features_table input:checkbox").prop('checked', false);
    $("input[type='radio'][name='rbt_price_visible']").prop("disabled", true);
}

function news_update(news_id) {
//@Cholitha
    var news_head = $('#news_head').val();
    var news_date = $('#news_date').val();
    var news_content = $('#news_content').val();
    if (news_head.length !== 0) {
        var form_data = {
            news_head: news_head,
            news_id: news_id,
            news_date: news_date,
            news_content: news_content
        };
        $.post("views/commenSettingView.php", {action: 'news_save', form_data: form_data}, function (reply) {
            alertifyMsgDisplay(reply, 2000);
            reset_news();
            newsDetailsTable();
        }, 'json');
    } else {
        alert("Please Add Description");
    }
}

function reset_news() {
//@Cholitha
    $('#news_head').val('');
    $('#news_content').val('');
    $('#image_file').val('');
    hide_news_btn();
}

function select_news(news_id) {
//@Cholitha
    if (parseInt(news_id) !== 0) {
        $.post("views/commenSettingView.php", {action: 'select_news', news_id: news_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                alertify.error("No Data Found", 1000);
            } else {
                $.each(e, function (index, qData) {
                    $('#news_head').val(qData.heading_1);
                    $('#news_date').val(qData.posted_date);
                    $('#news_content').val(qData.content_all);
                    $('#news_id').val(qData.news_id);
                });
                show_news_btn();
            }
        }, "json");
    } else {
        alertify.error("Invalid Sub category selection", 1000);
    }
}

function load_syscode_default(sys_type, component, callBack) {
    $.post("views/commenSettingView.php", {action: 'syscode_default', sys_type: sys_type}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            $(component).val('');
        } else {
            $.each(e, function (index, qData) {

                $(component).val(qData.description);
            });
        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, "json");
}

function show_news_btn() {
//   @Sachith
    $("#image_file").prop('disabled', true);
    if ($('#deh_modi_updtBtn').hasClass('hidden')) {
        $('#deh_modi_updtBtn').removeClass('hidden');
    }
    if (!$('#news_saveBtn').hasClass('hidden')) {
        $('#news_saveBtn').addClass('hidden');
    }
}

function hide_news_btn() {
//   @Sachith
    $("#image_file").prop('disabled', false);
    if (!$('#deh_modi_updtBtn').hasClass('hidden')) {
        $('#deh_modi_updtBtn').addClass('hidden');
    }
    if ($('#news_saveBtn').hasClass('hidden')) {
        $('#news_saveBtn').removeClass('hidden');
    }
}


function delete_news(news_id, img) {
//@Sachith 
    confirm("Delete News item", "Are You Sure Want To Delete This record", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_news', news_id: news_id, img: img}, function (e) {
            alertifyMsgDisplay(e, 2000);
            newsDetailsTable();
        }, "json");
    });
}

function properties_select_vehicle(vh_id) {
    $.post("views/commenSettingView.php", {action: 'prop_select_vht', vh_id: vh_id}, function (reply) {
        if (reply === undefined || reply.length === 0 || reply === null) {
            alertify.error("No Data Found", 1000);
        } else {
            $.each(reply, function (index, data) {
                var vh_code_num = data.vh_code.slice(data.supp_code.length);
                $('#vh_id').val(data.vh_id);
                $('#v_code_num').val(data.vh_code);
                $('#vh_supp_code').html(data.supp_code);
                $('#vh_code').val(vh_code_num);
                $('#cmb_vh_group').val(data.vh_group);
                $('.location_ComboBox').val(data.stock_location);
                $('#cmb_stock_status').val(data.stock_status);
                chosenRefresh();
            });
        }
    }, 'json');
}

function vh_code_update(vh_id) {
//@Sachith
    var vh_code = parseInt($('#vh_code').val());
    if (!isNaN(vh_code) && parseInt(vh_id) !== 0) {
        var form_data = {
            vh_code: vh_code,
            vh_id: vh_id
        };
        $.post("views/commenSettingView.php", {action: 'vh_code_change', form_data: form_data}, function (reply) {
            alertifyMsgDisplay(reply, 2000);
            $('#vh_codeModal').modal('hide');
//            reset_news();
//            newsDetailsTable();
        }, 'json');
    } else {
        alert("No valid data found for update");
    }
}

function vh_group_save(vh_id_list, group_name) {
//@Sachith
    if (vh_id_list.length !== 0 && group_name.length >= 0) {
        var form_data = {
            group_name: group_name,
            vh_id_list: vh_id_list
        };
        $.post("views/commenSettingView.php", {action: 'vh_group_change', form_data: form_data}, function (reply) {
            alertifyMsgDisplay(reply, 2000);
            $('#vh_codeModal').modal('hide');
            load_vhGroups();
        }, 'json');
    } else {
        alertify.error("No data found", 2000);
    }
}

function vh_manage_clear(vh_id_list, clr_data) {
//@Ashan 
    if (vh_id_list.length !== 0 && clr_data.length >= 0) {
        var form_data = {
            clr_data: clr_data,
            vh_id_list: vh_id_list
        };
        $.post("views/commenSettingView.php", {action: 'vh_clr_manage', form_data: form_data}, function (reply) {
            // alertifyMsgDisplay(reply, 2000);
            // $('#vh_codeModal').modal('hide');
            load_clr_data();
        }, 'json');
    } else {
        alertify.error("No data found", 2000);
    }
}


function show_group_btn() {
//   @Sachith
    if ($('#update_group').hasClass('hidden')) {
        $('#update_group').removeClass('hidden');
    }
    if (!$('#save_group').hasClass('hidden')) {
        $('#save_group').addClass('hidden');
    }
}

function hide_group_btn() {
//   @Sachith
    if (!$('#update_group').hasClass('hidden')) {
        $('#update_group').addClass('hidden');
    }
    if ($('#save_group').hasClass('hidden')) {
        $('#save_group').removeClass('hidden');
    }
}

function vh_group_update() {
//@Sachith
    var group_name = $('#group_name').val();
    var group_name_pre = $('#group_name_pre').val();
    if (group_name_pre.length > 0 && group_name.length > 0) {
        var form_data = {
            group_name: group_name,
            group_name_pre: group_name_pre
        };
        $.post("views/commenSettingView.php", {action: 'vh_groupname_update', form_data: form_data}, function (reply) {
            alertifyMsgDisplay(reply, 2000);
            $('#group_name_pre').val('');
            $('#group_name').val('');
            hide_group_btn();
            $('#vh_groupModal').modal('hide');
        }, 'json');
    } else {
        alertify.error("No data found", 2000);
    }
}

function vh_location_update(vh_id) {
//@Sachith
    var vh_location = $('.location_ComboBox').val();
    if (vh_location.length !== 0 && vh_location != 0 && parseInt(vh_id) !== 0) {
        var form_data = {
            vh_location: vh_location,
            vh_id: vh_id
        };
        $.post("views/commenSettingView.php", {action: 'vh_location_change', form_data: form_data}, function (reply) {
            alertifyMsgDisplay(reply, 2000);
//            reset_news();
//            newsDetailsTable();
        }, 'json');
    } else {
        alert("No data found for update");
    }
}

function select_vh_web_data(vh_id) {
//@Sachith 
    if (parseInt(vh_id) !== 0) {
        $.post("views/commenSettingView.php", {action: 'sel_vh_web_data', vh_id: vh_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                $('#vh_disp_price').val('');
//                alertify.error("No Data Found", 1000);
            } else {
                $.each(e, function (index, qData) {


                    $('#vh_disp_price').val(qData.vh_disp_price);
                    $('#currency1').html(qData.disp_currency);
                    $('#cmb_stock_status').val(qData.stock_status);
                    $('#vh_disp_price').val(qData.vh_disp_price);
                    $('#currency1').html(qData.disp_currency);
                    $('#cmb_stock_status').val(qData.stock_status);
                    chosenRefresh();
                    if (parseInt(qData.show_data_cus) === 1 && parseInt(qData.show_data_coordinator) === 1) {
                        $("#rbt_data_all").prop("checked", true);
                        $("#rbt_data_coord").prop("checked", false);
                        $("#rbt_data_hidden").prop("checked", false);
                    } else if (parseInt(qData.show_data_coordinator) === 1) {
                        $("#rbt_data_all").prop("checked", false);
                        $("#rbt_data_coord").prop("checked", true);
                        $("#rbt_data_hidden").prop("checked", false);
                    } else {
                        $("#rbt_data_all").prop("checked", false);
                        $("#rbt_data_coord").prop("checked", false);
                        $("#rbt_data_hidden").prop("checked", true);
                    }
                    if (parseInt(qData.show_price_cus) === 1 && parseInt(qData.show_price_coordinator) === 1) {
                        $("#rbt_price_all").prop("checked", true);
                        $("#rbt_price_coord").prop("checked", false);
                        $("#rbt_price_hidden").prop("checked", false);
                    } else if (parseInt(qData.show_price_coordinator) === 1) {
                        $("#rbt_price_all").prop("checked", false);
                        $("#rbt_price_coord").prop("checked", true);
                        $("#rbt_price_hidden").prop("checked", false);
                    } else {
                        $("#rbt_price_all").prop("checked", false);
                        $("#rbt_price_coord").prop("checked", false);
                        $("#rbt_price_hidden").prop("checked", true);
                    }
                });
                webdata_switch_rbt();
            }
            select_vh_web_features(vh_id);
        }, "json");
    } else {
        alertify.error("Invalid record selection", 1500);
    }
}

function webdata_switch_rbt(param) {
    if ($('#rbt_data_hidden').is(':checked')) {
        if (param) {
            $('#rbt_price_hidden').prop('checked', true);
        }
        $("input[type='radio'][name='rbt_price_visible']").prop("disabled", true);
    } else if ($('#rbt_data_coord').is(':checked')) {
        $('#rbt_price_hidden').prop("disabled", false);
        $('#rbt_price_coord').prop("disabled", false);
        $('#rbt_price_all').prop("disabled", true);
        if (param) {
            $('#rbt_price_hidden').prop('checked', true);
        }
    } else {
        $('#rbt_price_coord').prop("disabled", false);
        $('#rbt_price_all').prop("disabled", false);
        $('#rbt_price_hidden').prop("disabled", false);
    }
}
function select_vh_web_features(vh_id) {
//@Sachith 
    if (parseInt(vh_id) !== 0) {
        $(".features_table input[type=checkbox]").prop('checked', false);
        $.post("views/commenSettingView.php", {action: 'select_vh_web_features', vh_id: vh_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
            } else {
                $.each(e, function (index, qData) {
                    $(".features_table input[type=checkbox][value=" + qData.vh_ft_syscode + "]").prop('checked', true);
                });
            }

        }, "json");
    } else {
        alertify.error("Invalid record selection", 1500);
    }
}

function select_clearing_entry(vh_id) {
//@Ashan 
    if (parseInt(vh_id) !== 0) {

        $.post("views/commenSettingView.php", {action: 'select_clearing_entry', vh_id: vh_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
            } else {
                $.each(e, function (index, qData) {
                    $('#duty').val(qData.duty);
                    $('#driver_name').val(qData.driver_name);
                    $('#vessel').val(qData.vessel);
                    $('#document_status').val(qData.document_status);
                    $('#shipped_date').val(qData.shipped_date);
                    $('#refund').val(qData.refunds);
                    $('#arrival_date').val(qData.arrival_date);
                    $('#to_clearing_agent').val(qData.to_clr_agent);
                    $('#clearing_date').val(qData.clr_date);
                    $('#carrier_by').val(qData.transporter_name);
                    $('#lc_no').val(qData.lc_no);
                });
            }

        }, "json");
    } else {
        alertify.error("Invalid record selection", 1500);
    }
}

function select_clearing_balance(agpay_id) {
//    alert(agpay_id);
//@Ashan 
    if (parseInt(agpay_id) !== 0) {

        $.post("views/commenSettingView.php", {action: 'select_clearing_balance', agpay_id: agpay_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
            } else {
                $.each(e, function (index, qData) {

                    load_person_combo(qData.agpay_id);
                    load_customer_cmb(qData.cus_id);
                    vehicle_cb_combo(qData.vh_id);
                    if (qData.pay_type == 1) {
                        $('#rbt_charge').prop('checked', true);
                        $('#rbt_paid').prop('checked', false);
                    } else {
                        $('#rbt_paid').prop('checked', true);
                        $('#rbt_charge').prop('checked', false);
                    }


                    $('#agpay_date').val(qData.agpay_date);
                    $('#ag_charge').val(qData.ag_charge);
                    $('#ag_paid').val(qData.ag_paid);
//                    $('#cb_model').val(qData.);
                    $('#cb_coordinator').val(qData.coordinator);
                    $('#agpay_desc').val(qData.agpay_desc);
                    $('#cb_chassis_no').val(qData.chassis_number);
                    $('#cb_color').val(qData.colour);
                    //load_clrBalance_textBox(qData.ag_name);
                    $('#update_div').removeClass('hidden');
                });
            }

        }, "json");
    } else {
        alertify.error("Invalid record selection", 1500);
    }
}

function load_vehicle_info_data(vh_id) {
//@Sam_Rulz 2015-10-08
// load selected vehicle information
//    var vh_id = $('#vh_reg_id').val();
    if (parseInt(vh_id) !== 0) {
        $.post("views/commenSettingView.php", {action: 'load_vehi_info', vh_id: vh_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
            } else {
                $('#vehicle_code').val(e.mod_name + '  -  ' + e.maker_name);
                $('#vehicle_info').val(e.vh_chassis_code + '  -  ' + e.vh_chassis_num);
                $('#vehicle_cost').val(Number(e.tot_cost).toFixed(2));
                $('#vehicle_stock_status').val(e.stock_status);
                $('#cust_id').val(e.cus_id);
                $('#cus_name').val(e.cus_inv_name);
                $('#vehicle_sold_date').val(e.sold_date);
                $('#vehicle_price').val(Number(e.sold_price).toFixed(2));
            }
            if (parseInt(e.stock_status) === 1) {
                if ($('#vh_save_div').hasClass('hidden')) {
                    $('#vh_save_div').removeClass('hidden');
                }
                $('#vh_update_div').addClass('hidden');
                $('#btn_cust_search').removeClass('hidden');
                $('#addPayment_div').addClass('hidden');
            } else {
                if (!$('#vh_save_div').hasClass('hidden')) {
                    $('#vh_save_div').addClass('hidden');
                }
                $('#btn_cust_search').addClass('hidden');
                $('#vh_update_div').removeClass('hidden');
                $('#addPayment_div').removeClass('hidden');
//                $('#vehicle_sold_date').prop('readonly', true);
//                $('#vehicle_sold_date').prop('disabled', true);
//                $('#vehicle_price').prop('readonly', true);
//                $('#vehicle_price').prop('disabled', true);
            }
            get_vehicle_paidamount(vh_id);
        }, "json");
    } else {
        alertify.error("Invalid record selection", 1500);
    }
}

function get_vehicle_paidamount(vh_id) {
    if (parseInt(vh_id) !== 0) {
        $.post("views/commenSettingView.php", {action: 'get_vehicle_paidamount', vh_id: vh_id}, function (e) {
            if (e === undefined || e === false || e === null) {
                $('#vehicle_balance').val($('#vehicle_price').val());
            } else {
                if (e.paid_amount >= 0) {
                    var paid = parseFloat(e.paid_amount);
                    var sales = parseFloat($('#vehicle_price').val());
                    $('#vehicle_balance').val((sales - paid).toFixed(2));
                } else {
                    $('#vehicle_balance').val(sales.toFixed(2));
                }
            }
        }, "json");
    } else {
        alertify.error("Invalid record selection", 1500);
    }
}

function cancel_vh_payment_local(vp_id) {
    var vh_id = $('#vh_reg_id').val();
    if (parseInt(vp_id) > 0) {
        confirm("Cancel Payment", "Are you sure you want To cancel this payment", "No", "Yes", function () {
            $.post("views/commenSettingView.php", {action: 'cancel_vh_payment', vp_id: vp_id}, function (e) {
                console.log(e);
                if (e.complete === undefined || e.length === 0 || e === null) {

                } else {
                    alertify.success("Successfully Updated", 2000);
                    vh_payments(vh_id);
                    get_vehicle_paidamount(vh_id);
                }

            }, "json");
        });
    } else {
        alertify.error("Invalid record selection", 2000);
    }
}
function update_vehicle_other_data() {
//@Sam_Rulz 2015-10-08
// update_vehicle_other_data
    var vh_id = $('#vh_reg_id').val();
    var sold_date = $('#vehicle_sold_date').val();
    var vehicle_price = $('#vehicle_price').val();
    var cust_id = $('#cust_id').val();
    if (sold_date.length !== 10) {
        alertify.error("Enter a valid date", 2000);
        return;
    }
    if (isNaN(parseFloat(vehicle_price)) || parseFloat(vehicle_price <= 0)) {
        alertify.error("Enter a valid price", 2000);
        return;
    }
    if (parseInt(vh_id) !== 0) {
        confirm("Vehicle Sale", "Are you sure filled information is correct?", "No", "Yes", function () {
            $.post("views/commenSettingView.php", {action: 'insert_vhsale', vh_id: vh_id, sold_date: sold_date, vehicle_price: vehicle_price, cust_id: cust_id}, function (e) {
//            console.log(e);
                if (e.complete === undefined || e.length === 0 || e === null) {
                    alertify.error("Could not complete the action", 2000);
                } else {
                    alertify.success("Successfully Updated", 1500);
                    $('#vh_save_div').addClass('hidden');
                    $('#addPayment_div').removeClass('hidden');
                    get_vehicle_paidamount(vh_id);
                }

            }, "json");
        });
    } else {
        alertify.error("Invalid record selection", 2000);
    }
}
function update_vehicle_sale() {
// update_vehicle_other_data
    var vh_id = $('#vh_reg_id').val();
    var sold_date = $('#vehicle_sold_date').val();
    var vehicle_price = $('#vehicle_price').val();
    var cust_id = $('#cust_id').val();
    if (sold_date.length !== 10) {
        alertify.error("Enter a valid date", 2000);
        return;
    }
    if (isNaN(parseFloat(vehicle_price)) || parseFloat(vehicle_price <= 0)) {
        alertify.error("Enter a valid price", 2000);
        return;
    }
    if (parseInt(vh_id) !== 0) {
        confirm("Vehicle sales information", "Are You Sure you want to update this record", "No", "Yes", function () {
            $.post("views/commenSettingView.php", {action: 'update_vehicl_sale', vh_id: vh_id, sold_date: sold_date, vehicle_price: vehicle_price, cust_id: cust_id}, function (e) {
//            console.log(e);
                if (e.complete === undefined || e.length === 0 || e === null) {
                    alertify.error("Could not complete the action", 2000);
                } else {
                    alertify.success("Successfully Updated", 1500);
                    $('#vh_save_div').addClass('hidden');
                    $('#addPayment_div').removeClass('hidden');
                    get_vehicle_paidamount(vh_id);
                }

            }, "json");
        });
    } else {
        alertify.error("Invalid record selection", 2000);
    }
}

function is_vehicleAvailableforSell(vh_id) {
    if (parseInt(vh_id) !== 0) {
        $.post("views/commenSettingView.php", {action: 'is_vehicleAvailableforSell', vh_id: vh_id}, function (e) {
            if (parseInt(e[0].stock_status) === 1) {
                submitSingleDataByPost("vehicle_sell.php", "vh_id", vh_id);
            } else {
                alertify.error("Vehicle not available for sell", 2000);
            }

        }, "json");
    } else {
        alertify.error("Vehicle not available for sell", 2000);
    }
}

function vh_payment_save(vh_id) {
//@Sachith
    var payMethod_ComboBox = $('#payMethod_ComboBox').val();
    var payCategory_ComboBox = $('#payCategory_ComboBox').val();
    var payment_date = $('#payment_date').val();
    var pay_amount = $('#pay_amount').val();
    var cheque_num = $('#cheque_num').val();
    var cheque_bank = $('#cheque_bank').val();
    var pay_chq_date = $('#pay_chq_date').val();
    var leasing_company = $('#leaseCo_id').val();
    var ex_vh_id = $('#ex_vh_id').val();
    var cust_id = $('#cust_id').val();
    var deposit_bank = $('#deposit_bank').val();
    var pay_confirmed = '1';
    if (parseInt(vh_id) !== 0 && parseInt(cust_id) !== 0) {
        if (payMethod_ComboBox.length > 0 && payCategory_ComboBox.length > 0 && payment_date.length > 0 && parseFloat(pay_amount) > 0) {
            if (payMethod_ComboBox === 'CHEQUE' && cheque_num.length <= 0 && cheque_bank.length < 3) {
                alertify.error('Enter Cheque Number and bank', 2000);
                return;
            }
            if (payCategory_ComboBox === 'VEXCH' && (parseInt(ex_vh_id) <= 0 || isNaN(parseInt(ex_vh_id)))) {
                alertify.error('Select Exchanged Vehicle', 2000);
                return;
            }
            if (payCategory_ComboBox === 'LEASING' && parseInt(leasing_company) <= 0) {
                alertify.error('Select Leasing Company', 2000);
                return;
            }
//
            if (payMethod_ComboBox === 'CHEQUE' && payCategory_ComboBox !== 'LEASING') {
                pay_confirmed = '0';
            }
//
            var form_data = {
                payMethod_ComboBox: payMethod_ComboBox,
                payCategory_ComboBox: payCategory_ComboBox,
                payment_date: payment_date,
                ex_vh_id: ex_vh_id,
                cheque_num: cheque_num,
                cheque_bank: cheque_bank,
                pay_chq_date: pay_chq_date,
                leasing_company: leasing_company,
                pay_amount: pay_amount,
                vh_id: vh_id,
                cust_id: cust_id,
                pay_confirmed: pay_confirmed,
                deposit_bank: deposit_bank
            };
            $.post("views/commenSettingView.php", {action: 'vh_add_payment', form_data: form_data}, function (reply) {
                alertifyMsgDisplay(reply, 2000);
                clear_payment_fields();
                vh_payments(vh_id);
                get_vehicle_paidamount(vh_id);
            }, 'json');
        } else {
            alertify.error('One or more required field are empty', 2500);
        }

    } else {
        alertify.error("No data found", 2000);
    }
}

function clear_payment_fields() {
//    $('#payment_date').val('');
    $('#pay_amount').val('');
    $('#cheque_num').val('');
    $('#cheque_bank').val('');
//    $('#pay_chq_date').val('');
    $('#leasing_company').val('');
    $('#ex_vh_id').val('');
    $('#cheque_bank_id').val('');
}

function select_exch_vehi_local(vh_id) {
    $.post('views/commenSettingView.php', {action: 'select_exch_vh', vh_id: vh_id}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            alertify.error('Error in Vehicle selection.', 2000);
        } else {
            $('#ex_vehicle_info').val(e.maker_name + ' ' + e.mod_name);
            $('#ex_vehicle_code').val(e.vh_chassis);
            $('#ex_vh_id').val(e.vh_id);
        }
    }, 'json');
}


function delete_vh_webdata(vh_id) {
//@Sachith 
    confirm("Delete vehicle web data", "Are you sure you want to permanently remove web data of selected vehicle", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_vh_webdata', vh_id: vh_id}, function (e) {
            alertifyMsgDisplay(e, 2500);
            vh_inweb();
        }, "json");
    });
}

function delete_clearing_data(vh_id) {
//@Ashan 
    confirm("Delete vehicle clearing data", "Are you sure you want to permanently remove clearing data of selected vehicle", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_clearing_data', vh_id: vh_id}, function (e) {
            alertifyMsgDisplay(e, 2500);
            vh_clear_entry_table();
        }, "json");
    });
}

function select_customer_order(pi_id) {
    $.post('views/commenSettingView.php', {action: 'select_cust_from_orders', pi_id: pi_id}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            alertify.error('Error in customer selection.', 2000);
        } else {
            $('#cus_id').val(e.cus_id);
            $('#c_inv_name').val(e.cus_inv_name);
            $('#c_inv_addr').val(e.cus_inv_address);
            $('#consignee_name').val(e.ls_name);
            $('#consignee_address').val(e.ls_address);
//          show_customer_btn();
        }
    }, 'json');
}

function next_ai_ct() {
    $.post('views/commenSettingView.php', {action: 'next_ai_ct'}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            alertify.error('Error in getting maximum value.', 2000);
        } else {
            $('#ref_no').val("CP" + e);
            $('#ct_id').val(e);
        }
    }, 'json');
}



function next_ai_vce() {
    $.post('views/commenSettingView.php', {action: 'next_ai_vce'}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            alertify.error('Error in getting maximum value.', 2000);
        } else {
            alert(e);
            $('#clr_id').val(e);
        }
    }, 'json');
}


function add_vhlist() {
// var isreg = parseInt($("input[type='radio'][name='rbt_itemType']:checked").val());
    var form_data = {
        ct_id: $('#ct_id').val(),
        ref_no: $('#ref_no').val()
    };
    $('#vh_confirm').modal('hide');
    $.post('views/commenSettingView.php', {action: 'add_payorder', form_data: form_data}, function (e) {
        if (e.msgType === 1) {
            alertify.success(e.msg, 1000);
            if (uploadImage === 1 && parseInt(e.resp) > 0) {
//                submitSingleDataByPost("image_upload.php", "vh_id", e.resp);
                submitSingleDataByPostSpecial("pay_order", "vh_id", e.resp, "tab", "2");
            }
        } else {
            alertify.error(e.msg, 2000);
        }
        reset_vehicleReg();
        vahicle_code_combo();
    }, 'json');
}




function load_transfer_info(ct_id) {
    if (parseInt(ct_id) !== '') {
        $.post("views/commenSettingView.php", {action: 'get_ct_info', ct_id: ct_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                alertify.error("No Data Found", 1000);
            } else {
                $.each(e, function (index, qData) {


                    $('#ct_id').val(qData.ct_id);
                    $('#ref_no').val(qData.ref_no);
                    $('#ct_type').val(qData.ct_type);
                    $('#from_bank').val(qData.from_bank);
                    $('#from_bank_branch').val(qData.from_bank_branch);
                    $('#from_name').val(qData.from_name);
                    $('#from_address').val(qData.from_address);
                    $('#from_acc_no').val(qData.from_acc_no);
                    $('#to_bank').val(qData.to_bank);
                    $('#to_bank_branch').val(qData.to_bank_branch);
                    $('#to_name').val(qData.to_name);
                    $('#to_address').val(qData.to_address);
                    $('#to_acc_no').val(qData.to_acc_no);
                    $('#ct_date').val(qData.ct_date);
                    $('#transfer_amount').val(qData.transfer_amount);
                    $('#ct_address').val(qData.ct_address);
                    $('#ct_header').val(qData.ct_header);
                    $('#ct_body').val(qData.ct_body);
                    $('#ct_description').val(qData.ct_description);
                });
                chosenRefresh();
                show_ct_btn();
            }
        }, "json");
    } else {
        alertify.error("Invalid selection", 1000);
    }
}

function select_vh_amount(vh_id) {
//@Sachith 
    if (parseInt(vh_id) !== 0) {

        $.post("models/model_pay_order.php", {action: 'po_vh_select', vh_id: vh_id}, function (e) {
            $.post("views/commenSettingView.php", {action: 'po_vh_select', vh_id: vh_id}, function (e) {

                if (e === undefined || e.length === 0 || e === null) {
                    alertify.error("No Data Found", 1000);
                } else {
                    show_maker_btn();
                    $.each(e, function (index, qData) {

                        $('#vh_amount').val(qData.ct_item_amount);
                    });
                }
            }, "json");
        });
    } else {
        alertify.error("Invalid Vehicle selection", 1000);
    }

}




/*
 
 function load_driver_balance() {
 
 var dname = $('#driver_name').val();
 var driver_details = {
 driver_name: $('#driver_name').val()
 };
 $.post("models/load_data.php", {action: 'load_drch_balance', driver_name_array: driver_details}, function (e) {
 if (e === undefined || e.length === 0 || e === null) {
 alertify.error("No Data Found", 1000);
 } else {
 
 $.each(e, function (index, qData) {
 $('#last_balance').html("Rs." + qData.driver_balance);
 $('.over_payment').addClass('hidden');
 //                if (qData.driver_balance < 0) {
 //                    $('#over_payment').html("Rs." + Math.abs(qData.driver_balance));
 //                    $('.last_balance').addClass('hidden');
 //                } else {
 //                    $('#last_balance').html("Rs." + qData.driver_balance);
 //                    $('.over_payment').addClass('hidden');
 //                }
 
 //(qData.driver_balance.length>0?qData.driver_balance:0)
 });
 }
 }, "json");
 }
 
 */
function load_agent_balances(agent_id) {
    $.post("models/load_data.php", {action: 'load_clear_balance', agent_id: agent_id}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            alertify.error("No Data Found", 1000);
        } else {

            $.each(e, function (index, qData) {
                if (qData.final_balance == '' || qData.final_balance == null) {
                    $('#cb_balance').val('-');
                    $('#cb_last_balance').val('-');
                } else {
                    $('#cb_balance').val(qData.final_balance);
                    $('#cb_last_balance').val(qData.final_balance);
                }
            });
        }
    }, "json");
}


function load_cb_info(cb_id) {

    $.post("models/load_data.php", {action: 'load_cb_info', cb_id: cb_id}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            alertify.error("No Data Found", 1000);
        } else {

            $.each(e, function (index, qData) {
// Todo; this is reload
                load_customer_cmb(qData.cus_id);
                load_agent_balance(qData.agent_id);
                if (qData.payment_type == '1') {
                    $('#rbt_paid').prop('checked', true);
                    $('#charge,#charge_div').addClass('hidden');
                    $('#rbt_charge').prop('checked', false);
                    $("#ag_charge").attr("disabled", true);
                    $("#ag_charge").val("");
                    $("#ag_paid").attr("disabled", false);
                } else if (qData.payment_type == '0') {
                    $('#pay,#pay_div').addClass('hidden');
                    $('#rbt_paid').prop('checked', false);
                    $('#rbt_female').prop('checked', true);
                    $("#ag_paid").attr("disabled", true);
                    $("#ag_paid").val("");
                    $("#ag_charge").attr("disabled", false);
                } else {

                }

                $('#agent_id').val((qData.agent_id == null) ? '-' : qData.agent_id);
                $('#agpay_date').val((qData.date == null) ? '-' : qData.date);
                $('#vh_id').val((qData.vh_id == null) ? '' : qData.vh_id);
                $('#ag_charge').val((qData.charge == null) ? '' : qData.charge);
                $('#ag_paid').val((qData.paid == null) ? '' : qData.paid);
                $('#list').val((qData.list == null) ? '' : qData.list);
                $('#modi_custmr').val((qData.cus_id == null) ? '-' : qData.cus_id);
                $('#clearing_vehicle').val((qData.vh_id == null) ? '-' : qData.vh_id);
                $('#cb_chassis_no').val((qData.vh_chassis_num == null) ? '-' : qData.vh_chassis_num);
                $('#cb_color').val((qData.vh_color == null) ? '-' : qData.vh_color);
                $('#agpay_desc').val((qData.desc == null) ? '-' : qData.desc);
                $('#cb_model').val((qData.mod_name == null) ? '-' : qData.mod_name);
                $('#cb_coordinator').val((qData.coordinator_name == null) ? '-' : qData.coordinator_name);
            });
        }
    }, "json");
}

function get_selected_ls_company_data(ls_id) {
    $.post("views/commenSettingView.php", {action: 'get_selected_ls_company_data', ls_id: ls_id}, function (reply) {
        if (reply === undefined || reply.length === 0 || reply === null) {
            alertify.error("No Data Found", 1000);
        } else {
            $.each(reply, function (index, data) {
                $('#ls_id').val(data.ls_id);
                $('#ls_name').val(data.ls_name);
                $('#ls_address').val(data.ls_address);
                $('#ls_contact').val(data.ls_contact);
                $('#ls_optional_contact').val(data.ls_optional_contact);
                $('#ls_email').val(data.ls_email);
                $('#ls_fax').val(data.ls_fax);
                chosenRefresh();
            });
            update_company_btn();
            loadLsCompanyTypeHead();
        }

    }, 'json');
}



function delete_leasing_company(ls_id) {
//@Sachith 
    confirm("Delete Leasing Company", "Are You Sure Want To Delete This record", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_leasing_company', ls_id: ls_id}, function (e) {
            alertifyMsgDisplay(e, 2000);
            loadLsCompanyTypeHead();
            load_ls_company_tbl();
        }, "json");
    });
}

function ls_company_save() {
    var ls_name = $('#ls_name').val();
    var ls_address = $('#ls_address').val();
    var ls_contact = $('#ls_contact').val();
    var ls_optional_contact = $('#ls_optional_contact').val();
    var ls_email = $('#ls_email').val();
    var ls_fax = $('#ls_fax').val();
    if (ls_name.length !== 0) {
        var form_data = {
            ls_name: ls_name,
            ls_address: ls_address,
            ls_contact: ls_contact,
            ls_optional_contact: ls_optional_contact,
            ls_email: ls_email,
            ls_fax: ls_fax

        };
        $.post("views/commenSettingView.php", {action: 'add_ls_company', form_data: form_data}, function (e) {
            alertifyMsgDisplay(e, 2000);
            next_ai_ls();
            leasing_company_reset()
            load_ls_company_tbl();
        }, 'json');
    } else {
        alert("Please Add Bank Name");
    }
}

function leasing_company_reset() {
    $('#ls_id').val('');
    $('#ls_name').val('');
    $('#ls_address').val('');
    $('#ls_contact').val('');
    $('#ls_optional_contact').val('');
    $('#ls_email').val('');
    $('#ls_fax').val('');
    reset_bank_btn();
}

function update_company_btn() {
//   @Ashan
    if (!$('#ls_company_save').hasClass('hidden')) {
        $('#ls_company_save').addClass('hidden');
    }
    if ($('#ls_company_update').hasClass('hidden')) {
        $('#ls_company_update').removeClass('hidden');
    }
}

function ls_company_update(ls_id) {
    var ls_id = $('#ls_id').val();
    var ls_name = $('#ls_name').val();
    var ls_address = $('#ls_address').val();
    var ls_contact = $('#ls_contact').val();
    var ls_optional_contact = $('#ls_optional_contact').val();
    var ls_email = $('#ls_email').val();
    var ls_fax = $('#ls_fax').val();
    if (ls_name.length !== 0) {
        var form_data = {
            ls_id: ls_id,
            ls_name: ls_name,
            ls_address: ls_address,
            ls_contact: ls_contact,
            ls_optional_contact: ls_optional_contact,
            ls_email: ls_email,
            ls_fax: ls_fax

        };
        $.post("views/commenSettingView.php", {action: 'ls_company_update', form_data: form_data}, function (e) {
            alertifyMsgDisplay(e, 2000);
            next_ai_ls();
            leasing_company_reset()
            load_ls_company_tbl();
        }, 'json');
    } else {
        alert("Please Add Bank Name");
    }
}

function next_ai_ls() {
    $.post('views/commenSettingView.php', {action: 'next_ai_ct'}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            alertify.error('Error in getting maximum value.', 2000);
        } else {
            $('#ref_no').val("CP" + e);
            $('#ct_id').val(e);
        }
    }, 'json');
}

function save_vehicle_registration() {
    var veh_id = $('#vh_id').val();
    var ref_num = $('#ref_no').val();
    var reg_number = $('#reg_number').val();
    var no_plts = $('#no_plates').val();
    var nmbr = $('#number').val();
    var nmbr_sction = $('#number_selection').val();
    var status = $('.status_ComboBox').val();
    var rmb_ofcr_dte = $('#to_rmb_officer').val();
    var cr_rcvd_dte = $('#cr_received_date').val();
    var plts_rcvd_dte = $('#plates_received_date').val();
    var cr_to_cstmr_dte = $('#cr_to_customer').val();
    var plts_to_cstmr_dte = $('#plates_to_customer').val();
    var sbmt_stats = $('#sbmt_stats').val();
    var date = $('#date').val();
    var adtnl_stats = $('#additional_status').val();
    var customer = $('.customer_ComboBox').val();
    var veh_maker = $('#maker_data').val();
    var veh_modal = $('#model_data').val();
    var chasis_num = $('#chassis_no').val();
    var co_ordinator = $('#coordinator_ComboBox').val();
    var data_array = {action: 'save_vehicle_registration', veh_id: veh_id, ref_num: ref_num, veh_maker: veh_maker, veh_modal: veh_modal,
        chasis_num: chasis_num, co_ordinator: co_ordinator, customer: customer, date: date, reg_number: reg_number,
        nmbr_sction: nmbr_sction, nmbr: nmbr, status: status, no_plts: no_plts, rmb_ofcr_dte: rmb_ofcr_dte, cr_rcvd_dte: cr_rcvd_dte,
        plts_rcvd_dte: plts_rcvd_dte, cr_to_cstmr_dte: cr_to_cstmr_dte, plts_to_cstmr_dte: plts_to_cstmr_dte, sbmt_stats: sbmt_stats,
        adtnl_stats: adtnl_stats};
    $.post('views/commenSettingView.php', data_array, function (e) {
        alertifyMsgDisplay(e, 2000);
    }, 'json');
}

/*----------Insurance page-----------------*/

//---------------------------Rest Button insurance Company--------------------------
function insurance_reset() {
    $('#ln_name').val('');
    $('#ln_address').val('');
    $('#ln_contact').val('');
    $('#ln_optional_contact').val('');
    $('#ln_email').val('');
    $('#ln_fax').val('');
    reset_insurance_btn();
}

function reset_insurance_btn() {
    if (!$('#ln_company_update').hasClass('hidden')) {
        $('#ln_company_update').addClass('hidden');
    }
    if ($('#ln_company_save').hasClass('hidden')) {
        $('#ln_company_save').removeClass('hidden');
    }
}

function show_insurance_btn() {
    if ($('#ln_company_update').hasClass('hidden')) {
        $('#ln_company_update').removeClass('hidden');
    }
    if (!$('#ln_company_save').hasClass('hidden')) {
        $('#ln_company_save').addClass('hidden');
    }
}
//----------------insert Insurance Company---------------------------------
function ln_company_save() {
    var ln_name = $('#ln_name').val();
    var ln_address = $('#ln_address').val();
    var ln_contact = $('#ln_contact').val();
    var ln_optional_contact = $('#ln_optional_contact').val();
    var ln_email = $('#ln_email').val();
    var ln_fax = $('#ln_fax').val();
    if (ln_name.length !== 0) {
        var form_data = {
            ln_name: ln_name,
            ln_address: ln_address,
            ln_contact: ln_contact,
            ln_optional_contact: ln_optional_contact,
            ln_email: ln_email,
            ln_fax: ln_fax

        };
        $.post("views/commenSettingView.php", {action: 'add_ln_company', form_data: form_data}, function (e) {
            alertifyMsgDisplay(e, 2000);
            next_ai_ls();
            insurance_reset();
            load_ln_company_tbl();
        }, 'json');
    } else {
        alert("Please Add Insurance Company");
    }
}
//-------------select Insurance Company----------------------------
function selected_ln_company(ln_id) {
    $.post("views/commenSettingView.php", {action: 'get_selected_ln_company_data', ln_id: ln_id}, function (reply) {
        if (reply === undefined || reply.length === 0 || reply === null) {
            alertify.error("No Data Found", 1000);
        } else {
            $.each(reply, function (index, data) {
                $('#ln_id').val(data.ln_id);
                $('#ln_name').val(data.ln_name);
                $('#ln_address').val(data.ln_address);
                $('#ln_contact').val(data.ln_contact);
                $('#ln_optional_contact').val(data.ln_optional_contact);
                $('#ln_email').val(data.ln_email);
                $('#ln_fax').val(data.ln_fax);
                chosenRefresh();
            });
            show_insurance_btn();
        }

    }, 'json');
}
//----------Update Insurance Company-----------------------
function ln_company_update(ln_id) {
    var ln_id = $('#ln_id').val();
    var ln_name = $('#ln_name').val();
    var ln_address = $('#ln_address').val();
    var ln_contact = $('#ln_contact').val();
    var ln_optional_contact = $('#ln_optional_contact').val();
    var ln_email = $('#ln_email').val();
    var ln_fax = $('#ln_fax').val();
    if (ln_name.length !== 0) {
        var form_data = {
            ln_id: ln_id,
            ln_name: ln_name,
            ln_address: ln_address,
            ln_contact: ln_contact,
            ln_optional_contact: ln_optional_contact,
            ln_email: ln_email,
            ln_fax: ln_fax

        };
        $.post("views/commenSettingView.php", {action: 'ln_company_update', form_data: form_data}, function (e) {
            alertifyMsgDisplay(e, 2000);
            insurance_reset();
            load_ln_company_tbl();
        }, 'json');
    } else {
        alert("Please Add Insurance Company");
    }
}
//----------------------------delete Insurance Company----------------------------
function delete_Insurance_company(ln_id) {
    confirm("Delete Insurance Company", "Are You Sure Want To Delete This record", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_Insurance_company', ln_id: ln_id}, function (e) {
            alertifyMsgDisplay(e, 2000);
            load_ln_company_tbl();
        }, "json");
    });
}

//----------------------select customer detaild in insurance page--------------------------
function select_cus_details(cu_id) {
    if (parseInt(cu_id) !== '') {
        $.post("views/commenSettingView.php", {action: 'get_cus_info', cu_id: cu_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                alertify.error("No Data Found", 1000);
            } else {
                $.each(e, function (index, qData) {
                    $('#c_addr').val(qData.cus_address);
                    $('#c_phone1').val(qData.cus_phone1);
                    $('#c_phone2').val(qData.cus_phone2);
                });
            }
            chosenRefresh();
        }, "json");
    } else {
        alertify.error("Invalid selection", 1000);
    }
}



//FILE ADD TO THE SYSTEM 




function reset_file_data() {
    $('#v_code_num').val("");
    $('#file_name').val("");
    $('#description').val("");
    $('#file_number').val("");
}