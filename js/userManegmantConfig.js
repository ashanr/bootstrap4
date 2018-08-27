  function inputKeyUp(e) {
                e.which = e.which || e.keyCode;
                if (e.which === 13) {
                    var userName = $('#userName').val();
                    var password = $('#password').val();

                    if ($('#remember').prop('checked')) {
                        var remember = "r";
                    } else {
                        var remember = "nr";
                    }
                    login(userName, password, remember);
                }
            }

            $(function () {
                $('.showHidePwd').on('change', function () {
                    $('#password').hideShowPassword($(this).prop('checked'));
                });

                $('#logSystem').click(function () {
                    var userName = $('#userName').val();
                    var password = $('#password').val();
                    var remember = "nr";
                    login(userName, password, remember);
                });
            });

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
    confirmModal.find('#OkButton').click(function(event) {
        callback();
        confirmModal.modal('hide');
    });
    confirmModal.modal('show');
}

function checkurl() {
    var pathname = location.pathname;  // window.location.pathname;
    $.post("views/checkUsersAndPrivilages.php", {checkUrl: 'login', path: pathname}, function(e) {
        if (e.ok > '0') {
        } else {
            timelyRedirect("index.php", 0);
        }
    }, "json");
}
/**
 * on successful login, redirects to 'dashboaard.php'
 * @param {type} userName
 * @param {type} password
 * @param {type} remember
 * @returns {undefined}
 */
function  login(userName, password, remember) {
    $.post("views/checkUsersAndPrivilages.php", {logSystem: 'login', userName: userName, password: password, remember: remember}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            alertify.error("System Error Occured", 2000);
        } else {
            $.each(e, function(index, msgData) {
                if (msgData.msgType === 0) {
//                    alertify.success(msgData.msg, 1450)
                    timelyRedirect("dashboard.php", 500);
                } else if (msgData.msgType === 1) {
                    alertify.error(msgData.msg, 2000);
                } else if (msgData.msgType === 2) {
                    alertify.error(msgData.msg, 2000);
                } else if (msgData.msgType === 3) {
                    alertify.error(msgData.msg, 2000);
                }
            });
        }
    }, "json");
}

function timelyRedirect(url, delay) {
    setTimeout(function() {
        window.location = url;
    }, delay);
}

function logout() {
    alertify.confirm("Are you sure want to log out the system", function(e) {
        if (e) {
            $.post("views/checkUsersAndPrivilages.php", {logout: 'logout'}, function(e) {
                if (e == 1) {
                    timelyRedirect("index.php", 250);
                }
            });
        }
    });
}

//function pageProtect() {
//    $.post("views/checkUsersAndPrivilages.php", {pageProtect: 'data'}, function(e) {
//        if (e == 1) {
//            timelyRedirect("index.php", 0);
//        }
//    });
//}

function pageProtect() {
    $.post("views/checkUsersAndPrivilages.php", {pageProtect: 'data'}, function(e) {
        if (e == 1) {
            timelyRedirect("index.php", 0);
        }
    });
}

function chosenRefresh() {
    $("select").trigger("chosen:updated");
}

function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode != 46 && charCode > 31
            && (charCode < 48 || charCode > 57))
        return false;

    return true;
}

function clearUserLevelFelds() {
    $('#userLevelId').val('');
    $('#userLevel').val('');
}

function saveUserLevel() {
    var userLevel = $('#userLevel').val();
    $.post("views/userManegmentView.php", {action: 'saveAdminLevels', userLevel: userLevel}, function(e) {
        alertifyMsgDisplay(e, 1000, function() {
            clearUserLevelFelds();
            userLevelTble();
            get_userlecelCombo();
        });
    }, "json");
}

//sanjeewa
function savePrivillegeLevel() {
    var UserLevelPrivillage = $('.UserLevelPrivillage').val();
    var selUserPrivilege = $('#selUserPrivilege').val();
    $.post("views/userManegmentView.php", {action: 'savePrivillegeLevels', selUserLevel: UserLevelPrivillage, selUserPrivilege: selUserPrivilege}, function(e) {
        alertifyMsgDisplay(e, 1000, function() {
            //clearUserLevelFelds();
            userPrivillegeTble($('.UserLevelPrivillage').val());
        });
    }, "json");
}
function userLevelTble() {
    var tableData = '';
    $.post("views/userManegmentView.php", {action: "userLevelTbl"}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr><th colspan="4" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
            $('.userLevelTble tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, qData) {
                index++;
                if (qData.usrLvlPrvSeq === '20') {
                } else {
                    tableData += '<tr>';
                    tableData += '<td>' + index + '</td>';
                    tableData += '<td>' + qData.lvName + '</td>';
                    tableData += '<td>' + qData.usrLvlPrvSeq + '</td>';
                    tableData += '<td><div class="btn-group"><button class="btn btn-primary selectULevel" value="' + qData.lvID + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Select</button><button class="btn btn-danger deleteUserLevel" value="' + qData.lvID + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                    tableData += '</tr>';
                }
            });
            $('.userLevelTble tbody').html('').append(tableData);

            $('.deleteUserLevel').click(function() {
                var userLevelId = $(this).val();
                confirm("Delete System User", "Are You Sure Want To Delete This User Level", "No", "Yes", function() {
                    deleteUserLevel(userLevelId);
                });
            });

            $('.selectULevel').click(function() {
                $('#savesection').addClass("hidden");
                $('#updateSection').removeClass("hidden");
                var userLevelId = $(this).val();
                selectDataToUp(userLevelId);
            });
        }
    }, "json");
}
//sanjeewa
function userPrivillegeTble(usrLvl) {
    var tableData = '';
    $.post("views/userManegmentView.php", {action: "userPrivilTbl", usrLvl: usrLvl}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr><th colspan="4" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
            $('.userPrivillegeTble tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, qData) {
                index++;
                if (qData.usrLvlPrvSeq === '20') {
                } else {
                    tableData += '<tr>';
                    tableData += '<td>' + index + '</td>';
                    tableData += '<td>' + qData.lvName + '</td>';
                    tableData += '<td>' + qData.prvName + '</td>';
                    tableData += '<td><div class="btn-group"><button class="btn btn-danger deleteUserPrivi" value="' + qData.usrLvl + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                    tableData += '</tr>';
                }
            });
            $('.userPrivillegeTble tbody').html('').append(tableData);


            $('.deleteUserPrivi').click(function() {
                var selUserLevel = $(this).val();
                confirm("Delete program", "Are You Sure Want To Delete This User Level", "No", "Yes", function() {
                    deletePriviLevel(selUserLevel);
                });
            });
        }
    }, "json");
}

function deleteUserLevel(data) {
    $.post("views/userManegmentView.php", {action: "deleteUserLevel", userLevelId: data}, function(e) {
        alertifyMsgDisplay(e, 1000, function() {
            userLevelTble();
            get_userlecelCombo();
        });
    }, "json");
}

//sanjeewa
function deletePriviLevel(data) {
    $.post("views/userManegmentView.php", {action: "deletePriviLevel", selUserLevel: data}, function(e) {
        alertifyMsgDisplay(e, 1000, function() {
            userPrivillegeTble($('.UserLevelPrivillage').val());
        });
    }, "json");
}

function selectDataToUp(data) {
    $.post("views/userManegmentView.php", {action: "selectUlevel", userLevelId: data}, function(e) {
        $.each(e, function(index, qData) {
            $('#userLevel').val(qData.lvName);
            $('#hiddnField').val(qData.lvID);
        });
    }, "json");
}

function updateUserlevel() {
    var newUserLevel = $('#userLevel').val();
    var hiddnField = $('#hiddnField').val();
    $.post("views/userManegmentView.php", {action: "updateUlevel", newUserLevel: newUserLevel, hiddnField: hiddnField}, function(e) {
        alertifyMsgDisplay(e, 1000, function() {
            userLevelTble();
            get_userlecelCombo();
        });
    }, "json");
}


function get_userlecelCombo(selected, callBack) {
    var comboData = '';
    $.post("views/userManegmentView.php", {action: 'loadUserLevelCombo'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.selUserLevel').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function(index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.lvID)) {
                        comboData += '<option value="' + qData.lvID + '" selected>' + qData.lvName + '</option>';
                    } else {
                        comboData += '<option value="' + qData.lvID + '">' + qData.lvName + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.lvID + '">' + qData.lvName + '</option>';
                }
            });
            $('.selUserLevel').html('').append(comboData);
            chosenRefresh();
        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, "json");
}

//sanjeewa

function selUserPrivilege(selected, callBack) {
    var comboData = '';
    $.post("views/userManegmentView.php", {action: 'loadPrivillegeCombo'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.selUserPrivilege').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function(index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.prvCode)) {
                        comboData += '<option value="' + qData.prvCode + '" selected>' + qData.usrPrvMnuName + '</option>';
                    } else {
                        comboData += '<option value="' + qData.prvCode + '">' + qData.usrPrvMnuName + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.prvCode + '">' + qData.usrPrvMnuName + '</option>';
                }
            });
            $('.selUserPrivilege').html('').append(comboData);
            chosenRefresh();
        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, "json");
}

function clearAdTexBox() {
    $('#address').val('');
    $('#username').val('');
    $('#password').val('');
    $('#conPassword').val('');
    $('#selUserLevel').val('');
    var cur_date=new Date();
    var month=parseInt(cur_date.getMonth())+1;
    $('#date').val(cur_date.getFullYear()+'-'+month+'-'+cur_date.getDate());
    $('#empNo').val('');
    $('#nic').val('');
    $('#fName').val('');
    $('#lName').val('');
    $('#mobile').val('');
    $('#work').val('');
    $('#home').val('');
    $('#eMail').val('');
}

function saveAdminUser() {
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
    var home = $('#home').val();
    var eMail = $('#eMail').val();
    var userStatus = $('#userStatus').val();
    $.post("views/userManegmentView.php", {action: 'addNewAdminUser', branchID: branchID, address: address, username: username, password: password, selUserLevel: selUserLevel, date: date, empNo: empNo, nic: nic, fName: fName, lName: lName, mobile: mobile, work: work, home: home, eMail: eMail, userStatus: userStatus}, function(e) {
        alertifyMsgDisplay(e, 1000, function() {
            adminUserTbl();
            clearAdTexBox();
            get_usernameCombo();
        });
    }, "json");
}

function checkUsername(data) {
    $.post("views/userManegmentView.php", {action: 'checkUname', typeUname: data}, function(e) {
        if (e > 0) {
            $('#unameMsg').html("Username Currently Exist");
            $('#useerAdsavesection').addClass("hidden");
        } else {
            $('#unameMsg').html("");
            $('#useerAdsavesection').removeClass("hidden");
        }
    });
}

function adminUserTbl() {
    var tableData = '';
    $.post("views/userManegmentView.php", {action: "adminUserTbl"}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr><th colspan="6" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
            $('.adminUsersTbl tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, qData) {
                index++;
                if (qData.usrLvlPrvSeq === '20') {
                } else {
                    tableData += '<tr>';
                    tableData += '<td>' + index + '</td>';
                    tableData += '<td>' + qData.usrName + '</td>';
                    tableData += '<td>' + qData.usrFName + '</td>';
                    tableData += '<td>' + qData.usrLName + '</td>';
                    tableData += '<td>' + qData.lvName + '</td>';
                    tableData += '<td><div class="btn-group"><button class="btn btn-primary selectSystemUser" value="' + qData.usrID + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Select</button><button class="btn btn-danger deletesystemUser" value="' + qData.usrID + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                    tableData += '</tr>';
                }
            });
            $('.adminUsersTbl tbody').html('').append(tableData);

            $('.selectSystemUser').click(function() {
                $('#useerAdsavesection').addClass("hidden");
                $('#userAdupdateSection').removeClass("hidden");
                var adminUserId = $(this).val();
                selectadminUserDataToUp(adminUserId);
            });

            $('.deletesystemUser').click(function() {
                var userLevelId = $(this).val();
                confirm("Delete program", "Are You Sure Want To Delete This User Level", "No", "Yes", function() {
                    deleteSystemUser(userLevelId);
                });
            });
        }
    }, "json");
}

function deleteSystemUser(data) {
    $.post("views/userManegmentView.php", {action: 'deleteUser', userId: data}, function(e) {
        alertifyMsgDisplay(e, 1000, function() {
            adminUserTbl();
        });
    }, "json");
}

function selectadminUserDataToUp(data) {
    $.post("views/userManegmentView.php", {action: 'getUserData', userId: data}, function(e) {
        $.each(e, function(index, qData) {
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

function updateSystemUserTble() {
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
    $.post("views/userManegmentView.php", {action: 'updateSystemUserData', hiddenUserId: hiddenUserId, address: address, selUserLevel: selUserLevel, date: date, empNo: empNo, nic: nic, fName: fName, lName: lName, mobile: mobile, work: work, home: home, eMail: eMail, userStatus: userStatus}, function(e) {
        alertifyMsgDisplay(e, 1000, function() {
            userLevelTble();
            clearAdTexBox();
        });
    }, "json");
}
function get_usernameCombo(selected, callBack) {
    var comboData = '';
    $.post("views/userManegmentView.php", {action: 'loadUsernameCombo'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.selUsername').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function(index, qData) {
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

function load_filtered_privileges() {
    var sel_u = $('#selUsername').val();
    var available = $('#available_privilegs');


    $.post("views/userManegmentView.php", {action: 'loadfilter_left_user', sel_u: sel_u}, function(d) {
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

function loadUserPrivileges() {
    var sel_u = $('#selUsername').val();
    var available = $('#available_privilegs');
    var assigned = $('#assigned_privileges');
    $.post("views/userManegmentView.php", {action: 'rightuser_privileges', sel_u: sel_u}, function(d) {
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

function updatesystemuser() {
    var selUserLevel = $('#selUserLevel').val();
    var date = $('#date').val();
    var empNo = $('#empNo').val();
    var nic = $('#nic').val();
    var fName = $('#fName').val();
    var lName = $('#lName').val();
    var address = $('#address').val();
    var mobile = $('#mobile').val();
    var work = $('#work').val();
    var home = $('#home').val();
    var eMail = $('#eMail').val();
    var userStatus = $('#userStatus').val();
    var hiddenUserId = $('#hiddenUserId').val();
    $.post("views/userManegmentView.php", {action: "systemuser", selUserLevel: selUserLevel, date: date, empNo: empNo, nic: nic, fName: fName, lName: lName, address: address, mobile: mobile, work: work, home: home, eMail: eMail, userStatus: userStatus, hiddenUserId: hiddenUserId}, function(e) {
        alertifyMsgDisplay(e, 1000, function() {
            adminUserTbl();
           updatesystemuser_clear();
        });
    }, "json");
}
function updatesystemuser_clear() {
    $('#selUserLevel').val('');
    $('#date').val('');
    $('#empNo').val('');
    $('#nic').val('');
    $('#fName').val('');
    $('#lName').val('');
    $('#address').val('');
    $('#mobile').val('');
    $('#work').val('');
    $('#home').val('');
    $('#eMail').val('');
    $('#userStatus').val('');
    $('#hiddenUserId').val('');
}