<?php
//session_start();
//session_regenerate_id(true);
// load database configurations
/*
//define('WEBROOT', str_replace(search: "Webroot/index.php", replace: "", $_SERVER["SCRIPT_NAME"]));
//define('WEBROOT', str_replace(search: "Webroot/index.php", replace: "", $_SERVER["SCRIPT_FILENAME"]));

require_(ROOT. 'Config/core.php');
require_(ROOT. 'router.php');
require_(ROOT. 'request.php');
require_(ROOT. 'dispatcher.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();

*/
require_once './config/dbc.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <?php require_once './include/Header.php'; ?>
<?php require_once './include/systemHeader.php'; ?>
    </head>
    <body>
        <div class="auth">
            <div class="auth-container">
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title">
                            <div class="logo">
                                <span class="l l1"></span>
                                <span class="l l2"></span>
                                <span class="l l3"></span>
                                <span class="l l4"></span>
                                <span class="l l5"></span>
                            </div> Cyber Code IT Solutions </h1>
                    </header>
                    <div class="auth-content">
                        <p class="text-center">LOGIN TO CONTINUE</p>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="email" class="form-control underlined" name="username" id="userName" placeholder="Your email address" required> </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control underlined" name="password" id="password" placeholder="Your password" required> </div>

                            <div class="form-group">
                                <button type="submit" id="logSystem" class="btn btn-block btn-primary">Login</button>
                            </div>

                    </div>
                </div>

            </div>
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
        <?php require_once './include/systemFooter.php'; ?>
                <script type="text/javascript">

        
                    $(function () {
                        
                        
                    });

     
</script>

    </body>
</html>
