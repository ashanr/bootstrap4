function get_usernameCombo(selected, callBack) {
    var comboData = '';
    $.post("views/userManegmentView.php", {action: 'loadUsernameCombo'}, function (e) {
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

