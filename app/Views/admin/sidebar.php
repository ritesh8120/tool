<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>Admin Dash Board - MyPortalX</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="<?php echo base_url() . '/public/'; ?>new_client_dashboard/images/Myportalx logo 2.png" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() . "/public/"; ?>css/theme-default.css" />
    <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/jquery/jquery.min.js"></script>
    <!-- EOF CSS INCLUDE -->
</head>

<body>

    <!-- START PAGE CONTAINER -->
    <div class="page-container">

        <!-- START PAGE SIDEBAR -->
        <div class="page-sidebar">
            <!-- START X-NAVIGATION -->
            <ul class="x-navigation">
                <li>
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() . 'yogiccoach' ?>">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <img src="<?php echo base_url() . '/public/'; ?>new_client_dashboard/images/Myportalx logo 2.png" width="50"><span class="brand-name">MYPORTALX.COM
                            </span>
                        </div>
                    </a>
                    <a href="#" class="x-navigation-control"></a>
                </li>
                <!--  <li class="xn-logo">
                        <a href="#"> MyPortalX</a>
                        <a href="#" class="x-navigation-control"></a>
					</li> -->
                <li class="xn-profile">
                    <a href="#" class="profile-mini">
                        <img src="..//public/images/users/avatar.jpg" alt="John Doe" /></a>
                    <div class="profile">
                        <div class="profile-image">
                            <img src="<?php echo base_url() . "/public/images/users/"; ?>avatar.jpg" alt="John Doe" />
                        </div>
                        <div class="profile-data">
                            <div class="profile-data-name">Rajah Sharma</div>
                            <div class="profile-data-title">Administrator</div>
                        </div>
                        <div class="profile-controls">
                            <a href="<?php echo base_url() . "admin/edit_profile"; ?>" class="profile-control-left"><span class="fa fa-info"></span></a>
                            <a href="<?php echo base_url() . 'admin/messages'; ?>" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                        </div>
                    </div>
                </li>

                <li><a href="<?php echo base_url() . "admin"; ?>"><span class="xn-text">Dashboard</span></a></li>
                <!--<li class="xn-openable">
                        <a href="#"><span class="xn-text">Pages</span></a>
                        <ul>
                           <li><a href="<?php echo base_url() . 'admin/create_page'; ?>">Create</a></li>
                           <li><a href="../pages-invoice.html">View</a></li>
                        </ul>
                    </li>-->
                <li class="xn-openable">
                    <a href="#"><span class="xn-text">Courses</span></a>
                    <ul>
                        <li><a href="<?php echo base_url() . 'admin/create_courses'; ?>">Create</a></li>
                        <li><a href="<?php echo base_url() . 'admin/view_courses'; ?>">View</a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="xn-text">Packages</span></a>
                    <ul>
                        <li><a href="<?php echo base_url() . 'admin/create_packages'; ?>">Create</a></li>
                        <li><a href="<?php echo base_url() . 'admin/view_packages'; ?>">View</a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="xn-text">Coupons</span></a>
                    <ul>
                        <li><a href="<?php echo base_url() . 'admin/create_coupan'; ?>">Create</a></li>
                        <li><a href="<?php echo base_url() . 'admin/view_coupans'; ?>">View</a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="xn-text">Coaches</span></a>
                    <ul>
                        <li><a href="<?php echo base_url() . 'admin/create_teacher'; ?>">Create</a></li>
                        <!--<li><a href="<?php echo base_url() . 'admin/teacher_registration'; ?>">Registration</a></li>-->
                        <li><a href="<?php echo base_url() . 'admin/view_create_teacher'; ?>">View</a></li>
                        <li><a href="<?php echo base_url() . 'admin/view_teachers_payments'; ?>">Payments</a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="xn-text">Members</span></a>
                    <ul>
                        <li><a href="<?php echo base_url() . 'admin/create_student'; ?>">Create</a></li>
                        <!--<li><a href="../pages-gallery.html">Registration</a></li>-->
                        <li><a href="<?php echo base_url() . 'admin/view_create_student'; ?>">View</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url() . 'admin/messages'; ?>"><span class="xn-text">Message</span></a></li>
                <li><a href="<?php echo base_url() . 'admin/chakra_reading'; ?>"><span class="xn-text">Chakra Reading</span></a></li>
                <!--<li>
                        <a href="#"><span class="xn-text">Invoice</span></a></li>-->
                <li class="xn-openable">
                    <a href="#"><span class="xn-text">Reports</span></a>
                    <ul>
                        <li><a href="<?php echo base_url() . 'admin/view_coaches_list'; ?>">Teachers</a></li>
                    </ul>
                    <ul>
                        <li><a href="<?php echo base_url() . 'admin/view_members_list'; ?>">Members</a></li>
                    </ul>
                    <ul>
                        <li><a href="<?php echo base_url() . 'admin/intention_setting_report'; ?>">Intention Setting</a></li>
                    </ul>
                    <ul>
                        <li><a href="<?php echo base_url() . 'admin/gratitude_journal_report'; ?>">Gratitude Journal</a></li>
                    </ul>
                    <ul>
                        <li><a href="<?php echo base_url() . 'admin/daha_tantra_form'; ?>">Negetive Energy</a></li>
                    </ul>
                    <ul>
                        <li><a href="<?php echo base_url() . 'admin/allMembers'; ?>">Wheel Of Life</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url() . 'admin/edit_profile'; ?>"><span class="xn-text">Settings</span></a></li>

            </ul>
            <!-- END X-NAVIGATION -->
        </div>
        <!-- END PAGE SIDEBAR -->

        <!-- PAGE CONTENT -->
        <div class="page-content">

            <!-- START X-NAVIGATION VERTICAL -->
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">

                <!-- SEARCH -->
                <li class="xn-search">
                    <form role="form">
                        <input type="text" name="search" placeholder="Search..." />
                    </form>
                </li>
                <!-- END SEARCH -->
                <!-- POWER OFF -->
                <li class="xn-icon-button pull-right last">
                    <a href="#"><span class="fa fa-power-off"></span></a>
                    <ul class="xn-drop-left animated zoomIn">
                        <!--class="mb-control" data-box="#mb-signout" for js logout-->
                        <li><a href="<?php echo base_url() . "/login/get_logout"; ?>"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                    </ul>
                </li>
                <li class="xn-icon-button pull-right last">
                    <a href="https://help.myportalx.com/">
                        Help?
                    </a>
                </li>

                <!-- END POWER OFF -->

            </ul>