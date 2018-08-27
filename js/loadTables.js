/*---------- Subject Table ---------------*/
function load_subject_table() {
    //@Ashan 
    var tableData = '';
    $.post("views/loadTables.php", {table: "subject_table"}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr><th colspan="2" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
            $('.maker_info_table tbody').html('').append(tableData);
        } else {
            $.each(e, function (index, qData) {
                index++;
                tableData += '<tr>';
                tableData += '<td width="60%">' + qData.subject_name + '</td>';
                tableData += '<td width="60%">' + qData.subject_code + '</td>';
                tableData += '<td><div class="btn-group">\n\
                <button class="btn btn-custom-save sel_maker" value="' + qData.subject_id + '"><i class="fa fa-pencil fa-sm"></i>&nbsp;Edit</button>\n\
                <button class="btn btn-custom-light del_maker" value="' + qData.subject_id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';
            });
            $('.maker_info_table tbody').html('').append(tableData);
            tableSorter('.maker_info_table');

            // TABLE ACTION BUTTONS

            //UPDATE
            $('.sel_maker').click(function () {
                select_subject($(this).val());
            });
            //DELETE
            $('.del_maker').click(function () {
                subject_delete($(this).val());
            });
        }
    }, "json");
}


/*----------Vehicle Keyword Table---------------*/

function vehicle_keyword_search_local(callback) {
    //@Sampath 
    var search_entered = $('#txt_search_key').val();
    var key_arr = search_entered.split(" ");
    var supp_id = $('#cmb_supp').val();
    var stock_status = $('#cmb_stock_status').val();
    var tableData = '';
    if (key_arr.length > 0) {
//        if (page === undefined || isNaN(parseInt(page)) || parseInt(page) <= 0) {
//            page = 1;
//        }

        $.post("views/loadTables.php", {table: "view_vehicle_keyword_search", key_arr: key_arr}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                tableData += '<tr><th colspan="22" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
                $('.view_vh_table tbody').html('').append(tableData);
            } else {
                $.each(e, function (index, qData) {
                    index++;
                    tableData += '<tr>';
                    tableData += '<td><div class="btn-group">' +
                            '<button type="button" class="btn btn-custom-save btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>' +
                            '<ul class="dropdown-menu">' +
                            '<li class="veiw_details_ex" value="' + qData.vh_id + '"data-toggle="tooltip" data-placement="bottom" title="View this vehicle"><a href="#">View</a></li>' +
                            '<li class="sel_order_id" value="' + qData.vh_id + '" data-toggle="tooltip" data-placement="bottom" title="Edit this vehicle"><a href="#">Edit</a></li>' +
                            '<li class="sell_vh" value="' + qData.vh_id + '" data-toggle="tooltip" data-placement="bottom" title="Sales & Payments"><a href="#">Sales & Payments</a></li></ul></div></td>';

//                    tableData += '<td><div class="btn-group"><button class="btn btn-custom-light btn-xs sel_order_id" value="' + qData.vh_id + '"><i class="fa fa-pencil fa-sm"></i>&nbsp;</button>'
//                            + '<button class="btn btn-custom-save btn-xs veiw_details_ex" value="' + qData.vh_id + '"><i class="fa fa-external-link"></i>&nbsp;</button></div></td>';
                    tableData += '<td><input type="checkbox" value="' + qData.vh_id + '">&nbsp;</td>';
                    tableData += '<td>' + qData.vh_index_num + '</td>';
//                tableData += '<td>' + qData.supp_name + '</td>';
                    tableData += '<td>' + qData.vh_code + '</td>';
                    tableData += '<td>' + qData.supp_name + '</td>';
                    tableData += '<td>' + qData.maker_name + '</td>';
                    tableData += '<td>' + qData.mod_name + '</td>';
                    tableData += '<td>' + qData.vh_chassis_code + '</td>';
                    tableData += '<td>' + qData.vh_chassis_num + '</td>';
//                    tableData += '<td>' + qData.engine_code + '</td>';
//                    tableData += '<td>' + qData.engine_num + '</td>';
                    tableData += '<td>' + qData.engine_cc + '</td>';
                    tableData += '<td>' + qData.package + '</td>';
                    tableData += '<td>' + qData.vh_year + '</td>';
                    tableData += '<td>' + qData.vh_color + '</td>';
                    tableData += '<td>' + qData.vh_milage + '</td>';
                    tableData += '</tr>';
                });
                $('.view_vh_table tbody').html('').append(tableData);

                // TABLE ACTION BUTTONS
                //SELECT
                $('.sel_order_id').click(function () {
//                    load_vh_edit($(this).val());
                    load_vh_edit_local($(this).val());
                });
                $('.veiw_details_ex').click(function () {
                    submitSingleDataByPost('vehicle_single_view.php', 'veh_id', $(this).val());
                });
                //DELETE
                $('.del_maker').click(function () {
                });
            }
            $('.vh_view_pg').html('');
            if ($.type(callback) === 'function') {
                callback();
            }
        }, "json");

    } else {
        alertify.error("Enter keywords", 2000);
    }
}

// ************** image galary load by V!rj
function veh_imageload_galary(vehicleID) {
//    alert(vehicleID);
    var galaryData = '';
    $.post("views/loadTables.php", {galary: "veh_imageload_galary", vehicleID: vehicleID}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            galaryData += '<h3>No images available<h3>';
        } else {
            $.each(e, function (index, qData) {
                var visible = parseInt(qData.p_visible);
                galaryData += '<div class="thumbnail thumbnail-custom">';
                galaryData += '<img src="vehicle_img/' + qData.vh_code + '_' + vehicleID + '/' + qData.file_3 + '" alt="" />';
                galaryData += '<div class="caption">';
                if (visible === 1) {
                    galaryData += '<label class="checkbox checkbox-inline"><input type="checkbox" class="imgCheck" data-picId="' + qData.ph_id + '" value="' + qData.ph_id + '" checked="" /> Visible</label>';
                } else {
                    galaryData += '<label class="checkbox checkbox-inline"><input type="checkbox" class="imgCheck" data-picId="' + qData.ph_id + '" value="' + qData.ph_id + '" /> Visible</label>';
                }
                galaryData += '<button class="btn btn-sm btn-danger pull-right img_dlt_btn" type="button" data-vh_id="' + vehicleID + '" data-ph_id="' + qData.ph_id + '"><i class="fa fa-trash-o"></i></button>';
                galaryData += '</div>';
                galaryData += '</div>';
            });
            //****** delete selected image********//
        }
        $('#image_galary').html(galaryData);
    }, "json");
}
function load_vh_edit(vh_id) {
    var win = window.open('vehicle_reg.php?vh_id=' + vh_id, '_blank');
    win.focus();
}
function search_vehicle(callBack) {
    var tableData = '';
    $.post("views/loadTables.php", {table: 'vh_search_res'}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr><th colspan="6" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
            $('.vh_search_result tbody').html('').append(tableData);
        } else {
            $.each(e, function (index, qData) {
                index++;
                tableData += '<tr>';
                tableData += '<td>' + qData.vh_code + '</td>';
                tableData += '<td>' + qData.maker_name + '</td>';
                tableData += '<td>' + qData.mod_name + '</td>';
                tableData += '<td>' + qData.vh_chassis_code + '-' + qData.vh_chassis_num + '</td>';
                tableData += '<td>' + qData.vh_color + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-custom-save sel_found_vh" value="' + qData.vh_id + '"><i class="fa fa-hand-o-up fa-lg"></i>&nbsp;Select</button></div></td>';
                tableData += '</tr>';
            });
            $('.vh_search_result tbody').html('').append(tableData);
            $('.sel_found_vh').click(function () {
                $('.vahicle_code_combo').val($(this).val());
                $('#vh_searchModal').modal('hide');
                chosenRefresh();
            });

        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, 'json');
}
function search_vehicle2(param, callBack) {
    var vh_maker = param.maker;
    var vh_model = param.model;
    var tableData = '';
    $.post("views/loadTables.php", {table: 'vh_search_filtered', vh_maker: vh_maker, vh_model: vh_model}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr><th colspan="6" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
//            $('.vh_search_result tbody').html('').append(tableData);
            $('.vh_search_result tbody').html(tableData);
        } else {
            $.each(e, function (index, qData) {
                index++;
                tableData += '<tr>';
                tableData += '<td>' + qData.vh_code + '</td>';
                tableData += '<td>' + qData.maker_name + '</td>';
                tableData += '<td>' + qData.mod_name + '</td>';
                tableData += '<td>' + qData.vh_chassis_code + '-' + qData.vh_chassis_num + '</td>';
                tableData += '<td>' + qData.vh_color + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-custom-save sel_found_vh" value="' + qData.vh_id + '"><i class="fa fa-hand-o-up fa-lg"></i>&nbsp;Select</button></div></td>';
                tableData += '</tr>';
            });
            $('.vh_search_result tbody').html(tableData);
//            $('.vh_search_result tbody').html('').append(tableData);
            $('.sel_found_vh').click(function () {
                $('.vahicle_code_combo_filtered').val($(this).val());
                chosenRefresh();
            });

        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, 'json');
}
function load_syscode_table(type_id) {
    //@Sachith 
    var tableData = '';
    $.post("views/loadTables.php", {table: "syscode_tbl", type_id: type_id}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr><th colspan="3" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
            $('.syscode_info_tbl tbody').html('').append(tableData);
        } else {
            $.each(e, function (index, qData) {
                index++;
                tableData += '<tr>';
                tableData += '<td width="60%">' + qData.description + '</td>';
                tableData += '<td width="60%">' + qData.remarks + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-custom-save sel_syscode" value="' + qData.sys_id + '"><i class="fa fa-pencil fa-sm"></i>&nbsp;Edit</button><button class="btn btn-custom-light del_syscode" value="' + qData.sys_id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';
            });
            $('.syscode_info_tbl tbody').html('').append(tableData);
            // TABLE ACTION BUTTONS
            //UPDATE
            $('.sel_syscode').click(function () {
                select_syscode($(this).val());
            });
//            //DELETE
            $('.del_syscode').click(function () {
                delete_syscode($(this).val());
            });
        }
    }, "json");
}


