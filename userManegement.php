<?php
error_reporting(E_ALL); // Enabling Error Reporting
ini_set('display_errors', 1);
require_once './config/dbc.php'; // Database Configuration File
require_once './class/systemSetting.php'; // Database Query Settings File
$system = new setting();
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location:index.php");
}
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <?php require_once './include/Header.php'; ?>
        <?php require_once './include/systemHeader.php'; ?>
    </head>

    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                <?php //require 'include/headerbar.php'; ?>
                <?php require 'include/sidebar.php'; ?>
                <header class="header">
                    <?php require_once './include/mobile_menu.php'; ?>
                </header>
          
                <!--CONTENT-->
                <article class="content forms-page">
                    <div class="title-block">
                        <h3 class="title"> User Management </h3>
                        <p class="title-description"> Manage System Users </p>
                    </div>
                    
                      <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-4">
                                <div class="card card-block sameheight-item" style="height: 709px;">
                                    <div class="title-block">
                                        <a class="" data-toggle="modal" data-target=".addNewUser">
                                            <div class="thumbnail btn-dashboard" style="border-radius:5px; padding: 10px;">
                                                 <img src="img/dashboard/user.png" style="width:128px;height:128px;">
                                                <div class="caption text-center">
                                                    <h3>Add New User</h3>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </a> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-block sameheight-item" style="height: 709px;">
                                    <div class="title-block">
                                        <a class="hidden" data-toggle="modal" data-target=".addUserLevelPrivillages">
                                            <div class="thumbnail btn-dashboard" style="border-radius:5px; padding: 10px;">
                                                <img src="img/dashboard/newuser.png" style="width:128px;height:128px;">
                                                <div class="caption text-center">
                                                    <h3>Set User Level Privileges</h3>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </a> 
                                    </div>
                                </div>
                            </div>

                           
                                <div class="card card-block sameheight-item" style="height: 709px;">
                                    <div class="title-block">
                                        <a class="" data-toggle="modal" data-target=".addUserPrivillages">
                                            <div class="thumbnail btn-dashboard" style="border-radius:5px; padding: 10px;">
                                                <img src="img/dashboard/userprev.png" style="width:128px;height:128px;">
                                                <div class="caption text-center">
                                                    <h3>Set User Privileges</h3>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </a> 
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </section>
               </article>
                <!--CONTENT END-->
                
                <!--User Level Add-->
                <div class="modal fade addUserLevel" style="width: 100%;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="padding:10px;border-radius:5px; background-color: #AACAB4;">
                            <h4 style=""><b>Add User Level</b></h4>
                            <hr/>
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <div class="form-horizontal">                                          

                                        <div class="form-group">
                                            <label for="programe_symble" class="control-label">User level :</label>
                                            <div class="">
                                                <input type="text" class="form-control custom-text1" id="userLevel" placeholder="">
                                                <input type="hidden" class="form-control" id="hiddnField" placeholder="">
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <!--<label for="programe_symble" class="col-lg-4 control-label">&nbsp;</label>-->
                                            <div class="col-lg-6" id="savesection">
                                                <button type="button" class="btn btn-custom-save col-lg-6" id="userLvelAdd">Save</button>&nbsp;
                                                <button type="button" class="btn btn-info " id="userLvelCancel" data-dismiss="modal">Cancel</button>
                                            </div>
                                            <div class="col-lg-6 hidden" id="updateSection">
                                                <button type="button" class="btn btn-success col-lg-6 pull-right" id="UpdateUlevel">Update</button>&nbsp;
                                                <button type="button" class="btn btn-info pull-right" id="reset">Reset</button>&nbsp;
                                            </div>
                                        </div> 
                                    </div>

                                </div>        
                                <div class="col-lg-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10" style="">
                                    <div class="panel">
                                        <div class="panel-heading panel-custom">
                                            <h3 class="panel-title title-custom">Current User Levels</h3>
                                            <div class="pull-right">
                                                <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                                    <i class="glyphicon glyphicon-filter"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="panel-body filterTableSearch">
                                            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters=".userLevelTble"/>
                                        </div>
                                        <div class="scrollable" style="height: 300px; overflow-y: auto">
                                            <table class="table table-bordered table-striped table-hover datable userLevelTble">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>User Level</th>
                                                        <th>Sequence NO.</th>
                                                        <th>Edit / Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                                                             
                                                </tbody>
                                            </table>
                                            <input type="hidden" id="chkString">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                        </div>
                    </div>
                </div> 
                <!--User Level End-->

                <!--Add System user-->
                <div class="modal fade addNewUser" style="width: 100%;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="padding:10px;border-radius:5px; background-color: #AACAB4;">
                            <div class="row">
                                <h4 style="padding-left: 35px; padding-top: 15px;"><b>Add New User</b></h4>

                                <div class="row"><div style="height: 25px;"></div></div>
                                <div class="col-lg-6">
                                    <div class="form-horizontal">                            
                                        <div class="form-group hidden">
                                            <label for="branch" class="col-md-4 control-label">Select Branch:</label>
                                            <div class="col-md-7 branchcomboDiv">
                                                <select class="branchComboBox" id="branchComboBox"></select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="programe_symble" class="col-lg-4 control-label">Username :</label>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="username" placeholder="Username" style="background-color: #e1edf7;">
                                                <h5 id="unameMsg" style="color: red;"></h5>
                                            </div>
                                        </div> 

                                        <input type="hidden" id="hiddenUserId" value="">

                                        <div class="form-group">
                                            <label for="programe_symble" class="col-lg-4 control-label">Password :</label>
                                            <div class="col-lg-7">
                                                <input type="password" class="form-control" id="password" placeholder="Password" style="background-color: #fdf1ef;">
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="programe_symble" class="col-lg-4 control-label">Confirm Password :</label>
                                            <div class="col-lg-7">
                                                <input type="password" class="form-control" id="conPassword" placeholder="Confirm Password" style="background-color: #fdf1ef;">
                                                <h5 id="passMasseg" style="color: red;"></h5>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="programe_symble" class="col-lg-4 control-label">User Level :</label>
                                            <div class="col-lg-7">
                                                <select class="selUserLevel" id="selUserLevel"></select>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="programe_symble" class="col-lg-4 control-label">Date :</label>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control datepicker" id="date" placeholder="Date" value="<?php echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd" >                                           
                                      <!--                                                    <input type="text" class="form-control" id="date" placeholder="Date" value="<?php //echo date('Y-m-d');                                      ?>" >-->
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="programe_symble" class="col-lg-4 control-label">Employee NO. :</label>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="empNo" placeholder="Employee NO">
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="programe_symble" class="col-lg-4 control-label">NIC :</label>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control col-lg-6" id="nic" placeholder="NIC" maxlength="10">
                                                <h6 id="nic_val" style="color: red;"> </h6>
                                                <h6 id="nic_valok" style="color: green;"> </h6>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-horizontal">             
                                        <div class="form-group">
                                            <label for="programe_symble" class="col-lg-4 control-label">First Name :</label>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="fName" placeholder="First Name">
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="programe_symble" class="col-lg-4 control-label">Last Name :</label>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="lName" placeholder="Last Name">
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="programe_symble" class="col-lg-4 control-label">Address :</label>
                                            <div class="col-lg-7">
                                                <textarea class="form-control" id="address" placeholder="Address" style="resize: none;"></textarea>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="programe_symble" class="col-lg-4 control-label">Tel NO. :</label>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="mobile" placeholder="Mobile" style="background-color: #dff0d8" maxlength="10" onkeypress="return isNumberKey(event)">
                                                <h6 id="mobi" style="color: red;"></h6>
                                                <h6 id="mobiok" style="color: green;"></h6>
                                                <input type="text" class="form-control" id="work" placeholder="Work" style="background-color: #a6e1ec" maxlength="10" onkeypress="return isNumberKey(event)">
                                                <h6 id="works" style="color: red;"></h6>
                                                <h6 id="worksok" style="color: green;"></h6>
                                                <input type="text" class="form-control" id="home" placeholder="Home" style="background-color: #f5e79e" maxlength="10" onkeypress="return isNumberKey(event)">
                                                <h6 id="homes" style="color: red;"></h6>
                                                <h6 id="homesok" style="color: green;"></h6>
                                            </div>
                                        </div> 
                                        <div class="form-group emailvalue">
                                            <label for="programe_symble" class="col-lg-4 control-label">Email :</label>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="eMail" placeholder="Email">
                                                <h6 style="color: red; font-weight: bold; margin-left: 5px;" id="em_val"></h6>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="programe_symble" class="col-lg-4 control-label">User Status :</label>
                                            <div class="col-lg-7">
                                                <select class="form-control" id="userStatus" placeholder="">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                    <option value="99">Invisible</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="programe_symble" class="col-lg-4 control-label">&nbsp;</label>
                                            <div class="col-lg-7" style="" id="useerAdsavesection">
                                                <button type="button" class="btn btn-primary pull-right col-md-6" id="systemUserAdd">Save</button>&nbsp;&nbsp;&nbsp;
                                                <button type="button" class="btn btn-info pull-right" id="cancel" data-dismiss="modal">Cancel</button>
                                            </div>
                                            <div class="col-lg-6 hidden" id="userAdupdateSection">
                                                <button type="button" class="btn btn-success col-lg-6 pull-right" id="UpdateSystemuser">Update</button>&nbsp;
                                                <button type="button" class="btn btn-info pull-right" id="sysUserreset">Reset</button>&nbsp;
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 0px;">
                                <div class="col-lg-12" style="padding-left: 15px;">
                                    <div class="panel">
                                        <div class="panel-heading  panel-custom">
                                            <h3 class="panel-title title-custom">Current Users</h3>
                                            <div class="pull-right">
                                                <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                                    <i class="glyphicon glyphicon-filter"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="panel-body filterTableSearch">
                                            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters=".adminUsersTbl"/>
                                        </div>
                                        <div class="scrollable" style="height: 150px; overflow-y: auto">
                                            <table class="table table-bordered table-striped table-hover datable adminUsersTbl">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Username</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>User level</th>
                                                        <th>Edit Or Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                                                             
                                                </tbody>
                                            </table>
                                            <input type="hidden" id="chkString">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End System user-->


                <div class="modal fade addUserLevelPrivillages" style="width: 100%;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="">
                            <div class="row">
                                <h4 style="padding-left: 35px; padding-top: 15px;"><b>::: Set User Level Privilege :::</b></h4>
                                <div class="row"><div style="height: 25px;"></div></div>
                                <div class="col-lg-8">
                                    <div class="form-horizontal">                            
                                        <div class="form-group">
                                            <label for="programe_symble" class="col-lg-4 control-label">User Level :</label>
                                            <div class="col-lg-5">
                                                <select class="selUserLevel UserLevelPrivillage" id="selUserLevel"></select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="programe_symble" class="col-lg-4 control-label">Privilege :</label>
                                            <div class="col-lg-5">
                                                <select class="selUserPrivilege" id="selUserPrivilege"></select>
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <div class="col-lg-6" id="savesection">
                                                <button type="button" class="btn btn-primary col-lg-5 pull-right" id="userPrivillegeAdd">Save</button>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <div style="height: 45px;"></div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-11" style="padding-left: 80px;">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Current Set User Level Privileges</h3>
                                            <div class="pull-right">
                                                <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                                    <i class="glyphicon glyphicon-filter"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="panel-body filterTableSearch">
                                            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters=".ward-table"/>
                                        </div>
                                        <div class="scrollable" style="height: 300px; overflow-y: auto">
                                            <table class="table table-bordered table-striped table-hover datable userPrivillegeTble">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>User Level</th>
                                                        <th>Privilege</th>
                                                        <th>Edit / Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                                                             
                                                </tbody>
                                            </table>
                                            <input type="hidden" id="prvCode">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <!--set user privilages-->
                <div class="modal fade addUserPrivillages" style="width: 100%;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="padding:10px;border-radius:5px; background-color: #AACAB4;">
                            <!--                                <div class="container">
                                                            </div>-->
                            <h4 style=""><b>Set User Privilege</b></h4>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-horizontal">
                                        <div class="form-group">

                                            <div class="form-group">
                                                <label for="programe_symble" class="col-lg-4 control-label">User Name :</label>
                                                <div class="col-lg-7">
                                                    <select class="selUsername" id="selUsername"></select>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5" style="margin-left: 20px;">
                                    <div class="widget selectlistpanel">
                                        <div class="widget-header">
                                            <h3>Available Privileges</h3>
                                        </div>
                                        <div class="widget-content">
                                            <select multiple="" id="available_privilegs">

                                            </select>
                                        </div>
                                    </div> 
                                </div>

                                <div class="col-md-1" style="margin-left: 20px;">
                                    <div class="btn-group btn-group-vertical selectionbuttons" >
                                        <button class="btn btn-lg btn-default" id="prv-add" title=""><i class="fa fa-angle-right"></i></button>
                                        <button class="btn btn-lg btn-default" id="prv-add-all" title=""><i class="fa fa-angle-double-right"></i></button>
                                        <button class="btn btn-lg btn-default" id="prv-remove" title=""><i class="fa fa-angle-left"></i></button>
                                        <button class="btn btn-lg btn-default" id="prv-remove-all" title=""><i class="fa fa-angle-double-left"></i></button>
                                    </div>
                                </div>

                                <div class="col-md-5" style="margin-left: 25px;">
                                    <div class="widget selectlistpanel">
                                        <div class="widget-header">
                                            <h3>Assigned Privileges</h3>
                                        </div>
                                        <div class="widget-content">
                                            <select multiple="" id="assigned_privileges">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>


        <?PHP require 'include/Footer.php'; ?>
        <?PHP require 'include/systemFooter.php'; ?>
    </div>
    <!-- Reference block for JS -->
    <div class="ref" id="ref">
        <div class="color-primary"></div>
        <div class="chart">
            <div class="color-primary"></div>
            <div class="color-secondary"></div>
        </div>
    </div>
    <script src="js/vendor.js"></script>
    <script src="js/app.js"></script>
    <script type="text/javascript">

                                                    $(function () {
                                                        $('#logout').click(function () {
                                                            logout();
                                                        });

                                                    });

    </script>
</body>
</html>