function load_syscode_values(sys_type, combo, callBack) {
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'syscode_types', sys_type: sys_type}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
        } else {
            $.each(e, function (index, qData) {
                comboData += '<option value="' + qData.description + '">' + qData.description + '</option>';
            });
        }
        $(combo).html('').append(comboData);
        chosenRefresh();
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, "json");
}

function load_syscode_withRemarks(sys_type, combo, callBack) {
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'syscode_types', sys_type: sys_type}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
        } else {
            $.each(e, function (index, qData) {
                comboData += '<option value="' + qData.description + '">' + qData.description + '::' + qData.remarks + '</option>';
            });
        }
        $(combo).html('').append(comboData);
        chosenRefresh();
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, "json");
}


// Developed by ashan
function file_code_combo(selected, callBack) {
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'file_code_combo'}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.file_code_combo').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function (index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.vh_id)) {
                        comboData += '<option value="' + qData.image_ai_id + '" selected>' + qData.file_id + '</option>';
                    } else {
                        comboData += '<option value="' + qData.image_ai_id + '">' + qData.file_id + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.image_ai_id + '">' + qData.file_id + '</option>';
                }
            });
            $('.file_code_combo').html('').append(comboData);
            chosenRefresh();
        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, "json");
}

// Developed by ashan
function file_subject_combo(selected, callBack) {
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'file_subject_combo'}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.category_ComboBox').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function (index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.subject_id)) {
                        comboData += '<option value="' + qData.subject_code + '" selected>' + qData.subject_name + '</option>';
                    } else {
                        comboData += '<option value="' + qData.subject_code + '">' + qData.subject_name + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.subject_code + '">' + qData.subject_name + '</option>';
                }
            });
            $('.category_ComboBox').html('').append(comboData);
            chosenRefresh();
        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, "json");
}