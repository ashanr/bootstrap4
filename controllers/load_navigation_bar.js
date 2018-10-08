//function load_navigation_bar() {
//var comboData = '';
//        $.post("Models/model_load_navigation_bar.php", {action: 'load_nav_bar'}, function (e) {
//        if (e === undefined || e.length === 0 || e === null) {
//        comboData += '<li class = "dropdown">   <a class= "nav-link dropdown-toggle" data-toggle = "dropdown" href = "#" role = "button" aria-haspopup = "true" aria-expanded = "false">\n\
//         <div class = "img" style = "background-image: url("https://avatars3.githubusercontent.com/u/3959008?v=3&s=40")"> </div> <span class="name">Administrator</span></a>';
//                $('.selUsername').html('').append(comboData);
//                chosenRefresh();
//        } else {
//        $.each(e, function (index, qData) {
//        if (selected !== undefined || e !== null || e.length !== 0) {
//        if (parseInt(selected) === parseInt(qData.usrID)) {
//        comboData += '<option value="' + qData.usrID + '" selected>' + qData.usrName + '</option>';
//        } else {
//        comboData += '<option value="' + qData.usrID + '">' + qData.usrName + '</option>';
//        }
//        } else {
//        comboData += '<option value="' + qData.usrID + '">' + qData.usrName + '</option>';
//        }
//        });
//                $('.selUsername').html('').append(comboData);
//                chosenRefresh();
//        }
//        if (callBack !== undefined) {
//        if (typeof callBack === 'function') {
//        callBack();
//        }
//        }
//        }, "json");
//        }
