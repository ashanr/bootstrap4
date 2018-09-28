function save_user() {
//    var branchID = $('#branchComboBox').val();
    var branchID = 1;
    var address = $('#address').val();
    var username = $('#username').val();
    var password = $('#password').val();
    var selUserLevel = $('#selUserLevel').val();
    var date = $('#date').val();
    var empNo = $('#empNo').val();
    var nic = $('#nic').val();
    var fName = $('#fName').val();
    var lName = $('#lName').val();
    var mobile = $('#mobile').val();
    var work = $('#work').val();
    var home = '07000000';
    var eMail = $('#eMail').val();
    var userStatus = $('#userStatus').val();
    $.post("Models/model_user_management.php", {action: 'addNewAdminUser', branchID: branchID, address: address, username: username, password: password, selUserLevel: selUserLevel, date: date, empNo: empNo, nic: nic, fName: fName, lName: lName, mobile: mobile, work: work, home: home, eMail: eMail, userStatus: userStatus}, function (e) {
        alertifyMsgDisplay(e, 1000, function () {
            admin_user_table();
            clear_user_form();
            get_usernameCombo();
        });
    }, "json");
}

function clear_user_form() {
    $('#address').val('');
    $('#username').val('');
    $('#password').val('');
    $('#conPassword').val('');
    $('#selUserLevel').val('');
    var cur_date = new Date();
    var month = parseInt(cur_date.getMonth()) + 1;
    $('#date').val(cur_date.getFullYear() + '-' + month + '-' + cur_date.getDate());
    $('#empNo').val('');
    $('#nic').val('');
    $('#fName').val('');
    $('#lName').val('');
    $('#mobile').val('');
    $('#work').val('');
    $('#home').val('');
    $('#eMail').val('');
}


function update_user() {
    var address = $('#address').val();
    var selUserLevel = $('#selUserLevel').val();
    var date = $('#date').val();
    var empNo = $('#empNo').val();
    var nic = $('#nic').val();
    var fName = $('#fName').val();
    var lName = $('#lName').val();
    var mobile = $('#mobile').val();
    var work = $('#work').val();
    var home = $('#home').val();
    var eMail = $('#eMail').val();
    var userStatus = $('#userStatus').val();
    var hiddenUserId = $('#hiddenUserId').val();
    $.post("Models/model_user_management.php", {action: 'updateSystemUserData', hiddenUserId: hiddenUserId, address: address, selUserLevel: selUserLevel, date: date, empNo: empNo, nic: nic, fName: fName, lName: lName, mobile: mobile, work: work, home: home, eMail: eMail, userStatus: userStatus}, function(e) {
        alertifyMsgDisplay(e, 1000, function() {
            userLevelTble();
            clearAdTexBox();
        });
    }, "json");
}

function select_admin_user(data) {
    $.post("Models/model_user_management.php", {action: 'getUserData', userId: data}, function (e) {
        $.each(e, function (index, qData) {
            $('#hiddenUserId').val(qData.usrID);
            $('#address').val(qData.usrAddress);
            get_userlecelCombo(qData.usrLevel);
            $('#date').val(qData.usrRegDate);
            $('#empNo').val(qData.usrEmpNo);
            $('#nic').val(qData.usrNIC);
            $('#fName').val(qData.usrFName);
            $('#lName').val(qData.usrLName);
            $('#mobile').val(qData.usrMobileNo);
            $('#work').val(qData.usrWorkTelNo);
            $('#home').val(qData.usrHomeTelNo);
            $('#eMail').val(qData.usrEmail);
            $('#userStatus').val(qData.usrStatus);
        });
    }, "json");
}
