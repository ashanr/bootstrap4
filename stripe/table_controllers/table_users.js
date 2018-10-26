function admin_user_table() {
    var tableData = '';
    $.post("Models/model_user_management.php", {action: "adminUserTbl"}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr><th colspan="6" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
            $('.adminUsersTbl tbody').html('').append(tableData);
        } else {
            $.each(e, function (index, qData) {
                index++;
                if (qData.usrLvlPrvSeq === '20') {
                } else {
                    tableData += '<tr>';
                    tableData += '<td>' + index + '</td>';
                    tableData += '<td>' + (qData.usrName ? qData.usrName : '-') + '</td>';
                    tableData += '<td>' + (qData.usrEmail ? qData.usrEmail : '-') + '</td>';
                    tableData += '<td>' + qData.usrStatus + '</td>';
                    tableData += '<td>' + qData.lvName + '</td>';
                    tableData += '<td><div class="btn-group"><button class="btn btn-primary selectSystemUser" value="' + qData.usrID + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Select</button><button class="btn btn-danger deletesystemUser" value="' + qData.usrID + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                    tableData += '</tr>';
                }
            });
            
            $('.adminUsersTbl tbody').html('').append(tableData);

            $('.selectSystemUser').click(function () {
                show_update_btn();
                var adminUserId = $(this).val();
                select_admin_user(adminUserId);
            });

            $('.deletesystemUser').click(function () {
                var userLevelId = $(this).val();
                confirm("Delete program", "Are You Sure Want To Delete This User Level", "No", "Yes", function () {
                    deleteSystemUser(userLevelId);
                });
            });
        }
    }, "json");
}