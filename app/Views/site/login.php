<?php
// $session = $this->session->get_userdata();
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
    <!-- META SECTION -->
    <title> - Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="<?php echo base_url() . '/public/img/'; ?>favicon.png" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() . "/public/"; ?>css/theme-default-12.css" />
    <!-- EOF CSS INCLUDE -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-8 bg-image">

                    <div class="name-logo">

                        <h3 style="font-size: 35px;">Myportalx.com</h3>

                        <h1>MEMBERS LOGIN</h1>

                    </div>

                </div>

                <div class="col-md-4 bg-login">

                    <div class="login-logo">

                        <h2 class="text-white text-center">Welcome</h2><br>
                        <?php
                        if (isset($session['logged_in'])) {
                            redirect(base_url($session["user_type"])); ?>
                            
                        <?php } else { ?>
                            <form class="form-horizontal my-login-validation" method="post">
                            
                                <div class="form-group loginwala">

                                    <label for="text" class="text-white">Username</label>
                                    <input id="get_username" name="username" type="text" class="form-control" placeholder="Enter your Username" required='required' autofocus>
                                    <div class="invalid-feedback">user is invalid
                                    </div>
                                </div>
                                <div class="form-group loginwala">
                                    <label for="password" class="text-white">Password</label>
                                    <input id="get_password" type="password" name="password" class="form-control" placeholder="Enter your password" required='required' autocomplete="off">
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>
                                <div id="dvMessage" style="color:red"></div>
                                <div class="form-group m-0">
                                    <button type="button" class="btn btn-block" id="get_login">
                                        Login
                                    </button>
                                </div>
                                <br>
                                <div class="mt-2">Don't have an account? <br><a href="<?= base_url('registration') ?>">Start Your Free Trial</a>
                                </div><br>

                                <a href="<?php echo base_url() . 'ForgotPassword' ?>">Forgot Password?</a>

                            </form>
                        <?php } ?>
                        <br>

                        <div style="color:#909090; text-align:center;">

                            Copyright © <?php echo date("Y"); ?> . <br>All rights reserved </div>

                        <div class="pull-right"> <a href="https://myportalx.com">Back to the site.</a> </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="home_url" value="<?php echo base_url(); ?>">
    <!-- START PLUGINS -->
    <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url() . "/public/"; ?>js/fast-buddy.js"></script>
    <!-- END PLUGINS -->
</body>

</html>