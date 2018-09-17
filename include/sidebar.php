<aside class="sidebar">
    <div class="sidebar-container">
        <div class="sidebar-header">
            <div class="brand">
                <div class="logo">
                    <span class="l l1"></span>
                    <span class="l l2"></span>
                    <span class="l l3"></span>
                    <span class="l l4"></span>
                    <span class="l l5"></span>
                </div> Nolimitv </div>
        </div>
        <nav class="menu">
            <ul class="sidebar-menu metismenu" id="sidebar-menu">

                <li class="active">
                    <a href="dashboard.php">
                        <i class="fa fa-home"></i> Dashboard </a>
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
                $getLogeduser = mysqli_query($link, $quary)or die(mysqli_error($link));
                MainConfig::closeDB();

                if (!empty($getLogeduser)) {
                    while ($row = mysqli_fetch_assoc($getLogeduser)) {
                        $data[] = $row;
                    }
                    foreach ($data AS $aa) {
                        echo '<li class="">
                             <a href="' . $aa['usrPrvMnuPath'] . '">
                        <i class="fa fa-home"></i>' . $aa['usrPrvMnuName'] . ' <i class="fa arrow"></i></a>   ';

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
                        $getL = mysqli_query($link, $quw)or die(mysqli_error($link));

                        $data1 = array();
                        MainConfig::closeDB();
                        if (!empty($getL)) {
                            while ($row = mysqli_fetch_assoc($getL)) {
                                $data1[] = $row;
                            }
                            echo '<ul class="sidebar-nav">';
                            foreach ($data1 AS $bb) {
                                if ($aa['usrPrvCode'] == $bb['usrPrnt']) {
                                    echo '<li> <a href="' . $bb['usrPrvMnuPath'] . '">' . $bb['usrPrvMnuName'] . ' </a> </li>';
                                }
                            }
                            echo '</ul>';
                        }

                        echo '</li>';
                    }
                }
                ?>

                <li>
                    <a href="https://github.com/modularcode/modular-admin-html">
                        <i class="fa fa-github-alt"></i> Theme Docs </a>
                </li>

            </ul>
        </nav>
    </div>

    <footer class="sidebar-footer">

    </footer>
    <!--
    <footer class="sidebar-footer">
        <ul class="sidebar-menu metismenu" id="customize-menu">
            <li>
                <ul>
                    <li class="customize">
                        <div class="customize-item">
                            <div class="row customize-header">
                                <div class="col-4"> </div>
                                <div class="col-4">
                                    <label class="title">fixed</label>
                                </div>
                                <div class="col-4">
                                    <label class="title">static</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="title">Sidebar:</label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="sidebarPosition" value="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="title">Header:</label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="headerPosition" value="header-fixed">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="headerPosition" value="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="title">Footer:</label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="footerPosition" value="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
    <!--                        <div class="customize-item">
                                <ul class="customize-colors">
                                    <li>
                                        <span class="color-item color-red" data-theme="red"></span>
                                    </li>
                                    <li>
                                        <span class="color-item color-orange" data-theme="orange"></span>
                                    </li>
                                    <li>
                                        <span class="color-item color-green active" data-theme=""></span>
                                    </li>
                                    <li>
                                        <span class="color-item color-seagreen" data-theme="seagreen"></span>
                                    </li>
                                    <li>
                                        <span class="color-item color-blue" data-theme="blue"></span>
                                    </li>
                                    <li>
                                        <span class="color-item color-purple" data-theme="purple"></span>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                 <a href="">
                        <i class="fa fa-cog"></i> Customize </a>
                </li>
            </ul>
        </footer>
        
    -->
</aside>
