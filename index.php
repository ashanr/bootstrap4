<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php require_once './include/Header.php'; ?>
    </head>
    <body>
        <header id="masthead-pro">
            <div class="container">
                <div id="mobile-bars-icon-pro" class="noselect"><i class="fas fa-bars"></i></div>
                <div class="clearfix"></div>
            </div><!-- close .container -->

        </header>
        <div class="container">
            <div class="container-fluid">
                <div style="height:85px;"></div>
                <div class="col-md-12">
                   
                    <div class="col-md-6 col-sm-12 offset-3">
                        <div class="header-block-collapse">
                            <div class="centered-headings-pro" style="">
                                <h3>Welcome</h3>
                            </div> 
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="userName" placeholder="Username">
                            <h6><span id="uname_error" style="color:#ff0000"></span> </h6>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" placeholder="Password">
                            <h6><span id="pass_error"></span> </h6>
                        </div>
                        <div class="form-group">
                            <button type="button" id="logSystem"  class="btn btn-green-pro btn-display-block">Sign In</button>
                            <h6><span id="login_error" style="color:#ff0000"></span> </h6>
                        </div>
                        <div class="container-fluid">
                            <div class="row no-gutters">
                                <div class="col checkbox-remember-pro"><input type="checkbox" id="checkbox-remember"><label for="checkbox-remember" class="col-form-label">Remember me</label></div>
                            </div>
                        </div><!-- close .container-fluid -->
                        <div class="clearfix"></div>
                    </div>      
                    
                </div>
                <!--END OF COL 12-->
                <div style="height:35px;"></div>
                <div class="clearfix"></div>
            </div><!-- close .container -->
            <hr>
        </div><!-- close #content-pro -->
        <?php require_once './include/Footer.php'; ?>
        <a href="#0" id="pro-scroll-top"><i class="fas fa-chevron-up"></i></a>
            <?php require_once './include/systemFooter.php'; ?>

    </body>
</html>