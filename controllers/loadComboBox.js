function get_usernameCombo(selected, callBack) {
    var comboData = '';
    $.post("Models/modelComboBox.php", {action: 'loadUsernameCombo'}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.selUsername').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function (index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.usrID)) {
                        comboData += '<option value="' + qData.usrID + '" selected>' + qData.usrName + '</option>';
                    } else {
                        comboData += '<option value="' + qData.usrID + '">' + qData.usrName + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.usrID + '">' + qData.usrName + '</option>';
                }
            });
            $('.selUsername').html('').append(comboData);
            chosenRefresh();
        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, "json");
}

function loadUserPrivileges() {
    var sel_u = $('#selUsername').val();
    var available = $('#available_privilegs');
    var assigned = $('#assigned_privileges');
    $.post("Models/model_user_management.php", {action: 'rightuser_privileges', sel_u: sel_u}, function(d) {
        if (d === undefined || d.length === 0 || d === null) {
            assigned.html('<option disabled class="not_selectable">No privileges assigned yet.</option>');
        } else {
            $('#assigned_privileges').empty();
            $.each(d, function(index, prvdata) {
                assigned.append('<option value="' + prvdata.usrPrvCode + '" data-prvcode="' + prvdata.usrPrvCode + '" data-prvname="' + prvdata.prvName + '">' + prvdata.usrPrvCode + ' - ' + prvdata.prvName + '</option>');
            });
        }
    }, 'json');
}

function load_filtered_privileges() {
    var sel_u = $('#selUsername').val();
    var available = $('#available_privilegs');

    $.post("Models/model_user_management.php", {action: 'loadfilter_left_user', sel_u: sel_u}, function(d) {
        if (d === undefined || d.length === 0 || d === null) {
            available.html('<option disabled class="not_selectable">No privileges.</option>');
        } else {
            available.empty();
            $.each(d, function(index, prvdata) {
                available.append('<option value="' + prvdata.prvCode + '" data-prvcode="' + prvdata.prvCode + '" data-prvname="' + prvdata.prvName + '">' + prvdata.prvCode + ' - ' + prvdata.prvName + '</option>');
            });
        }
    }, 'json');
}

//GET CUSTOMERS
function load_affiliate_customers(selected, callBack) {
    var comboData = '';
    $.post("Models/modelComboBox2.php", {action: 'load_affiliate_user_combo'}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.affiliate_customer').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function (index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.account_id)) {
                        comboData += '<option value="' + qData.account_id + '" selected>' + qData.firstname + '&nbsp;&nbsp;    -   &nbsp; &nbsp; ' + qData.email + '</option>';
                    } else {
                        comboData += '<option value="' + qData.account_id + '">' + qData.firstname + '&nbsp;&nbsp;    -   &nbsp; &nbsp; '  + qData.email + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.account_id + '">' + qData.firstname + '&nbsp;&nbsp;    -   &nbsp; &nbsp; '  + qData.email + '</option>';
                }
            });
            $('.affiliate_customer').html('').append(comboData);
            chosenRefresh();
        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {sq
                callBack();
            }
        }
    }, "json");
}