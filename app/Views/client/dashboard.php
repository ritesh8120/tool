<?php
$son = session();
$session = $son->getTempdata();
$user_type = $session['user_type'];
$login_id = $session['user_id'];

$user_id = $session['user_id'];
$db      = \Config\Database::connect();
$builder = $db->table('users');
$userData = $builder->where(array('fld_id' => $user_id))->get();
if ($userData->getNumRows() > 0) {
    $userRow = $userData->getRowArray();
}
$image_path = ($userRow['fld_file_name'] != '') ? $userRow['fld_file_name'] : '/public/uploads/member/' . 'default.png';
$image = base_url() . $image_path;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Client - Dashboard</title>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('/public/client-dashboard/') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('/public/client-dashboard/') ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('/public/client-dashboard/') ?>/css/custom.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo base_url() . "/public/"; ?>js/fast-buddy.js?3"></script>
</head>

<body id="page-top" class="sidebar-toggled">
    <div id="callincoming"></div>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('member') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="<?php echo base_url() . '/public/'; ?>new_client_dashboard/images/Myportalx logo 2.png" width="50">
                </div>
                <div class="sidebar-brand-text mx-3">Myportalx.com</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url() . "/client"; ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <?php $getDatas = $builder->where(array('fld_id' => $user_id))->get();
            foreach ($getDatas->getResult() as $rows) {
            } ?>
            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link" href="<?php echo ($rows->fld_Gratitude_verified == 1) ? base_url("Gratitude_Journal") : base_url("client/no_Gratitude") ?>">
                    <i class='far fa-address-book'></i>
                    <span>Gratitude Journal</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo ($rows->fld_Daily_Score_verified == 1) ? base_url("Daily_Accountability_Score") : base_url("client/no_Daily") ?>">
                    <i class='fas fa-chart-pie'></i>
                    <span>Daily Accountability Score</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo ($rows->fld_Energy_Detox_verified == 1) ? base_url("Negative_Energy_Detox") : base_url("client/no_Negative") ?>">
                    <i class='fas fa-fire'></i>
                    <span>Negative Energy Detox</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-right d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo ($rows->fld_Intention_verified == 1) ? base_url("Intention_Setting") : base_url("client/no_intention") ?>">
                    <i class='fab fa-connectdevelop'></i>
                    <span>Intention Setting</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo ($rows->fld_Appointment_verified == 1) ? base_url("Appointments") : base_url("client/no_Appointment") ?>">
                    <i class="far fa-calendar-check"></i>
                    <span>Appointment Scheduler</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="<?php echo ($rows->fld_Messages_verified == 1) ? base_url("messages") : base_url("client/no_messages") ?>">
                    <i class="fas fa-envelope-open-text"></i>
                    <span>Messages</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo ($rows->fld_Chakra_verified == 1) ? base_url("chakra_reading") : base_url("client/no_Chakra") ?>">
                    <i class="fas fa-user fa-fw "></i>
                    <span>Chakra Reading</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="<?php echo ($rows->fld_Wheel_verified == 1) ? base_url("Wheel_of_life") : base_url("client/no_wheel") ?>">
                    <i class='fas fa-dharmachakra'></i>
                    <span>Wheel Of Life</span></a>
            </li>

            <?php
            // if (sizeof($coaching_forms) > 0) { 
            ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="far fa-calendar-check"></i>
                    <span>Coaching Session</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">All coaching form</h6>
                        <?php
                        // foreach ($coaching_forms as $form) {
                        //     if ($form->completed_date == '')
                        //         echo "<a class='collapse-item' href='{$this->config->item('base_url')}/client/{$form->view_name}'>{$form->title}</a>";
                        // } 
                        ?>
                    </div>
                </div>
            </li>
            <?php
            // }
            ?>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() . "/profile"; ?>">
                    <i class="fas fa-layer-group"></i>
                    <span>Settings</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() . "/reports"; ?>">
                    <i class="fas fa-file-medical-alt"></i>
                    <span>Reports</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() . "/client_payment"; ?>">
                    <i class="fas fa-layer-group"></i>
                    <span>Payment</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() . "/Library"; ?>">
                    <i class="fas fa-newspaper"></i>
                    <span>Library</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() . "/client/maya"; ?>">
                    <i class="fas fa-newspaper"></i>
                    <span>Maya</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-lock"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <!--  <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <a href="#" class="btn btn-light btn-icon-split" id="sidebarToggle"><span class="icon text-gray-600">
                            <i class="fas fa-sliders-h fa-2x"></i></span></a>

                    <!--  <ul class="navbar-nav">
          	<li id="testimonials" >
            	<a href="" style="color: #fff" href="#" data-toggle="modal" data-target="#exampleModal">Support Your Coach!  Give TESTIMONIAL</a>
            </li>
          </ul> -->

                    <marquee onMouseOver="this.stop()" onMouseOut="this.start()"><a href="" data-toggle="modal" data-target="#exampleModal">Support Your Coach! Give TESTIMONIAL</a></marquee>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link" href="<?php echo base_url() . '/client' ?>">
                                <i class="fas fa-home fa-fw"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">
                                    <?php
                                    // $gets = $this->db->get_where('notification', array('reciver_id' => $login_id, 'status' => '0'));
                                    // echo $gets->num_rows();
                                    ?>
                                </span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown" id="notification" style="height: 450px;overflow-x: hidden;overflow-y: scroll;">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a href="javascript:void(0);" class="allclear" data-id="<?= $login_id ?>">Clear All</a>
                                <?php
                                // foreach ($gets->result() as $row) {
                                ?>

                                <div class="d-flex align-items-center">
                                    <div class="mr-3 ">
                                        <a class="icon-circle bg-primary" href="<?= base_url('/client/' . $row->urls) ?>" style="padding: 0;margin: 0;">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </a>
                                        <a class="icon-circle bg-danger delete_notif" href="javascript:void(0);" data-url="<?= $row->urls ?>" data-id="<?= $login_id ?>" style="padding: 0;margin: 0;">
                                            <i class="fas fa-trash-alt text-white"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?php echo date("F d, Y", $row->fld_date) ?></div>
                                        <a class="dropdown-item " href="<?= base_url('client/' . $row->urls) ?>"><span class="font-weight-bold"><?php echo $row->message; ?></span></a>
                                    </div>
                                </div>
                                <?php
                                // }
                                ?>

                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo ucwords($userRow['fld_first_name']); ?>&nbsp;<?php echo ucwords($userRow['fld_last_name']); ?></span>
                                <img class="img-profile rounded-circle" src="<?php echo $image ?>" alt="Profile">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?php echo base_url() . "/profile"; ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <div class="container-fluid main-container">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between m-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo ucwords($userRow['fld_first_name']); ?>&nbsp;<?php echo ucwords($userRow['fld_last_name']); ?> Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-question fa-sm text-white-50"></i> Help Me!</a>
                    </div>

                    <div class="row text-center">
                        <!-- Begin Page Content -->
                        <!-- <div class="container-fluid main-container"> -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-info shadow h-100 py-2">
                                <a href="<?php echo ($rows->fld_Coaching_verified == 1) ? base_url("/coaching_session") : base_url("client/no_coaching") ?>">
                                    <div class="card-body">
                                        <img src="<?= base_url('/public/client-dashboard/') ?>/img/coaching.jpg" class="img-fluid">
                                        <span id="cntforms" style="position: absolute;top: 50%;left: 23%;font-weight:bold;color:#000;">
                                            <?php
                                            // $clientsparent_id = $rows->fld_parent;
                                            // $coach = $this->db->get_where('users', array('fld_id' => $clientsparent_id));
                                            // foreach ($coach->result() as $row) {
                                            // }
                                            // if ($rows->fld_marketing == '1' && $row->fld_cform == '1') {
                                            //     $market = $marketing_forms_count;
                                            // } else {
                                            //     $market = '';
                                            // }
                                            // $total = $coaching_forms_count + $market;
                                            // echo $total; 
                                            ?></span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-success shadow h-100 py-2">
                                <a href="<?php echo ($rows->fld_Daily_Score_verified == 1) ? base_url("/Daily_Accountability_Score") : base_url("client/no_Daily") ?>" style="text-decoration:none !important;">
                                    <div class="card-body">
                                        <div class="col">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">DAS</div>
                                        </div>
                                        <hr>
                                        <div class="col-auto">

                                            <?php
                                            // $CI = &get_instance();
                                            // $CI->load->model('user_model');
                                            // $das_score = $CI->user_model->get_use_das_average($user_id); 
                                            ?>

                                            <img src="<?= base_url('/public/client-dashboard/') ?>/img/promotion.png" width="100">

                                        </div>
                                        <hr>
                                        <div class="widget-int num-count">Weekly Average Score <?php echo $das_score; ?></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-info shadow h-100 py-2">
                                <a href="<?= base_url('client/event_calendar') ?>" style="text-decoration:none !important;">
                                    <div class="card-body">
                                        <div class="col">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> Calender</div>
                                        </div>
                                        <hr>
                                        <img src="<?= base_url('/public/client-dashboard/img/calendar-3906791_1920.jpg') ?>" width="100">
                                        <hr>
                                        </span>
                                        <div class="col-auto">
                                            <span><var id="hours">00</var><var>:</var><var id="menutes">00</var>&nbsp;<span id="ampm">AM</span>
                                        </div>
                                        <div class="widget-subtitle plugin-date">Loading...</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-success shadow h-100 py-2">
                                <a href="#" data-toggle="modal" data-target="#client-journey-form-modal">

                                    <div class="card-body">
                                        <img src="<?= base_url('/public/images/Portal.png') ?>" class="img-fluid">
                                        <!--<span style="position: absolute;top: 50%;left: 30%;font-size: 2vw; font-weight:bold;color:#000;">-->
                                        <?php
                                        //   echo $countMsg;
                                        ?>
                                        <!--</span>-->
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-primary shadow h-100 py-2">
                                <a href="<?php echo ($rows->fld_Wheel_verified == 1) ? base_url("/Wheel_of_life") : base_url("client/no_wheel") ?>">
                                    <div class="card-body">
                                        <img src="<?= base_url('/public/client-dashboard/') ?>/img/wheel_life.jpg" class="img-fluid">
                                    </div>
                                </a>
                            </div>
                        </div>



                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-info shadow h-100 py-2">
                                <a href="<?php echo ($rows->fld_Appointment_verified == 1) ? base_url("/Appointments") : base_url("client/no_Appointment") ?>">
                                    <div class="card-body">
                                        <img src="<?= base_url('/public/client-dashboard/') ?>/img/appointmentSch1.jpg" class="img-fluid">
                                    </div>
                                </a>
                            </div>
                        </div>


                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-primary shadow h-100 py-2">
                                <a href="<?php echo ($rows->fld_Energy_Detox_verified == 1) ? base_url("/Negative_Energy_Detox") : base_url("client/no_Negative") ?>">
                                    <div class="card-body">
                                        <img src="<?= base_url('/public/client-dashboard/') ?>/img/dahatantra1.png" class="img-fluid">
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-success shadow h-100 py-2">
                                <a href="<?php echo ($rows->fld_Gratitude_verified == 1) ? base_url("/Gratitude_Journal") : base_url("client/no_Gratitude") ?>">
                                    <div class="card-body">
                                        <img src="<?= base_url('/public/client-dashboard/') ?>/img/gratitude1.jpg" class="img-fluid">
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-info shadow h-100 py-2">
                                <a href="<?php echo ($rows->fld_Chakra_verified == 1) ? base_url("/chakra_reading") : base_url("client/no_Chakra") ?>">
                                    <div class="card-body">
                                        <img src="<?= base_url('/public/client-dashboard/') ?>/img/chakra1.jpg" class="img-fluid">
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-success shadow h-100 py-2">
                                <a href="<?php echo ($rows->fld_Intention_verified == 1) ? base_url("/Intention_Setting") : base_url("client/no_intention") ?>">
                                    <div class="card-body">
                                        <img src="<?= base_url('/public/client-dashboard/') ?>/img/intention.jpg" class="img-fluid">
                                    </div>
                                </a>
                            </div>
                        </div>


                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-primary shadow h-100 py-2">
                                <a href="<?= base_url('Library') ?>" style="text-decoration:none !important;">
                                    <div class="card-body">
                                        <div class="col ">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Library</div>
                                        </div>
                                        <hr>
                                        <div class="col-auto">

                                            <img src="<?= base_url('/public/new_client_dashboard/images/library.png') ?>" width="100">
                                        </div>
                                        <!-- <hr> -->
                                        <!-- <div class="widget-int num-count"><?php echo $countMsg; ?></div> -->
                                    </div>
                                </a>
                            </div>
                        </div>



                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-primary shadow h-100 py-2">
                                <a href="<?= base_url('reports') ?>">
                                    <div class="card-body">
                                        <div class="col ">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Report</div>
                                        </div>
                                        <hr>
                                        <img src="<?= base_url('/public/') ?>/new_client_dashboard/images/reports1.png" width="140">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container">
                        <div class="copyright text-center">
                            <span>Copyright &copy; Myportalx.com <?= date('Y') ?></span>
                        </div>
                    </div>
                </footer>
            </div>

        </div>
        <!-- /.container-fluid -->


    </div>
    <!-- End of Main Content -->
    </div>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- client journey form Modal-->
    <div class="modal fade" id="client-journey-form-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choose how you want to connect</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="cards shadow mb-1  p-2">
                        <a href="<?php echo ($rows->fld_Messages_verified == 1) ? base_url("/client/maya") : base_url("/client/maya") ?>" class="btn btn-info">Maya Video Chat</a>
                        <a href="<?php echo ($rows->fld_Messages_verified == 1) ? base_url("/messages") : base_url("/messages") ?>" class="btn btn-info pull-right">Messenger Chat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>
                        <p>Press No if you want to continue work. Press Yes to logout current user.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" id="get_logout" username="<?php echo $session['username']; ?>" class="btn btn-primary">Yes</a>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade ratingmodal" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Testimonial</h5>
                    <button type="button" class="btn btn-default modal-control-close close pull-right" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body"> <?php
                                            // $rating = "";
                                            //                             $userId = $this->db->get_where('testimonial', array('client_id' => $user_id));
                                            //                             $ratingrow = $userId->row_array(); 
                                            ?>
                    <form method="post">
                        <div class="form-group">
                            <h5>1. What would you say are the best qualitites of your coach?</h5>
                            <h5>2. please write a couple of lines about their expertise on the subject matter.</h5>
                            <h5>3. What are the top two reasons. you would recommend your coach to others?</h5>
                            <h5>4. Other comments.</h5>

                            <div class="rating">
                                <div style="color: #000; font-size: 18px;">1 Star</div>&nbsp;&nbsp;<input type="radio" name="rating" value="1" id="1" class="myradio" <?php if ($ratingrow['star'] == "1") {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } ?>>
                                <span>☆</span>
                            </div>


                            <div class="rating">
                                <div style="color: #000; font-size: 18px;">2 Star</div>&nbsp;&nbsp; <input type="radio" name="rating" value="2" id="2" class="myradio" <?php if ($ratingrow['star'] == "2") {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } ?>>
                                <span>☆</span><span>☆</span>
                            </div>

                            <div class="rating">
                                <div style="color: #000; font-size: 18px;">3 Star</div>&nbsp;&nbsp; <input type="radio" name="rating" value="3" id="3" class="myradio" <?php if ($ratingrow['star'] == "3") {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } ?>>
                                <span>☆</span><span>☆</span><span>☆</span>
                            </div>

                            <div class="rating">
                                <div style="color: #000; font-size: 18px;">4 Star</div>&nbsp;&nbsp;<input type="radio" name="rating" value="4" id="4" class="myradio" <?php if ($ratingrow['star'] == "4") {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } ?>>
                                <span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                            </div>

                            <div class="rating">
                                <div style="color: #000; font-size: 18px;">5 Star</div>&nbsp;&nbsp; <input type="radio" name="rating" value="5" id="5" class="myradio" <?php if ($ratingrow['star'] == "5") {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } ?>>
                                <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                            </div>

                            <div class="form-group"> <input type="hidden" id="client_id" value="<?= $user_id ?>"> <input type="hidden" id="coach_id" value="<?= $userRow['fld_parent'] ?>"> <label for="message-text" class="col-form-label">Comments:</label> <textarea class="form-control" id="message-text" name="description"><?= $ratingrow['description'] ?></textarea></div>
                    </form>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-default model-control-close" data-dismiss="modal">Close</button><button type="button" name="sent_rating" id="sent_rating" class="btn btn-primary">Save changes</button></div>
            </div>
        </div>
    </div>
    <input type="hidden" id="home_url" value="<?= base_url() ?>">
    <script>
    $(document).ready(function() {
    setInterval(function() {
    update_profile();
    }, 3000);

    function update_profile() {
    var x = document.getElementById("myAudio");
    $.ajax({

    url: "<?= base_url() ?>/client/update_profile",

    method: "post",

    type: "json",

    success: function(response) {
    data = JSON.parse(response);
    console.log(data.status);
    if (data.status == 1) {
    x.play();
    $('#callincoming').html('<div class="alert alert-dark" style="height: 50px;line-height: 50px;padding:0px;"><a href="' + data.url + '" style="margin-right:12px;float:right;"><img src="<?= base_url('/public/img/0e475bb9b17b3fa4f94f31fba1635b8f-telephone-call-icon-logo-by-vexels.png'); ?>" alt="callend" width="30"></a><a href="<?= base_url('client/callend/') ?>/' + data.fld_id + '" style="margin-right:12px;float:right;"><img src="<?= base_url('/public/img/png-clipart-end-call-button-telephone-call-button-computer-icons-button-text-trademark.png') ?>" alt="callend" width="25"></a></div>');
    } else {
    $('#callincoming').html("");
    x.pause();

    }
    // x.play();
    }

    });

    }

    $('#get_logout').click(function() {
    var username = $(this).attr('username');
    $.ajax({
    url: "<?= base_url() ?>/get_logout",
    data: {
    "username": username
    },
    dataType: "json",
    type: "POST",
    success: function(response) {

    if (response.status == '1') {
    window.setTimeout(function() {
    // Move to a new location or you can do something else
    window.location.href = "<?= base_url() ?>/login";
    }, 0000);
    } else {}
    }
    });
    });
    $('#sent_rating').click(function() {

    var rating = $('input[type="radio"]:checked').val();

    var client_id = $('#client_id').val();

    var coach_id = $("#coach_id").val();

    var description = $("#message-text").val();

    if (rating != "" && client_id != "" && coach_id != "" && description != "") {

    $.ajax({

    url: "<?= base_url('client/testimonial') ?>",

    method: "post",

    type: "text",

    data: {
    rating: rating,
    client_id: client_id,
    coach_id: coach_id,
    description: description
    },

    success: function(data) {

    location.reload();

    }

    });

    } else {

    alert("Please fill Testimonial !!!");

    }

    });
    });
    </script>
    <script type="text/javascript">
        $(".allclear").click(function() {
            if (confirm("Are you sure All clear?")) {
                var id = $(this).attr('data-id');
                $.get("<?= base_url('client/delete_notifications') ?>/" + id, "", function(response) {
                    location.reload(true);
                });
            }
        });
        $(".delete_notif").click(function() {
            if (confirm("Are you sure?")) {
                var id = $(this).attr('data-id');
                var url = $(this).attr('data-url');
                $.get("<?= base_url('client/delete_notification') ?>/" + id + "/" + url, "", function(response) {
                    location.reload(true);
                });
            }
        });

        function clock() {
            var hours = document.getElementById('hours');
            var minutes = document.getElementById('menutes');
            var ampm = document.getElementById('ampm');

            var h = new Date().getHours();
            var m = new Date().getMinutes();
            var am = "AM";
            if (h > 12) {
                h = h - 12;
                var am = "PM";
            }

            h = (h < 10) ? "0" + h : h
            m = (m < 10) ? "0" + m : m

            hours.innerHTML = h;
            minutes.innerHTML = m;
            ampm.innerHTML = am;
        }
        var interval = setInterval(clock, 1000);
    </script>
    <script type='text/javascript' src='<?php echo base_url() . "/public/"; ?>js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url() . "/public/"; ?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
    <script type='text/javascript' src='<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap-datepicker.js'></script>
    <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/owl/owl.carousel.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- END THIS PAGE PLUGINS-->
    <!-- START TEMPLATE -->

    <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/actions.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('/public/client-dashboard/') ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('/public/client-dashboard/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('/public/client-dashboard/') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('/public/client-dashboard/') ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('/public/client-dashboard/') ?>/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('/public/client-dashboard/') ?>/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url('/public/client-dashboard/') ?>/js/demo/chart-pie-demo.js"></script>
    <script type="text/javascript">
        $(function() {
            $('marquee').mouseover(function() {
                $(this).attr('scrollamount', 0);
            }).mouseout(function() {
                $(this).attr('scrollamount', 5);
            });
        });
    </script>

</body>

</html>