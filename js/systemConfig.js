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



