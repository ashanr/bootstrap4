function adminUserTbl() {
    var tableData = '';
    $.post("views/userManegmentView.php", {action: "adminUserTbl"}, function (e) {
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
                    tableData += '<td>' + qData.usrName + '</td>';
                    tableData += '<td>' + qData.usrFName + '</td>';
                    tableData += '<td>' + qData.usrLName + '</td>';
                    tableData += '<td>' + qData.lvName + '</td>';
                    tableData += '<td><div class="btn-group"><button class="btn btn-primary selectSystemUser" value="' + qData.usrID + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Select</button><button class="btn btn-danger deletesystemUser" value="' + qData.usrID + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                    tableData += '</tr>';
                }
            });
            
            $('.adminUsersTbl tbody').html('').append(tableData);

            $('.selectSystemUser').click(function () {
                $('#useerAdsavesection').addClass("hidden");
                $('#userAdupdateSection').removeClass("hidden");
                var adminUserId = $(this).val();
                selectadminUserDataToUp(adminUserId);
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