<?php
$son = session();
$session = $son->getTempdata();
$user_id = $session['user_id'];
$db      = \Config\Database::connect();
$getDatas = $db->table('users')->where(array('fld_id' => $user_id))->get();

$rows = $getDatas->getRowArray();

$membersparent_id = $rows['fld_parent'];
$coach = $db->table('users')->where(array('fld_id' => $membersparent_id))->get();
if ($coach->getNumRows() > 0) {
    $row = $coach->getRowArray();

    $coachName = $row["fld_first_name"] . " " . $row["fld_last_name"];
    $coachemail = $row["fld_email"];
    $coach_form = $row['fld_cform'];
}
$image_path = ($row['fld_file_name'] != '') ? $row['fld_file_name'] : '/public/uploads/member/' . 'default.png';
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
    <title>Event Calender</title>
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
                <a class="nav-link" href="<?php echo base_url() . "client"; ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">Interface</div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo ($rows->fld_Gratitude_verified == 1) ? base_url("Gratitude_Journal") : base_url("member/no_Gratitude") ?>">
                    <i class='far fa-address-book'></i>
                    <span>Gratitude Journal</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo ($rows->fld_Daily_Score_verified == 1) ? base_url("Daily_Accountability_Score") : base_url("member/no_Daily") ?>">
                    <i class='fas fa-chart-pie'></i>
                    <span>Daily Accountability Score</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo ($rows->fld_Energy_Detox_verified == 1) ? base_url("Negative_Energy_Detox") : base_url("member/no_Negative") ?>">
                    <i class='fas fa-fire'></i>
                    <span>Negative Energy Detox</span></a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-right d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            <li class="nav-item">

                <a class="nav-link" href="<?php echo ($rows->fld_Intention_verified == 1) ? base_url("Intention_Setting") : base_url("member/no_intention") ?>">

                    <i class='fab fa-connectdevelop'></i>

                    <span>Intention Setting</span></a>

            </li>



            <li class="nav-item">

                <a class="nav-link" href="<?php echo ($rows->fld_Appointment_verified == 1) ? base_url("Appointments") : base_url("member/no_Appointment") ?>">

                    <i class="far fa-calendar-check"></i>

                    <span>Appointment Scheduler</span>

                </a>

            </li>





            <li class="nav-item">

                <a class="nav-link" href="<?php echo ($rows->fld_Messages_verified == 1) ? base_url("messages") : base_url("member/no_messages") ?>">

                    <i class="fas fa-envelope-open-text"></i>

                    <span>Messages</span></a>

            </li>



            <li class="nav-item">

                <a class="nav-link" href="<?php echo ($rows->fld_Chakra_verified == 1) ? base_url("chakra_reading") : base_url("member/no_Chakra") ?>">

                    <i class="fas fa-user fa-fw "></i>

                    <span>Chakra Reading</span></a>

            </li>





            <li class="nav-item">

                <a class="nav-link" href="<?php echo ($rows->fld_Wheel_verified == 1) ? base_url("Wheel_of_life") : base_url("member/no_wheel") ?>">

                    <i class='fas fa-dharmachakra'></i>

                    <span>Wheel Of Life</span></a>

            </li>



            <?php if (sizeof($coaching_forms) > 0) { ?>

                <li class="nav-item">

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">

                        <i class="far fa-calendar-check"></i>

                        <span>Coaching Session</span>

                    </a>

                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

                        <div class="bg-white py-2 collapse-inner rounded">

                            <h6 class="collapse-header">All coaching form</h6>

                            <?php

                            foreach ($coaching_forms as $form) {

                                if ($form->completed_date == '')

                                    echo "<a class='collapse-item' href='".base_url("/client/"."$form->view_name.")."'>{$form->title}</a>";
                            } ?>

                        </div>

                    </div>

                </li>

            <?php  }  ?>



            <li class="nav-item">

                <a class="nav-link" href="<?php echo base_url() . "profile"; ?>">

                    <i class="fas fa-layer-group"></i>

                    <span>Settings</span></a>

            </li>





            <li class="nav-item">

                <a class="nav-link" href="<?php echo base_url() . "reports"; ?>">

                    <i class="fas fa-file-medical-alt"></i>

                    <span>Reports</span></a>

            </li>





            <li class="nav-item">

                <a class="nav-link" href="<?php echo base_url() . "client_payment"; ?>">

                    <i class="fas fa-layer-group"></i>

                    <span>Payment</span></a>

            </li>





            <li class="nav-item">

                <a class="nav-link" href="<?php echo base_url() . "Library"; ?>">

                    <i class="fas fa-newspaper"></i>

                    <span>Library</span></a>

            </li>

            <li class="nav-item">

                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">

                    <i class="fas fa-fw fa-lock"></i>

                    <span>Logout</span></a>

            </li>



            <!-- Divider -->

            <hr class="sidebar-divider d-none d-md-block">



        </ul>

        <!-- End of Sidebar -->



        <!-- Content Wrapper -->

        <div id="content-wrapper" class="d-flex flex-column">



            <!-- Main Content -->

            <div id="content">



                <!-- Topbar -->

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <ul class="navbar-nav ml-auto">



                        <div class="topbar-divider d-none d-sm-block"></div>



                        <li class="nav-item dropdown no-arrow mx-1">

                            <a class="nav-link" href="<?php echo base_url() . 'client' ?>">

                                <i class="fas fa-home fa-fw"></i>

                            </a>
                        </li>

                        <li class="nav-item dropdown no-arrow mx-1">

                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <i class="fas fa-bell fa-fw"></i>

                                <!-- Counter - Alerts -->

                                <span class="badge badge-danger badge-counter">

                                    <?php
                                    $gets = $db->table('notification')->where(array('reciver_id' =>$user_id, 'status' => '0'))->get(); 
                                    echo $gets->getNumRows();

                                    ?>

                                </span>

                            </a>

                            <!-- Dropdown - Alerts -->

                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown" id="notification" style="height: 450px;overflow-x: hidden;overflow-y: scroll;">

                                <h6 class="dropdown-header">

                                    Alerts Center

                                </h6>

                                <a href="javascript:void(0);" class="allclear" data-id="<?= $login_id ?>">Clear All</a>
                                <?php foreach ($gets->getResult() as $row) { ?>

                                    <div class="d-flex align-items-center">
                                        <div class="mr-3 ">
                                            <a class="icon-circle bg-primary" href="<?= base_url('member/' . $row->urls) ?>" style="padding: 0;margin: 0;">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </a>
                                            <a class="icon-circle bg-danger delete_notif" href="javascript:void(0);" data-url="<?= $row->urls ?>" data-id="<?= $login_id ?>" style="padding: 0;margin: 0;">
                                                <i class="fas fa-trash-alt text-white"></i>
                                            </a>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500"><?php echo date("F d, Y", $row->fld_date) ?></div>
                                            <a class="dropdown-item " href="<?= base_url('member/' . $row->urls) ?>"><span class="font-weight-bold"><?php echo $row->message; ?></span></a>
                                        </div>
                                    </div>
                                <?php } ?>


                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>

                            </div>

                        </li>



                        <!-- Nav Item - User Information -->

                        <li class="nav-item dropdown no-arrow">

                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $userRow['fld_first_name']; ?>&nbsp;<?php echo $userRow['fld_last_name']; ?></span>

                                <img class="img-profile rounded-circle" src="<?php echo $image ?>">

                            </a>

                            <!-- Dropdown - User Information -->

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="<?php echo base_url() . "profile"; ?>">

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

<link rel="stylesheet" href="<?= base_url('//public/css/fullcalenders/fullcalender.css'); ?>" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

<script>
$(document).ready(function() {
    $(".allclear").click(function() {
        if (confirm("Are you sure All clear?")) {
            var id = $(this).attr('data-id');
            $.get("<?= base_url('Member/delete_notifications') ?>/" + id, "", function(response) {
                location.reload(true);
            });
        }
    });
    $(".delete_notif").click(function() {
        if (confirm("Are you sure?")) {
            var id = $(this).attr('data-id');
            var url = $(this).attr('data-url');
            $.get("<?= base_url('Member/delete_notification') ?>/" + id + "/" + url, "", function(response) {
                location.reload(true);
            });
        }
    });
    $("#addevent").click(function() {

        var title = $("#exampleInputTitle").val();
        var start = $("#exampleInputstart").val();
        var end = $("#exampleInputEnd").val();
        var description = $('#description').val();

        $.ajax({

            url: "<?php echo base_url('client/insert_event'); ?>",

            type: "POST",

            data: {
                title: title,
                start: start,
                end: end,
                description: description
            },

            success: function()
            {
                calendar.fullCalendar('refetchEvents');
                alert("Added Successfully");
                $('#myModal').modal('hide');
            }
        });
    });
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: "<?php echo base_url('client/load_event'); ?>",
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
            if (start.isBefore(moment())) {
                $('#calendar').fullCalendar('unselect');
                return false;
            } else {
                $("#exampleInputstart").val($.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss"));
                $("#exampleInputstarts").val($.fullCalendar.formatDate(start, "MM/DD/Y"));
                $("#exampleInputEnd").val($.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss"));
                $('#myModal').modal('show');
            }
        },
        editable: true,
        eventResize: function(event)
        {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            var title = event.title;
            var id = event.id;
            $.ajax({
                url: "<?php echo base_url('member/update_event'); ?>",
                type: "POST",
                data: {
                    title: title,
                    start: start,
                    end: end,
                    id: id
                },
                success: function() {
                    calendar.fullCalendar('refetchEvents');
                    alert('Event Update');
                }
            })
        },
        eventDrop: function(event)
        {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            var title = event.title;
            var id = event.id;
            $.ajax({
                url: "<?php echo base_url('member/update_event'); ?>",
                type: "POST",
                data: {
                    title: title,
                    start: start,
                    end: end,
                    id: id
                },
                success: function()
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Updated");
                }
            });
        },
        eventClick: function(event)
        {
            if (confirm("Are you sure you want to remove it?"))
            {
                var id = event.id;
                $.ajax({
                    url: "<?php echo base_url('member/delete_event'); ?>",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function()
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Event Removed");
                    }
                })
            }
        },
    });
});
</script>
<ul class="breadcrumb"><li><a href="<?= base_url('client') ?>">Home</a></li></ul>
<div id="calendar"></div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container">
        <div class="copyright text-center">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
                <!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <!-- <h4 class="modal-title" id="exampleModalLabel">Modal</h4> -->
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputTitle">Event Title</label>
                    <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="emailHelp" placeholder="Enter Event Title">
                    <!--     <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <label for="exampleInputstart">Event Time</label>
                    <input type="hidden" class="form-control" id="exampleInputstart">
                    <input type="text" class="form-control" id="exampleInputstarts" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="exampleInputEnd">Event Discription</label>
                    <input type="hidden" class="form-control" id="exampleInputEnd" placeholder="Enter Event End Date">
                    <textarea id="description" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" id="addevent">Add Event</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
<script>
$(document).ready(function() {
    $('#get_logout').click(function() {
        var username = $(this).attr('username');
        $.ajax({
            url: "<?= base_url() ?>get_logout",
            data: {
                "username": username
            },
            dataType: "json",
            type: "POST",
            success: function(response) {

                if (response.status == '1') {
                    window.setTimeout(function() {
                        // Move to a new location or you can do something else
                        window.location.href = "<?= base_url() ?>login";
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

                url: "<?= base_url('member/testimonial') ?>",

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
<script src="<?= base_url('/public/client-dashboard/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url('/public/client-dashboard/') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url('/public/client-dashboard/') ?>/js/sb-admin-2.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('marquee').mouseover(function() {
            $(this).attr('scrollamount', 0);
        }).mouseout(function() {
            $(this).attr('scrollamount', 5);
        });
    });
</script>