<?php
require_once './config/dbc.php';
require_once './class/database.php';
require_once './class/systemSetting.php';
$dbClass = new database();
$system = new setting();
MainConfig::connectDB();
$link = MainConfig::conDB();


$data = array();
$query = "SELECT
                                    in_system_notifications.id,
                                    in_system_notifications.message,
                                    in_system_notifications.publish_date,
                                    in_system_notifications.expire_date,
                                    in_system_notifications.added_date,
                                    in_system_notifications.title
                                    FROM 
                                    `in_system_notifications` ";


$result = mysqli_query($link, $query) or die(mysqli_error($link));
?>

<!--<div class="header-block header-block-collapse d-lg-none d-xl-none">
    <button class="collapse-btn" id="sidebar-collapse-btn">
        <i class="fa fa-bars"></i>
    </button>
</div>

<div class="header-block header-block-search">
    <form role="search">
        <div class="input-container">
            <i class="fa fa-search"></i>
            <input type="search" placeholder="Search" style="background-color:#0b2e13;color:#ffffff;">
            <div class="underline"></div>
        </div>
    </form>
</div>-->

<div class="header-block header-block-nav">
    <ul class="nav-profile">


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

                echo '<li class = " dropdown">
             <a class = "nav-link dropdown-toggle" data-toggle = "dropdown" href = "#" role = "button" aria-haspopup = "true" aria-expanded = "false">
            <div class = "img" style = "background-image: url("https://avatars3.githubusercontent.com/u/3959008?v=3&s=40")"> </div>
            <span class = "name">' . $aa['usrPrvMnuName'] . ' </span>
            </a>';

                echo ' <div class = "dropdown-menu profile-dropdown-menu" aria-labelledby = "dropdownMenu1">';
                
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
                $getL = mysqli_query($link, $quw)or die(mysqli_error());
                MainConfig::closeDB();
                if (!empty($getL)) {
                    while ($row = mysqli_fetch_assoc($getL)) {
                        $data1[] = $row;
                    }
                    foreach ($data1 AS $bb) {
                        if ($aa['usrPrvCode'] == $bb['usrPrnt']) {

                            echo '<a class = "dropdown-item" href = "' . $bb['usrPrvMnuPath'] . '"> <i class = "fa fa-user icon"></i>' . $bb['usrPrvMnuName'] . '</a>';
                        }
                    }
                }

                echo '</div></li>';
            }
        }
        ?>

                  
            <li class = "notifications new">


                <a href = "" data-toggle = "dropdown">
                    <i class = "fa fa-bell-o"></i>
                    <sup>
                        <span class = "counter">8</span>
                    </sup>
                </a>
                <div class = "dropdown-menu notifications-dropdown-menu">
                    <ul class = "notifications-container">


                        <?php
                        if (!empty($result)) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $data[] = $row;
                            }

                            foreach ($data as $notification) {

                                echo '<li>
                        <a href = "" class = "notification-item">
                            <div class = "img-col">
                            </div>
                            <div class = "body-col">
                                <p>
                                    <span class = "accent">Zack Alien</span> ' . $row['title'] . '
                                    <span class = "accent">' . $row['message'] . '</span>. </p>
                            </div>
                        </a>
                    </li>';
                            }
                        }
                        ?>
                    </ul>
                    <footer>
                        <ul>
                            <li>
                                <a href = ""> View All </a>
                            </li>
                        </ul>
                    </footer>
                </div>
            </li>




            <li class = "profile dropdown">
                <a class = "nav-link dropdown-toggle" data-toggle = "dropdown" href = "#" role = "button" aria-haspopup = "true" aria-expanded = "false">
                    <div class = "img" style = "background-image: url('https://avatars3.githubusercontent.com/u/3959008?v=3&s=40')"> </div>
                    <span class = "name"> <?php echo $_SESSION['user_name'];
                        ?> </span>
                </a>
                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-user icon"></i> Profile </a>
                    <a class="dropdown-item" href="my_affiliate.php">
                        <i class="fa fa-bell icon"></i> My Affiliate </a>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-bell icon"></i> Notifications </a>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-gear icon"></i> Settings </a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
    </ul>
</div>
