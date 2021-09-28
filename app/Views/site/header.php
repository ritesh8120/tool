<?php
// $session=$this->session->get_userdata(); 
?>
<!DOCTYPE html>

<html lang="en">

<head>

    <!-- META SECTION -->

    <title> Teacher Training Portal</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />



    <link rel="icon" href="<?php echo base_url() . "/public/img/"; ?>favicon.png" type="image/x-icon" />

    <!-- END META SECTION -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- CSS INCLUDE -->

    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() . "/public/"; ?>css/theme-default.css" />

    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() . "/public/"; ?>css/responsive.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/css/fast-buddy.css') ?>" />

    <!-- EOF CSS INCLUDE -->

</head>

<body class="page-container-boxed">

    <!-- START PAGE CONTAINER -->



    <div style="height:600px;">





        <!-- PAGE CONTENT WRAPPER -->

        <div class="page-content-wrap">



            <div class="row">

                <div class="col-md-12" style="margin:auto">

                    <div class="page-container page-navigation-top page-navigation-top-custom">

                        <!-- PAGE CONTENT -->

                        <div class="page-content">



                            <!-- START PAGE CONTENT HEADER -->

                            <div class="page-content-header">

                                <a href="#" class="logo"></a>

                                <div class="pull-right">



                                    <div class="contacts" style="padding-top:10px;">

                                        <a href="#"><span class="fa fa-envelope"></span> support@myportalx.com</a>

                                        <a href="#" style="color:#999999"><span class="fa fa-phone"></span> PH: +13232068559</a>
                                    </div>

                                </div>

                            </div>

                            <!-- END PAGE CONTENT HEADER -->



                            <!-- START X-NAVIGATION VERTICAL -->

                            <ul class="x-navigation x-navigation-horizontal">

                                <li class="xn-navigation-control">

                                    <a href="myportalx.com/portal" class="x-navigation-control"></a>

                                </li>

                                <li class="xn-openable">

                                    <a href="https://myportalx.com/"><span class="fa fa-home"></span> Home</a>



                                    <ul class="animated zoomIn">

                                        <?php

                                        if (isset($session['logged_in']) && ($session['logged_in'] == 1)) { ?>

                                            <li> <a href="#" id="get_logout" username="<?php echo $session['username']; ?>"><span class="fa fa-sign-out"></span> Logout</a></li>

                                        <?php } else { ?>

                                            <li> <a href="<?php echo base_url() . 'login' ?>"><span class="fa fa-sign-in"></span> Login</a></li>

                                        <?php } ?>

                                    </ul>

                                </li>
                                <li>
                                    <h3 class="boost">Boost Your Success With Online Coaching</h3>
                                </li>

                                <?php

                                if (isset($session['logged_in']) && ($session['logged_in'] == 1)) { ?>

                                    <li class="pull-right"><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Logout</a></li>

                                <?php } else { ?>

                                    <li class="pull-right"><a href="<?php echo base_url() . 'login' ?>"><span class="fa fa-sign-in"></span> Login</a></li>

                                <?php } ?>

                            </ul>

                            <style>
                                .boost {

                                    color: #fff;

                                    font-size: 28px;

                                    margin: 8px 0 0;

                                    padding-left: 200px;

                                    text-align: center;

                                }
                            </style>

                            <!-- END X-NAVIGATION VERTICAL -->

                            <input type="hidden" id="home_url" value="<?php echo base_url(); ?>">

                            <!-- START PLUGINS -->

                            <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/jquery/jquery.min.js"></script>

                            <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/jquery/jquery-ui.min.js"></script>

                            <script src="<?php echo base_url() . "/public/"; ?>js/fast-buddy.js"></script>

                            <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap.min.js"></script>

                            <!-- END PLUGINS -->