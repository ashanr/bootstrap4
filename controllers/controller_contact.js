
function send_contact_message(email, title, message) {
//    var email = email;
//    var title = title;
//    var message = message;
// Load data with vehicle ID


    if ((email !== '') && (title !== '') && (message !== '')) {
        $.post("Models/model_contact.php", {action: 'send_contact_mail', email: email, title: title, message: message}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                var msg9 = alertify.error("Error in Message Sending!");
                msg9.delay(3).setContent(msg9);
            } else {
                var msg7 = alertify.success("Message Successfully Sent!");
                msg7.delay(3).setContent(msg7);
            }
        }, "json");
    } else if ((email.length == 0) || (email === '')) {
        var msg1 = alertify.error("Please Enter email!");
        msg1.delay(3).setContent(msg1);
    } else if (validateEmail(email)) {
        var msg1 = alertify.error("Invalid Email Format!");
        msg1.delay(3).setContent(msg1);
       
    } else if (title.length == 0) {
        var msg2 = alertify.error("Please Enter Title!");
        msg2.delay(3).setContent(msg2);
    } else if (message == '') {
        var msg3 = alertify.error("Please Enter Message!");
        msg3.delay(3).setContent(msg3);
    } else {
        var msg = alertify.error("Message Could not Be sent!");
        msg.delay(3).setContent(msg);
    }
}


// Function that validates email address through a regular expression.
function validateEmail(sEmail) {
    var filter = /^[w-.+]+@[a-zA-Z0-9.-]+.[a-zA-z0-9]{2,4}$/;
    if (filter.test(sEmail)) {
        return true;
    } else {
        return false;
    }
}