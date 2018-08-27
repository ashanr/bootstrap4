<div class="navbar navbar-default navbar-fixed-top hidden-print" role="navigation">

    <div class="row">
        <div class="navbar-header">            
            <a class="navbar-brand" href="dashboard.php" style="padding-left: 25px;"><strong>Test System</strong></a>
            <ul class="nav navbar-nav navbar-right">                
                <li><a href="#">Welcome <?php echo $_SESSION['user_name'] ?></a></li>  
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-11">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active" style="padding-left: 10px;">
                        <a href="dashboard.php" class="btn btn-custom-delete"><i class="fa fa-lg fa-home"></i>&nbsp;&nbsp;Home</a>
                    </li> 

                    <?php
                    $data = array();
                    $quary = "SELECT
                          in_usrprvlg.usrID,
                          in_sysprvlg.usrPrvMnuName,
                          in_sysprvlg.usrPrvMnuIcon,
                          in_sysprvlg.usrPrvMnuPath,
                          in_usrprvlg.usrPrvCode
                          FROM
                          in_sysprvlg
                          INNER JOIN in_usrprvlg ON in_usrprvlg.usrPrvCode = in_sysprvlg.prvCode
                          WHERE in_usrprvlg.usrID = '{$_SESSION['user_id']}' AND in_sysprvlg.usrPrnt = 0";
                    MainConfig::connectDB();
                    $link = MainConfig::conDB();
                    $getLogeduser = mysqli_query($link, $quary)or die(mysqli_error());
                    MainConfig::closeDB();

                    if (!empty($getLogeduser)) {
                        while ($row = mysqli_fetch_assoc($getLogeduser)) {
                            $data[] = $row;
                        }

                        foreach ($data AS $aa) {
//                        echo '<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
//              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' . $aa['usrPrvMnuName'] . ' <span class="caret"></span></a></li>';

                            echo '<li class="dropdown" style="margin-left:5px;">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" 
                                data-toggle="dropdown" aria-expanded="true">' . $aa['usrPrvMnuName'] . ' <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">';

                            $quw = "SELECT
                                in_usrprvlg.usrID,
                                in_sysprvlg.usrPrvMnuName,
                                in_sysprvlg.usrPrvMnuIcon,
                                in_sysprvlg.usrPrvMnuPath,
                                in_usrprvlg.usrPrvCode,
                                in_sysprvlg.usrPrnt
                                FROM
                                in_sysprvlg
                                INNER JOIN in_usrprvlg ON in_usrprvlg.usrPrvCode = in_sysprvlg.prvCode
                                WHERE
                                in_usrprvlg.usrID = '{$_SESSION['user_id']}'
                                AND in_sysprvlg.usrPrnt = '{$aa['usrPrvCode']}'";
                            MainConfig::connectDB();
                            $link = MainConfig::conDB();
                            $getL = mysqli_query($link,$quw)or die(mysqli_error());
                            MainConfig::closeDB();
                            if (!empty($getL)) {
                                while ($row = mysqli_fetch_assoc($getL)) {
                                    $data1[] = $row;
                                }
                                foreach ($data1 AS $bb) {
                                    if ($aa['usrPrvCode'] == $bb['usrPrnt']) {

                                        echo '<li role="presentation"><a role="menuitem" tabindex="-1" href="' . $bb['usrPrvMnuPath'] . '">' . $bb['usrPrvMnuName'] . '</a></li>         ';
                                    }
                                }
                            }
                            
                            echo '</ul></li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="col-lg-1">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right">
                    <li class="active pull-right" style="padding-right: 10px;"><a href="#" class="btn btn-danger" id="logout" style=""><i class="fa fa-lg fa-sign-out"></i>Exit</a></li>    
                </ul>
            </div>
        </div>
    </div>
</div>

