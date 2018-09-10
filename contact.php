<?php ?>

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
                            </div> Contact Us</h1>
                    </header>
                    <div class="auth-content">
                        <p class="text-center">PLEASE SUBMIT YOUR INQUIRY HERE</p>

                        <div class="form-group">
                            <label for="username">email</label>
                            <input type="email" class="form-control underlined"  id="email" placeholder="Your email address" required> </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control underlined"  id="title" placeholder="Title" required> </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea rows="3" class="form-control underlined"  id="message" placeholder="Your Message" required></textarea>
                          
                        <div class="form-group">
                            <button type="submit" id="btnSend" class="btn btn-block btn-primary">Send Message</button>
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
        <script type="text/javascript" src="controllers/controller_contact.js"></script>
        <script type="text/javascript">
            $(function () {

                $('#btnSend').click(function () {
                    var email = $('#email').val();
                    var title = $('#title').val();
                    var message = $('#message').val();
                    send_contact_message(email, title, message);
                });

                $(document).on('keypress', function (e) {
                    // console.log("hello");
                    inputKeyUp(e);
                });

            });

            function inputKeyUp(e) {
                e.which = e.which || e.keyCode;
                if (e.which === 13) {
                    var email = $('#email').val();
                    var title = $('#title').val();
                    var message = $('#message').val();
                    send_contact_message(email, title, message);
                }
            }


        </script>

    </body>
</html>
