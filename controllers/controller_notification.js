function save_notification() {

    var title = $('#title').val();
    var message = $('#message').val();
    var date = $('#date').val();
    var pub_date = $('#pub_date').val();
    var exp_date = $('#exp_date').val();


    if ((title.length = 0) || (title == '')) {
        var msg7 = alertify.error("Please Enter Title!");
        msg7.delay(3).setContent(msg7);
        return;
    } else if((message.length = 0) || (message == '')) {
        var msg7 = alertify.error("Please Enter Message!");
        msg7.delay(3).setContent(msg7);
        return;
    } else if((pub_date.length = 0) || (pub_date == '')) {
        var msg7 = alertify.error("Enter Publish Date!");
        msg7.delay(3).setContent(msg7);
        return;
    } else if((exp_date.length = 0) || (exp_date == '')) {
        var msg7 = alertify.error("Enter Expire Date!");
        msg7.delay(3).setContent(msg7);
        return;
    } 

    $.post("models/model_notification.php", {action: "save_notification", title: title, message: message, date: date, pub_date: pub_date, exp_date: exp_date}, function (e) {
        $.each(e, function (index, msgData) {

            if (e === undefined || e.length === 0 || e === null) {
                var msg9 = alertify.error("Error!");
                msg9.delay(3).setContent(msg9);
            } else if (msgData.msgType == 1) {
                var msg7 = alertify.success("Successfully Saved!");
                msg7.delay(3).setContent(msg7);
                clear_fields()
            } else if (msgData.msgType == 2) {
                var msg7 = alertify.error("Error in Save!");
                msg7.delay(3).setContent(msg7);
            }
        });
    }, 'json');
}

function update_notification() {

    var title = $('#title').val();
    var message = $('#message').val();
    var date = $('#date').val();
    var pub_date = $('#pub_date').val();
    var exp_date = $('#exp_date').val();

    $.post("models/model_notification.php", {action: "save_notification", title: title, message: message, date: date, pub_date: pub_date, exp_date: exp_date}, function (e) {
        $.each(e, function (index, msgData) {

            if (e === undefined || e.length === 0 || e === null) {
                var msg9 = alertify.error("Error!");
                msg9.delay(3).setContent(msg9);
            } else if (msgData.msgType == 1) {
                var msg7 = alertify.success("Successfully Saved!");
                msg7.delay(3).setContent(msg7);
                clear_fields()
            } else if (msgData.msgType == 2) {
                var msg7 = alertify.error("Error in Save!");
                msg7.delay(3).setContent(msg7);
            }
        });
    }, 'json');
}

function reset() {
    clear_fields();
}


function clear_fields() {
    var title = $('#title').val("");
    var message = $('#message').val("");
    var date = $('#date').val("");
    var pub_date = $('#pub_date').val("");
    var exp_date = $('#exp_date').val("");
}


function show_save() {

    $('#btnUpdate').addClass('hidden');

    if ($('.btnSave').hasClass('hidden')) {
        $('.btnSave').removeClass('hidden')
    }

    if (!$('.btnUpdate').hasClass('hidden')) {
        $('.btnUpdate').addClass('hidden')
    }
}


function show_update() {

    if (!$('#btnSave').hasClass('hidden')) {
        $('#btnSave').addClass('hidden')
    }

    if ($('#btnUpdate').hasClass('hidden')) {
        $('#btnSave').removeClass('hidden')
    }
}